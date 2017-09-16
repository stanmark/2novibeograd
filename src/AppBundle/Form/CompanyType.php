<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

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
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('adress', TextType::class, [
                    'label' => 'Adresa',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('phone', TextType::class, [
                    'label' => 'Telefon',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('mail', EmailType::class, [
                    'label' => 'mail',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('city', TextType::class, [
                    'label' => 'Grad',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('faceurl', TextType::class, [
                    'label' => 'Facebook url',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('gurl', TextType::class, [
                    'label' => 'Google + url',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('pib', IntegerType::class, [
                    'label' => 'PIB',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('matnumber', IntegerType::class, [
                    'label' => 'Maticni broj firme',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('bankacount', TextType::class, [
                    'label' => 'Tekuci račun',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('bank', TextType::class, [
                    'label' => 'Banka',
                    'attr' => [
                        'class' => 'form-control input-circle-right'
            ]])
                ->add('description', CKEditorType::class, [
                    'label' => 'Opis'
                    ]);
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
