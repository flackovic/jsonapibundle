<?php

namespace Trikoder\JsonApiBundle\Services\ModelInput\Traits;

use Neomerx\JsonApi\Document\Error;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Trait ConstraintViolationToErrorTransformer
 */
trait ConstraintViolationToErrorTransformer
{
    /**
     * @param array|ConstraintViolationListInterface $violations
     *
     * @return array
     */
    protected function convertViolationsToErrors(ConstraintViolationListInterface $violations)
    {
        $errors = [];

        /** @var ConstraintViolationInterface $violation */
        foreach ($violations as $violation) {
            $errors[] = $this->convertViolationToError($violation);
        }

        return $errors;
    }

    /**
     * @param ConstraintViolationInterface $violation
     *
     * @return Error
     */
    protected function convertViolationToError(ConstraintViolationInterface $violation)
    {
        $code = $violation->getCode();
        $title = $violation->getMessage();
        $detail = sprintf('Constraint violation "%s"', $title);
        $source = [];
        if ($violation->getPropertyPath()) {
            // TODO - make diff between attributes and relationships
            $source['pointer'] = '/data/attributes/' . $violation->getPropertyPath();
        }
        if (2 === $code) {
            // TODO - parameter should be string? maybe we should send this in meta?
            $source['parameter'] = $violation->getParameters();
        }

        return new Error(
            null,
            null,
            Response::HTTP_CONFLICT,
            $code,
            $title,
            $detail,
            $source
        );
    }
}
