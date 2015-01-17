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
        for ($i = 0; $i < 9; $i++) {
            $propPath = "squares[$i].value";
            $builder->add('sq' . $i, 'text', ['property_path' => $propPath, 'required' => false]);
        }
    }

    public function getName()
    {
        return 'grid';
    }
}
