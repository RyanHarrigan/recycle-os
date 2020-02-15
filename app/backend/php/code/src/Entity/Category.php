<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Category
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
    private $categoryId;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $category;

    /**
     * @ORM\Column(type="uuid", nullable=true)
     */
    private $categoryParentId;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->categoryId = Uuid::uuid4();
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
    public function getCategoryId(): UuidInterface
    {
        return $this->categoryId->toString();
    }

    /**
     * @param $categoryId
     * @return Category
     */
    public function setCategoryId($categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Category
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryParentId()
    {
        return $this->categoryParentId;
    }

    /**
     * @param $categoryParentId
     * @return Category
     */
    public function setCategoryParentId($categoryParentId): self
    {
        $this->categoryParentId = $categoryParentId;

        return $this;
    }
}
