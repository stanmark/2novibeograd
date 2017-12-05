<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OurServicesType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('title')
                ->add('description')
                ->add('icon', ChoiceType::class, [
                    'choices' => [
                        'c-icon-1' => 'c-icon-1',
                        'c-icon-2' => 'c-icon-2',
                        'c-icon-3' => 'c-icon-3',
                        'c-icon-4' => 'c-icon-4',
                        'c-icon-5' => 'c-icon-5',
                        'c-icon-6' => 'c-icon-6',
                        'c-icon-7' => 'c-icon-7',
                        'c-icon-8' => 'c-icon-8',
                        'c-icon-9' => 'c-icon-9',
                        'c-icon-10' => 'c-icon-10',
                        'c-icon-11' => 'c-icon-11',
                        'c-icon-12' => 'c-icon-12',
                        'c-icon-13' => 'c-icon-13',
                        'c-icon-14' => 'c-icon-14',
                        'c-icon-15' => 'c-icon-15',
                        'c-icon-16' => 'c-icon-16',
                        'c-icon-17' => 'c-icon-17',
                        'c-icon-18' => 'c-icon-18',
                        'c-icon-19' => 'c-icon-19',
                        'c-icon-20' => 'c-icon-20',
                        'c-icon-21' => 'c-icon-21',
                        'c-icon-22' => 'c-icon-22',
                        'c-icon-23' => 'c-icon-23',
                        'c-icon-24' => 'c-icon-24',
                        'c-icon-25' => 'c-icon-25',
                        'c-icon-26' => 'c-icon-26',
                        'c-icon-27' => 'c-icon-27',
                        'c-icon-28' => 'c-icon-28',
                        'c-icon-29' => 'c-icon-29',
                        'c-icon-30' => 'c-icon-30',
                        'c-icon-31' => 'c-icon-31',
                        'c-icon-32' => 'c-icon-32',
                        'c-icon-33' => 'c-icon-33',
                        'c-icon-34' => 'c-icon-34',
                        'c-icon-35' => 'c-icon-35',
                        'c-icon-36' => 'c-icon-36',
                        'c-icon-37' => 'c-icon-37',
                        'c-icon-38' => 'c-icon-38',
                        'c-icon-39' => 'c-icon-39',
                        'c-icon-40' => 'c-icon-40',
                        'c-icon-41' => 'c-icon-41',
                        'c-icon-42' => 'c-icon-42',
                        'c-icon-43' => 'c-icon-43',
                        'c-icon-44' => 'c-icon-44',
                        'c-icon-45' => 'c-icon-45',
                        'c-icon-46' => 'c-icon-46',
                        'c-icon-47' => 'c-icon-47',
                        'c-icon-48' => 'c-icon-48',
                        ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\OurServices'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_ourservices';
    }

}
