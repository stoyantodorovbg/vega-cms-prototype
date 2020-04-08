<?php

namespace App\DataMappers;

class MenuDataMapper extends JsonDataMapper implements DataMapperInterface
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
                $processedValue  = [];

                if(array_key_exists('empty_json', $value)) {
                    $processedValue['structure'] = $this->prepareJsonStructure($value);
                    $mappedData[$key] = json_encode([], JSON_HEX_QUOT);
                } else {
                    $processedValue = $this->prepareNestedJsonData($value);
                    $processedValue['structure'] = $this->prepareJsonStructure($value);
                    $mappedData[$key] = json_encode($processedValue, JSON_HEX_QUOT);
                }
            } else {
                $mappedData[$key] = $value !== null ? $value : '';
            }

        }
        return $mappedData;
    }
}
