<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Novedad;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ControlRepository")
 */
class Control
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
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Novedad", mappedBy="control", orphanRemoval=true)
     */
    private $novedades;

    public function __construct()
    {
        $this->novedades = new ArrayCollection();
    }

    public function __toString() {
        return $this->nombre;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Novedad[]
     */
    public function getNovedades(): Collection
    {
        return $this->novedades;
    }

    public function addNovedade(Novedad $novedade): self
    {
        if (!$this->novedades->contains($novedade)) {
            $this->novedades[] = $novedade;
            $novedade->setControl($this);
        }

        return $this;
    }

    public function removeNovedade(Novedad $novedade): self
    {
        if ($this->novedades->contains($novedade)) {
            $this->novedades->removeElement($novedade);
            // set the owning side to null (unless already changed)
            if ($novedade->getControl() === $this) {
                $novedade->setControl(null);
            }
        }

        return $this;
    }
}
