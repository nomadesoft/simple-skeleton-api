<?php

namespace App\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends Controller
{
   
    public function indexAction(Request $request, Application $app)
    {
        return new JsonResponse(['data' => 'Hello!']);
    }

    public function helloAction(Request $request, Application $app) 
    {
        $name = $request->attributes->get('name');

        return new JsonResponse(['data' => $name]);
    }
}
