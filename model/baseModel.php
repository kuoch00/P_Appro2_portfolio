<?php
class BaseModel
{
    /**
     * constructeur
     */
    function __construct()
    {
        include ('config.php');

        try{
            // dsn = data source name 
            $dsn = "mysql:host=" . $login["servername"] . "; dbname=" . $login["database"] . "; charset=utf8" ;
            $this->pdo=new PDO($dsn, $login['username'], $login['password']);

            //Activer le mode exeption du pdo
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        // message d'erreur si connection ratée
        catch (PDOException $exeption){
            echo "Impossible de se connecter à la base de données. Code d'erreur : \n";
            echo $exeption->getMessage(); 
        }
        
    }

    /**
     * permet de préparer et d’exécuter une requête de type simple (sans where)
     *
     * @param string $query
     * @return array
     */
    private function querySimpleExecute($query)
    {
        $req = $this->pdo->query($query);
        $arrayData = $this->formatData($req);
        $this->unsetData($req);
        return $arrayData;
    }

    /**
     * permet de préparer, de binder et d’exécuter une requête (select avec where ou insert, update et delete)
     *
     * @param string $query
     * @param array $binds
     * @return array
     */
    private function queryPrepareExecute($query, $binds)
    {
        $req = $this->pdo->prepare($query);

        foreach($binds as $bind)
        {
            $req->bindValue($bind['marker'], $bind['var'], $bind['type']);
        }
        $req->execute();

        $dataArray = $this->formatData($req);

        $this->unsetData($req);

        return $dataArray;
    }


    /**
    * traiter les données pour les retourner par exemple en tableau associatif 
    * (avec PDO::FETCH_ASSOC)
    *
    *@param PDOStatement $req 
    */
    private function formatData($req)
    {
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
    * vide le jeu d’enregistrement
    *
    *@param $req
    *@return void
    */
    private function unsetData($req)
    {
        $req->closeCursor();
    }

}


?>