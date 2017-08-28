<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CompanyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', TextType::class, [
                    'label' => 'Ime firme',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('adress', TextType::class, [
                    'label' => 'Adresa',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('city', TextType::class, [
                    'label' => 'Grad',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('faceurl', TextType::class, [
                    'label' => 'Face url',
                    'attr' => [
                        'class' => 'form-control'
            ]])
               
           
                ->add('gurl', TextType::class, [
                    'label' => 'G+ url',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                
                ->add('pib', TextType::class, [
                    'label' => 'PIB',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('matnumber', TextType::class, [
                    'label' => 'Maticni firme',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('bankacount', TextType::class, [
                    'label' => 'Racun banke',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('bank', TextType::class, [
                    'label' => 'Banka',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('phone', TextType::class, [
                    'label' => 'Telefon',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                ->add('mail', TextType::class, [
                    'label' => 'Mail',
                    'attr' => [
                        'class' => 'form-control'
            ]])
                
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Company'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_company';
    }


}
