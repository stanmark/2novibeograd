<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MainGalleryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('imageFile', VichImageType::class, ['label' => 'Slika', 'required' => false,])
                ->add('alt', TextType::class, [
                    'label' => 'Alternativni naziv slike',
                    'attr' => [
                        'class' => 'form-control'
            ]])
               
                
                ->add('title')
                ->add('description') 
                 ->add('mainPicture')
                ->add('league', EntityType::class, [
                    'class' => \AppBundle\Entity\League::class,
                    'choice_label' => 'league',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                    
    ]) 
                ->add('teamMember', EntityType::class, [
                    'class' => \AppBundle\Entity\teamMember::class,
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                    
    ]) 
                ->add('place', EntityType::class, [
                    'class' => \AppBundle\Entity\place::class,
                    'choice_label' => 'title',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                    
    ]) 
                ->add('homeSlider', EntityType::class, [
                    'class' => \AppBundle\Entity\HomeSlider::class,
                    'choice_label' => 'mainTitle',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                     'label' => 'Slika za home slider, jedna slika jedan check box',
                    
    ]) 
                ->add('galleryCategory', EntityType::class, [
                    'class' => \AppBundle\Entity\GalleryCategory::class,
                    'choice_label' => 'category',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                     
                    
    ]) 
                ->add('mainPictureGallery')
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
