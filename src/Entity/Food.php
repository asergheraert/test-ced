<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\ApiResource;
use App\Controller\FoodController;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;

#[ApiResource(operations: [
    new Get(uriTemplate: 'aliments/{id}'),
    new GetCollection(uriTemplate: 'aliments'),
    new GetCollection(
        name: 'shop',
        uriTemplate: 'aliments/{id}/magasin', 
        controller: FoodController::class
    )
])]
#[ApiFilter(OrderFilter::class, properties: ['id' => 'DESC'])]
#[ORM\Entity()]
class Food
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}
