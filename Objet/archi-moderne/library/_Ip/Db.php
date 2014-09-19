<?php 


namespace Ip;

abstract class Db
{

        /**
         * @var string
         */
        private $dsn = 'mysql:dbname=project;host=127.0.0.1';

        /**
         * @var string
         */
        private $user = 'project';

        /**
         * @var string
         */
        private $password = '0000';

        /**
         * @var PDO
         */
        static protected $_dbConnect = NULL;


        public function __construct()
        {
            // On vérifie qu'une connexion est faite
            if (self::$_dbConnect === NULL) {
                try {
                    self::$_dbConnect = new \PDO($this->dsn, $this->user, $this->password);
                } catch (\PDOException $e) {
                    echo 'Connexion échouée : ' . $e->getMessage();
                }
            }
        }

        /**
         * Retourne la connexion à la BDD
         * @return \PDO
         */
        public function getDbConnect()
        {
            return self::$_dbConnect;
        }
        
}