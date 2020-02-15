<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampTrait;
use Doctrine\ORM\Mapping as ORM;
    
/**
 * @ORM\Entity(repositoryClass="App\Repository\RfTagsRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class RfTags
{
    use TimeStampTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rfid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRfid(): ?string
    {
        return $this->rfid;
    }

    public function setRfid(string $rfid): self
    {
        $this->rfid = $rfid;

        return $this;
    }
}
