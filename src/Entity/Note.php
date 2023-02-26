<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\NoteRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\NoteController;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      itemOperations={
 *          "get",
 *          "put",
 *          "delete",
 *          "noteMoy"={
 *              "method"="GET",
 *              "path"="/note/moyenne",
 *              "controller"=NoteController::class,
 *              "name"="moyenneTotal",
 *              "read"=false,
 *              "deserialize"=false,
 *          },
 *      },
 * )
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */

class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matiere;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=0, max=20)
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity=Eleve::class, inversedBy="notes")
     */
    private $eleve;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(string $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }
}
