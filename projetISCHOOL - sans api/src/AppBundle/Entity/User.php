<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="NewsPost", mappedBy="author")
     */
    private $newsPosts;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @return mixed
     */
    public function getNewsPosts()
    {
        return $this->newsPosts;
    }

    /**
     * @param mixed $newsPosts
     */
    public function setNewsPosts($newsPosts): void
    {
        $this->newsPosts = $newsPosts;
    }

}