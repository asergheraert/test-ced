<?php

namespace App\Controller;

use App\Entity\Food;
use App\Entity\Type;
use App\Entity\Shop;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use App\Shop\ShopLocator;

#[AsController]
class FoodController extends AbstractController
{
    private $shopLocator;

    public function __construct(ShopLocator $shopLocator)
    {
        $this->shopLocator = $shopLocator;
    }

    public function __invoke(Food $food): Shop|array
    {
        if ($food->getType()->getId() === 2) {
            return $this->shopLocator->find(2);
        }

        return $this->shopLocator->allShops();
    }
}