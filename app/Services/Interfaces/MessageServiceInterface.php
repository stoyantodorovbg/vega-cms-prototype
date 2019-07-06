<?php

namespace App\Services\Interfaces;

interface MessageServiceInterface
{
    /**
     * Return a message according to the result
     *
     * @param bool $result
     * @param array $success
     * @param array $failure
     * @return array
     */
    public function checkResult(bool $result, array $success, array $failure): array;
}
