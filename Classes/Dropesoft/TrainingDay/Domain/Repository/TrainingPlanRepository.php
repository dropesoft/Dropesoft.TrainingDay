<?php
namespace Dropesoft\TrainingDay\Domain\Repository;
/*
 * This file is part of the Dropesoft.TrainingDay package.
 */
use Posit\Intranet\Domain\Model\User;
use Posit\MarketPlace\Domain\Model\App;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\Repository;
/**
 * @Flow\Scope("singleton")
 */
class TrainingPlanRepository extends Repository
{

    /**
     * @param App $app
     * @param User $user
     * @return \TYPO3\Flow\Persistence\QueryResultInterface
     */
    public function findByAppAndOwner(App $app, User $user)
    {
        $query = $this->createQuery();
        $query->matching($query->logicalAnd($query->equals('owner', $user), $query->equals('app', $app)));
        return $query->execute();
    }
}
