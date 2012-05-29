<?php

namespace Bukmin\PanelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('login')
            ->add('email')
            ->add('name')
        ;
    }

    public function getName()
    {
        return 'bukmin_panelbundle_playertype';
    }
}
