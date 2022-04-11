
<!-- 
auteur : Elisa Kuoch
date de création : 22.03.2022
description : page liste où tous les projets sont présentés
-->

<?php
header("Content-Type: text/html;charset=UTF-8");
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
        //deja erreur ici
        //var_dump($result);
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
        $query = "SELECT t_image.idCategory, t_subcategory.idSubCategory, t_subcategory.subName, 
        COUNT(t_image.idSubCategory) as total FROM t_image 
        INNER JOIN t_subcategory on t_image.idSubCategory = t_subcategory.idSubCategory 
        WHERE t_image.idCategory LIKE :catId 
        GROUP BY t_image.idSubCategory ORDER by total DESC ";

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

    public function getGallery($catId, $subcatId)
    {
        $query = "SELECT * FROM `t_image` WHERE `idCategory` = :catId AND `idSubCategory` = :subcatId  ORDER BY `t_image`.`idImage` DESC";
        $binds = array (
            0 => array (
                'var' => $catId,
                'marker' => ':catId',
                'type' => PDO::PARAM_STR
            ),
            1 => array (
                'var' => $subcatId,
                'marker' => ':subcatId',
                'type' => PDO::PARAM_STR
            )
        );
        $result = $this->queryPrepareExecute($query, $binds);
        return $result;
    }

    public function getProducts()
    {
        $query = "SELECT * FROM `t_article` ";
        $result = $this->querySimpleExecute($query);
        return $result;
        # code...
    }
    public function getCartProducts($array)
    {
        //array not work??
        
        foreach($array as $row){
            $query = "SELECT * FROM `t_article` WHERE `idArticle` = :artId";
            $binds = array(
                0 => array (
                    'var' => $row['artId'],
                    'marker' => ':artId',
                    'type' => PDO::PARAM_STR
                )
            );
            $result[] = $this->queryPrepareExecute($query, $binds);
            // $finalArray[] = $result;
        }
        return $result;
        # code...
    }

    /**
     * Checks if username exists then if password is correct
     *
     * @param [string] $username
     * @param [string] $password
     * @return bool
     */
    public function CheckUser($username, $password)
    {
        $userInfo = $this->CheckIfUserExists($username);
        //if pas vide = existe
        if(count($userInfo)!=0){
            if($checkPassword = $this->CheckPassword($userInfo[0]['cliPassword'], $password)==true){
                // echo "Successfully connected";
                return true;
            }
            else{
                // echo "password wrong";
                return false;
            }
        }
        else{
            // echo "Email address wrong";
            return false;
        }
    }

    public function CheckIfUserExists($username)
    {
        $query = "SELECT * FROM `t_client` WHERE `cliEmailAddress` = :username";
        
        $binds = array(
            0=> array(
                'var' => $username,
                'marker' => ':username',
                'type' => PDO::PARAM_STR
            )
        );

        $result = $this->queryPrepareExecute($query, $binds);
        return $result;
        # code...
    }

    public function CheckPassword($cliPassword, $inputPassword)
    {
        return password_verify($inputPassword, $cliPassword);
    }

    public function checkEmailAddress($email)
    {
        $query ="SELECT cliEmailAddress FROM `t_client` WHERE cliEmailAddress LIKE :email ";
        $binds = array( 
            0 => array(
                'var' => $email,
                'marker' => ':email',
                'type' => PDO::PARAM_STR
                )
            );
           $result = $this->queryPrepareExecute($query, $binds);
        if(count($result)>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function createAccount($username, $password)
    {
        echo $username . " : " . $password;
        // $query = "INSERT INTO t_client ( cliPassword, cliFirstName, cliLastName, cliAddress, cliPostalCode, cliCity, cliState, cliCountry, cliPhoneNumber, cliEmailAddress) VALUES (':password', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ':username') ";
        $query = 'INSERT INTO t_client SET '
       
        $binds = array(
            0 => array(
                'var' => $username,
                'marker' => ':username',
                'type' => PDO::PARAM_STR
            ),
            1 => array(
                'var' => $password,
                'marker' => ':password',
                'type' => PDO::PARAM_STR
            )
        );

        $result = $this->queryPrepareExecute($query,$binds);
        return $result;
        # code...
    }
}

?>