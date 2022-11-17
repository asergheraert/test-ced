<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\ApiResource;
use App\Controller\ShopController;

#[ApiResource(
    operations: [
        new Get(uriTemplate: 'magasins/{id}'),
        new GetCollection(uriTemplate: 'magasins')
    ],
    provider: ShopController::class
)]
class Shop
{
    #[ApiProperty(identifier: true)]
    private ?int $id;
    private ?string $name;

    public function __construct(array $values)
    {
        [
            'id' => $this->id,
            'name' => $this->name,
        ] = $values;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
