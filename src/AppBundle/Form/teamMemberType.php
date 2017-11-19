<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class teamMemberType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name')
                ->add('position')
                ->add('phone')
                ->add('mail')
                ->add('education')
                ->add('faceurl')
                ->add('gurl')
                ->add('inurl')
                ->add('description', CKEditorType::class, [
                    'label' => 'Opis'
                ])       
                ->add('place',  EntityType::class, [
                    'class' => \AppBundle\Entity\place::class,
                    'choice_label' => 'title',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,                   
                    ])
               ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\teamMember'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_teammember';
    }


}
