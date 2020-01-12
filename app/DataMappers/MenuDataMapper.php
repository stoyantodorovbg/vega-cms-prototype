<?php

namespace App\DataMappers;

class MenuDataMapper implements DataMapper
{
    /**
     * Map data
     *
     * @param array $data
     * @return array
     */
    public function mapData(array $data): array
    {
        $emptyJsonField = json_encode([]);
        $mappedData = [
            'title' => $emptyJsonField,
            'description' => $emptyJsonField,
            'styles' => $emptyJsonField,
        ];

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if($key !== 'empty_json') {
                    $value['structure'] = $this->prepareJsonStructure($value);

                    $value = $this->prepareNestedJsonData($value);

                    $mappedData[$key] = json_encode($value, JSON_HEX_QUOT);
                }
            } else {
                $mappedData[$key] = $value !== null ? $value : '';
            }
        }

        return $mappedData;
    }

    /**
     * Prepare nested JSON data recursivelly
     *
     * @param array $data
     * @return array
     */
    protected function prepareNestedJsonData(array $data): array
    {
        $data = array_map(function($item) {
            if(is_array($item)) {
                $item = $this->prepareNestedJsonData($item);
            }

            if(ctype_digit($item)) {
                return (int) $item;
            }

            if(is_null($item)) {
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
            foreach($data as $key => $value) {
                if($key !== 'empty_json') {
                    $structure[$key] = [
                        'type' => 'text'
                    ];

                    if(is_array($value)) {
                        $structure[$key] = [
                            'type' => 'json',
                            'nested' => $this->prepareJsonStructure($value),
                        ];
                    } elseif ($value === '[]') {
                        $structure[$key] = [
                            'type' => 'json',
                            'nested' => [],
                        ];
                    }
                }
            }
        }

        return $structure;
    }
}
