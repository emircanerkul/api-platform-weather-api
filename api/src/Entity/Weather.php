<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WeatherRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: WeatherRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['weather:read']],
    denormalizationContext: ['groups' => ['weather:write']],
    collectionOperations: [
        "get",
        "post" => ["security" => "is_granted('ROLE_ADMIN')"]
    ],
    itemOperations: [
        "get",
        "put" => ["security" => "is_granted('ROLE_ADMIN')"],
        "delete" => ["security" => "is_granted('ROLE_ADMIN')"],
        "patch" => ["security" => "is_granted('ROLE_ADMIN')"],
    ],
)]
class Weather
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['weather:read'])]
    private $id;

    #[ORM\Column(type: 'float')]
    #[Groups(['weather:read', 'weather:write'])]
    private $temp;

    #[ORM\ManyToOne(targetEntity: County::class, inversedBy: 'weather')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['weather:read'])]
    private $county;

    #[ORM\ManyToOne(targetEntity: WeatherStatus::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['weather:read', 'weather:write'])]
    private $status;

    #[ORM\Column(type: 'datetime')]
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemp(): ?float
    {
        return $this->temp;
    }

    public function setTemp(float $temp): self
    {
        $this->temp = $temp;

        return $this;
    }

    public function getCounty(): ?County
    {
        return $this->county;
    }

    public function setCounty(?County $county): self
    {
        $this->county = $county;

        return $this;
    }

    public function getStatus(): ?WeatherStatus
    {
        return $this->status;
    }

    public function setStatus(?WeatherStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
