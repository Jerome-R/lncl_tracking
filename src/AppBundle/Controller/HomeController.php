<?php

namespace AppBundle\Controller;


// src/OC/PlatformBundle/Controller/AdvertController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Tracking;
use AppBundle\Entity\Unsuscribe;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

// Annotaitonss :
// Pour gérer les autorisations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
// Pour gérer le ParamConverter et utiliser un entité en parametre à la place d'une simple variable
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class HomeController extends Controller
{
    public function redirectAction($idClientInterne, $, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository('AppBundle:Client')->findOneBy(array('hash' => $hash));

        if ($client == null) {
            $client = new Client();
            $client->setHash($hash);

            $em->persist($client);
            $em->flush();

            $form = $this->createForm(new ClientType());
        }
        else{
            $client->setLastVisitAt(new \DateTime());            
            $em->flush();

            $form = $this->createForm(new ClientType(), $client);
        }

        $form->handleRequest($request);

        $data = $form->getData();

        if ( $request->getMethod() == 'POST' || $request->isXmlHttpRequest() ) {
            $client->setQuestion1($data->getQuestion1());
            $client->setQuestion2($data->getQuestion2());
            $client->setQuestion3($data->getQuestion3());
            $client->setQuestion4($data->getQuestion4());
            $client->setQuestion5($data->getQuestion5());
            $client->setCommentaire1($data->getCommentaire1());
            $client->setCommentaire2($data->getCommentaire2());
            $client->setCommentaire3($data->getCommentaire3());
            $client->setCommentaire4($data->getCommentaire4());
            $client->setCommentaire5($data->getCommentaire5());

            $em->flush();

            if($request->getMethod() == 'POST'){
                return $this->render('AppBundle:Home:merci.html.twig', array(
                    )
                );
            }
        }

        return $this->render('AppBundle:Home:index.html.twig', array(
            'client' => $client,
            'form'   => $form->createView()
            )
        );        
    }
}
