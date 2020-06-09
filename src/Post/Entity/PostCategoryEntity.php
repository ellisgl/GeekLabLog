<?php

namespace App\Post\Entity;


use \DateTimeImmutable;
use \DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;


class PostCategoryEntity
{
    /** @var int|null $id */
    private $id;

    /** @var string $name */
    private $name;

    /** @var string|null $description */
    private $description;

    /** @var DateTimeImmutable $created */
    private $created;

    /** @var DateTimeImmutable|null $updated */
    private $updated;

    /** @var DateTimeImmutable|null */
    private $deleted;

    /** @var PostCategoryEntity|null $parentCategory */
    private $parentCategory;

    /** @var PostCategoryEntity[]|ArrayCollection */
    private $childCategories;

    /** @var PostEntity[]|ArrayCollection $posts */
    private $posts;

    public function __construct()
    {
        $this->childCategories = new ArrayCollection();
        $this->posts = new ArrayCollection();
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param DateTimeImmutable $created
     *
     * @return $this
     */
    public function setCreated(DateTimeImmutable $created): self
    {
        $this->created = $created;
        return $this;
    }


    /**
     * @return DateTimeImmutable
     */
    public function getCreated(): DateTimeImmutable
    {
        return $this->created;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getUpdated(): ?DateTimeImmutable
    {
        return $this->updated;
    }

    /**
     * @param DateTimeImmutable|null $updated
     *
     * @return $this
     */
    public function setUpdated(?DateTimeImmutable $updated): self
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDeleted(): ?DateTimeImmutable
    {
        return $this->deleted;
    }

    /**
     * @param DateTimeImmutable|null $deleted
     *
     * @return $this
     */
    public function setDeleted(?DateTimeImmutable $deleted): self
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return PostEntity[]|ArrayCollection
     */
    public function getPosts(): ArrayCollection
    {
        return $this->posts;
    }

    /**
     * @param PostEntity $post
     *
     * @return $this
     */
    public function addPost(PostEntity $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
        }

        return $this;
    }

    /**
     * Soft delete a post.
     *
     * @param PostEntity $post
     *
     * @return $this
     */
    public function removePost(PostEntity $post): self
    {
        if ($this->posts->contains($post)) {
            // Soft delete.
            $post->setDeleted(DateTimeImmutable::createFromFormat('U', time(), new DateTimeZone('UTC')));
        }

        return $this;
    }

    /**
     * Hard delete a post.
     *
     * @param PostEntity $post
     *
     * @return $this
     */
    public function hardDeletePost(PostEntity $post): self
    {
        if ($this->posts->contains($post)) {
            $this->posts->removeElement($post);
        }

        return $this;
    }

    /**
     * @return PostCategoryEntity|null
     */
    public function getParentCategory(): ?PostCategoryEntity
    {
        return $this->parentCategory;
    }


    /**
     * @param PostCategoryEntity|null $parentCategory
     *
     * @return $this
     */
    public function setParentCategory(?PostCategoryEntity $parentCategory): self
    {
        $this->parentCategory = $parentCategory;
        return $this;
    }

    /**
     * @return PostCategoryEntity[]|ArrayCollection
     */
    public function getChildCategories()
    {
        return $this->childCategories;
    }

    /**
     * @param PostCategoryEntity $categoryEntity
     *
     * @return $this
     */
    public function addChildCategory(PostCategoryEntity $categoryEntity): self
    {
        if (!$this->childCategories->contains($categoryEntity)) {
            $this->childCategories->add($categoryEntity);
        }

        return $this;
    }

    public function removeChildCategory(PostCategoryEntity $categoryEntity): self
    {
        if ($this->childCategories->contains($categoryEntity)) {
            $this->childCategories->removeElement($categoryEntity);
        }

        return $this;
    }
}
