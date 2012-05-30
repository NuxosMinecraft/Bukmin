<?php

namespace Bukmin\PanelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class BanType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('reason')
            ->add('expire')
            ->add('active', 'hidden')
            ->add('player')
        ;
    }

    public function getName()
    {
        return 'bukmin_panelbundle_bantype';
    }
}
