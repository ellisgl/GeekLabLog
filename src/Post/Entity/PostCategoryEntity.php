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

    /** @var DateTimeImmutable $createdOn */
    private $createdOn;

    /** @var DateTimeImmutable|null $lastEditedOn */
    private $lastEditedOn;

    /** @var DateTimeImmutable|null */
    private $deletedOn;

    /** @var PostEntity[]|ArrayCollection $posts */
    private $posts;

    public function __construct()
    {
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
     * @param DateTimeImmutable $createdOn
     *
     * @return $this
     */
    public function setCreatedOn(DateTimeImmutable $createdOn): self
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedOn(): DateTimeImmutable
    {
        return $this->createdOn;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getLastEditedOn(): ?DateTimeImmutable
    {
        return $this->lastEditedOn;
    }

    /**
     * @param DateTimeImmutable|null $lastEditedOn
     *
     * @return $this
     */
    public function setLastEditedOn(?DateTimeImmutable $lastEditedOn): self
    {
        $this->lastEditedOn = $lastEditedOn;
        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDeletedOn(): ?DateTimeImmutable
    {
        return $this->deletedOn;
    }

    /**
     * @param DateTimeImmutable|null $deletedOn
     *
     * @return $this
     */
    public function setDeletedOn(?DateTimeImmutable $deletedOn): self
    {
        $this->deletedOn = $deletedOn;
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
            $post->setDeletedOn(DateTimeImmutable::createFromFormat('U', time(), new DateTimeZone('UTC')));
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
}
