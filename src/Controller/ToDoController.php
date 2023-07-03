<?php

namespace App\Controller;

use App\Entity\ToDo;
use App\Traits\ResponseTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ToDoController extends AbstractController
{
    use ResponseTrait;

    #[Route('/to/do', name: 'app_to_do')]
    public function index(ValidatorInterface $validator, SerializerInterface $serializer): JsonResponse
    {
        $todo = new ToDo();

        $errors = $validator->validate($todo);

        $validationErrorResponse = $this->respondWithValidationErrorsIfExists($errors, $serializer);
        if ($validationErrorResponse !== null) {
            return $validationErrorResponse;
        }

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ToDoController.php',
        ]);
    }
}
