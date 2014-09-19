<?php 
namespace Ip;

class Response
{
    /**
     * @var int
     */
    private $code = 200;
    /**
     * @var array
     */
    private $headers = array();
    /**
     * @var string
     */
    private $body;
    
    /**
     * @var array
     */
    public static $httpCodes = array(
        200 => 'OK',
        301 => 'Moved Permanently',
        302 => 'Found',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error'
    );
	/**
     * @return the $code
     */
    public function getCode()
    {
        return $this->code;
    }

	/**
     * @param number $code
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

	/**
     * @return the $headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

	/**
     * @param multitype: $headers
     */
    public function addHeader($header)
    {
        $this->headers[] = $header;
        return $this;
    }

	/**
     * @return the $body
     */
    public function getBody()
    {
        return $this->body;
    }

	/**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

}