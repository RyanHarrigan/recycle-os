<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Location
{
    use TimeStampTrait;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;

    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Column(type="uuid", unique=true, name="location_id")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $locationId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locationName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locationNickName;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $lat;

    /**
     * @ORM\Column(type="string",length=10, nullable=true)
     */
    private $lng;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $defaultResource;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locationType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $regionId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $departmentId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $relocationId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brandName;

    /**
     * @ORM\Column(type="string", length=36, nullable=true)
     */
    private $locationCd;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $abbr;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $domain;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $display;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Address", inversedBy="locations")
     */
    private $Address;

    /**
     * Location constructor.
     */
    public function __construct()
    {
        $this->locationId = Uuid::uuid4();
        $this->Address = new ArrayCollection();
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
    public function getLocationId(): ?string
    {
        return $this->locationId->toString();
    }

    /**
     * @param $locationId
     * @return Location
     */
    public function setLocationId($locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLocationName(): ?string
    {
        return $this->locationName;
    }

    /**
     * @param string $locationName
     * @return Location
     */
    public function setLocationName(string $locationName): self
    {
        $this->locationName = $locationName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLocationNickName(): ?string
    {
        return $this->locationNickName;
    }

    /**
     * @param null|string $locationNickName
     * @return Location
     */
    public function setLocationNickName(?string $locationNickName): self
    {
        $this->locationNickName = $locationNickName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param $lat
     * @return Location
     */
    public function setLat($lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param $lng
     * @return Location
     */
    public function setLng($lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDefaultResource(): ?string
    {
        return $this->defaultResource;
    }

    /**
     * @param null|string $defaultResource
     * @return Location
     */
    public function setDefaultResource(?string $defaultResource): self
    {
        $this->defaultResource = $defaultResource;

        return $this;
    }


    /**
     * @return bool|null
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     * @return Location
     */
    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLocationType(): ?string
    {
        return $this->locationType;
    }

    /**
     * @param null|string $locationType
     * @return Location
     */
    public function setLocationType(?string $locationType): self
    {
        $this->locationType = $locationType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRegionId(): ?string
    {
        return $this->regionId;
    }

    /**
     * @param null|string $regionId
     * @return Location
     */
    public function setRegionId(?string $regionId): self
    {
        $this->regionId = $regionId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    /**
     * @param null|string $facebook
     * @return Location
     */
    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDepartmentId(): ?string
    {
        return $this->departmentId;
    }

    /**
     * @param null|string $departmentId
     * @return Location
     */
    public function setDepartmentId(?string $departmentId): self
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRelocationId(): ?string
    {
        return $this->relocationId;
    }

    /**
     * @param null|string $relocationId
     * @return Location
     */
    public function setRelocationId(?string $relocationId): self
    {
        $this->relocationId = $relocationId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    /**
     * @param null|string $brandName
     * @return Location
     */
    public function setBrandName(?string $brandName): self
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLocationCd(): ?string
    {
        return $this->locationCd;
    }

    /**
     * @param null|string $locationCd
     * @return Location
     */
    public function setLocationCd(?string $locationCd): self
    {
        $this->locationCd = $locationCd;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAbbr(): ?string
    {
        return $this->abbr;
    }

    /**
     * @param null|string $abbr
     * @return Location
     */
    public function setAbbr(?string $abbr): self
    {
        $this->abbr = $abbr;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @param null|string $domain
     * @return Location
     */
    public function setDomain(?string $domain): self
    {
        $this->domain = $domain;

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
     * @return Location
     */
    public function setDisplay(?string $display): self
    {
        $this->display = $display;

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddress(): Collection
    {
        return $this->Address;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->Address->contains($address)) {
            $this->Address[] = $address;
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->Address->contains($address)) {
            $this->Address->removeElement($address);
        }

        return $this;
    }
}
