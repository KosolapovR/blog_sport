<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Tariffs;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CitiesRepository")
 * ManyToMany()
 */
class Cities
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $city;
    
    /**
     * @ORM\ManyToMany(targetEntity="Tariffs", inversedBy="cities")
     */
    private $tariffs;
    
    public function __construct() {
        $this->tariffs = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }
    public function getTariffs()
    {
        return $this->tariffs;
    }
     public function addTarrif(Tariffs $tariff){
        if(!$this->tariffs->contains($tariff)){
            $this->tariffs[] = $tariff;
            $tariff->addCity($this);
        }
    }
}
