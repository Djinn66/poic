<?php

namespace App\Controller\Api;

use App\Repository\EpreuveRepository;
use App\Repository\PersonnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/epreuve")
 */
class EpreuveApiController extends AbstractController
{
    /**
     * @Route("/", name="epreuve_api_bypersonnel", methods={"GET"})
     * @param PersonnelRepository $personnelRepository
     * @return JsonResponse
     */
    public function epreuveApiByPersonnel(PersonnelRepository $personnelRepository): Response
    {
       return $this->json($personnelRepository->findAll(),200,[],['groups'=>'epreuve:read']);
    }
}
