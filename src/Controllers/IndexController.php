<?php

namespace App\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * IndexController
 *
 * @category  Controllers
 * @package   Controllers
 * @author    Jesus Farfan <jesu.farfan23@gmail.com>
 * @copyright Jesus Farfan
 * @license   MIT 
 * @link      https://github.com/jesusfar
 */
class IndexController extends Controller
{

    /**
     * IndexAction
     *
     * @param Request     $request Request object inyected
     * @param Application $ap      App object inyected
     *
     * @return JsonResponse
     */
    public function indexAction(Request $request, Application $app)
    {
        return new JsonResponse(['payload' => 'Hello!']);
    }

    /**
     * helloAction
     *
     * Example action controller
     *
     * @param Request     $request Request object inyected
     * @param Application $ap      App object inyected
     *
     * @return JsonResponse
     */
    public function helloAction(Request $request, Application $app) 
    {
        $name = $request->attributes->get('name');

        return new JsonResponse(['payload' => $name]);
    }
}
