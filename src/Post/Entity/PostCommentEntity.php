<?php

namespace App\Post\Entity;

use App\User\Entity\UserEntity;
use \DateTimeImmutable;
use \DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;

class PostCommentEntity
{
    /** @var int|null $id */
    private $id;

    /** @var string $name */
    private $name;

    /** @var string $email */
    private $email;

    /** @var string|null $url */
    private $url;

    /** @var bool $isSpamChecked */
    private $isSpamChecked = false;

    /** @var bool $isSpam */
    private $isSpam = true;

    /** @var string $fromIp This is actually a resource type - we'll see how this goes. */
    private $fromIp;

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

    /** @var UserEntity|null $author */
    private $author;

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
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     *
     * @return $this
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSpamChecked(): bool
    {
        return $this->isSpamChecked;
    }

    /**
     * @param bool $isSpamChecked
     *
     * @return $this
     */
    public function setIsSpamChecked(bool $isSpamChecked): self
    {
        $this->isSpamChecked = $isSpamChecked;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSpam(): bool
    {
        return $this->isSpam;
    }

    /**
     * @param bool $isSpam
     *
     * @return $this
     */
    public function setIsSpam(bool $isSpam): self
    {
        $this->isSpam = $isSpam;
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
     * @return string
     */
    public function getFromIp(): string
    {
        return inet_ntop($this->fromIp);
    }

    /**
     * Use inet_*
     *
     * @param string $fromIp
     *
     * @return $this
     */
    public function setFromIp(string $fromIp): self
    {
        $this->fromIp = inet_pton($fromIp);
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

    /**
     * @return UserEntity|null
     */
    public function getAuthor(): ?UserEntity
    {
        return $this->author;
    }

    /**
     * @param UserEntity|null $author
     *
     * @return $this
     */
    public function setAuthor(?UserEntity $author): self
    {
        $this->author = $author;
        return $this;
    }
}
