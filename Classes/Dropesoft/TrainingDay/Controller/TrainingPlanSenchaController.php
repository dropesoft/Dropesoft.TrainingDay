<?php
namespace Dropesoft\TrainingDay\Controller;
/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Dropesoft.TrainingDay". *
 *                                                                        *
 *                                                                        */
use Posit\Intranet\Domain\Model\User;
use Posit\MarketPlace\Domain\Model\App;
use TYPO3\Flow\Annotations as Flow;
use Posit\HtmlHelper\Annotations as PAN;

class TrainingPlanSenchaController extends \Posit\Intranet\Controller\AbstractSenchaBaseController {
	/**
	 * @Flow\Inject
	 * @var \Dropesoft\TrainingDay\Domain\Repository\TrainingPlanRepository
	 */
	protected $repository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;
	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Resource\ResourceManager
	 */
	protected $resourceManager;

	protected $className = '\Dropesoft\TrainingDay\Domain\TrainingPlan';

	/**
	 * @param App $app
	 * @param User $user
	 * @PAN\Rest(methodName="POST")
	 */
	public function findByAppAndOwnerAction(App $app, User $user)
	{
		$method = $this->request->getHttpRequest()->getMethod();

		if($method == 'POST') {
			$this->bindData(2, 1, 1,
				$this->repository->findByAppAndOwner($app, $user), true);
		}
	}
}