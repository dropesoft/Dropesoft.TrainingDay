<?php
namespace Dropesoft\TrainingDay\Controller;
/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Dropesoft.TrainingDay". *
 *                                                                        *
 *                                                                        */
use Posit\Intranet\Domain\Model\UserPreferences;
use Posit\MarketPlace\Domain\Model\App;
use TYPO3\Flow\Annotations as Flow;
use Dropesoft\TrainingDay\Domain\Model\TrainingPlan;
class TrainingPlanController extends \Posit\MarketPlace\Controller\AbstractBaseController {
	/**
	 * @Flow\Inject
	 * @var \Dropesoft\TrainingDay\Domain\Repository\TrainingPlanRepository
	 */
	protected $trainingPlanRepository;
	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Property\PropertyMapper
	 */
	protected $propertyMapper;

    /**
     *  Initialize Action
     */
    protected function initializeAction()
    {
        parent::initializeAction();
        $this->formatDateTimePropertiesObject('\Dropesoft\TrainingDay\Domain\Model\TrainingPlan', 'training plan');
    }
    /**
     * @return void
     */
    public function indexAction() {
        if($this->getCurrentRole() == "Posit.Intranet:Administrator")
        {
            $this->view->assign('trainingPlans', $this->trainingPlanRepository->findAll());
        }
		// Da inserire i fase di registrazione utente
		else if($this->getCurrentRole() == "Posit.Intranet:User")
		{
			/** @var UserPreferences $preferences */
			$preferences =  $this->getCurrentUser()->getPreferences();
			$appIdentifier = $preferences->get('app');
			$input = array('__identity' => $appIdentifier);
			$currentApp = $this->propertyMapper->convert($input, App::class);
			$this->view->assign('trainingPlans', $this->trainingPlanRepository->findByAppAndOwner($currentApp, $this->getCurrentUser()));
		}
		else
		{
			$this->view->assign('trainingPlans', $this->trainingPlanRepository->findByAppAndOwner($this->getCurrentApp(), $this->getCurrentUser()));
		}
    }
	/**
	 * @return void
	 */
	public function newAction(){
	}
	/**
	 * @param \Dropesoft\TrainingDay\Domain\Model\TrainingPlan $trainingPlan
	 * @return void
	 */
	public function createAction(TrainingPlan $trainingPlan) {
		$trainingPlan->setApp($this->getCurrentApp());
		$trainingPlan->setOwner($this->getCurrentUser());
		$this->trainingPlanRepository->add($trainingPlan);
		$this->addFlashMessage($this->translateById("general.success"));
		$this->redirect('index');
	}
	/**
	 * @param \Dropesoft\TrainingDay\Domain\Model\TrainingPlan $trainingPlan
	 * @return void
	 */
	public function editAction(TrainingPlan $trainingPlan) {
		$this->view->assign('trainingPlan', $trainingPlan);
	}
	/**
	 * @param \Dropesoft\TrainingDay\Domain\Model\TrainingPlan $trainingPlan
	 * @return void
	 */
	public function updateAction(TrainingPlan $trainingPlan) {
		$this->trainingPlanRepository->update($trainingPlan);
		$this->addFlashMessage($this->translateById("general.success"));
		$this->redirect('index');
	}
	/**
	 * @param \Dropesoft\TrainingDay\Domain\Model\TrainingPlan $trainingPlan
	 * @return void
	 */
	public function deleteAction(TrainingPlan $trainingPlan) {
		$this->trainingPlanRepository->remove($trainingPlan);
		$this->persistenceManager->persistAll();
		$this->addFlashMessage($this->translateById("general.success"));
		$this->redirect('index');
	}
}