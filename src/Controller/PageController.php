<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity;

class PageController extends AbstractController
{
    /**
     * @Route("/page/{number}", name="page")
     */
    public function index($number)
    {
       
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
            'number' => $number,
        ]);
    }
}
