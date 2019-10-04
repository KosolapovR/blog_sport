<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Brand;
use App\Form\FirstFormType;

class MainController extends AbstractController
{
    
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Brand::class);
       
        $brand = new Brand();
        $form = $this->createForm(FirstFormType::class, $brand);
        $form->handleRequest($request);

        $saved = false;

        if( $form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $entityManager->persist($data);
            $entityManager->flush(); 
            $saved = true;
            return $this->redirectToRoute('index', array(), 301);
        }
        
        $brands = $repository->findAll();
        $response = new Response($this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'form' => $form->createView(),
            'saved' => $saved,
            'brand_id' => $brand->getId(),
            'brands' => $brands,
        ]));
        $response->headers->set('Location', 'https://vk.com/artist/sickpuppies');
        
        return $response;
        
    }
    /**
     * @Route("/remove/{brand}", name="remove_brand")
     */
    public function RemoveBrand(Brand $brand, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($brand);
        $em->flush();

        return $this->redirectToRoute('index');
    }
}
