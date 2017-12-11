<?php

namespace AppBundle\Form;

use AppBundle\Entity\Building;
use AppBundle\Entity\Owner_type;
use AppBundle\Entity\Tenants_number;
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

class RoomRentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array('label' => 'Title', 'attr' => array('placeholder' => 'Enter title')))
            ->add('localization', LocalizationType::class, array('label' => false))
            ->add('size', NumberType::class, array('label' => 'Size of Room', 'attr' => array('placeholder' => 'Enter size')))
            ->add('available', DateType::class, array('label' => 'Available from',
                'placeholder' => ' ---- Select ----'))
            ->add('rent_price', MoneyType::class, array('label' => 'Price for rental - ', 'currency'=> false, 'attr' => array('placeholder' => 'Enter price for rental')))
            ->add('owner_price', MoneyType::class, array('label' => 'Owner price', 'currency'=> false, 'attr' => array('placeholder' =>  'Enter owner price')))
            ->add('media_price', MoneyType::class, array('label' => 'Media price', 'currency'=> false, 'attr' => array('placeholder' => 'Enter media price')))
            ->add('advance', MoneyType::class, array('label' => 'Advance', 'currency'=> false, 'attr' => array('placeholder' => 'Enter advance')))
            ->add('total_price', MoneyType::class, array('label' => 'Total Price', 'currency'=> false, 'attr' => array('placeholder' =>  'Enter total price')))
            ->add('floor', NumberType::class, array('label' => 'Number of floor', 'attr' => array('placeholder' => 'Enter floor number')))
            ->add('tenants_number', EntityType::class, array(
                'class' => Tenants_number::class,
                'choice_label' => 'tenants_number',
                'label' => 'Number of Tenants in Apartment', 'placeholder' => ' ------- Select -------'))
            ->add('roommate', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Sharing room with another roomate', 'placeholder' => ' ------- Select -------'))
            ->add('owner_type', EntityType::class, array(
                'class' => Owner_type::class,
                'choice_label' => 'owner_type',
                'label' => 'Owner', 'placeholder' => ' ------- Select -------'))
            ->add('furnished', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Furnished', 'placeholder' => ' ------- Select -------'))
            ->add('connecting', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Connecting', 'placeholder' => ' ------- Select -------'))
            ->add('balcony', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Balcony', 'placeholder' => ' ------- Select -------'))
            ->add('building', EntityType::class, array(
                'class' => Building::class,
                'choice_label' => 'building_type',
                'label' => 'Type of Building', 'placeholder' => ' ------- Select -------'))
            ->add('renovation', DateType::class, array('label' => 'Last Renovation', 'placeholder' => ' ---- Select ----'))
            ->add('smoker', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Smoker', 'placeholder' => ' ------- Select -------'))
            ->add('pets', ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ), 'label' => 'Pets', 'placeholder' => ' ------- Select -------'))
            ->add('description', TextareaType::class, array('label' => 'Description', 'attr' => array('placeholder' =>  'Enter description')));
            //->add('plan', PhotoType::class);
            //->add('roomPhotos', PhotoType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\RoomRent'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_roomrent';
    }


}
