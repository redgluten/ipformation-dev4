<?php
namespace Ip;

abstract class DbTable extends \Ip\Db {
    
    /**
     * Nom de la table
     * @var string
     */
    protected $_name;
    
    /**
     * Clé primaire
     * @var string
     */
    protected $_primary;
    
	/**
     * @return the $_name
     */
    public function getName()
    {
        return $this->_name;
    }

	/**
     * @return the $_primary
     */
    public function getPrimary()
    {
        return $this->_primary;
    }

    
}