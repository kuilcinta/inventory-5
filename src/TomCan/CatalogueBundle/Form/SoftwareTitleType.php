<?php

namespace TomCan\CatalogueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SoftwareTitleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('version')
            ->add('status')
            ->add('licenseType')
            ->add('remark')
            ->add('vendor')
            ->add('category')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TomCan\CatalogueBundle\Entity\SoftwareTitle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tomcan_cataloguebundle_softwaretitle';
    }
}
