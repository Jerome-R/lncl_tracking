<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UnsuscribeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder        
            ->add('raison', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices'  => array(
                    'Je ne souhaite plus recevoir de communication de la part de Lancel' => "r1",
                    'Je ne suis plus intérréssé par les communication de Lancel'         => "r2",
                    'Autres'    => "r3",
                ),
            // *this line is important*
            'choices_as_values' => true,
            ))
            ->add('submit', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Unsuscribe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_unsuscribe';
    }
}
