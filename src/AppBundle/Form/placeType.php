<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class placeType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title')
                ->add('adress')
                ->add('treaningPlace')
                ->add('member',  EntityType::class, [
                    'class' => \AppBundle\Entity\teamMember::class,
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,                   
                    ])
                ->add('mainGallery',  EntityType::class, [
                    'class' => \AppBundle\Entity\MainGallery::class,
                    'choice_label' => 'alt',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,                   
                    ])
                ->add('description', CKEditorType::class, [
                    'label' => 'Opis'
                ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\place'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_place';
    }

}
