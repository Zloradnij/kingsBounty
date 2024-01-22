<?php

namespace App\Controller;

use App\Direction\WorldMap;
use App\Direction\WorldSettings;
use App\Entity\World;
use App\Form\WorldType;
use App\Repository\WorldRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/world')]
class WorldController extends AbstractController
{
    #[Route('/', name: 'app_world_index', methods: ['GET'])]
    public function index(WorldRepository $worldRepository): Response
    {
        return $this->render('world/index.html.twig', [
            'worlds' => $worldRepository->findAll(),
        ]);
    }

    #[Route('/my', name: 'app_world_my', methods: ['GET'])]
    public function my(EntityManagerInterface $entityManager, WorldMap $map): Response
    {
        return $this->render('world/my.html.twig', [
            'worldMapJson'   => json_encode($map->getWorldMap()),
            'mapObjects'     => json_encode($map->getWorldObjects()),
            'hero'     => json_encode($map->getHero()),
            'o1'   => $map->getWorldMap(),
            'o2'     => $map->getWorldObjects(),
            'o3'     => $map->getHero(),
        ]);
    }

    #[Route('/new', name: 'app_world_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $world = new World();
        $form = $this->createForm(WorldType::class, $world);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($world);
            $entityManager->flush();

            return $this->redirectToRoute('app_world_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('world/new.html.twig', [
            'world' => $world,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_world_show', methods: ['GET'])]
    public function show(World $world): Response
    {
        return $this->render('world/show.html.twig', [
            'world' => $world,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_world_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, World $world, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(WorldType::class, $world);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_world_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('world/edit.html.twig', [
            'world' => $world,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_world_delete', methods: ['POST'])]
    public function delete(Request $request, World $world, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$world->getId(), $request->request->get('_token'))) {
            $entityManager->remove($world);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_world_index', [], Response::HTTP_SEE_OTHER);
    }
}
