<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Validator\ConstraintViolationListInterface;

trait ResponseTrait
{
    protected function respondWithValidationErrorsIfExists(ConstraintViolationListInterface $errors, SerializerInterface $serializer): JsonResponse
    {
        if (count($errors) > 0) {   
            try {
                $jsonErrors = $serializer->serialize($errors, 'json');
                return new JsonResponse($jsonErrors, 400, [], true);
            } catch (NotEncodableValueException $exception) {
                return new JsonResponse(['message' => 'Invalid request'], 400);
            }
        }

        return null;
    }
}
