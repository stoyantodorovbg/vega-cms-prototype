<?php

namespace App\DataMappers;

class JsonDataMapper
{
    /**
     * Prepare nested JSON data recursivelly
     *
     * @param array $data
     * @return array
     */
    protected function prepareNestedJsonData(array $data): array
    {
        $data = array_map(function($item) {
            if(is_array($item) && array_key_exists('empty_json', $item)) {
                $item = [];
            } elseif (is_array($item)) {
                $item = $this->prepareNestedJsonData($item);
            }

            if(ctype_digit($item)) {
                return (int) $item;
            }

            if($item === null) {
                return '';
            }

            return $item;
        }, $data);

        return $data;
    }

    /**
     * Prepare a JSON structure that describes a JSON DB field
     * In case of nested json object it is called recursivelly
     *
     * @param array $data
     * @return array
     */
    protected function prepareJsonStructure(array $data): array
    {
        $structure = [];
        if($data !== '[]') {
            foreach ($data as $key => $value) {
                $structure[$key] = [
                    'type' => 'text'
                ];

                if (is_array($value) && array_key_exists('empty_json', $value)) {
                    $structure[$key] = [
                        'type' => 'json',
                        'nested' => [],
                    ];
                } elseif (is_array($value)) {
                    $structure[$key] = [
                        'type' => 'json',
                        'nested' => $this->prepareJsonStructure($value),
                    ];
                }
            }
        }

        return $structure;
    }

    /**
     * Process JSON data
     *
     * @param array $data
     * @param array $mappedData
     * @return array
     */
    protected function processJsonData(array $data, array $mappedData): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $processedValue = [];

                if (array_key_exists('empty_json', $value)) {
                    $processedValue['structure'] = $this->prepareJsonStructure($value);
                    $mappedData[$key] = json_encode([], JSON_HEX_QUOT);
                } else {
                    $processedValue = $this->prepareNestedJsonData($value);
                    $processedValue['structure'] = $this->prepareJsonStructure($value);
                    $mappedData[$key] = json_encode($processedValue, JSON_HEX_QUOT);
                }
            } else {
                $mappedData[$key] = $value ?? '';
            }
        }
        return $mappedData;
    }
}
