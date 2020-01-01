<?php

namespace App\DataMappers;

interface DataMapper
{
    /**
     * Map data
     *
     * @param array $data
     * @return array
     */
    public function mapData(array $data): array;
}
