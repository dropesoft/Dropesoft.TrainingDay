<?php
namespace Dropesoft\TrainingDay\Controller;
/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Dropesoft.TrainingDay". *
 *                                                                        *
 *                                                                        */
use Dropesoft\TrainingDay\Domain\Model\TrainingPlan;
use TYPO3\Flow\Annotations as Flow;
use Dropesoft\TrainingDay\Domain\Model\TrainingDay;
class TrainingDayController extends \Posit\MarketPlace\Controller\AbstractBaseController {
	/**
	 * @Flow\Inject
	 * @var \Dropesoft\TrainingDay\Domain\Repository\TrainingDayRepository
	 */
	protected $trainingDayRepository;
    /**
     *  Initialize Action
     */
    protected function initializeAction()
    {
        parent::initializeAction();
        $this->formatDateTimePropertiesObject('\Dropesoft\TrainingDay\Domain\Model\TrainingDay', 'training day');
    }

    /**
     * @param TrainingPlan $trainingPlan
     */
    public function indexAction(TrainingPlan $trainingPlan=null) {
        if($this->getCurrentRole() == "Posit.Intranet:Administrator")
        {
            $this->view->assign('trainingDays', $this->trainingDayRepository->findAll());
        }
        else
        {
            $this->view->assign('trainingDays', $this->trainingDayRepository->findByTrainingPlan($trainingPlan));
        }
        $this->view->assign('trainingPlan', $trainingPlan);
    }

    /**
     * @param TrainingPlan $trainingPlan
     */
    public function newAction(TrainingPlan $trainingPlan){
	}
	/**
	 * @param \Dropesoft\TrainingDay\Domain\Model\TrainingDay $trainingDay
	 * @return void
	 */
	public function createAction(TrainingDay $trainingDay) {
		$trainingDay->setApp($this->getCurrentApp());
		$this->trainingDayRepository->add($trainingDay);
		$this->addFlashMessage($this->translateById("general.success"));
		$this->redirect('index');
	}
	/**
	 * @param \Dropesoft\TrainingDay\Domain\Model\TrainingDay $trainingDay
	 * @return void
	 */
	public function editAction(TrainingDay $trainingDay) {
		$this->view->assign('trainingDay', $trainingDay);
	}
	/**
	 * @param \Dropesoft\TrainingDay\Domain\Model\TrainingDay $trainingDay
	 * @return void
	 */
	public function updateAction(TrainingDay $trainingDay) {
		$this->trainingDayRepository->update($trainingDay);
		$this->addFlashMessage($this->translateById("general.success"));
		$this->redirect('index');
	}
	/**
	 * @param \Dropesoft\TrainingDay\Domain\Model\TrainingDay $trainingDay
	 * @return void
	 */
	public function deleteAction(TrainingDay $trainingDay) {
		$this->trainingDayRepository->remove($trainingDay);
		$this->persistenceManager->persistAll();
		$this->addFlashMessage($this->translateById("general.success"));
		$this->redirect('index');
	}
}