<?php
namespace Dropesoft\TrainingDay\Domain\Repository;
/*
 * This file is part of the Dropesoft.TrainingDay package.
 */
use Dropesoft\TrainingDay\Domain\Model\TrainingPlan;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\Repository;
/**
 * @Flow\Scope("singleton")
 */
class TrainingDayRepository extends Repository
{
    public function findByTrainingPlan(TrainingPlan $trainingPlan)
    {
        // Query builder
        $query = $this->createQuery();
        return $query->matching($query->equals('trainingPlan', $trainingPlan))->execute();
    }
}
