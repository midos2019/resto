<?php
/**
 * Created by PhpStorm.
 * User: MohamedAli
 * Date: 07/08/2019
 * Time: 13:55
 */

namespace App\Index\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Index extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        ### PHP write_ini_file function to use with parse_ini_file: (choose one of the two example arrays below...)
        $array = array('category' => array('color' => 'blue', 'size' => 'large'),"test"=>"azerty");
// $array = array('color' => 'red', 'size' => 'small');
        $file ='./data1.ini';
        //      $this->write_ini_file($array,$file);
//$readData = parse_ini_file($file,true);
//dump($readData["test"]).die;


        return $this->render('@Index/index.html.twig');
    }
}