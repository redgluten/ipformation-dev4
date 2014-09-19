<?php
namespace Ip;

abstract class Mappers {
    
    /**
     * Propriété contenant la connection à la BDD
     * @var \PDO
     */
    protected $_db;
    
    /**
     * Propriété contenant le DbTable utilisé par ce Mapper
     * @var \Model\DbTable\<Name>
     */
    protected $_dbTable;
    
    /**
     * Propriété du nom de l'objet DbTable lié à la classe Mapper
     * @var string
     */
    protected $_dbTableName;
    
    /**
     * Propriété du nom de l'objet Model lié à la classe Mapper
     * @var string
     */
    protected $_modelName;
    
    /**
     * Constructeur qui instancie le DbTable via la propriété $_dbTableName
     */
    public function __construct() {
        $this->_dbTable = new $this->_dbTableName();
        $this->_db = $this->_dbTable->getDbConnect();
    }
    
    /**
     * Retourne la connetion à la BDD
     * @return PDO
     */
    public function getDb(){
        return $this->_db;
    }
    
    /**
     * Convertit un Model en Array
     */
    abstract public function objectToRow($object);
    
    /**
     * Convertit un Array en Model
     */
    abstract public function rowToObject(array $row);
    
    public function fetch($where = array()){
        
        $whereString = NULL;
        $bindParams = array();
        if(is_array($where) && 0 != count($where)) {
            foreach ($where as $condition => $value) {
                if($whereString == NULL){
                    $whereString = ' WHERE ' . $condition;
                } else {
                    $whereString .= ' AND ' . $condition;
                }
                $bindParams[] = $value;
            }
        } elseif (is_string($where)) {
            $whereString = ' WHERE ' . $where;
        }
        
        $sth = $this->_db->prepare('SELECT * FROM ' . $this->_dbTable->getName() . $whereString . ' LIMIT 1;');
        
        $sth->execute($bindParams);
        
        $result = $sth->fetch();
        
        return $result;
    }
    
    /**
     * Recherche par rapport à la clé primaire
     * @param integer $primaryValue
     */
    public function find($primaryValue){
        $primaryValue = (int) $primaryValue;
        $where = array($this->_dbTable->getPrimary() . ' = ?' => $primaryValue);
    
        return $this->fetch($where);
    }
    
    public function save($objet) {
        
        // InstanceOf Model
        if(! $objet instanceof $this->_modelName) {
            throw new \Ip\Exception('Object invalid instance ' . $this->_modelName);
        }
        
        $primaryCols = $this->_dbTable->getPrimary();
        
        $row = $this->objectToRow($objet);
                
        if(isset($row[$primaryCols])) {
            //UPDATE
            $id = $this->update($row); 
        } else {
            //INSERT
            unset($row[$primaryCols]);
            $id = $this->insert($row);
        }
        return $this->find($id);
    }
    

    public function update($row) {

        $valueString = null;
        $whereString = null;
        $bindParams  = array();

        foreach ($row as $col => $value) {
            if ($col == $this->_dbTable->getPrimary()) {
                $whereString = ' WHERE ' . $col . ' = ?';
                $whereParam = $value;
            } else {
                $valueString = $col . ' = ?,';
                $bindParams[] = $value;
            }
        }

        $valueString  = rtrim($valueString, ',');
        $bindParams[] = $whereParam;
        
        $sth = $this->_db->prepare('UPDATE ' . $this->_dbTable->getName() . ' SET ' . $valueString . $whereString . ';');
        $sth->execute($bindParams);

        return $row[$this->_dbTable->getPrimary()];
    }
    
    public function insert($row) {

        if (isset($row['id'])) {
            unset($row['id']);
        }

        $valueString = null;
        $bindParams  = array();

        foreach ($row as $col => $value) {
            $valueString = $col . ' = ?,';
            $bindParams[] = $value; 
        }

        $valueString  = rtrim($valueString, ',');
        
        $sth = $this->_db->prepare('INSERT ' . $this->_dbTable->getName() . ' SET ' . $valueString . ';');
        $sth->execute($bindParams);

        return $this->_db->lastInsertId();
    }
    
}
    