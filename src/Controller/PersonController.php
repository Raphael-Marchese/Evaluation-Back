<?php

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
use App\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/person', name: 'person_')]
class PersonController extends AbstractController
{
    public function __construct(private PersonRepository $personRepository)
    {

    }
    #[Route('/create', name: 'create')]
    public function create(Request $request): Response
    {
        $newPerson = new Person();
        $form =$this->createForm(PersonType::class, $newPerson);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->personRepository->save($newPerson, true);

            $this->addFlash('success', 'Nouvelle personne ajoutée avec succès!');
            return $this->redirectToRoute('main_index');
        }
        return $this->render('person/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
