<?php

namespace Dropesoft\TrainingDay\Domain\Model;

/**
 * Created by PhpStorm.
 * User: stefano
 * Date: 05/03/16
 * Time: 14.01
 */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;
use Posit\HtmlHelper\Annotations as PAN;

/**
 * Domain TrainingDay of an App
 *
 * @Flow\Entity
 */
class TrainingDay {

    /**
     * @var \Dropesoft\TrainingDay\Domain\Model\TrainingPlan;
     * @ORM\ManyToOne(targetEntity="\Dropesoft\TrainingDay\Domain\Model\TrainingPlan")
     */
    protected $trainigPlan;
    /**
     * @var int
     * @PAN\Generate(type="numeric")
     */
    protected $day;
    /**
     * @var int
     * @PAN\Generate(type="numeric")
     */
    protected $week;
    /**
     * @var int
     * @PAN\Generate(type="numeric")
     */
    protected $period;
    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @PAN\Generate(type="string")
     */
    protected $description;
    /**
     * @var boolean
     * @ORM\Column(nullable=true, options = { "default" = false })
     * @PAN\Generate(type="boolean", required=false)
     */
    protected $executed;
    /**
     * @var string
     * @Flow\Validate(type="StringLength", options={ "maximum"=250 })
     * @ORM\Column(nullable=true)
     * @ORM\Column(length=250)
     * @PAN\Generate(type="string")
     */
    protected $note;
    /**
     * @var \DateTime DateTime object of the event start date/time.
     * @ORM\Column(nullable=true)
     * @PAN\Generate(type="datetime")
     */
    protected $dateExecute;
    /**
     * @var int
     */
    protected $type;

    /**
     * @return TrainingPlan
     */
    public function getTrainigPlan()
    {
        return $this->trainigPlan;
    }

    /**
     * @param TrainingPlan $trainigPlan
     */
    public function setTrainigPlan($trainigPlan)
    {
        $this->trainigPlan = $trainigPlan;
    }

    /**
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param int $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * @param mixed $week
     */
    public function setWeek($week)
    {
        $this->week = $week;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
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
     * @return mixed
     */
    public function getExecuted()
    {
        return $this->executed;
    }

    /**
     * @param mixed $executed
     */
    public function setExecuted($executed)
    {
        $this->executed = $executed;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return \DateTime
     */
    public function getDateExecute()
    {
        return $this->dateExecute;
    }

    /**
     * @param \DateTime $dateExecute
     */
    public function setDateExecute($dateExecute)
    {
        $this->dateExecute = $dateExecute;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

}