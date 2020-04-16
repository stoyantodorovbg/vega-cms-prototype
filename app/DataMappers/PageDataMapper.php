<?php

namespace App\DataMappers;

class PageDataMapper extends JsonDataMapper implements DataMapperInterface
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
            'styles' => $emptyJsonField,
            'meta_tags' => $emptyJsonField,
        ];

        $mappedData = $this->processJsonData($data, $mappedData);

        return $mappedData;
    }
}
