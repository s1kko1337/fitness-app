<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    private function resourceResponse(JsonResource $resource): JsonResponse
    {
        return $resource->response();
    }

    protected function resourceCreated(JsonResource $resource): JsonResponse
    {
        return $this->resourceResponse($resource)
            ->setStatusCode(Response::HTTP_CREATED);
    }

    protected function deleteResource(): JsonResponse
    {
        return new JsonResponse('Resource deleted',Response::HTTP_NO_CONTENT);
    }
    protected function listResourceResponse(JsonResource $resource): JsonResponse
    {
        return $this->resourceResponse($resource);
    }

    protected function showResourceResponse(JsonResource $resource): JsonResponse
    {
        return $this->resourceResponse($resource);
    }

    protected function userLogined(JsonResource $resource): JsonResponse
    {
        return $this->resourceResponse($resource);
    }

    protected function userLogout(JsonResource $resource): JsonResponse
    {
        return $this->resourceResponse($resource);
    }
}
