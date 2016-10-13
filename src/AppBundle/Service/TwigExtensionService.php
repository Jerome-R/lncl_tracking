<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

use Application\Sonata\UserBundle\Entity\User;

class TwigExtensionService extends \Twig_Extension
{	


	public function __construct(EntityManager $entityManager)
	{
		$this->em 		= $entityManager;
	}

    public function roundLetter($value){
        if ($value > 999 && $value <= 999999) {
            $result = floor($value / 1000) . ' K';
        } elseif ($value > 999999) {
            $result = floor($value / 1000000) . ' M';
        } else {
            $result = $value;
        }

        return $result;
    }

	//Get month Wording for Kpis
    public function getMonthWording($month, $perso = null) {

        switch ( $month ) {
            case '12':
                $monthWording = $perso." Décembre";
            break;
            case '01':
                $monthWording = $perso." Janvier";
            break;
            case '02':
                $monthWording = $perso." Février";
            break;
            case '03':
                $monthWording = $perso." Mars";
            break;
            case '04':
                if($perso == "de ") $perso = "d'";
                $monthWording = $perso." Avril";
            break;
            case '05':
                $monthWording = $perso." Mai";
            break;
            case '06':
                $monthWording = $perso." Juin";
            break;
            case '07':
                $monthWording = $perso." Juillet";
            break;
            case '08':
                if($perso == "de ") $perso = "d'";
                $monthWording = $perso." Août";
            break;
            case '09':
                $monthWording = $perso." Septembre";
            break;
            case '10':
                if($perso == "de ") $perso = "d'";
                $monthWording = $perso." Octobre";
            break;
            case '11':
                $monthWording = $perso." Novembre";
            break;          
            default:
                $monthWording = "";
            break;
        }

        return $monthWording;
    }

    public function deleteFirstCharacters($word, $nb)
    {
        return substr($word, $nb);
    }
	
	public function getFunctions()
	{	
		return array(
          'getMonthWording' => new \Twig_Function_Method($this, 'getMonthWording'),
          'roundLetter'     => new \Twig_Function_Method($this, 'roundLetter'),
          'deleteFirstCharacters' => new \Twig_Function_Method($this, 'deleteFirstCharacters'),
		);
	}

	public function getName()
	{
		return 'TwigExtensionService';
	}
}