<?php

namespace Trikoder\JsonApiBundle\Services\ModelInput\Traits;

use Neomerx\JsonApi\Document\Error;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormErrorIterator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Trait FormErrorToErrorTransformer
 */
trait FormErrorToErrorTransformer
{
    /**
     * @return array
     */
    protected function convertFormErrorsToErrors(FormErrorIterator $formErrors)
    {
        $errors = [];

        /* @var FormError $violation */
        foreach ($formErrors as $error) {
            $errors[] = $this->convertFormErrorToError($error);
        }

        return $errors;
    }

    /**
     * @return Error
     */
    protected function convertFormErrorToError(FormError $violation)
    {
        $title = $violation->getMessage();
        $detail = sprintf('Form error "%s"', $violation->getMessage());
        $source = [];
        if ($violation->getOrigin()) {
            // TODO - make diff between attributes and relationships
            $source['pointer'] = '/data/attributes/' . $violation->getOrigin()->getName();
            $source['parameter'] = $violation->getOrigin()->getData();
        }

        return new Error(
            null,
            null,
            Response::HTTP_CONFLICT,
            null,
            $title,
            $detail,
            $source
        );
    }
}
