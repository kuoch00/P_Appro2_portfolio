
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page liste où tous les projets sont présentés
-->

<?php

class Database{
    public $pdo;

    /**
     * constructeur
     */
    function __construct()
    {
        include ('config.php');

        try{
            // dsn = data source name 
            $dsn = "mysql:host=" . $login["servername"] . "; dbname=" . $login["database"];
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

    /**
     * function that get the list of all projects that are not school work
     *
     * @return array
     */
    public function getProjectList()
    {
        $query = "SELECT * FROM t_category WHERE idCategory NOT LIKE '1'";
        $result = $this->querySimpleExecute($query);
        return $result;
    }

    public function getProjectDescription($catId)
    {
        $query = "SELECT t_category.catName, t_category.catDescription FROM t_category WHERE idCategory LIKE :catId";
        $binds = array(
            0 => array (
                'var' => $catId,
                'marker' => ':catId',
                'type' => PDO::PARAM_STR
            )
            );
        $result = $this->queryPrepareExecute($query, $binds);
        return $result;
        # code...
    }
    public function getSubcategoryList($catId)
    {
        # code...
        // $query = ("SELECT idSubCategory FROM t_image WHERE idCategory LIKE 2");
        // nom et total
        // SELECT t_subcategory.subName, COUNT(t_image.idSubCategory) as total FROM t_image INNER JOIN t_subcategory on t_image.idSubCategory = t_subcategory.idSubCategory WHERE t_image.idCategory LIKE 2 GROUP BY t_image.idSubCategory ORDER by total DESC
        
        // sans total 
        // SELECT t_subcategory.subName FROM t_image INNER JOIN t_subcategory on t_image.idSubCategory = t_subcategory.idSubCategory WHERE t_image.idCategory LIKE 2 GROUP BY t_image.idSubCategory ORDER by COUNT(t_image.idSubCategory) DESC 

        // avec id nom et total is good !!!
        // SELECT t_subcategory.idSubCategory, t_subcategory.subName, COUNT(t_image.idSubCategory) as total FROM t_image INNER JOIN t_subcategory on t_image.idSubCategory = t_subcategory.idSubCategory WHERE t_image.idCategory LIKE 2 GROUP BY t_image.idSubCategory ORDER by total DESC 

        //catId fixe donc pas bon mais celui ci fonctionne ?
        //$query = "SELECT t_subcategory.idSubCategory, t_subcategory.subName, COUNT(t_image.idSubCategory) as total FROM t_image INNER JOIN t_subcategory on t_image.idSubCategory = t_subcategory.idSubCategory WHERE t_image.idCategory LIKE 2 GROUP BY t_image.idSubCategory ORDER by total DESC ";

        //do not put catid=:catId but :catId simple
        //$query = "SELECT t_subcategory.idSubCategory, t_subcategory.subName, COUNT(t_image.idSubCategory) as total FROM t_image INNER JOIN t_subcategory on t_image.idSubCategory = t_subcategory.idSubCategory WHERE t_image.idCategory LIKE :catID GROUP BY t_image.idSubCategory ORDER by total DESC ";
        
        //get idCat, idSubCat, subName, total (entries in subcat per cat)
        //$query = "SELECT t_image.idCategory, t_subcategory.idSubCategory, t_subcategory.subName, COUNT(t_image.idSubCategory) as total FROM t_image INNER JOIN t_subcategory on t_image.idSubCategory = t_subcategory.idSubCategory WHERE t_image.idCategory GROUP BY t_image.idSubCategory ORDER by total DESC ";
        //working
        //$result = $this->querySimpleExecute($query);

        //get only subcat of a cat
        $query = "SELECT t_image.idCategory, t_subcategory.idSubCategory, t_subcategory.subName, COUNT(t_image.idSubCategory) as total FROM t_image INNER JOIN t_subcategory on t_image.idSubCategory = t_subcategory.idSubCategory WHERE t_image.idCategory LIKE :catId GROUP BY t_image.idSubCategory ORDER by total DESC ";

        //$query = "SELECT t_image.idCategory, t_subcategory.idSubCategory, t_subcategory.subName, COUNT(t_image.idSubCategory) as total FROM t_image INNER JOIN t_subcategory on t_image.idSubCategory = t_subcategory.idSubCategory WHERE t_image.idCategory LIKE :catId GROUP BY t_image.idSubCategory ORDER by total DESC ";
        $binds = array(
            0 => array(
                'var' => $catId,
                'marker' => ':catId',
                'type' => PDO::PARAM_STR
            )
        );

        $result = $this->queryPrepareExecute($query, $binds);

        return $result;

    }
}

?>