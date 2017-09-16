<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LeagueGalleryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('imageFile', VichImageType::class, ['label' => 'Slika'])
                ->add('alt', TextType::class, [
                    'label' => 'Alternativni naziv slike',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
               
                ->add('league', EntityType::class, [
                    'class' => \AppBundle\Entity\League::class,
                    'choice_label' => 'league',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\LeagueGallery'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_leaguegallery';
    }


}
