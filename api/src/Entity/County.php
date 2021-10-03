<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\CountyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CountyRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['county:read']],
    denormalizationContext: ['groups' => ['county:write']],
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
#[ApiFilter(RangeFilter::class, properties: ['lon', 'lat'])]
#[ApiFilter(SearchFilter::class, properties: ['weather.status.title' => 'ipartial', 'name' => 'partial'])] // WOOOOW didim ^^
#[ApiFilter(DateFilter::class, properties: ['counties.weather.date'])]
#[ApiFilter(OrderFilter::class)]
class County
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['county:read'])]
    private $id;

    #[ORM\Column(type: 'float')]
    #[Groups(['county:read', 'county:write'])]
    private $lon;

    #[ORM\Column(type: 'float')]
    #[Groups(['county:read', 'county:write'])]
    private $lat;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['county:read', 'county:write'])]
    private $title;

    #[ORM\ManyToOne(targetEntity: City::class, inversedBy: 'counties')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['county:read'])]
    private $city;

    #[ORM\OneToMany(mappedBy: 'county', targetEntity: Weather::class)]
    #[ApiSubresource()]
    private $weather;

    public function __construct()
    {
        $this->weather = new ArrayCollection();
    }

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    /**
     * @return Collection|Weather[]
     */
    public function getWeather(): Collection
    {
        return $this->weather;
    }

    public function addWeather(Weather $weather): self
    {
        if (!$this->weather->contains($weather)) {
            $this->weather[] = $weather;
            $weather->setCounty($this);
        }

        return $this;
    }

    public function removeWeather(Weather $weather): self
    {
        if ($this->weather->removeElement($weather)) {
            // set the owning side to null (unless already changed)
            if ($weather->getCounty() === $this) {
                $weather->setCounty(null);
            }
        }

        return $this;
    }
}
