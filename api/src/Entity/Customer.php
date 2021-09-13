<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups' => ['customer:read']],
    denormalizationContext: ['groups' => ['customer:write']],
)]
#[ApiFilter(OrderFilter::class, properties: ['firstName', 'lastName'], arguments: ['orderParameterName' => 'order'])]
class Customer
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
     * @Groups({"customer:read", "customer:write", "serviceTicket:read"})
     * @Assert\NotBlank
     */
    #[ApiFilter(SearchFilter::class, strategy: 'ipartial')]
    private $firstName;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"customer:read", "customer:write", "serviceTicket:read"})
     * @Assert\NotBlank
     */
    #[ApiFilter(SearchFilter::class, strategy: 'ipartial')]
    private $lastName;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups({"customer:read", "customer:write"})
     */
    private $phone;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"customer:read", "customer:write"})
     */
    private $address;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"customer:read", "customer:write"})
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity=ServiceTicket::class, mappedBy="customer")
     * @Groups({"customer:read", "customer:write"})
     */
    private $serviceTickets;

    /**
     * @ORM\OneToMany(targetEntity=Vehicle::class, mappedBy="customer")
     * @Groups({"customer:read", "customer:write"})
     */
    private $vehicles;

    public function __construct()
    {
        $this->serviceTickets = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
    }

    /**
     * @Groups({"customer:read", "customer:write", "serviceTicket:read"})
     * 
     */
    public function getFullName(): ?string
    {
        return "$this->firstName $this->lastName";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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
            $serviceTicket->setCustomer($this);
        }

        return $this;
    }

    public function removeServiceTicket(ServiceTicket $serviceTicket): self
    {
        if ($this->serviceTickets->removeElement($serviceTicket)) {
            // set the owning side to null (unless already changed)
            if ($serviceTicket->getCustomer() === $this) {
                $serviceTicket->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vehicle[]
     */
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles[] = $vehicle;
            $vehicle->setCustomer($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicles->removeElement($vehicle)) {
            // set the owning side to null (unless already changed)
            if ($vehicle->getCustomer() === $this) {
                $vehicle->setCustomer(null);
            }
        }

        return $this;
    }
}
