<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
class SquareType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('value', 'text', ['required' => false, 'max_length' => 1]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Game\XoSquare'
        ]);
    }

    public function getName()
    {
        return 'square';
    }
}
