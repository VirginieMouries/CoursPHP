    <?php
    class DB
    {
        private static $_bdd;
        private static $_Host = 'localhost';
        private static $_DbName = 'cms';
        private static $_Pseudo = 'root';
        private static $_Mdp = '';
        public static function getDB() {
            if(is_null(self::$_bdd)) {
                try {   
                    self::$_bdd = new PDO('mysql:host='.self::$_Host.';charset=utf8;dbname='.self::$_DbName, self::$_Pseudo, self::$_Mdp);
                }
                catch(PDOException $e) {
                    die('<h3>Une erreur est survenue lors du chargement de la page. Veuillez essayer d\'actualiser la page, ou revenir plus tard. Merci.</h3>');
                }
            }   // END if_null
            return self::$_bdd;
        }
    }   // END class
    ?>