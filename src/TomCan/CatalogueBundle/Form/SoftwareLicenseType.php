<?php

namespace TomCan\CatalogueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SoftwareLicenseType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('softwareLicenseType')
            ->add('seats')
            ->add('licenseKey')
            ->add('remark')
            ->add('upgradedFrom')
            ->add('upgradedTo')
            ->add('softwareTitle')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TomCan\CatalogueBundle\Entity\SoftwareLicense'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tomcan_cataloguebundle_softwarelicense';
    }
}
