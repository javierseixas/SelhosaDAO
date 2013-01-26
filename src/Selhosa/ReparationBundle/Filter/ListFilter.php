<?php

namespace Selhosa\ReparationBundle\Filter;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\FormInterface;

class ListFilter
{
    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    protected $session;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var \Symfony\Component\Security\Core\SecurityContext
     */
    protected $securityContext;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     * @param \Doctrine\ORM\EntityManager $em
     * @param \Symfony\Component\Security\Core\SecurityContext $securityContext
     */
    public function __construct(Request $request, Session $session, EntityManager $em, SecurityContext $securityContext)
    {
        $this->request = $request;
        $this->session = $session;
        $this->em = $em;
        $this->securityContext = $securityContext;
    }

    public function getResult(FormInterface $filter, $statusId)
    {
        return $this->buildQuery($filter, $statusId)->getQuery()->getResult();
    }

    /**
     * @param \Symfony\Component\Form\FormInterface $filter
     * @param integer $statusId
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function buildQuery(FormInterface $filter, $statusId)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('dwo')
            ->from('SelhosaReparationBundle:WorkOrder','dwo')
            ->innerJoin('dwo.current_status','wos')
            ->where($qb->expr()->eq('dwo.current_status', ':status_id'))
            ->setParameter('status_id', $statusId);
        ;

        if ($this->securityContext->isGranted('ROLE_TECHNICIAN')
            && (!$this->securityContext->isGranted('ROLE_MANAGER')
            || !$this->securityContext->isGranted('ROLE_ADMIN'))) {

            $qb->innerJoin('dwo.technicians','u')
                ->andWhere($qb->expr()->eq('u.id',':user_id'))
                ->setParameter('user_id',$this->securityContext->getToken()->getUser()->getId());

            return $qb;
        }


        if ($this->request->isMethod('POST')) {

            $filter->bindRequest($this->request);

            $filterData = $filter->getData();

            /*
             * TODO Esta parte será personalizable y puede
             * constar de diferentes recogidas
             * de información según el filtro
             */
            $selectedTechnician = $filterData['technicians'];

            if ($selectedTechnician) {
                $qb->innerJoin('dwo.technicians','u')
                    ->andWhere($qb->expr()->eq('u.id',':user_id'))
                    ->setParameter('user_id',$selectedTechnician->getId());

                $this->session->set($filter->getName(), array('technicians' => $selectedTechnician->getId()));

            } else {
                if ($this->session->has($filter->getName().'/technicians')) {
                    $this->session->remove($filter->getName().'/technicians');
                }
            }

        } elseif ($this->session->has($filter->getName())) {

            $filterData = $this->session->get($filter->getName());

            if (isset($filterData['technicians']) && !empty($filterData['technicians'])) {

                $qb->innerJoin('dwo.technicians','u')
                    ->andWhere($qb->expr()->eq('u.id',':user_id'))
                    ->setParameter('user_id',$filterData['technicians']);
            }

            $this->bindSessionInForm($filter);

        }

        return $qb;
    }

    protected function bindSessionInForm(FormInterface $form)
    {
        $form_values_in_session = $this->session->get($form->getName());

        foreach ($form->all() as $name => $field) {
            if (isset($form_values_in_session[$name])) {
                $field->bind($form_values_in_session[$name]);
            }
        }

        return $form;
    }

}
