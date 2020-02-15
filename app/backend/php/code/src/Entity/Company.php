<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Company
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
    private $name;

    /**
     * @ORM\Column(type="uuid")
     */
    private $companyId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\email", inversedBy="companies")
     */
    private $email;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $summary;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yearEstablished;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BusinessType", inversedBy="companies")
     */
    private $businessType;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\OrganizationType", inversedBy="companies")
     */
    private $organizationType;

    /**
     * Company constructor.
     */
    public function __construct()
    {
        $this->email = new ArrayCollection();
        $this->companyId = Uuid::uuid4();
        $this->organizationType = new ArrayCollection();
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Company
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @param $companyId
     * @return Company
     */
    public function setCompanyId($companyId): self
    {
        $this->companyId = $companyId;

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
     * @param null|string $website
     * @return Company
     */
    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return Collection|email[]
     */
    public function getEmail(): Collection
    {
        return $this->email;
    }

    /**
     * @param email $email
     * @return Company
     */
    public function addEmail(email $email): self
    {
        if (!$this->email->contains($email)) {
            $this->email[] = $email;
        }

        return $this;
    }

    /**
     * @param email $email
     * @return Company
     */
    public function removeEmail(email $email): self
    {
        if ($this->email->contains($email)) {
            $this->email->removeElement($email);
        }

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @param null|string $summary
     * @return Company
     */
    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getYearEstablished(): ?int
    {
        return $this->yearEstablished;
    }

    /**
     * @param int|null $yearEstablished
     * @return Company
     */
    public function setYearEstablished(?int $yearEstablished): self
    {
        $this->yearEstablished = $yearEstablished;

        return $this;
    }

    /**
     * @return BusinessType|null
     */
    public function getBusinessType(): ?BusinessType
    {
        return $this->businessType;
    }

    /**
     * @param BusinessType|null $businessType
     * @return Company
     */
    public function setBusinessType(?BusinessType $businessType): self
    {
        $this->businessType = $businessType;

        return $this;
    }

    /**
     * @return OrganizationType|null
     */
    public function getOrganizationType(): ?OrganizationType
    {
        return $this->organizationType;
    }

    /**
     * @param OrganizationType|null $organizationType
     * @return Company
     */
    public function setOrganizationType(?OrganizationType $organizationType): self
    {
        $this->organizationType = $organizationType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function __toString()
    {
        return $this->getName();
    }

    public function addOrganizationType(OrganizationType $organizationType): self
    {
        if (!$this->organizationType->contains($organizationType)) {
            $this->organizationType[] = $organizationType;
        }

        return $this;
    }

    public function removeOrganizationType(OrganizationType $organizationType): self
    {
        if ($this->organizationType->contains($organizationType)) {
            $this->organizationType->removeElement($organizationType);
        }

        return $this;
    }
}
