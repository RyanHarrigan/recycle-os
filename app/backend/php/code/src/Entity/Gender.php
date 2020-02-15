<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenderRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Gender
{
    use TimeStampTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $genderId;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $alias;

    /**
     * Gender constructor.
     */
    public function __construct()
    {
        $this->genderId = Uuid::uuid4();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenderId()
    {
        return $this->genderId;
    }

    public function setGenderId($genderId): self
    {
        $this->genderId = $genderId;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }
}
