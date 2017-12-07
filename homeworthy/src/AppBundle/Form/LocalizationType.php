<?php

namespace AppBundle\Form;

use AppBundle\Entity\City;
use AppBundle\Entity\Country;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocalizationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('country', EntityType::class, array(
                'class' => Country::class,
                'choice_label' => 'country',
                'label' => 'Country', 'placeholder' => ' ------- Select -------'))
            ->add('city', EntityType::class, array(
                'class' => City::class,
                'choice_label' => 'city',
                'label' => 'City', 'placeholder' => ' ------- Select -------'))
            ->add('district', TextType::class, array('attr' => array('placeholder' => 'Enter district')))

            ->add('street', TextType::class, array('attr' => array('placeholder' => 'Enter street')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Localization'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_localization';
    }


}
