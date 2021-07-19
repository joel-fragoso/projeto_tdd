<?php

declare(strict_types=1);

namespace Product\Handler;

use Exception;
use Product\Entity\Product;

class CreateProductHandler extends AbstractHandler
{
    /**
     * @param array $request
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
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return $response;
    }
}
