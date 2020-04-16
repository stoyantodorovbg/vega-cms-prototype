<?php

namespace App\DataMappers;

class ContainerDataMapper extends JsonDataMapper implements DataMapperInterface
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
            'summary' => $emptyJsonField,
            'body' => $emptyJsonField,
            'styles' => $emptyJsonField,
        ];

        $mappedData = $this->processJsonData($data, $mappedData);

        return $mappedData;
    }
}
