<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $checkinDate;

    /**
     * @ORM\Column(type="date")
     */
    private $checkoutDate;

    /**
     * @ORM\OneToOne(targetEntity=Payment::class, cascade={"persist", "remove"})
     */
    private $paymentId;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class, inversedBy="reservations")
     */
    private $roomId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     */
    private $userId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheckinDate(): ?\DateTimeInterface
    {
        return $this->checkinDate;
    }

    public function setCheckinDate(\DateTimeInterface $checkinDate): self
    {
        $this->checkinDate = $checkinDate;

        return $this;
    }

    public function getCheckoutDate(): ?\DateTimeInterface
    {
        return $this->checkoutDate;
    }

    public function setCheckoutDate(\DateTimeInterface $checkoutDate): self
    {
        $this->checkoutDate = $checkoutDate;

        return $this;
    }

    public function getPaymentId(): ?Payment
    {
        return $this->paymentId;
    }

    public function setPaymentId(?Payment $paymentId): self
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    public function getRoomId(): ?Room
    {
        return $this->roomId;
    }

    public function setRoomId(?Room $roomId): self
    {
        $this->roomId = $roomId;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
