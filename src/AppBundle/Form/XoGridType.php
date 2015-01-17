<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
class XoGridType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('squares', 'collection', ['type' => new SquareType()]);
    }

    public function getName()
    {
        return 'grid';
    }
}
