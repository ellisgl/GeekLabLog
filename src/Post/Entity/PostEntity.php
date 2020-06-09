<?php

namespace App\Post\Entity;

use App\User\Entity\UserEntity;
use \DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;

class PostEntity
{
    /** @var int|null $id */
    private $id;

    /** @var string|null $slug */
    private $slug;

    /** @var string $title */
    private $title;

    /** @var string|null $blurbShortContent */
    private $blurbShortContent;

    /** @var string|null $blurbLongContent */
    private $blurbLongContent;

    /** @var string|null $blurbImageAlt */
    private $blurbImageAlt;

    /** @var string|null $externalSource */
    private $externalSource;

    /** @var DateTimeImmutable $created */
    private $created;

    /** @var DateTimeImmutable|null $updated */
    private $updated;

    /** @var DateTimeImmutable|null $published */
    private $published;

    /** @var bool $isPublished */
    private $isPublished = false;

    /** @var DateTimeImmutable $deleted */
    private $deleted;

    /** @var PostTypeEntity $postType */
    private $postType;

    /** @var PostCategoryEntity $postCategory */
    private $postCategory;

    /** @var UserEntity $author */
    private $author;

    /** @var PostImageEntity|null $blurbImage */
    private $blurbImage;

    /** @var PostTagEntity[]|ArrayCollection */
    private $postTags;

    /** @var PostPageEntity[]|ArrayCollection */
    private $postPages;

    /** @var PostCommentEntity[]|ArrayCollection */
    private $postComments;

    public function __construct()
    {
        $this->postTags     = new ArrayCollection();
        $this->postPages    = new ArrayCollection();
        $this->postComments = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     *
     * @return $this
     */
    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBlurbShortContent(): ?string
    {
        return $this->blurbShortContent;
    }

    /**
     * @param string|null $blurbShortContent
     *
     * @return $this
     */
    public function setBlurbShortContent(?string $blurbShortContent): self
    {
        $this->blurbShortContent = $blurbShortContent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBlurbLongContent(): ?string
    {
        return $this->blurbLongContent;
    }

    /**
     * @param string|null $blurbLongContent
     *
     * @return $this
     */
    public function setBlurbLongContent(?string $blurbLongContent): self
    {
        $this->blurbLongContent = $blurbLongContent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBlurbImageAlt(): ?string
    {
        return $this->blurbImageAlt;
    }

    /**
     * @param string|null $blurbImageAlt
     *
     * @return $this
     */
    public function setBlurbImageAlt(?string $blurbImageAlt): self
    {
        $this->blurbImageAlt = $blurbImageAlt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExternalSource(): ?string
    {
        return $this->externalSource;
    }

    /**
     * @param string|null $externalSource
     *
     * @return $this
     */
    public function setExternalSource(?string $externalSource): self
    {
        $this->externalSource = $externalSource;
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
    public function getPublished(): ?DateTimeImmutable
    {
        return $this->published;
    }

    /**
     * @param DateTimeImmutable|null $published
     *
     * @return $this
     */
    public function setPublished(?DateTimeImmutable $published): self
    {
        $this->published = $published;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->isPublished;
    }

    /**
     * @param bool $isPublished
     *
     * @return $this
     */
    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;
        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDeleted(): DateTimeImmutable
    {
        return $this->deleted;
    }

    /**
     * Soft delete of post.
     *
     * @param DateTimeImmutable $deleted
     *
     * @return $this
     */
    public function setDeleted(DateTimeImmutable $deleted): self
    {
        $this->deletdeOn = $deleted;
        return $this;
    }

    /**
     * @return PostTypeEntity
     */
    public function getPostType(): PostTypeEntity
    {
        return $this->postType;
    }

    /**
     * @param PostTypeEntity $postType
     *
     * @return $this
     */
    public function setPostType(PostTypeEntity $postType): self
    {
        $this->postType = $postType;
        return $this;
    }

    /**
     * @return PostCategoryEntity
     */
    public function getPostCategory(): PostCategoryEntity
    {
        return $this->postCategory;
    }

    /**
     * @param PostCategoryEntity $postCategory
     *
     * @return $this
     */
    public function setPostCategory(PostCategoryEntity $postCategory): self
    {
        $this->postCategory = $postCategory;
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

    /**
     * @return PostImageEntity|null
     */
    public function getBlurbImage(): ?PostImageEntity
    {
        return $this->blurbImage;
    }

    /**
     * @param PostImageEntity|null $blurbImage
     *
     * @return $this
     */
    public function setBlurbImage(?PostImageEntity $blurbImage): self
    {
        $this->blurbImage = $blurbImage;
        return $this;
    }

    /**
     * @return PostTagEntity[]|ArrayCollection
     */
    public function getPostTags()
    {
        return $this->postTags;
    }

    /**
     * @param PostTagEntity $tag
     *
     * @return $this
     */
    public function addPostTag(PostTagEntity $tag): self
    {
        if (!$this->postTags->contains($tag)) {
            $this->postTags->add($tag);
        }

        return $this;
    }

    /**
     * @param PostTagEntity $tag
     *
     * @return $this
     */
    public function removePostTag(PostTagEntity $tag): self
    {
        if ($this->postTags->contains($tag)) {
            $this->postTags->removeElement($tag);
        }

        return $this;
    }

    /**
     * @return PostPageEntity[]|ArrayCollection
     */
    public function getPostPages()
    {
        return $this->postPages;
    }

    /**
     * @param PostPageEntity $page
     *
     * @return $this
     */
    public function addPostPage(PostPageEntity $page): self
    {
        if (!$this->postPages->contains($page)) {
            $this->postPages->add($page);
        }

        return $this;
    }

    public function removePostPage(PostPageEntity $page): self
    {
        if ($this->postPages->contains($page)) {
            $this->postPages->removeElement($page);
        }

        return $this;
    }

    /**
     * @return PostCommentEntity[]|ArrayCollection
     */
    public function getPostComments()
    {
        return $this->postComments;
    }

    /**
     * @param PostCommentEntity $comment
     *
     * @return $this
     */
    public function addPostComment(PostCommentEntity $comment): self
    {
        if (!$this->postComments->contains($comment)) {
            $this->postComments->add($comment);
        }

        return $this;
    }

    public function removeComment(PostCommentEntity $comment): self
    {
        if ($this->postComments->contains($comment)) {
            $this->postComments->removeElement($comment);
        }

        return $this;
    }
}
