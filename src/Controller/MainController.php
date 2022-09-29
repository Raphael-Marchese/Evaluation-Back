<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use App\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('', name: 'main_')]
class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    #[Route('/statistics', name: 'stats')]
    public function getStats( MovieRepository $movieRepository, PersonRepository $personRepository): Response
    {
        $movies =$this->movieRepository-> findBy([], ['id' => 'ASC']);
        return $this->render('main/statistics.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
