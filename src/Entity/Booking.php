<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 */
class Booking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Firstname;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email): void
    {
        $this->Email = $Email;
    }


    /**
     * @ORM\Column(type="integer")
     */
    private $ReducedTickets;

    /**
     * @ORM\Column(type="integer")
     */
    private $FullPrice;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Shows", mappedBy="Booking")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shows;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): self
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): self
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getReducedTickets(): ?int
    {
        return $this->ReducedTickets;
    }

    public function setReducedTickets(int $ReducedTickets): self
    {
        $this->ReducedTickets = $ReducedTickets;

        return $this;
    }

    public function getFullPrice(): ?int
    {
        return $this->FullPrice;
    }

    public function setFullPrice(int $FullPrice): self
    {
        $this->FullPrice = $FullPrice;

        return $this;
    }

    public function getShows(): ?Shows
    {
        return $this->shows;
    }

    public function setShows(Shows $shows): self
    {
        $this->shows = $shows;

        return $this;
    }
}
