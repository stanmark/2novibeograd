<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;

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
                ->add('longdescription')
                ->add('description')
                ->add('blockquote')
                ->add('imageFile', VichImageType::class,  ['label' => 'Slika']) 
                ->add('alt')
                ->add('imagetitle')
                ->add('imagecaption')
                ->add('imageFile1', VichImageType::class,  ['label' => 'Slika']) 
                ->add('alt1')
                ->add('imagetitle1')
                ->add('imagecaption1')
                ->add('created')
                ->add('updated')
                ->add('place', EntityType::class, [
                    'class' => \AppBundle\Entity\place::class,
                    'choice_label' => 'title',
                    'multiple' => true,
                    'attr' => [
                        'class' => 'form-control select2',
                ]]);
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
