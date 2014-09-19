<?php 
namespace App\Controller;

require_once APP_PATH . "/models/mappers/Users.php";
require_once APP_PATH . "/models/User.php";

class TestController extends \Ip\Controller
{

    public function run()
    {
        $this->layout->setLayoutName('bootstrap');
        $this->layout->headTitle = 'Test';

        $mapperUser = new \Model\Mappers\Users();
        $userFind = $mapperUser->find(2);
        $this->view->userFind = $userFind;

        $userSave = $mapperUser->find(2);
        $userSave->setName('Test_' . time());
        $userSave = $mapperUser->save($userSave);
        $this->view->userSave = $userSave;

        $userCreate = new \Model\User();
        $userCreate->setName('Insertion');

        $userInsert = $mapperUser->save($userCreate);
        $this->view->userInsert = $userInsert;

        $this->view->test = 'Test';
    }
}