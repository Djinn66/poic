<?php


namespace App\Controller\Api;


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
     * @Route("/", name="grade_api_byarmee", methods={"GET"})
     * @param ArmeeRepository $armeeRepository
     * @return JsonResponse
     */
    public function gradeApiByArmee(ArmeeRepository $armeeRepository): Response
    {
       return $this->json($armeeRepository->findAll(),200,[],['groups'=>'grade:read']);;
    }



}