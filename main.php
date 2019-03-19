<?php
require __DIR__ . '/vendor/autoload.php'; 
   use Symfony\Component\Console\Application; 
   use Symfony\Component\Console\Command\Command; 
   use Symfony\Component\Console\Input\InputInterface; 
   use Symfony\Component\Console\Output\OutputInterface; 
   use Symfony\Component\Console\Input\InputArgument;  
   
   class HelloCommand extends Command { 
      protected function configure() { 
         $this 
            ->setName('app:hello') 
            ->setDescription('Sample command, hello') 
            ->setHelp('This command is a sample command') 
            ->addArgument('name', InputArgument::REQUIRED, 'name of the user'); 
      }  
      protected function execute(InputInterface $input, OutputInterface $output) { 
         $name = $input->getArgument('name'); 
         $output->writeln('Hello, ' . $name);
      }  
       
   }     
   
   $app = new Application(); 
      $app->add(new HelloCommand()); 
      $app->run();