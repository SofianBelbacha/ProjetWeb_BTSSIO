<?php 
//require_once '../../configs/mysql_config.class.php';

class ModelePDO { 
    
    // <editor-fold defaultstate="collapsed" desc="région attribut">
    //Attributs utiles pour la connexion
    /**
     * @var string $serveur Le nom du serveur MySQL.
     */
    protected static $serveur = MySqlConfig::SERVEUR;

    /**
     * @var string $base Le nom de la base de données MySQL.
     */
    protected static $base = MySqlConfig::BASE;

    /**
     * @var string $utilisateur Le nom de l'utilisateur MySQL.
     */
    protected static $utilisateur = MySqlConfig::UTILISATEUR;

    /**
     * Attributs utiles pour la manipulation PDO de la base de données.
     */

    /**
     * @var string $passe Le mot de passe de l'utilisateur MySQL.
     */
    protected static $passe = MySqlConfig::MOT_DE_PASSE;

    /**
     * @var PDO|null $pdoCnxBase La connexion PDO à la base de données.
     */
    protected static $pdoCnxBase = null;

    /**
     * @var PDOStatement|null $pdoStResults Le résultat de la requête PDO.
     */
    protected static $pdoStResults = null;

    /**
     * @var string $requete La requête SQL à exécuter.
     */
    protected static $requete = "";

    /**
     * @var mixed|null $resultat Le résultat de la requête SQL.
     */
    protected static $resultat = null;    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="région fonction">
    protected static function seConnecter() {
        if (!isset(self::$pdoCnxBase)) { //S'il n'y a pas encore eu de connexion
            try {
                self::$pdoCnxBase = new PDO('mysql:host=' . self::$serveur . ';dbname=' . self::$base, self::$utilisateur,
                        self::$passe);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$pdoCnxBase->query("SET CHARACTER SET utf8"); //méthode de la classe PDO
            } catch (Exception $e) {
                echo 'Erreur : ' . $e->getMessage() . '<br />'; // méthode de la classe Exception
                echo 'Code : ' . $e->getCode(); // méthode de la classe Exception
            }
        }
    }
    
    protected static function executeQuery($query) {
        self::seConnecter();

        self::$pdoStResults = self::$pdoCnxBase->prepare($query);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch(PDO::FETCH_ASSOC);

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }
    
        public static function getLesTuplesByTable($table){
        self::seConnecter();
        self:: $requete = "SELECT * from $table";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll(PDO::FETCH_OBJ);

        self::$pdoStResults->closeCursor();

        return self::$resultat;
        
    }
    
    protected static function getLeTupleTableById($Table,$Id){
        self::seConnecter();
        self::$requete = "SELECT * FROM $Table  where $Id
            = :idTable";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idTable', $Id);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        
        self::$pdoStResults->closeCursor();
        
        return self::$resultat;

    }
    
    protected static function getPremierTupleByChamp($table, $nomChamp, $valeurChamp) {
        self::seConnecter();
        self::$requete = "SELECT * FROM " . $table . " WHERE " . $nomChamp . " = :valeurChamp";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue(':valeurChamp', $valeurChamp);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat; //un seul tuple retourné : utilisation de fetch()
    }
    
    protected static function getNbTuples($table, $valeurChamp) {
        self::seConnecter();
        self::$requete = "SELECT Count(*) as nbResultats FROM " . $table . " WHERE login like '".$valeurChamp."';";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat->nbResultats; //un seul tuple retourné : utilisation de fetch()
    }
    
    public static function select($champs, $tables, $conditions = null){
        self::seConnecter();
        self::$requete = "SELECT $champs FROM $tables";
        if (!empty($conditions)) {
            self::$requete .= " WHERE $conditions";
        }
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll(PDO::FETCH_ASSOC);
        self::$pdoStResults->closeCursor();
        return self::$resultat; //un seul tuple retourné : utilisation de fetch()
    }
    
    protected static function selectNb($champs, $tables, $conditions = null){
        self::seConnecter();
        self::$requete = "SELECT $champs FROM $tables";
        if (!empty($conditions)) {
            self::$requete .= " WHERE $conditions";
        }
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat; //un seul tuple retourné : utilisation de fetch()
    }
    
        protected static function seDeconnecter() {
        self::$pdoCnxBase = null;
    }
    
    public static function isAdminOK($login,$passe) {
        self::seConnecter();
        self::$requete = "SELECT * FROM utilisateur where login=:login and passe=:passe";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('passe', sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        if ((self::$resultat!=null) and (self::$resultat->isAdmin))
            return true;
        else
            return false;
    }
    public static function isUserOK($login,$passe) {
        self::seConnecter();
        self::$requete = "SELECT * FROM utilisateur where login=:pseudo and passe=:passe";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('pseudo', $login);
        self::$pdoStResults->bindValue('passe', sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        if ((self::$resultat!=null))
            return true;
        else
            return false;
    }
    
    /**
    * Retourne le nom des attriuts d'une table.
    * @param string $table nom de la table.
    * @return object les attributs de la table.
    */
    public static function getNomChampsByTable($table) {
        self::seConnecter();
        self::$requete = "DESCRIBE " . $table;
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }
    
    /**
    * Fonction permettant d'effectuer une requête delete.
    * @param type $table Nom de la table.
    * @param type $conditions Les conditions.
    */
    public static function requeteDelete($table, $conditions) {
        self::seConnecter();
        self::$requete = "DELETE FROM " . $table . " WHERE " . $conditions;
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
    }
    
    public static function getMaxIdTable($table, $champ) {
        self::seConnecter();
        self::$requete = "SELECT MAX($champ) as pkMax FROM $table";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return (self::$resultat->pkMax);
    }


// </editor-fold>


}
?>
