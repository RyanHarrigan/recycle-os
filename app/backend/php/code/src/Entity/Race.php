<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RaceRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Race
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
     * @ORM\Column(type="string", unique=true)
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $raceId;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $race;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $display;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $alias;

    /**
     * Race constructor.
     */
    public function __construct()
    {
        $this->raceId = Uuid::uuid4();
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getRaceId(): ?UuidInterface
    {
        return $this->raceId;
    }

    /**
     * @param $raceId
     * @return Race
     */
    public function setRaceId($raceId): self
    {
        $this->raceId = $raceId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRace(): ?string
    {
        return $this->race;
    }

    /**
     * @param string $race
     * @return Race
     */
    public function setRace(string $race): self
    {
        $this->race = $race;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDisplay(): ?string
    {
        return $this->display;
    }

    /**
     * @param null|string $display
     * @return Race
     */
    public function setDisplay(?string $display): self
    {
        $this->display = $display;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }

    /**
     * @param null|string $alias
     * @return Race
     */
    public function setAlias(?string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }
}
