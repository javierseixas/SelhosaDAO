<?php

namespace Selhosa\ReparationBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Selhosa\ReparationBundle\Entity\WorkOrder;
use Selhosa\ReparationBundle\Entity\WorkOrderStatusChange;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class LogWorkOrderStatusChange
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof WorkOrder) {

            $statusChange = new WorkOrderStatusChange();
            $statusChange
                ->setWorkorder($entity)
                ->setNewStatus($entity->getCurrentStatus())
                ->setPreviousStatus(null)
                ->setUser($this->getCurrentUser())
                ;

            $entity->addStatusChange($statusChange);
        }
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof WorkOrder) {

            if ($args->hasChangedField('current_status')) {

                $previousStatus = $args->getOldValue('current_status');
                $newStatus = $args->getNewValue('current_status');

                $statusChange = new WorkOrderStatusChange();
                $statusChange
                    ->setWorkorder($entity)
                    ->setNewStatus($newStatus)
                    ->setPreviousStatus($previousStatus)
                    ->setUser($this->getCurrentUser())
                ;

                $entity->addStatusChange($statusChange);

            }

            //$args->setNewValue('model','test');

            $em = $args->getEntityManager();
            $uow = $em->getUnitOfWork();
            $meta = $em->getClassMetadata(get_class($entity));
            $uow->recomputeSingleEntityChangeSet($meta, $entity);

        }
    }

    /**
     * @return \Selhosa\UserBundle\Entity\User
     */
    protected function getCurrentUser()
    {
        return $this->container->get('security.context')->getToken()->getUser();
    }
}
