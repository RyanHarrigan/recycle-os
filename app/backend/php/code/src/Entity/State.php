<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StateRepository")
 */
class State
{
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
    private $stateId;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $abrv;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Address", mappedBy="state")
     */
    private $addresses;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nickName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $website;

    /**
     * @ORM\Column(type="datetime")
     */
    private $admissionDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $admissionNumber;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $capital;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $capitalUrl;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $population;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $populationRank;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $constituationUrl;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $stateFlagUrl;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $stateSealUrl;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $mapImageUrl;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $landscapeBackgroundUrl;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $skylineBackgroundUrl;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $twitterUrl;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $facebookUrl;

    /**
     * State constructor.
     */
    public function __construct()
    {
        $this->stateId = Uuid::uuid4();
        $this->addresses = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return State
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAbrv(): ?string
    {
        return $this->abrv;
    }

    /**
     * @param string $abrv
     * @return State
     */
    public function setAbrv(string $abrv): self
    {
        $this->abrv = $abrv;

        return $this;
    }

    /**
     * @return string
     */
    public function getStateId(): string
    {
        return $this->stateId->toString();
    }

    /**
     * @param \Ramsey\Uuid\UuidInterface $stateId
     * @return State
     */
    public function setStateId(\Ramsey\Uuid\UuidInterface $stateId): self
    {
        $this->stateId = $stateId;

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    /**
     * @param Address $address
     * @return State
     */
    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setState($this);
        }

        return $this;
    }

    /**
     * @param Address $address
     * @return State
     */
    public function removeAddress(Address $address): self
    {
        if ($this->addresses->contains($address)) {
            $this->addresses->removeElement($address);
            // set the owning side to null (unless already changed)
            if ($address->getState() === $this) {
                $address->setState(null);
            }
        }

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return State
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return State
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNickName(): ?string
    {
        return $this->nickName;
    }

    /**
     * @param null|string $nickName
     * @return State
     */
    public function setNickName(?string $nickName): self
    {
        $this->nickName = $nickName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return State
     */
    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getAdmissionDate(): ?\DateTimeInterface
    {
        return $this->admissionDate;
    }

    public function setAdmissionDate(\DateTimeInterface $admissionDate): self
    {
        $this->admissionDate = $admissionDate;

        return $this;
    }

    public function getAdmissionNumber(): ?int
    {
        return $this->admissionNumber;
    }

    public function setAdmissionNumber(int $admissionNumber): self
    {
        $this->admissionNumber = $admissionNumber;

        return $this;
    }

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function setCapital(string $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getCapitalUrl(): ?string
    {
        return $this->capitalUrl;
    }

    public function setCapitalUrl(?string $capitalUrl): self
    {
        $this->capitalUrl = $capitalUrl;

        return $this;
    }

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(?int $population): self
    {
        $this->population = $population;

        return $this;
    }

    public function getPopulationRank(): ?int
    {
        return $this->populationRank;
    }

    public function setPopulationRank(?int $populationRank): self
    {
        $this->populationRank = $populationRank;

        return $this;
    }

    public function getConstituationUrl(): ?string
    {
        return $this->constituationUrl;
    }

    public function setConstituationUrl(?string $constituationUrl): self
    {
        $this->constituationUrl = $constituationUrl;

        return $this;
    }

    public function getStateFlagUrl(): ?string
    {
        return $this->stateFlagUrl;
    }

    public function setStateFlagUrl(?string $stateFlagUrl): self
    {
        $this->stateFlagUrl = $stateFlagUrl;

        return $this;
    }

    public function getStateSealUrl(): ?string
    {
        return $this->stateSealUrl;
    }

    public function setStateSealUrl(?string $stateSealUrl): self
    {
        $this->stateSealUrl = $stateSealUrl;

        return $this;
    }

    public function getMapImageUrl(): ?string
    {
        return $this->mapImageUrl;
    }

    public function setMapImageUrl(?string $mapImageUrl): self
    {
        $this->mapImageUrl = $mapImageUrl;

        return $this;
    }

    public function getLandscapeBackgroundUrl(): ?string
    {
        return $this->landscapeBackgroundUrl;
    }

    public function setLandscapeBackgroundUrl(?string $landscapeBackgroundUrl): self
    {
        $this->landscapeBackgroundUrl = $landscapeBackgroundUrl;

        return $this;
    }

    public function getSkylineBackgroundUrl(): ?string
    {
        return $this->skylineBackgroundUrl;
    }

    public function setSkylineBackgroundUrl(?string $skylineBackgroundUrl): self
    {
        $this->skylineBackgroundUrl = $skylineBackgroundUrl;

        return $this;
    }

    public function getTwitterUrl(): ?string
    {
        return $this->twitterUrl;
    }

    public function setTwitterUrl(?string $twitterUrl): self
    {
        $this->twitterUrl = $twitterUrl;

        return $this;
    }

    public function getFacebookUrl(): ?string
    {
        return $this->facebookUrl;
    }

    public function setFacebookUrl(?string $facebookUrl): self
    {
        $this->facebookUrl = $facebookUrl;

        return $this;
    }
}
