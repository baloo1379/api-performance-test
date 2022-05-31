<?php

namespace App\Controller;

use App\WSDL\DataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


define('WSDL_FILE', '../src/WSDL/service.wsdl');

/**
 * @Route("/soap")
 */
class SoapController extends AbstractController
{
    /**
     * @Route("/wsdl", name="wsdl", methods={"GET","HEAD"})
     */
    public function wsdl(): Response
    {
        return new Response(file_get_contents(WSDL_FILE), 200, array(
                'Content-type' => 'text/xml; charset=ISO-8859-1',
            )
        );
    }

    /**
     * @Route("/", name="soap", methods={"POST"})
     */
    public function soap(DataService $dataService): Response
    {
        $soapServer = new \SoapServer(WSDL_FILE, array('encoding' => 'UTF-8'));
        $soapServer->setObject($dataService);

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=UTF-8');

        ob_start();
        $soapServer->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }


}
