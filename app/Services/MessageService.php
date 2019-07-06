<?php

namespace App\Services;

use App\Services\Interfaces\MessageServiceInterface;

class MessageService implements MessageServiceInterface
{

    /**
     * Return a message according to the result
     *
     * @param bool $result
     * @param array $success
     * @param array $failure
     * @return array
     */
    public function checkResult(bool $result, array $success, array $failure): array
    {
        if ($result) {
            return [
                'message' => [
                    'message' => $success['message'],
                ],
                'status' => $success['status'],
            ];
        }

        return [
            'message' => [
                'message' => $failure['message'],
            ],
            'status' => $failure['status'],
        ];
    }
}
