<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LeagueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('league', TextType::class, [
                    'label' => 'Liga',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('mainGallery', EntityType::class, [
                    'class' => \AppBundle\Entity\MainGallery::class,
                    'choice_label' => 'league',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                
                
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\League'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_league';
    }


}
