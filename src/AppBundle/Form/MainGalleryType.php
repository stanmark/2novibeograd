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
                ->add('mainPicture')
                ->add('title')
                ->add('description')      
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
