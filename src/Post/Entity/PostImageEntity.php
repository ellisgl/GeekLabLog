<?php

namespace App\Post\Entity;

use App\User\Entity\UserEntity;
use \DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;

class PostImageEntity
{
    /** @var string|null $id */
    private $id;

    /** @var string $path */
    private $path;

    /** @var string $fileName */
    private $fileName;

    /** @var string|null $title */
    private $title;

    /** @var string|null $altMeta */
    private $altMeta;

    /** @var string|null $description */
    private $description;

    /** @var DateTimeImmutable $created */
    private $created;

    /** @var DateTimeImmutable|null $updated */
    private $updated;

    /** @var DateTimeImmutable|null */
    private $deleted;

    /** @var PostEntity[]|ArrayCollection $posts */
    private $posts;

    /** @var UserEntity $author */
    private $author;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     *
     * @return $this
     */
    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     *
     * @return $this
     */
    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;
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
     * @return string|null
     */
    public function getAltMeta(): ?string
    {
        return $this->altMeta;
    }

    /**
     * @param string|null $altMeta
     *
     * @return $this
     */
    public function setAltMeta(?string $altMeta): self
    {
        $this->altMeta = $altMeta;
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
     * Remove blurbImage
     *
     * @param PostEntity $post
     *
     * @return $this
     */
    public function removePost(PostEntity $post): self
    {
        if ($this->posts->contains($post)) {
            $post->setBlurbImage(null);
        }

        return $this;
    }

    /**
     * @return UserEntity
     */
    public function getAuthor(): UserEntity
    {
        return $this->author;
    }

    /**
     * @param UserEntity $author
     *
     * @return $this
     */
    public function setAuthor(UserEntity $author): self
    {
        $this->author = $author;
        return $this;
    }
}
