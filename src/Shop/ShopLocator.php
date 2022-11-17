<?php

namespace App\Shop;

use App\Entity\Shop;

class ShopLocator
{
    public function allShops(): array
    {
        return [
            new Shop(['id' => 1, 'name' => 'Auchan']),
            new Shop(['id' => 2, 'name' => 'Leclerc']),
        ];
    }

    public function find($id): Shop
    {
        foreach ($this->allShops() as $element ) {
            if ( $id === $element->getId() ) {
                return $element;
            }
        }

        return null;
    }

    public function findByName($name): Shop
    {
        foreach ($this->allShops() as $element ) {
            if ( $name === $element->getName() ) {
                return $element;
            }
        }

        return null;
    }
}
