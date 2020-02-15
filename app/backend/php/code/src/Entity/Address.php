<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Address
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
    private $addressId;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $nickname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address2;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $providence;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\State", inversedBy="addresses")
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CountryCodes", inversedBy="addresses")
     */
    private $country;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Location", mappedBy="Address")
     */
    private $locations;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Contacts", mappedBy="address")
     */
    private $contacts;

    /**
     * Address constructor.
     */
    public function __construct()
    {
        $this->addressId = Uuid::uuid4();
        $this->locations = new ArrayCollection();
        $this->contacts = new ArrayCollection();
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
    public function getAddressId(): ?string
    {
        return $this->addressId->toString();
    }

    /**
     * @param string $addressId
     * @return Address
     */
    public function setAddressId(string $addressId): self
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * @param null|string $nickname
     * @return Address
     */
    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Address
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * @param null|string $address2
     * @return Address
     */
    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getProvidence(): ?string
    {
        return $this->providence;
    }

    /**
     * @param null|string $providence
     * @return Address
     */
    public function setProvidence(?string $providence): self
    {
        $this->providence = $providence;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    /**
     * @param null|string $zipcode
     * @return Address
     */
    public function setZipcode(?string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * @return State|null
     */
    public function getState(): ?State
    {
        return $this->state;
    }

    /**
     * @param State|null $state
     * @return Address
     */
    public function setState(?State $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return CountryCodes|null
     */
    public function getCountry(): ?CountryCodes
    {
        return $this->country;
    }

    /**
     * @param CountryCodes|null $country
     * @return Address
     */
    public function setCountry(?CountryCodes $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    /**
     * @param Location $location
     * @return Address
     */
    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->addAddress($this);
        }

        return $this;
    }

    /**
     * @param Location $location
     * @return Address
     */
    public function removeLocation(Location $location): self
    {
        if ($this->locations->contains($location)) {
            $this->locations->removeElement($location);
            $location->removeAddress($this);
        }

        return $this;
    }

    /**
     * @return Collection|Contacts[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    /**
     * @param Contacts $contact
     * @return Address
     */
    public function addContact(Contacts $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->addAddress($this);
        }

        return $this;
    }

    /**
     * @param Contacts $contact
     * @return Address
     */
    public function removeContact(Contacts $contact): self
    {
        if ($this->contacts->contains($contact)) {
            $this->contacts->removeElement($contact);
            $contact->removeAddress($this);
        }

        return $this;
    }
}
