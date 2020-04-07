<?php

namespace App\DataMappers;

interface DataMapperInterface
{
    /**
     * Map data
     *
     * @param array $data
     * @return array
     */
    public function mapData(array $data): array;
}
