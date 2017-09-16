<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class SEOType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('description', CKEditorType::class, [
                    'label' => 'Opis'
                    ])
                ->add('titletag', TextType::class, [
                    'label' => 'Naziv naslova',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('title', TextType::class, [
                    'label' => 'Naslov ne dirati ja unosim',
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
