<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use RuntimeException;

trait JsonResponsive
{
    protected function ensure(bool $success, string $message = 'Unhandled error'): JsonResponse
    {
        if ($success) {
            return $this->successResponse();
        }

        throw new RuntimeException($message);
    }

    protected function successResponse(array $data = [], int $status = Response::HTTP_OK): JsonResponse
    {
        return $this->commonJsonResponse(true, $data, $status);
    }

    protected function errorResponse(array $data = [], int $status = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return $this->commonJsonResponse(false, $data, $status);
    }

    private function commonJsonResponse(bool $success, array $data = [], int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json(array_merge(compact('success'), $data), $status);
    }
}