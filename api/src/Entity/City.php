<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
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
#[ApiFilter(RangeFilter::class, properties: ['counties.weather.temp'])] // Cidden harikaymis ^^ filtre yapmak bu kadar kolay :)
#[ApiFilter(DateFilter::class, properties: ['counties.weather.date'])]
#[ApiFilter(OrderFilter::class)]
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
    #[ApiProperty(security: "is_granted('ROLE_ADMIN')")]
    private $counties;

    public function __construct()
    {
        $this->counties = new ArrayCollection();
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
}
