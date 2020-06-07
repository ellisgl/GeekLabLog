<?php

namespace App\Post\Entity;

use \DateTimeImmutable;

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

    /** @var DateTimeImmutable $deletedOn */
    private $deletedOn;

    /** @var PostImageEntity|null $blurbImage */
    private $blurbImage;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDeletedOn(): DateTimeImmutable
    {
        return $this->deletedOn;
    }

    /**
     * Soft delete of post.
     *
     * @param DateTimeImmutable $deletedOn
     *
     * @return $this
     */
    public function setDeletedOn(DateTimeImmutable $deletedOn): self
    {
        $this->deletdeOn = $deletedOn;
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
}
