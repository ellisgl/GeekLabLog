<?php

namespace App\Post\Entity;

use \DateTimeImmutable;

class PostPageEntity
{
    /** @var int|null $id */
    private $id;

    /** @var int $position */
    private $position = 0;

    /** @var string|null $title */
    private $title;

    /** @var string $content */
    private $content;

    /** @var DateTimeImmutable $created */
    private $created;

    /** @var DateTimeImmutable|null $updated */
    private $updated;

    /** @var DateTimeImmutable|null */
    private $deleted;

    /** @var PostEntity $post */
    private $post;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     *
     * @return $this
     */
    public function setPosition(int $position): self
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return $this
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return $this
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
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
     * @return PostEntity
     */
    public function getPost(): PostEntity
    {
        return $this->post;
    }

    /**
     * @param PostEntity $post
     *
     * @return $this
     */
    public function setPost(PostEntity $post): self
    {
        $this->post = $post;
        return $this;
    }
}
