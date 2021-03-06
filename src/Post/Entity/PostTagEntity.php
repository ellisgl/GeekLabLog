<?php

namespace App\Post\Entity;

use \DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;

class PostTagEntity
{
    /** @var int|null $id */
    private $id;

    /** @var string $name */
    private $name;

    /** @var DateTimeImmutable $created */
    private $created;

    /** @var DateTimeImmutable|null $updated */
    private $updated;

    /** @var DateTimeImmutable|null $deleted */
    private $deleted;

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
     * @return DateTimeImmutable
     */
    public function getCreated(): DateTimeImmutable
    {
        return $this->created;
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
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param PostEntity $post
     *
     * @return $this
     */
    public function addPost(PostEntity $post): self {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
        }

        return $this;
    }

    // Not doing removePost for now.
}
