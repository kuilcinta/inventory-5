<?php

namespace TomCan\CatalogueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeviceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('model')
            ->add('partNo')
            ->add('serialNo')
            ->add('company')
            ->add('deviceType')
            ->add('vendor')
            ->add('persons')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TomCan\CatalogueBundle\Entity\Device'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tomcan_cataloguebundle_device';
    }
}
