<?php

namespace AppBundle\Form;

use AppBundle\Entity\Building;
use AppBundle\Entity\Owner_type;
use AppBundle\Entity\Rooms_number;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlatRentType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array('label' => 'Title', 'attr' => array('placeholder' => 'Enter title')))
            ->add('localization', LocalizationType::class, array('label' => false))
            ->add('size', NumberType::class, array('label' => 'Size of Apartment', 'attr' => array('placeholder' => 'Enter size')))
            ->add('available', DateType::class, array('label' => 'Available from', 'placeholder' => ' ---- Select ----'))
            ->add('rent_price', MoneyType::class, array('label' => 'Price for rental - ', 'currency'=> false, 'attr' => array('placeholder' => 'Enter price for rental')))
            ->add('owner_price', MoneyType::class, array('label' => 'Owner price', 'currency'=> false, 'attr' => array('placeholder' =>  'Enter owner price')))
            ->add('media_price', MoneyType::class, array('label' => 'Media price', 'currency'=> false, 'attr' => array('placeholder' => 'Enter media price')))
            ->add('advance', MoneyType::class, array('label' => 'Advance', 'currency'=> false, 'attr' => array('placeholder' => 'Enter advance')))
            ->add('total_price', MoneyType::class, array('label' => 'Total Price', 'currency'=> false, 'attr' => array('placeholder' =>  'Enter total price')))
            ->add('floor', NumberType::class, array('label' => 'Number of floor', 'attr' => array('placeholder' => 'Enter floor number')))
            ->add('rooms_number', EntityType::class, array(
                'class' => Rooms_number::class,
                'choice_label' => 'rooms_number',
                'label' => 'Number of Rooms', 'placeholder' => ' ------- Select -------'))
            ->add('furnished', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Furnished',
                'placeholder' => ' ------- Select -------'))
            ->add('owner_type', EntityType::class, array(
                'class' => Owner_type::class,
                'choice_label' => 'owner_type',
                'label' => 'Owner',
                'placeholder' => ' ------- Select -------'))
            ->add('balcony', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Balcony',
                'placeholder' => ' ------- Select -------'))
            ->add('flatmate', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Flatmates',
                'placeholder' => ' ------- Select -------'))
            ->add('building', EntityType::class, array(
                'class' => Building::class,
                'choice_label' => 'building_type',
                'label' => 'Type of Building',
                'placeholder' => ' ------- Select -------'))
            ->add('smoker', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Smoker',
                'placeholder' => ' ------- Select -------'))
            ->add('pets', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Pets',
                'placeholder' => ' ------- Select -------'))
            ->add('children', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Children',
                'placeholder' => ' ------- Select -------'))
            ->add('renovation', DateType::class, array('label' => 'Last Renovation', 'placeholder' => ' ---- Select ----'))
            ->add('description', TextareaType::class, array('label' => 'Description', 'attr' => array('placeholder' =>  'Enter description')))
            ->add('plan', 'sonata_media_type', array(
                'label' => 'Apartment plan',
                'provider' => 'sonata.media.provider.image',
                'context'  => 'images',
                'required' => true))
            ->add('mainPhoto', 'sonata_media_type', array(
                'label' => 'Main Photo',
                'provider' => 'sonata.media.provider.image',
                'context'  => 'images',
                'required' => true));
            /*->add('flatPhotos', CollectionType::class, array(
                'entry_type' => 'sonata_media_type',
                'entry_options' => array(
                    'label' => false,
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'images',),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
                'required' => false,
            ));*/
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FlatRent'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_flatrent';
    }


}
