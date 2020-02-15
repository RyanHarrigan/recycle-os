<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhoneRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Phone
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
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $phoneId;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $phone;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ContactType", inversedBy="phones")
     */
    private $ContactType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contacts", inversedBy="phone")
     */
    private $contacts;

    /**
     * Phone constructor.
     */
    public function __construct()
    {
        $this->phoneId = Uuid::uuid4();
        $this->ContactType = new ArrayCollection();
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
    public function getPhoneId(): ?string
    {
        return $this->phoneId->toString();
    }

    /**
     * @param $phoneId
     * @return Phone
     */
    public function setPhoneId($phoneId): self
    {
        $this->phoneId = $phoneId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Phone
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection|ContactType[]
     */
    public function getContactType(): Collection
    {
        return $this->ContactType;
    }

    public function addContactType(ContactType $contactType): self
    {
        if (!$this->ContactType->contains($contactType)) {
            $this->ContactType[] = $contactType;
        }

        return $this;
    }

    public function removeContactType(ContactType $contactType): self
    {
        if ($this->ContactType->contains($contactType)) {
            $this->ContactType->removeElement($contactType);
        }

        return $this;
    }

    public function getContacts(): ?Contacts
    {
        return $this->contacts;
    }

    public function setContacts(?Contacts $contacts): self
    {
        $this->contacts = $contacts;

        return $this;
    }

}
