<?php

namespace KairosTicket\Entity;

/**
 * Class Ticket
 * @package KairosTicket\Entity
 * @ORM\Entity(repositoryClass="KairosTicket\Entity\TicketRepository")
 * @ORM\Table(name="tickets")
 */
class Ticket extends AbstractEntity
{

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $title;

    /**
     * join with solution
     * @var int
     */
    protected $software;

    /**
     * @var int
     * @OneToOne(targetEntity="User")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     **/
    protected $customer;

    /**
     * @var int
     * @OneToOne(targetEntity="User")
     * @JoinColumn(name="creator_id", referencedColumnName="id")
     **/
    protected $creator;

    /**
     * @var int
     * @OneToOne(targetEntity="User")
     * @JoinColumn(name="countersigning_id", referencedColumnName="id")
     **/
    protected $countersigning;

    /**
     * @var int
     * @OneToOne(targetEntity="User")
     * @JoinColumn(name="holder_id", referencedColumnName="id")
     **/
    protected $holder;

    /**
     * join with files => files
     * @var int
     */
    protected $file;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @OneToMany(targetEntity="Ticket", mappedBy="ticket", cascade={"persist", "remove"})
     */
    protected  $ticket_children;

    /**
     * @ManyToOne(targetEntity="Ticket", inversedBy="ticket_children")
     * @JoinColumn(name="ticket_children", referencedColumnName="id")
     */
    protected $ticket;

    /**
     * @var int
     * @OneToOne(targetEntity="User")
     * @JoinColumn(name="closed_by_id", referencedColumnName="id")
     **/
    protected $closed_by;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $is_active;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $estimateHours;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $totalHours;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $estimatePoint;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $totalPoint;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    protected $estimateCoast;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    protected $finalCoast;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $reopening;


    public function __construct()
    {
        parent::__construct(new \DateTime("now"));
        return;
    }

    /**
     * @return int
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param int $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return int
     */
    public function getClosedBy()
    {
        return $this->closed_by;
    }

    /**
     * @param int $closed_by
     */
    public function setClosedBy($closed_by)
    {
        $this->closed_by = $closed_by;
    }

    /**
     * @return int
     */
    public function getCountersigning()
    {
        return $this->countersigning;
    }

    /**
     * @param int $countersigning
     */
    public function setCountersigning($countersigning)
    {
        $this->countersigning = $countersigning;
    }

    /**
     * @return int
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param int $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getEstimateCoast()
    {
        return $this->estimateCoast;
    }

    /**
     * @param float $estimateCoast
     */
    public function setEstimateCoast($estimateCoast)
    {
        $this->estimateCoast = $estimateCoast;
    }

    /**
     * @return mixed
     */
    public function getEstimateHours()
    {
        return $this->estimateHours;
    }

    /**
     * @param mixed $estimateHours
     */
    public function setEstimateHours($estimateHours)
    {
        $this->estimateHours = $estimateHours;
    }

    /**
     * @return int
     */
    public function getEstimatePoint()
    {
        return $this->estimatePoint;
    }

    /**
     * @param int $estimatePoint
     */
    public function setEstimatePoint($estimatePoint)
    {
        $this->estimatePoint = $estimatePoint;
    }

    /**
     * @return int
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param int $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return float
     */
    public function getFinalCoast()
    {
        return $this->finalCoast;
    }

    /**
     * @param float $finalCoast
     */
    public function setFinalCoast($finalCoast)
    {
        $this->finalCoast = $finalCoast;
    }

    /**
     * @return int
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param int $holder
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return boolean
     */
    public function isIsActive()
    {
        return $this->is_active;
    }

    /**
     * @param boolean $is_active
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
    }


    /**
     * @return int
     */
    public function getReopening()
    {
        return $this->reopening;
    }

    /**
     * @param int $reopening
     */
    public function setReopening($reopening)
    {
        $this->reopening = $reopening;
    }

    /**
     * @return int
     */
    public function getSoftware()
    {
        return $this->software;
    }

    /**
     * @param int $software
     */
    public function setSoftware($software)
    {
        $this->software = $software;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * @param mixed $ticket
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * @return mixed
     */
    public function getTicketChildren()
    {
        return $this->ticket_children;
    }

    /**
     * @param mixed $ticket_children
     */
    public function setTicketChildren($ticket_children)
    {
        $this->ticket_children = $ticket_children;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getTotalHours()
    {
        return $this->totalHours;
    }

    /**
     * @param int $totalHours
     */
    public function setTotalHours($totalHours)
    {
        $this->totalHours = $totalHours;
    }

    /**
     * @return int
     */
    public function getTotalPoint()
    {
        return $this->totalPoint;
    }

    /**
     * @param int $totalPoint
     */
    public function setTotalPoint($totalPoint)
    {
        $this->totalPoint = $totalPoint;
    }


}