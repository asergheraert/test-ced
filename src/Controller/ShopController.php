<?php

namespace App\Controller;

use App\Entity\Shop;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use ApiPlatform\Metadata\CollectionOperationInterface;
use App\Shop\ShopLocator;

class ShopController implements ProviderInterface
{
    private $shopLocator;

    public function __construct(ShopLocator $shopLocator)
    {
        $this->shopLocator = $shopLocator;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): Shop|array|null
    {
        if ($operation instanceof CollectionOperationInterface) {
            return $this->shopLocator->allShops();
        }

        return $this->shopLocator->find($uriVariables['id']);
    }
}
