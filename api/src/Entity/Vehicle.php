<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ORM\Entity(repositoryClass=VehicleRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups' => ['vehicle:read']],
    denormalizationContext: ['groups' => ['vehicle:write']],
)]
#[ApiFilter(OrderFilter::class, properties: ['make', 'model', 'year', 'color'], arguments: ['orderParameterName' => 'order'])]
class Vehicle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"serviceTicket:write"})
     */
    #[ApiProperty(identifier: true)]
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"vehicle:read", "vehicle:write", "serviceTicket:read"})
     * @Assert\NotBlank
     */
    #[ApiFilter(SearchFilter::class, strategy: 'ipartial')]
    private $make;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"vehicle:read", "vehicle:write", "serviceTicket:read"})
     * @Assert\NotBlank
     */
    #[ApiFilter(SearchFilter::class, strategy: 'ipartial')]
    private $model;

    /**
     * @ORM\Column(type="string", length=25)
     * @Groups({"vehicle:read", "vehicle:write", "serviceTicket:read"})
     * @Assert\NotBlank
     */
    #[ApiFilter(SearchFilter::class, strategy: 'ipartial')]
    private $vin;

    /**
     * @ORM\Column(type="string", length=20)
     * @Groups({"vehicle:read", "vehicle:write", "serviceTicket:read"})
     * @Assert\NotBlank
     */
    #[ApiFilter(SearchFilter::class, strategy: 'ipartial')]
    private $color;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"vehicle:read", "vehicle:write", "serviceTicket:read"})
     * @Assert\NotBlank
     */
    #[ApiFilter(SearchFilter::class, strategy: 'exact')]
    private $year;

    /**
     * @ORM\OneToMany(targetEntity=ServiceTicket::class, mappedBy="vehicle")
     * @Groups({"vehicle:read"})
     */
    private $serviceTickets;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="vehicles")
     * @Groups({"vehicle:read", "vehicle:write"})
     */
    private $customer;

    public function __construct()
    {
        $this->serviceTickets = new ArrayCollection();
    }

    /**
     * @Groups({"vehicle:read", "vehicle:write", "serviceTicket:read"})
     * 
     */
    public function getFriendlyName(): ?string
    {
        return "$this->color $this->year $this->make $this->model";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(string $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return Collection|ServiceTicket[]
     */
    public function getServiceTickets(): Collection
    {
        return $this->serviceTickets;
    }

    public function addServiceTicket(ServiceTicket $serviceTicket): self
    {
        if (!$this->serviceTickets->contains($serviceTicket)) {
            $this->serviceTickets[] = $serviceTicket;
            $serviceTicket->setVehicle($this);
        }

        return $this;
    }

    public function removeServiceTicket(ServiceTicket $serviceTicket): self
    {
        if ($this->serviceTickets->removeElement($serviceTicket)) {
            // set the owning side to null (unless already changed)
            if ($serviceTicket->getVehicle() === $this) {
                $serviceTicket->setVehicle(null);
            }
        }

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
