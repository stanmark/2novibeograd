<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class GameType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
//                 ->add('Legaue',  EntityType::class, [
//                    'class' => \AppBundle\Entity\League::class,
//                    'choice_label' => 'league',                                       
//                    'required' => false,                   
//                    ])
                ->add('round', EntityType::class, [
                    'class' => \AppBundle\Entity\Round::class,
                    'choice_label' => 'rounds',
                ])
                ->add('team1', EntityType::class, [
                    'class' => \AppBundle\Entity\Team::class,
                    'choice_label' => 'team'
                ])
                ->add('bodTeam1')
                ->add('numberSet1')
                ->add('team2', EntityType::class, [
                    'class' => \AppBundle\Entity\Team::class,
                    'choice_label' => 'team'
                ])
                ->add('bodTeam2')
                ->add('numberSet2')
                ->add('date', DateType::class, [
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'js-datepicker'
                    ],
                    'html5' => false,
                ])
                ->add('begin')
                ->add('end')
                ->add('place', EntityType::class, [
                    'class' => \AppBundle\Entity\place::class,
                    'choice_label' => 'title'
                ])
                ->add('settresults', EntityType::class, [
                    'class' => \AppBundle\Entity\SettResults::class,
                    'choice_label' => 'id',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                ])


        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Game'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_game';
    }

}
