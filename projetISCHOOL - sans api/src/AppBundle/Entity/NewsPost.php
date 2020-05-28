<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NewsPost
 *
 * @ORM\Table(name="news_post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NewsPostRepository")
 */
class NewsPost
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="carouselDesc", type="string", length=155)
     */
    private $carouselDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="contentdesc", type="text")
     */
    private $contentdesc;

    /**
     * Many Newsposts have One Image.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Image")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="newsPosts")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return NewsPost
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return NewsPost
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return NewsPost
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set carouselDesc
     *
     * @param string $carouselDesc
     *
     * @return NewsPost
     */
    public function setCarouselDesc($carouselDesc)
    {
        $this->carouselDesc = $carouselDesc;

        return $this;
    }

    /**
     * Get carouselDesc
     *
     * @return string
     */
    public function getCarouselDesc()
    {
        return $this->carouselDesc;
    }

    /**
     * Set contentdesc
     *
     * @param string $contentdesc
     *
     * @return NewsPost
     */
    public function setContentdesc($contentdesc)
    {
        $this->contentdesc = $contentdesc;

        return $this;
    }

    /**
     * Get contentdesc
     *
     * @return string
     */
    public function getContentdesc()
    {
        return $this->contentdesc;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return NewsPost
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function __toString() {
        return $this->title;
    }
}

