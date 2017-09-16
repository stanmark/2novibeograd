<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PricingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', TextType::class, [
                    'label' => 'Naziv popusta',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('price', IntegerType::class, [
                    'label' => 'Cena',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('description', TextType::class, [
                    'label' => 'Naziv popusta',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('features', EntityType::class, [
                    'class' => \AppBundle\Entity\Features::class,
                    'choice_label' => 'features',
                    'placeholder' => 'unesite pogodnosti',
                    'multiple' => true,
                    'attr' => [
                        'class' => 'form-control select2-multiple',
                        
        ]]  );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Pricing'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_pricing';
    }


}
