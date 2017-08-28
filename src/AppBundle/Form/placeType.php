<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class placeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('title')
                ->add('adress')
                ->add('shortdescription')
                ->add('description')
                ->add('description1') 
                ->add('imageFile', VichImageType::class,  ['label' => 'Slika']) 
                ->add('member', EntityType::class, [
                    'class' => \AppBundle\Entity\teamMember::class,
                    'choice_label' => 'name',
                    'multiple' => true,
                    'attr' => [
                        'class' => 'form-control select2',
                ]]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\place'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_place';
    }


}
