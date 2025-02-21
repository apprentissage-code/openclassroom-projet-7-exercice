<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CarController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CarRepository $carRepository):Response
    {
      $cars = $carRepository->findAll();

      return $this->render('car/index.html.twig', [
          'cars' => $cars,
      ]);
    }
}
