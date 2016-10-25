<?php

namespace Application\Sonata\UserBundle\Admin;

use Sonata\UserBundle\Admin\Model\UserAdmin as SonataUserAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class UserAdmin extends SonataUserAdmin
{
    /**
        * {@inheritdoc}
        */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        parent::configureDatagridFilters($datagridMapper);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);
    }
}