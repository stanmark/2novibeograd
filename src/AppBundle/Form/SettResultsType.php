<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SettResultsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('team1Set', TextType::class, [
                    'label' => 'Team 1 set',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('team2Set', TextType::class, [
                    'label' => 'Team dva set',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])                
                ->add('idGame', EntityType::class, [
                    'class' => \AppBundle\Entity\Game::class,
                    'choice_label' => 'id',
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
            'data_class' => 'AppBundle\Entity\SettResults'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_settresults';
    }


}
