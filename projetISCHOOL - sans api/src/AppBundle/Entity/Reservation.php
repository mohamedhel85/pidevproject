<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_in", type="datetime")
     */
    private $dateIn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_out", type="datetime")
     */
    private $dateOut;

    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="reservation")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="reservation")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     */
    private $room;


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
     * Set dateIn
     *
     * @param \DateTime $dateIn
     *
     * @return Reservation
     */
    public function setDateIn($dateIn)
    {
        $this->dateIn = $dateIn;

        return $this;
    }

    /**
     * Get dateIn
     *
     * @return \DateTime
     */
    public function getDateIn()
    {
        return $this->dateIn;
    }

    /**
     * Set dateOut
     *
     * @param \DateTime $dateOut
     *
     * @return Reservation
     */
    public function setDateOut($dateOut)
    {
        $this->dateOut = $dateOut;

        return $this;
    }

    /**
     * Get dateOut
     *
     * @return \DateTime
     */
    public function getDateOut()
    {
        return $this->dateOut;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param mixed $student
     */
    public function setStudent($student)
    {
        $this->student = $student;
    }


    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

}

