<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiTrait
{
    public function jsonResponse(mixed $data, int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(
            $data,
            $code
        );
    }
}
