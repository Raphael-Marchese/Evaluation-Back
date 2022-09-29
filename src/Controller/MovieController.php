<?php

namespace App\Controller;
use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie', name: 'movie_')]
class MovieController extends AbstractController
{

    public function __construct(private MovieRepository $movieRepository)
    {

    }
    #[Route('', name: 'list')]
    public function list(): Response
    {
        /* Stocker la totalité des films et les trier par ordre alphabétique pour le catalogue */
        $movies = $this->movieRepository-> findBy([], ['title' => 'ASC']);
            dump(($movies));
            return $this->render('movie/list.html.twig', [
            'movies' => $movies
        ]);
    }


}
