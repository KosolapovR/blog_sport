<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Cities;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TariffsRepository")
 */
class Tariffs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;
    /**
     * @ORM\ManyToMany(targetEntity="Tariffs", mappedBy="tariffs")
     */
    private $cities;
    
    public function __construct() {
        $this->tariffs = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
    public function getCities()
    {
        return $this->cities;
    }
     public function addCity(Cities $city){
        if(!$this->cities->contains($city)){
            $this->cities[] = $city;
            $city->addTariff($this);
        }
    }
}
