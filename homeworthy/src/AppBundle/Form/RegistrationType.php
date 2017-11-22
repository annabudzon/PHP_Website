<?php
/**
 * Created by PhpStorm.
 * User: Lukasz
 * Date: 27.10.2017
 * Time: 14:59
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('phone_nr',NumberType::class,
            array('label' => 'Phone Number', 'attr' => array('class' => 'phone', 'type' => 'tel', 'placeholder' => 'Enter Phone Number')));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getPhoneNr()

    {
        return $this->getBlockPrefix();
    }
}