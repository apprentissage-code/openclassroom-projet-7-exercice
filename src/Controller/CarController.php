<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CarController extends AbstractController
{
  #[Route('/', name: 'app_home')]
  public function index(CarRepository $carRepository): Response
  {
    $cars = $carRepository->findAll();

    return $this->render('car/index.html.twig', [
      'cars' => $cars,
    ]);
  }

  #[Route('/car/{id}', name: 'app_car_show', requirements: ['id' => '\d+'], methods: ['GET'])]
  public function show(?Car $car): Response
  {
    if (!$car) {
      return $this->redirectToRoute('app_home');
    }

    return $this->render('car/car.html.twig', [
      'car' => $car,
    ]);
  }
}
