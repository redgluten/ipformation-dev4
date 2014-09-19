<?php

namespace Model;

/**
 * Représentation objet d'un enregristrement en BDD
 * En BDD les relations seront converties en liste d'objet dans le Model,
 * une ligne de table sera convertie en un objet Model,
 * un champ de base de donnée correspond à une propriété d'objet du Model
 */
class User {


    // Définition des colonnes d'une table 
    // et des relaions avec d'autres tables

    /**
     * @var integer
     */
    protected $_id;

    /**
     * @var string
     */
    protected $_name;

    /**
     * Gets the value of _id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * Sets the value of _id.
     *
     * @param int $_id the  id 
     *
     * @return self
     */
    public function setId($id)
    {
        $this->_id = $id;

        return $this;
    }

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
     * Sets the value of _name.
     *
     * @param string $_name the  name 
     *
     * @return self
     */
    public function setName($name)
    {
        $this->_name = $name;

        return $this;
    }
}