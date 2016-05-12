<?php
namespace Dropesoft\TrainingDay\Controller;
/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Dropesoft.TrainingDay". *
 *                                                                        *
 *                                                                        */
use TYPO3\Flow\Annotations as Flow;
use Dropesoft\TrainingDay\Domain\Model\TrainingPlan;
class TrainingPlanJsonController extends \Posit\Intranet\Controller\AbstractJsonBaseController {
	/**
	 * @Flow\Inject
	 * @var \Dropesoft\TrainingDay\Domain\Repository\TrainingPlanRepository
	 */
	protected $repository;
	protected $className = '\Dropesoft\TrainingDay\Domain\Model\TrainingPlan';
}