<?php

namespace Ip;

abstract class Db {
    
    private $dsn = 'mysql:dbname=project;host=127.0.0.1';
    private $username = 'project';
    private $passwd = '0000';
    
    static protected $_dbConnect = NULL;
    
    public function __construct(){
        if (self::$_dbConnect === NULL){
            try {
                self::$_dbConnect = new \PDO($this->dsn, $this->username, $this->passwd);
            } catch (\PDOException $e){
                echo 'Connexion échouée : ' . $e->getMessage();
            }
        }
    }
    
    /**
     * Retourne la connection à la BDD
     * @return \PDO
     */
    public function getDbConnect(){
        return self::$_dbConnect;
    }
    
	/**
     * @return the $dsn
     */
    public function getDsn()
    {
        return $this->dsn;
    }

	/**
     * @return the $username
     */
    public function getUsername()
    {
        return $this->username;
    }

	/**
     * @return the $passwd
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

	/**
     * @param string $dsn
     */
    public function setDsn($dsn)
    {
        $this->dsn = $dsn;
        return $this;
    }

	/**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

	/**
     * @param string $passwd
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
        return $this;
    }

    
    
    
}