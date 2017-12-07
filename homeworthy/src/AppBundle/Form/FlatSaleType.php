<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Building;
use AppBundle\Entity\Owner_type;
use AppBundle\Entity\Rooms_number;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FlatSaleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array('label' => 'Title', 'attr' => array('placeholder' => 'Enter title')))
            ->add('localization', LocalizationType::class, array('label' => false))
            ->add('size', NumberType::class, array('label' => 'Size of Apartment', 'attr' => array('placeholder' => 'Enter size')))
            ->add('available', DateType::class, array('label' => 'Available from',
                'placeholder' => ' ---- Select ----'))
            ->add('meter_price', MoneyType::class, array('label' => 'Price for meter', 'currency'=> false, 'attr' => array('placeholder' => 'Enter price for meter')))
            ->add('instalments',ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ),'label' => 'Instalments', 'attr' => array('placeholder' => 'Enter instalments')))
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
                ), 'label' => 'Furnished', 'placeholder' => ' ------- Select -------'))
            ->add('owner_type', EntityType::class, array(
                'class' => Owner_type::class,
                'choice_label' => 'owner_type',
                'label' => 'Owner', 'placeholder' => ' ------- Select -------'))
            ->add('balcony', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Balcony', 'placeholder' => ' ------- Select -------'))
            ->add('building', EntityType::class, array(
                'class' => Building::class,
                'choice_label' => 'building_type',
                'label' => 'Type of Building', 'placeholder' => ' ------- Select -------'))
            ->add('renovation', DateType::class, array('label' => 'Last Renovation', 'placeholder' => '---- Select ----'))
            ->add('description', TextareaType::class, array('label' => 'Description', 'attr' => array('placeholder' =>  'Enter description')));
            #->add('plan', CollectionType::class, array('entry_type' => PhotoType::class, 'entry_options' => array('label' => false)))
            #->add('flatPhotos', CollectionType::class, array('entry_type' => PhotoType::class, 'entry_options' => array('label' => false)));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FlatSale'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_flatsale';
    }


}
