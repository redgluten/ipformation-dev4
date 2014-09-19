<?php 
namespace Ip;

class Error
{
    /**
     * Custome exception handler
     * @param \Exception $e
     */
    public static function  handleException(\Exception $e)
    {
        echo 'Une exception a �t� g�n�r�e : <br />';
        echo $e->getMessage() . '<br />';
        echo '<pre>' . print_r($e->getTraceAsString(), true) . '</pre>';
    }
    
    /**
     * Custom error handler
     * @param int $errorCode
     * @param string $errorMessage
     */
    public static function handleError($errorCode, $errorMessage)
    {
        echo 'Une erreur a �t� rencontr�e : <br />';
        echo $errorMessage . '<br />';
    }
}