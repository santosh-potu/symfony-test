<?php  
namespace App\Controller; 

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Component\HttpFoundation\Response;  

class BooksController extends Controller { 
   /** 
      * @Route("/books/author") 
   */ 
   public function authorAction() { 
      return $this->render('books/author.html.twig'); 
   } 
}