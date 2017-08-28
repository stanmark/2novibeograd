<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class GameType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

                ->add('place', EntityType::class, [
                    'class' => \AppBundle\Entity\place::class,
                    'choice_label' => 'title',
                    'attr' => [
                        'class' => 'form-control select',
                ]])
                ->add('groupp', EntityType::class, [
                    'class' => \AppBundle\Entity\Groupp::class,
                    'choice_label' => 'groupp',               
                    'attr' => [
                        'class' => 'form-control select',
                ]])
                ->add('team1', EntityType::class, [
                    'class' => \AppBundle\Entity\Team::class,
                    'choice_label' => 'team',    
                    'attr' => [
                        'class' => 'form-control select',
                ]])
                ->add('bodTeam1')
                ->add('setTeam1')
                ->add('team2', EntityType::class, [
                    'class' => \AppBundle\Entity\Team::class,
                    'choice_label' => 'team',
                    'attr' => [
                        'class' => 'form-control select',
                ]])
                ->add('bodTeam2')
                ->add('setTeam2')
                
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Game'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_game';
    }


}
