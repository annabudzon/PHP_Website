<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-09
 * Time: 20:47
 */

namespace AppBundle\Form;


use AppBundle\Entity\City;
use AppBundle\Entity\Offer_type;
use AppBundle\Entity\Property_type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffersSearcherType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
                'city',
                EntityType::class,
                array(
                    'class' => City::class,
                    'choice_label' => 'city',
                    'label' => 'City',
                    'placeholder' => ' City'
                )
            )
            ->add(
                'property',
                EntityType::class,
                array(
                    'class' => Property_type::class,
                    'choice_label' => 'property',
                    'label' => 'Property_type',
                    'placeholder' => ' Type of property '
                )
            )
            ->add(
                'offer',
                EntityType::class,
                array(
                    'class' => Offer_type::class,
                    'choice_label' => 'offer',
                    'label' => 'Offer_type',
                    'placeholder' => ' Type of offer'
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\OffersSearcher'
        ));
    }

    public function getBlockPrefix()
    {
        return 'appbundle_offerssearcher';
    }


}