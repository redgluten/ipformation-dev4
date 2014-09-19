<?php 

namespace Model\Mappers;

require_once APP_PATH . '/models/DbTable/Users.php';
require_once APP_PATH . '/models/User.php';


/**
 * Met à disposition les méthodes basiques utilisés
 * sur une base de données tels que :
 * CRUD sur un objet (Create Read Update Delete)
 * Méthode Fetch qui recherche par rapport à un WHERE spécifique
 * Méthode FetchAll qui recherche tous les éléments
 * Méthode Find qui recherche par rapport à la clé primaire
 */
class Users extends \Ip\Mappers
{

    protected $_dbTableName = '\Model\DbTable\Users';

    protected $_modelName = '\Model\User';


    /**
     * Convertit un Model en Array
     * @todo Vérifier l'instance de l'object
     * @param \Model\User $object
     * @return array
     */
    public function objectToRow($object)
    {

        if (!$object instanceof \Model\User) {
           throw new \Ip\Exception('Object invalid instance \Model\User');
        }

        $row = array(
            'id'   => $object->getId(),
            'name' => $object->getName()
        );

        return $row;
    }

    /**
     * Convertit un array en Model
     * @param array
     * @return \Model\User
     */
    public function rowToObject(array $row)
    {
        $object = new \Model\User();

        $object->setId($row['id'])->setName($row['name']);

        return $object;
    }

    /**
     * Recherche un élément par rapport à une condition (WHERE)
     * @todo Rendre la méthode dynamique
     * @param string $where
     * @return \Model\User
     */
    public function fetch($where = array())
    {

        $result = parent::fetch($where);

        if ($result == NULL) {
            return false;
        } else {
            return $this->rowToObject($result);
        }
    }
}