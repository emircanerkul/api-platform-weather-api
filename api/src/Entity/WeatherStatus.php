<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WeatherStatusRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: WeatherStatusRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['weather_status:read']],
    denormalizationContext: ['groups' => ['weather_status:write']],
)]
class WeatherStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['weather_status:read'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['weather_status:read', 'weather_status:write'])]
    private $title;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}