<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WeatherRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeatherRepository::class)]
#[ApiResource]
class Weather
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float')]
    private $lon;

    #[ORM\Column(type: 'float')]
    private $lat;

    #[ORM\Column(type: 'string', length: 64)]
    private $weather;

    #[ORM\Column(type: 'float')]
    private $temp;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: City::class, inversedBy: 'weather')]
    #[ORM\JoinColumn(nullable: false)]
    private $city;

    #[ORM\ManyToOne(targetEntity: County::class, inversedBy: 'weather')]
    #[ORM\JoinColumn(nullable: false)]
    private $county;

    #[ORM\ManyToOne(targetEntity: WeatherStatus::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLon(): ?float
    {
        return $this->lon;
    }

    public function setLon(float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getWeather(): ?string
    {
        return $this->weather;
    }

    public function setWeather(string $weather): self
    {
        $this->weather = $weather;

        return $this;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

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
}
