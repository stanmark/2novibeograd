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
                    'label' => 'Ime firme'
                    
            ])
                ->add('adress', TextType::class, [
                    'label' => 'Adresa',
                   ])
                ->add('phone', TextType::class, [
                    'label' => 'Telefon',
                    ])
                ->add('mail', EmailType::class, [
                    'label' => 'mail',
                    ])
                ->add('city', TextType::class, [
                    'label' => 'Grad',
                    ])
                ->add('faceurl', TextType::class, [
                    'label' => 'Facebook url',
                   ])
                ->add('gurl', TextType::class, [
                    'label' => 'Google + url',
                    ])
                ->add('instagram', TextType::class, [
                    'label' => 'instagram',
                    ])
                ->add('pib', IntegerType::class, [
                    'label' => 'PIB',
                    ])
                ->add('matnumber', IntegerType::class, [
                    'label' => 'Maticni broj firme',
                    ])
                ->add('bankacount', TextType::class, [
                    'label' => 'Tekuci račun',
                    ])
                ->add('bank', TextType::class, [
                    'label' => 'Banka',
                   ])
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
