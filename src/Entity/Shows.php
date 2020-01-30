<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShowsRepository")
 */
class Shows
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Booking", inversedBy="shows")
     */
    private $Booking;

    /**
     * @ORM\Column(type="text")
     */
    private $City;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity($City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->Date;
    }

    public function setDate(\DateTime $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBooking(): Booking
    {
        return $this->Booking;
    }

    /**
     * @param mixed $Booking
     */
    public function setBooking(Booking $Booking): void
    {
        $this->Booking = $Booking;
    }

    public function __toString()
    {
        return $this->City . ' (' . $this->Date->format('d/m/Y') .')';
    }
}
