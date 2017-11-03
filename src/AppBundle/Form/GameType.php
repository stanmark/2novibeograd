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
                ->add('round',  EntityType::class, [
                    'class' => \AppBundle\Entity\Round::class,
                    'choice_label' => 'rounds',                                       
                    'required' => false,                   
                    ])
                ->add('team1',  EntityType::class, [
                    'class' => \AppBundle\Entity\Team::class,
                    'choice_label' => 'team'                                  
                    ])
                ->add('bodTeam1')
                ->add('numberSet1')
                ->add('team2',  EntityType::class, [
                    'class' => \AppBundle\Entity\Team::class,
                    'choice_label' => 'team'                                   
                    ])                
                ->add('bodTeam2')
                ->add('numberSet2')
                ->add('date')
                ->add('begin')
                ->add('end')
                ->add('place',  EntityType::class, [
                    'class' => \AppBundle\Entity\place::class,
                    'choice_label' => 'title'                
                    ])
                
                
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
