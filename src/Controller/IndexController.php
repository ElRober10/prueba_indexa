<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class IndexController extends AbstractController
{
    /** funcion para renderizar la vista del index y crear el formulario */
    public function index(): Response
    {
        //Creo el formulario
        $form = $this->createFormBuilder()
        ->setAction($this->generateUrl('tester'))
        ->setMethod('POST')
        ->add('tipo', TextType::class, [
            'label'=> 'Coordenadas:  ',
            'attr' => [
                'class'=> 'coordinates'
            ]
        ])
        ->add('submit', SubmitType::class,[
            'label' => 'Comprobar coordendas',
            'attr' => [
                'class'=> 'boton3'
            ]
        ])
        ->getForm();

        //Mando la vista al formulario
        return $this->render('index/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
