<?php

namespace App\Controller;
use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/add', name: 'add')]
    public function create(Request $request): Response
    {
        $newMovie = new Movie();
        $form =$this->createForm(MovieType::class, $newMovie);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->movieRepository->save($newMovie, true);

            $this->addFlash('success', 'Nouveau film ajouté avec succès!');
            return $this->redirectToRoute('main_index');
        }
        return $this->render('movie/add.html.twig', [
            'form' => $form->createView()
        ]);
    }


}
