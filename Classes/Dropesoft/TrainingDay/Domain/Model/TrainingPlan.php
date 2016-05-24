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
 * Domain TrainingPlan of an App
 *
 * @Flow\Entity
 */
class TrainingPlan {
    /**
     * @var string
     * @Flow\Validate(type="StringLength", options={ "maximum"=150 })
     * @ORM\Column(length=150)
     * @PAN\Generate(type="string", required=true)
     */
    protected $title;
    /**
     * @var boolean
     * @ORM\Column(nullable=true, options = { "default" = false })
     * @PAN\Generate(type="boolean", required=false)
     */
    protected $disable;

    /**
     * @var string
     * @Flow\Validate(type="StringLength", options={ "maximum"=250 })
     * @ORM\Column(nullable=true)
     * @ORM\Column(length=250)
     * @PAN\Generate(type="string")
     */
    protected $note;
    /**
     * @var \Posit\MarketPlace\Domain\Model\App
     * @ORM\ManyToOne(targetEntity="\Posit\MarketPlace\Domain\Model\App")
     */
    protected $app;
    /**
     * @var \Posit\Intranet\Domain\Model\User
     * @ORM\ManyToOne(targetEntity="\Posit\Intranet\Domain\Model\User")
     * @ORM\Column(nullable=true)
     */
    protected $owner;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection<\Dropesoft\TrainingDay\Domain\Model\TrainingDay>
     * @ORM\OneToMany(targetEntity="\Dropesoft\TrainingDay\Domain\Model\TrainingDay", mappedBy="trainingPlan",
    cascade={"all"}, orphanRemoval=true)
     * @ORM\OrderBy({"day" = "DESC"})
     */
    protected $days;

    function __construct()
    {
        $this->days = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return boolean
     */
    public function isDisable()
    {
        return $this->disable;
    }

    /**
     * @param boolean $disable
     */
    public function setDisable($disable)
    {
        $this->disable = $disable;
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
     * @return \Posit\MarketPlace\Domain\Model\App
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param \Posit\MarketPlace\Domain\Model\App $app
     */
    public function setApp($app)
    {
        $this->app = $app;
    }

    /**
     * @return \Posit\Intranet\Domain\Model\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param \Posit\Intranet\Domain\Model\User $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

}