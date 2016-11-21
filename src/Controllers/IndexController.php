<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * 
 */
class IndexController extends Controller
{
   
    public function indexAction()
    {
        return new JsonResponse(['data' => 'Hello!']);
    }

    public function helloAction($name) {
        return new JsonResponse(['data' => $name]);
    }
}
