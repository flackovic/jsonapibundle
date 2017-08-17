<?php

namespace Trikoder\JsonApiBundle\Services\ModelInput;

use Symfony\Component\Form\FormInterface;

/**
 * Class CustomFormModelInputHandler
 * @package Trikoder\JsonApiBundle\Services\ModelInput
 */
class CustomFormModelInputHandler extends AbstractFormModelInputHandler
{
    /**
     * @var FormInterface
     */
    private $form;

    /**
     * FormModelInputHandler constructor.
     * @param FormInterface $form
     */
    public function __construct(FormInterface $form)
    {
        $this->form = $form;
    }

    /**
     * @return FormInterface
     */
    function getForm()
    {
        return $this->form;
    }
}