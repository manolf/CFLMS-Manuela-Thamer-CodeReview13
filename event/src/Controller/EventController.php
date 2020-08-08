<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Event;

class EventController extends Controller
{
   /**
    * @Route("/", name="home_page")
    */
   public function showAction()
   {
    $events = $this->getDoctrine()->getRepository('App:Event')->findAll();
     
    return $this->render('event/index.html.twig', array('events'=>$events));
   }


   /**
    * @Route("/create", name="create_page")
    */
   public function createAction(Request $request)
   {
    $event = new Event;

    $form = $this->createFormBuilder($event)->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   ->add('image', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))

   ->add('location', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   ->add('capacity', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   ->add('type', ChoiceType::class, array('choices'=>array('Alternative Rock'=>'Alternative Rock', 'Hard Rock'=>'Hard Rock', 'Industrial Metal'=>'Industrial Metal', 'Punk Rock' => 'Punk Rock', 'Volx Rock'=> 'Volx Rock'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
//    ->add('type', TextareaType::class, array('attr'=>array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
   ->add('email', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))

   ->add('phone', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   ->add('url', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))

   ->add('date', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))

->add('save', SubmitType::class, array('label'=> 'Create event', 'attr' => array('class'=> 'btn btn-success border-light', 'style'=>'margin-bottom:15px')))
   ->getForm();
   $form->handleRequest($request);


   if($form->isSubmitted() && $form->isValid()){

    $name = $form['name']->getData();
    $type = $form['type']->getData();
    $description = $form['description']->getData();
    $capacity = $form['capacity']->getData();
    $date = $form['date']->getData();
    $image = $form['image']->getData();
    $location = $form['location']->getData();
    $email = $form['email']->getData();
    $phone = $form['phone']->getData();
    $url = $form['url']->getData();
    
    // Here we will get the current date
    // $now = new\DateTime('now');

    $event->setName($name);
    $event->setType($type);
    $event->setDescription($description);
    $event->setCapacity($capacity);
    $event->setDate($date);
    $event->setImage($image);
    $event->setLocation($location);
    $event->setEmail($email);
    $event->setPhone($phone);
    $event->setUrl($url);

    $em = $this->getDoctrine()->getManager();
    $em->persist($event);
    $em->flush();
    $this->addFlash(
            'notice',
            'event Added'
            );
    return $this->redirectToRoute('home_page');
    }

   return  $this->render('event/create.html.twig', array('form' => $form->createView()));
   }

   /**
    * @Route("/edit/{id}", name="edit_page")
    */
   public function editAction($id, Request $request)
   {
    $event = $this->getDoctrine()->getRepository('App:Event')->find($id);

    $event->setName($event->getName());
    $event->setType($event->getType());
    $event->setDescription($event->getDescription());
    $event->setCapacity($event->getCapacity());
    $event->setDate($event->getDate());
    $event->setImage($event->getImage());
    $event->setLocation($event->getLocation());
    $event->setEmail($event->getEmail());
    $event->setPhone($event->getPhone());
    $event->setUrl($event->getUrl());
    

    $form = $this->createFormBuilder($event)
    ->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   ->add('image', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))

   ->add('location', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   ->add('capacity', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
//    ->add('type', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   ->add('type', ChoiceType::class, array('choices'=>array('Alternative Rock'=>'Alternative Rock', 'Hard Rock'=>'Hard Rock', 'Industrial Metal'=>'Industrial Metal', 'Punk Rock'=> 'Punk Rock','Volx Rock'=> 'Volx Rock'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
   ->add('email', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))

   ->add('phone', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   ->add('url', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))

   ->add('date', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
->add('save', SubmitType::class, array('label'=> 'Edit event', 'attr' => array('class'=> 'btn btn-secondary border-light', 'style'=>'margin-bottom:15px')))
       ->getForm();


       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           //fetching data
           $name = $form['name']->getData();
           $type = $form['type']->getData();
           $description = $form['description']->getData();
           $capacity = $form['capacity']->getData();
           $date = $form['date']->getData();
           $image = $form['image']->getData();
           $location = $form['location']->getData();
           $email = $form['email']->getData();
           $phone = $form['phone']->getData();
           $url = $form['url']->getData();
        
           $em = $this->getDoctrine()->getManager();
           $event = $em->getRepository('App:event')->find($id);

           $event->setName($name);
           $event->setType($type);
           $event->setDescription($description);
           $event->setCapacity($capacity);
           $event->setDate($date);
           $event->setImage($image);
           $event->setLocation($location);
           $event->setEmail($email);
           $event->setPhone($phone);
           $event->setUrl($url);
       
           $em->flush();
           $this->addFlash(
                   'notice',
                   'event Updated'
                   );
           return $this->redirectToRoute('home_page');
                }


       return  $this->render('event/edit.html.twig', array('event' => $event, 'form' => $form->createView()));
   }

   /**
    * @Route("/details/{id}", name="details_page")
    */
   public function detailsAction($id)
   {
    $event = $this->getDoctrine()->getRepository('App:Event')->find($id);
    return $this->render('event/details.html.twig', array('event' => $event));
   }


   /**
    * @Route("/delete/{id}", name="todo_delete")
    */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
   $event = $em->getRepository('App:Event')->find($id);
   $em->remove($event);
    $em->flush();
   $this->addFlash(
           'notice',
           'Event Removed'
           );
    return $this->redirectToRoute('home_page');
}


   /**
    * @Route("/filterhr/", name="filter_page1")
    */
    public function filterActionHardRock()
    {

        $type = 'Hard Rock';

        $events = $this->getDoctrine()->getRepository('App:Event')->findByType($type);
         
        return $this->render('event/filter.html.twig', array('events'=>$events));

       }

    /**
    * @Route("/filterpr/", name="filter_page2")
    */
    public function filterActionPunkRock()
    {

        $type = 'Punk Rock';

        $events = $this->getDoctrine()->getRepository('App:Event')->findByType($type);
         
        return $this->render('event/filter.html.twig', array('events'=>$events));

       }


    /**
    * @Route("/filterim/", name="filter_page3")
    */
    public function filterActionIndustrialMetal()
    {

        $type = 'Industrial Metal';

        $events = $this->getDoctrine()->getRepository('App:Event')->findByType($type);
         
        return $this->render('event/filter.html.twig', array('events'=>$events));

       }

    /**
    * @Route("/filterar/", name="filter_page4")
    */
    public function filterActionAlternativeRock()
    {

        $type = 'Alternative Rock';

        $events = $this->getDoctrine()->getRepository('App:Event')->findByType($type);
         
        return $this->render('event/filter.html.twig', array('events'=>$events));

       }

             /**
    * @Route("/filtervr/", name="filter_page5")
    */
    public function filterActionVolksRock()
    {

        $type = 'Volx Rock';

        $events = $this->getDoctrine()->getRepository('App:Event')->findByType($type);
         
        return $this->render('event/filter.html.twig', array('events'=>$events));

       }

   



    

}
