<?php
//Dpendency Injection

require __DIR__ . '/vendor/autoload.php';  
   use Symfony\Component\DependencyInjection\ContainerBuilder; 
   use Symfony\Component\Config\FileLocator; 
   use Symfony\Component\DependencyInjection\Loader\YamlFileLoader; 
   use Symfony\Component\DependencyInjection\Reference;  
   
   class Greeter { 
      private $greetingText; 
      
      public function __construct($greetingText) {
         $this->greetingText = $greetingText; 
      }  
      public function greet($name) { 
         echo $this->greetingText . ", " . $name . "\r\n"; 
      } 
   }  
   class User { 
      private $greeter;  
      public $name; 
      public $age;  
      
      public function setGreeter(\Greeter $greeter) { 
         $this->greeter = $greeter; 
      }  
      public function greet() { 
         $this->greeter->greet($this->name); 
      } 
   }  
   $container = new ContainerBuilder(); 
   $container 
      ->register('greeter', 'Greeter') 
      ->addArgument('%greeter.text%');  
   $container 
      ->register('user', 'User') 
      ->addMethodCall('setGreeter', array(new Reference('greeter')));
   
   $container->setParameter('greeter.text', 'Hi'); 
   $greeter = $container->get('greeter'); 
   $greeter->greet('Jon'); 
   
   $user = $container->get('user'); 
   $user->name = "Jon"; 
   $user->age = 20; 
   $user->greet();  
   
   $yamlContainer = new ContainerBuilder(); 
   $loader = new YamlFileLoader($yamlContainer, new FileLocator(__DIR__)); 
   $loader->load('config/services.yaml');  

   $yamlHello = $yamlContainer->get('greeter'); 
   $yamlHello->greet('Jon'); 
   
   $yamlUser = $yamlContainer->get('user'); 
   $yamlUser->name = "Jon"; 
   $yamlUser->age = 25; 
   $yamlUser->greet();  