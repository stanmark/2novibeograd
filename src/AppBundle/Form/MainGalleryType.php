<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MainGalleryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('imageFile', VichImageType::class, [
                    'required' => false, 
                    ])
                ->add('alt')
                ->add('mainPicture')
                ->add('mainPictureGallery')
                ->add('title')
                ->add('description')
                ->add('league',  EntityType::class, [
                    'class' => \AppBundle\Entity\League::class,
                    'choice_label' => 'league',
                    'required' => false, 
                    'multiple' => true,
                    ])
                ->add('teamMember',  EntityType::class, [
                    'class' => \AppBundle\Entity\teamMember::class,
                    'choice_label' => 'name',  
                    'required' => false, 
                    'multiple' => true,
                    ])
                ->add('place',  EntityType::class, [
                    'class' => \AppBundle\Entity\place::class,
                    'choice_label' => 'title',
                    'required' => false, 
                    'multiple' => true,
                    ])
                ->add('homeSlider',  EntityType::class, [
                    'class' => \AppBundle\Entity\HomeSlider::class,
                    'choice_label' => 'mainTitle',
                    'required' => false,                    
                    'multiple' => true,
                    ])
                ->add('galleryCategory',  EntityType::class, [
                    'class' => \AppBundle\Entity\MainGallery::class,
                    'choice_label' => 'category',
                    'required' => false, 
                    'multiple' => true,
                    
                    ])
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\MainGallery'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_maingallery';
    }


}
