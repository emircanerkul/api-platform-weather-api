<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: CityRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['city:read']],
    denormalizationContext: ['groups' => ['city:write']],
)]
class City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['city:read'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[NotBlank()]
    #[Groups(['city:read', 'city:write'])]
    private $title;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: County::class)]
    #[Groups(['city:read'])]
    private $counties;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: Weather::class)]
    #[Groups(['city:read'])]
    private $weather;

    public function __construct()
    {
        $this->counties = new ArrayCollection();
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

    /**
     * @return Collection|County[]
     */
    public function getCounties(): Collection
    {
        return $this->counties;
    }

    public function addCounty(County $county): self
    {
        if (!$this->counties->contains($county)) {
            $this->counties[] = $county;
            $county->setCity($this);
        }

        return $this;
    }

    public function removeCounty(County $county): self
    {
        if ($this->counties->removeElement($county)) {
            // set the owning side to null (unless already changed)
            if ($county->getCity() === $this) {
                $county->setCity(null);
            }
        }

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
            $weather->setCity($this);
        }

        return $this;
    }

    public function removeWeather(Weather $weather): self
    {
        if ($this->weather->removeElement($weather)) {
            // set the owning side to null (unless already changed)
            if ($weather->getCity() === $this) {
                $weather->setCity(null);
            }
        }

        return $this;
    }
}