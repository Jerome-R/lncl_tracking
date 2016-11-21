<?php

namespace AppBundle\Controller;


// src/OC/PlatformBundle/Controller/AdvertController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Tracking;
use AppBundle\Entity\Link;
use AppBundle\Entity\LinkClic;
use AppBundle\Entity\Unsuscribe;

use AppBundle\Form\UnsuscribeType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

// Annotaitonss :
// Pour gérer les autorisations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
// Pour gérer le ParamConverter et utiliser un entité en parametre à la place d'une simple variable
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class HomeController extends Controller
{

    /**
     * @ParamConverter("tracking", options={"mapping": {"tracking_id": "id"}})
     */
    public function openAction(Tracking $tracking, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $opens = $tracking->getOpens();

        $tracking->setOpensOnce(true);
        $tracking->setOpens( $opens + 1 );

        $em->flush();

        return new Response("");
    }

    /**
     * @ParamConverter("tracking", options={"mapping": {"tracking_id": "id"}})
     */
    public function clicAction(Tracking $tracking, $linkPrivateId, Request $request)
    {   
        $em = $this->getDoctrine()->getManager();        

        if($linkPrivateId == 100){
            $link       = $em->getRepository('AppBundle:Link')->findOneBy(array('idCampaignName' => null, 'privateId' => $linkPrivateId));
            $linkClic   = $em->getRepository('AppBundle:LinkCLic')->findOneBy(array('tracking' => $tracking, 'link' => $link->getId()));
        }
        else{
            $link       = $em->getRepository('AppBundle:Link')->findOneBy(array('idCampaignName' => $tracking->getIdCampaignName(), 'privateId' => $linkPrivateId));
            $linkClic   = $em->getRepository('AppBundle:LinkCLic')->findOneBy(array('tracking' => $tracking, 'link' => $link->getId()));
        }

        if( $linkClic == null ) {
            $linkClic = new LinkCLic();

            $linkClic->setTracking($tracking);
            $linkClic->setLink($link);

            $em->persist($linkClic);
            $em->flush();
        }

        $nbClics = $linkClic->getNbClics();

        $clics = $tracking->getClics();

        $tracking->setClicsOnce(true);
        $tracking->setClics( $clics + 1 );
        $linkClic->setNbClics( $nbClics + 1 );

        $em->flush();

        $url = $link->getUrl();
        
        if($linkPrivateId == 100)
            return $this->redirect( $this->generateUrl('app_desabo', array('tracking_id' => $tracking->getId())) );
        else
            return $this->redirect($url);    
    }        

    /**
     * @ParamConverter("tracking", options={"mapping": {"tracking_id": "id"}})
     */
    public function desaboAction(Tracking $tracking, Request $request)
    {   
        $em = $this->getDoctrine()->getManager();

        $form  =  $this->createForm(new UnsuscribeType());
        $form->handleRequest($request);

        $data = $form->getData();

        $unsuscribe =  $em->getRepository('AppBundle:Unsuscribe')->findOneBy( array('email' => $tracking->getEmail()) );

        if( $unsuscribe != null ){
            return $this->redirect($this->generateUrl( 'app_desabo_done', $unsuscribe->getId() ));
        }
       
        if ( $form->isSubmitted() && $form->isValid() ) {
            $unsuscribe = new Unsuscribe();
            $unsuscribe->setEmail($tracking->getEmail());
            $unsuscribe->setRaison($data->getRaison());

            $em->persist($unsuscribe);

            //persist inutile, Doctrine connait l'entité
            $em->flush();

            return $this->redirect($this->generateUrl( 'app_desabo_done', $unsuscribe->getId() ));
        }
        
        return $this->render('AppBundle:Home:desabo.html.twig', array(
            'tracking'      => $tracking,
            'form'          => $form->createView(),
            )
        );       
    }


    /**
     * @ParamConverter("unsuscribe", options={"mapping": {"unsuscribe_id": "id"}})
     */
    public function desaboDoneAction(Unsuscribe $unsuscribe, Request $request)
    {   
        return $this->render('AppBundle:Home:desabo_done.html.twig', array(
                'unsuscribe' => $unsuscribe
            )
        );       
    }
}
