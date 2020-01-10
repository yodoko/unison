<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PurchaseRepository")
 */
class Purchase
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
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $size;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Color", mappedBy="purchase")
     * @ORM\JoinColumn(nullable=false)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="purchase")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Charity", mappedBy="purchase")
     * @ORM\JoinColumn(nullable=false)
     */
    private $charities;

    public function __construct()
    {
        $this->charities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Charity[]
     */
    public function getCharities(): Collection
    {
        return $this->charities;
    }

    public function addCharity(Charity $charity): self
    {
        if (!$this->charities->contains($charity)) {
            $this->charities[] = $charity;
            $charity->addPurchase($this);
        }

        return $this;
    }

    public function removeCharity(Charity $charity): self
    {
        if ($this->charities->contains($charity)) {
            $this->charities->removeElement($charity);
            $charity->removePurchase($this);
        }

        return $this;
    }
}
