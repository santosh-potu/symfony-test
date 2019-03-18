<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController{
    
    /**
     *@Route("/lucky/number/{max}", name="app_lucky_number")
    */
    public function number($max){
        
        $number = random_int(0, $max);
        
        return $this->render('lucky/number.html.twig',['number'=>$number]);
           
    }
    public function letter(){
        
        $number = random_int(65, 90);
        
        return new Response(
            '<html><body>Lucky letter: '.chr($number).'</body></html>'
        );
    }
}

