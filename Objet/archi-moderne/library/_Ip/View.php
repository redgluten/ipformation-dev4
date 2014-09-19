<?php 

namespace Ip;

class View
{
    /**
     * @var unknown
     */
    private $file;
    
    public function __construct($controllerName)
    {
        $this->file = APP_PATH . DS . 'views' . DS . $controllerName . '.phtml';
        if (!file_exists($this->file)) {
            throw new \Ip\Exception\View('View file not found');
        }
    }
    
    public function render()
    {
        require $this->file;
    }
}