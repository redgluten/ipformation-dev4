<?php 

namespace Ip;

class DbTable extends \Ip\Db
{   
    /**
     * Nom de la table
     * @var string
     */
    protected $_name;


    /**
     * Clé primaire
     * @var int
     */
    protected $_primary;



    /**
     * Gets the value of _name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * Gets the value of _primary.
     *
     * @return int
     */
    public function getPrimary()
    {
        return $this->_primary;
    }
}