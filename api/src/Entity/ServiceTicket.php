<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\ServiceTicketRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;

/**
 * @ORM\Entity(repositoryClass=ServiceTicketRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups' => ['serviceTicket:read']],
    denormalizationContext: ['groups' => ['serviceTicket:write']],
)]
#[ApiFilter(OrderFilter::class, properties: ['ticketNo', 'dateReceived'], arguments: ['orderParameterName' => 'order'])]
class ServiceTicket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[ApiProperty(identifier: true)]
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"serviceTicket:read", "serviceTicket:write"})
     * @Assert\NotBlank
     */
    #[ApiFilter(SearchFilter::class, strategy: 'ipartial')]
    private $ticketNo;

    /**
     * @ORM\ManyToOne(targetEntity=Vehicle::class, inversedBy="serviceTickets")
     * @Groups({"serviceTicket:read", "serviceTicket:write"})
     * @Assert\NotBlank
     */
    private $vehicle;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="serviceTickets")
     * @Groups({"serviceTicket:read", "serviceTicket:write"})
     * @Assert\NotBlank
     */
    private $customer;

    /**
     * @ORM\Column(type="date")
     * @Groups({"serviceTicket:read", "serviceTicket:write"})
     * @Assert\NotBlank
     */
    #[ApiFilter(SearchFilter::class, strategy: 'exact')]
    private $dateReceived;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"serviceTicket:read", "serviceTicket:write"})
     */
    #[ApiFilter(SearchFilter::class, strategy: 'ipartial')]
    private $workPerformed;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"serviceTicket:read", "serviceTicket:write"})
     */
    private $comments;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"serviceTicket:read", "serviceTicket:write"})
     */
    private $dateCompleted;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTicketNo(): ?string
    {
        return $this->ticketNo;
    }

    public function setTicketNo(?string $ticketNo): self
    {
        $this->ticketNo = $ticketNo;

        return $this;
    }

    public function getVehicle(): ?vehicle
    {
        return $this->vehicle;
    }

    public function setVehicle(?vehicle $vehicle): self
    {
        $this->vehicle = $vehicle;

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

    public function getDateReceived(): ?\DateTimeInterface
    {
        return $this->dateReceived;
    }

    public function setDateReceived(\DateTimeInterface $dateReceived): self
    {
        $this->dateReceived = $dateReceived;

        return $this;
    }

    public function getWorkPerformed(): ?string
    {
        return $this->workPerformed;
    }

    public function setWorkPerformed(string $workPerformed): self
    {
        $this->workPerformed = $workPerformed;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getDateCompleted(): ?\DateTimeInterface
    {
        return $this->dateCompleted;
    }

    public function setDateCompleted(?\DateTimeInterface $dateCompleted): self
    {
        $this->dateCompleted = $dateCompleted;

        return $this;
    }
}
