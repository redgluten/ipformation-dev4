<?php 
namespace App\Controller;

class IndexController extends \Ip\Controller
{

    public function run()
    {
        $this->layout->disable();
        $this->view->test = 'Index';
    }
}