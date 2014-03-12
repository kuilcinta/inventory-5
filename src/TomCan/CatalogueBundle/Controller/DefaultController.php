<?php

namespace TomCan\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TomCan\CatalogueBundle\Entity\Company;
use TomCan\CatalogueBundle\Form\CompanyType;

/**
 * Company controller.
 *
 */
class DefaultController extends Controller
{

    public function indexAction()
    {

        return $this->render('CatalogueBundle:Default:index.html.twig');

    }

}
