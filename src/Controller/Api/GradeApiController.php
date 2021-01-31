<?php


namespace App\Controller\Api;


use App\Entity\Armee;
use App\Repository\ArmeeRepository;
use App\Repository\GradeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/grade")
 */
class GradeApiController extends AbstractController
{
    /**
     * @Route("/{id}", name="grade_api_byidarmee", methods={"GET"})
     * @Route("/", name="grade_api_byarmee", methods={"GET"})
     *
     * @param ArmeeRepository $armeeRepository
     * @return JsonResponse
     */
    public function gradeApiByArmee(ArmeeRepository $armeeRepository, Armee $armee = null): Response
    {

        if ($armee==null) $criteria = [];
        else $criteria = ['id' => $armee->getId()];

       return $this->json($armeeRepository->findBy($criteria),200,[],['groups'=>'grade:read']);
    }


}