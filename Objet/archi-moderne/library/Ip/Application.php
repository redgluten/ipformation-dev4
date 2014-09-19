<?php 
namespace Ip;

class Application
{
    /**
     * @var string
     */
    private $environment;
    /**
     * @var \Ip\Request
     */
    private $request;
    /**
     * @var \Ip\Response
     */
    private $response;
   
    /**
     * @param string $environment (development|testing|production)
     * @throws InvalidArgumentException on invalid environment
     */
    public function __construct($environment = 'production')
    {
        $allowedEnvs = array('development', 'testing', 'production');
        if (!in_array($environment, $allowedEnvs)) {
            throw new \InvalidArgumentException('unknown value for environment');
        }
        $this->environment = $environment;   
        $this->request = new \Ip\Request; 
        $this->response = new \Ip\Response;
    }
    
    public function run()
    {
        $this->init();
        $this->route(); 
        $this->dispatch();
        $this->sendResponse();
    }
    
    private function init()
    {
        if ('development' !== $this->environment) {
            ini_set('display_errors', 0);
        }
    }
    
    public function route()
    {
        $uri = $this->request->getUri();
        $path = parse_url($uri, PHP_URL_PATH);
        $controller = $path == '' ? 'index' : $path;
        $this->request->setController($controller);
    }
    
    public function dispatch()
    {
        $controllerName = ucfirst($this->request->getController()) . 'Controller';
        $controllerFile = APP_PATH . DS . 'controllers' . DS . $controllerName . '.php';
        
        if (!file_exists($controllerFile)) {
            $this->response->setCode(404);
            $controllerName = 'ErrorController';
            $controllerFile = APP_PATH . DS . 'controllers' . DS . $controllerName . '.php';
            $this->request->setController('error');
        }
        require_once $controllerFile;
        $controllerClass = '\App\Controller\\' . $controllerName;
        $controller = new $controllerClass($this->request);
        ob_start();
        $controller->run();
        $this->response->setBody(ob_get_clean());
    }
    
    public function sendResponse()
    {
        header('HTTP/1.1 ' . $this->response->getCode() . ' ' . \Ip\Response::$httpCodes[$this->response->getCode()]);
        foreach($this->response->getHeaders() as $header)
        {
            header($header);
        }
        echo $this->response->getBody();
    }
}