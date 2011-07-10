<?php

namespace Olitaz\HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactType extends AbstractType
{

    public function getName() {
        return 'contact_form';
    }

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');
        $builder->add('mail', 'email');
        $builder->add('subject');
        $builder->add('content', 'textarea');
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Olitaz\HomeBundle\Entity\Contact',
        );
    }

}
