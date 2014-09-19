<?php 

namespace Model\DbTable;

/**
 * Object / Relation Mapping
 * Objet ayant pour but de transformer les relations entre tables
 * - Clé étrangère
 * - Index
 */
class Users extends \Ip\DbTable
{
    
    /**
     * Nom de la table
     * @var string
     */
    protected $_name = 'users';

    /**
     * Clé primaire de la table
     * @var string
     */
    protected $_primary = 'id';

    
}