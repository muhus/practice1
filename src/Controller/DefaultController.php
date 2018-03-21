<?php
/**
 * Created by PhpStorm.
 * User: Користувач
 * Date: 14.03.2018
 * Time: 20:31
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends Controller
{
    /**
     * @Route ("/", name="index")
     */
    public function index()
    {
        return $this->render('data/index.html.twig');
    }
}
