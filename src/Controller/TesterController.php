<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class TesterController extends AbstractController
{

    public function index(Request $request): Response
    {
        try{

        //Obtengo el formulario elimino los espacios en blando del inicio y del fin de las coordendas
        $form = $request->get('form');
        $coordinates = trim($form['tipo']);

        //Convierto las coordenadas en dos array
        $textPosition = explode(' ',  $coordinates);
        $size = count($textPosition);
        $medium = $size/2;
        $piece1 = array_slice($textPosition, 0, $medium);
        $piece2 = array_slice($textPosition, $medium);

        //Guardo las coordenadas en variables
        $orientation1 = $piece1[1];
        $x1 = $piece1[2];
        $y1 = $piece1[3];
        $large1 = $piece1[4];

        $orientation2 = $piece2[1];
        $x2 = $piece2[2];
        $y2 = $piece2[3];
        $large2 = $piece2[4];
        //Obtengo las coordendas del primer rectangulo     
        $piece1Complete = [$x1 . '-' . $y1];
        while($large1 > 1){
            switch ($orientation1){
                case 'h':
                        if($large1 > 0){
                            $x1 ++;
                            array_push($piece1Complete, $x1 . '-' . $y1);
                            $large1 --;
                        }else{
                            $x1 --;
                            array_push($piece1Complete, $x1 . '-' . $y1);
                            $large1 --;
                        }
                    break;
                case 'v':
                        if($large1 > 0){
                            $y1 ++;
                            array_push($piece1Complete, $x1 . '-' . $y1);
                            $large1 --;
                        }else{
                            $y1 --;
                            array_push($piece1Complete, $x1 . '-' . $y1);
                            $large1 --;
                        }
                    break;
            }
        }
        //Obtengo las coordenadas del segundo rectangulo
        $piece2Complete = [$x2 . '-' . $y2];
        while($large2 > 1){
            switch ($orientation2){
                case 'h':
                        if($large2 > 0){
                            $x2 ++;
                            array_push($piece2Complete, $x2 . '-' . $y2);
                            $large2 --;
                        }else{
                            $x2 --;
                            array_push($piece2Complete, $x2 . '-' . $y2);
                            $large2 --;
                        }
                    break;
                case 'v':
                        if($large2 > 0){
                            $y2 ++;
                            array_push($piece2Complete, $x2 . '-' . $y2);
                            $large2 --;
                        }else{
                            $y2 --;
                            array_push($piece2Complete, $x2 . '-' . $y2);
                            $large2 --;
                        }
                    break;
            }
        }
        
        //Obtengo si colixionan o no y los preparo en string para renderizarlos
        $shock = array_intersect($piece1Complete, $piece2Complete);
        $shock = implode(",", $shock);
        $piece1Complete = implode(",", $piece1Complete);
        $piece2Complete = implode(",", $piece2Complete);

       

        //dd($shock ,$piece1Complete, $piece2Complete, $coordinates );
        return $this->render('tester/index.html.twig', [
            'shock' => $shock,
            'piece1Complete' => $piece1Complete,
            'piece2Complete' => $piece2Complete, 
            'coordinates' => $coordinates           
        ]);
        }catch(Exception $e){
            return new Response('Error: ' . $e->getMessage(), 500);
        }
       
    }
}
