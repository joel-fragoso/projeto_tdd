<?php

declare(strict_types=1);

namespace Product\Handler;

use Product\Entity\Product;
use Product\Handler\HandlerAbstract;

/**
 * Class CreateProductHandler
 *
 * @package Product\Handler
 */
class CreateProductHandler extends HandlerAbstract
{
    /**
     * @param array $request
     * @return string
     */
    public function handle(array $request): string
    {
        try {
            $product = (new Product())
                ->setName($request['name'])
                ->setPrice($request['price'])
                ->setQuantity($request['quantity'])
                ->setActive($request['active']);

            $createProduct = $this->productsService->create($product);

            $response = $this->successResponse($createProduct);
        } catch (\Exception $e) {
            $response = $this->errorResponse($e);
        }

        return $response;
    }
}
