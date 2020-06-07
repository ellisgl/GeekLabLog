<?php

namespace App\Post\Entity;

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
     * @return DateTimeImmutable
     */
    public function getCreatedOn(): DateTimeImmutable
    {
        return $this->createdOn;
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
}
