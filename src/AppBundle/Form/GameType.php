<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class GameType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('groupp', EntityType::class, [
                    'class' => \AppBundle\Entity\Groupp::class,
                    'choice_label' => 'groupp',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('team1', EntityType::class, [
                    'class' => \AppBundle\Entity\Team::class,
                    'choice_label' => 'team',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('team2', EntityType::class, [
                    'class' => \AppBundle\Entity\Team::class,
                    'choice_label' => 'team',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('setTeam1')
                ->add('setTeam2')
                ->add('bodTeam1', IntegerType::class, [
                    'label' => 'Bodovi tim jedan',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('bodTeam2', IntegerType::class, [
                    'label' => 'Bodovi tim dva',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])             
                ->add('place', EntityType::class, [
                    'class' => \AppBundle\Entity\place::class,
                    'label' => 'Mesto',
                    'choice_label' => 'title',
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
