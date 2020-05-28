<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Image
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
     * many images have one category
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="Category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var UploadedFile
     *
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255, unique=true)
     *
     */
    private $filename;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var int
     *
     * @ORM\Column(name="width", type="integer")
     */
    private $width;

    /**
     * @var int
     *
     * @ORM\Column(name="height", type="integer")
     */
    private $height;

    /**
     * @var DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable= false)
     */
    private $createdAt;

    /**
     * @var DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable= false)
     */
    private $updatedAt;
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
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;

    }

    /**
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
        if($file)
        {
            $this->setUpdatedAt();

        }
    }


    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return image
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return image
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return image
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return image
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return Category|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return image
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    public function __toString() {
        return $this->filename;
    }

    public function getImage()
    {
        return $this->filename;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime('now');
        $this->updatedAt = new \DateTime('now');
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PrePersist()
     *
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime('now');
    }


}

