<?php

declare(strict_types=1);

namespace Product\Handler;

use Exception;
use Product\Service\ProductsService;

use function json_encode;

use const JSON_PRETTY_PRINT;

abstract class AbstractHandler
{
    protected ProductsService $productsService;

    /**
     * AbstractHandler construct
     *
     * @param ProdutsService $productsService
     */
    public function __construct(ProductsService $productsService)
    {
        $this->productsService = $productsService;
    }

    /**
     * @param mixed $response
     * @param int $statusCode
     */
    protected function successResponse($response, $statusCode = 200): string
    {
        return json_encode([
            'data'        => $response,
            'status_code' => $statusCode,
        ], JSON_PRETTY_PRINT);
    }

    /**
     * @param int $statusCode
     */
    protected function errorResponse(Exception $e, $statusCode = 400): string
    {
        return json_encode([
            'type'                => 'error',
            'message'             => $e,
            'status_code'         => $statusCode,
            'message_description' => $e->getMessage(),
        ], JSON_PRETTY_PRINT);
    }
}
