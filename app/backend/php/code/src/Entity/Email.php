<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmailRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Email
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
     * @ORM\Column(type="string", unique=true)
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $emailId;

    /**
     * @ORM\Column(type="string", length=200, unique=true)
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Company", mappedBy="email")
     */
    private $companies;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contacts", inversedBy="email")
     */
    private $contacts;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ContactType", inversedBy="emails")
     */
    private $contactType;

    /**
     * Email constructor.
     */
    public function __construct()
    {
        $this->emailId = Uuid::uuid4();
        $this->companies = new ArrayCollection();
        $this->contactType = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmailId()
    {
        return $this->emailId->toString();
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function __toString()
    {
        return $this->email;
    }

    /**
     * @return Collection|Company[]
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
            $company->addEmail($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->companies->contains($company)) {
            $this->companies->removeElement($company);
            $company->removeEmail($this);
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

    public function setEmailId(string $emailId): self
    {
        $this->emailId = $emailId;

        return $this;
    }

    /**
     * @return Collection|ContactType[]
     */
    public function getContactType(): Collection
    {
        return $this->contactType;
    }

    public function addContactType(ContactType $contactType): self
    {
        if (!$this->contactType->contains($contactType)) {
            $this->contactType[] = $contactType;
        }

        return $this;
    }

    public function removeContactType(ContactType $contactType): self
    {
        if ($this->contactType->contains($contactType)) {
            $this->contactType->removeElement($contactType);
        }

        return $this;
    }

}
