<?php 

namespace Ip;

abstract class Controller
{
    /**
     * @var \Ip\Request
     */
    protected $request;
    
    /**
     * @var \Ip\View
     */
    protected $view;
    
    /**
     * @var \Ip\Layout
     */
    protected $layout;
    
    public function __construct(\Ip\Request $request)
    {
        $this->request = $request;
        $this->view = new \Ip\View($this->request->getController());
        $this->layout = new \Ip\Layout($this->view);
    }
    
    abstract public function run();
	/**
     * @return the $request
     */
    
    public function getRequest()
    {
        return $this->request;
    }
    
    public function __destruct()
    {
        $this->layout->render();
    }

}