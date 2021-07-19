<?php

declare(strict_types=1);

namespace Product\Handler;

use Product\Service\ProductsService;

/**
 * Class HandlerAbstract
 *
 * @package Product\Handler
 */
abstract class HandlerAbstract
{
    /**
     * @var ProductsService
     */
    protected ProductsService $productsService;

    /**
     * HandlerAbstract construct
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
     * @return string
     */
    protected function successResponse($response, $statusCode = 200): string
    {
        return json_encode([
            'data'        => $response,
            'status_code' => $statusCode,
        ], JSON_PRETTY_PRINT);
    }

    /**
     * @param \Exception $e
     * @param int $statusCode
     * @return string
     */
    protected function errorResponse(\Exception $e, $statusCode = 400): string
    {
        return json_encode([
            'type'                => 'error',
            'message'             => $e,
            'status_code'         => $statusCode,
            'message_description' => $e->getMessage(),
        ], JSON_PRETTY_PRINT);
    }
}
