<?php 
namespace Ip;

class Request
{
    /**
     * @var string
     */
    private $uri;
    /**
     * @var string
     */
    private $method;
    /**
     * @var array
     */
    private $params = array();
    
    /**
     * @var string
     */
    private $controller;
    
    public function __construct()
    {
        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->params = $_REQUEST;
    }
	/**
     * @return the $uri
     */
    public function getUri()
    {
        return $this->uri;
    }

	/**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

	/**
     * @return the $method
     */
    public function getMethod()
    {
        return $this->method;
    }

	/**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

	/**
     * @return the $params
     */
    public function getParams()
    {
        return $this->params;
    }

	/**
     * @param multitype: $params
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }
	/**
     * @return the $controller
     */
    public function getController()
    {
        return $this->controller;
    }

	/**
     * @param string $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }


}