<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-13
 * Time: 18:19
 */

namespace Application\Sonata\MediaBundle\Provider;

use Sonata\MediaBundle\Provider\FileProvider;
use Symfony\Component\Form\FormBuilder;

class MediaProvider extends FileProvider
{
    /**
     * {@inheritdoc}
     */
    public function buildMediaType(FormBuilder $formBuilder)
    {
        $fileType = method_exists('Symfony\Component\Form\AbstractType', 'getBlockPrefix')
            ? 'Symfony\Component\Form\Extension\Core\Type\FileType'
            : 'file';

        if ('api' == $formBuilder->getOption('context')) {
            $formBuilder->add('binaryContent', $fileType, array('label' => false));
            $formBuilder->add('contentType', array('label' => false));
        } else {
            $formBuilder->add('binaryContent', $fileType, [
                'required' => false,
                'label' => false,
            ]);
        }
    }
}