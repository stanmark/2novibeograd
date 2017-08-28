<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SEOType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('description', TextType::class, [
                    'label' => 'Description',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('titletag', TextType::class, [
                    'label' => 'Title tag',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('title', TextType::class, [
                    'label' => 'Nikad ne menjati',
                    'attr' => [
                        'class' => 'form-control'
            ]]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\SEO'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_seo';
    }


}
