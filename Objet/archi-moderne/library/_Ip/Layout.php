<?php 

namespace Ip;

class Layout
{
    /**
     * @var string
     */
    private $file;
    
    /**
     * @var string
     */
    private $layoutName;
    
    /**
     * @var string
     */
    private $content;
    
    /**
     * @var \Ip\View
     */
    private $view;
    
    /**
     * @var boolean
     */
    private $enabled = true;
    
    public function __construct(\Ip\View $view, $layoutName = 'layout')
    {
        $this->view = $view;
        $this->file = APP_PATH . DS . 'layouts' . DS . $layoutName . '.phtml';
        if (!file_exists($this->file)) {
            throw new \Ip\Exception\View('Layout file not found');
        }
    }
    
    public function render()
    {
        if ($this->enabled) {
            ob_start();
            $this->view->render();
            $this->content = ob_get_clean();
            require $this->file;
        } else {
            $this->view->render();
        }
    }
	/**
     * @return the $layoutName
     */
    public function getLayoutName()
    {
        return $this->layoutName;
    }

	/**
     * @param string $layoutName
     */
    public function setLayoutName($layoutName)
    {
        $this->layoutName = $layoutName;
        $this->file = APP_PATH . DS . 'layouts' . DS . $layoutName . '.phtml';
        return $this;
    }
    
    public function enable()
    {
        $this->enabled = true;
    }
    
    public function disable()
    {
        $this->enabled = false;
    }

}