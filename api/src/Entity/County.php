<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CountyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CountyRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['county:read']],
    denormalizationContext: ['groups' => ['county:write']],
)]
class County
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['county:read'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['county:read', 'county:write'])]
    private $title;

    #[ORM\ManyToOne(targetEntity: City::class, inversedBy: 'counties')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['county:read'])]
    private $city;

    #[ORM\OneToMany(mappedBy: 'county', targetEntity: Weather::class)]
    #[Groups(['county:read'])]
    private $weather;

    public function __construct()
    {
        $this->weather = new ArrayCollection();
    }

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
