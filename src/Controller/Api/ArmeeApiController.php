<?php

namespace App\Controller\Api;

use App\Repository\EpreuveRepository;
use App\Repository\ArmeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/armee")
 */
class ArmeeApiController extends AbstractController
{
    /**
     * @Route("/", name="epreuve_api_byarmee", methods={"GET"})
     * @param ArmeeRepository $armeeRepository
     * @return JsonResponse
     */
    public function epreuveApiByArmee(ArmeeRepository $armeeRepository): Response
    {
       return $this->json($armeeRepository->findAll(),200,[],['groups'=>'armee:read']);
    }
}
