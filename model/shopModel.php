<?php
header("Content-Type: text/html;charset=UTF-8");
include_once 'BaseModel.php';
class ShopModel extends BaseModel
{
    /**
     * liste tous les articles
     *
     * @return array
     */
    public function getProducts()
    {
        $query = "SELECT * FROM `t_article` ";
        $result = $this->querySimpleExecute($query);
        return $result; 
    }

    public function getProduct($id)
    {
        $query = "SELECT * FROM `t_article` WHERE `idArticle` = :id";
        $binds=array(
            0=>array(
                'var'=> $id,
                'marker'=> ':id',
                'type'=> PDO::PARAM_STR
            )
            );
        $result = $this->queryPrepareExecute($query, $binds);
        return $result; 
    }

    /**
     * liste des produits du cart correspondant aux id saved
     * 
     * @param [type] $array
     * @return array
     */
    public function getCartProducts($array)
    {
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
        }
        return $result; 
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
        if($userInfo){
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

    /**
     * check is email inserted exists in db
     *
     * @param [type] $username
     * @return bool
     */
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

    /**
     * check password
     *
     * @param [type] $cliPassword
     * @param [type] $inputPassword
     * @return bool
     */
    public function CheckPassword($cliPassword, $inputPassword)
    {
        return password_verify($inputPassword, $cliPassword);
    }

    // /**
    //  * check if email exists
    //  *
    //  * @param [type] $email
    //  * @return void
    //  */
    // public function checkEmailAddress($email)
    // {
    //     $query ="SELECT cliEmailAddress FROM `t_client` WHERE cliEmailAddress LIKE :email ";
    //     $binds = array( 
    //         0 => array(
    //             'var' => $email,
    //             'marker' => ':email',
    //             'type' => PDO::PARAM_STR
    //             )
    //         );
    //        $result = $this->queryPrepareExecute($query, $binds);
    //     // if(count($result)>0){
    //     //     return true;
    //     // }
    //     // else{
    //     //     return false;
    //     // }
    //     return $result;
    // }

    /**
     * get all user info
     *
     * @param [type] $username
     * @return array
     */
    public function getUserInfo($username)
    {
        $query = "SELECT `idClient`,`cliFirstName`,`cliLastName`,`cliAddress`,`cliPostalCode`,`cliCity`,`cliState`,`cliCountry`,`cliPhoneNumber`,`cliEmailAddress` FROM `t_client` WHERE `cliEmailAddress` LIKE :username";
        
        $binds = array(
            0 => array(
                'var' => $username,
                'marker' => ":username",
                'type' => PDO::PARAM_STR
            )
        );

        $result = $this->queryPrepareExecute($query, $binds);
        return $result; 
    }

    /**
     * add order in database
     *
     * @param [type] $idClient
     * @param [type] $total
     * @return void
     */
    public function addOrder($idClient, $total)
    {
        //ajouter order dans db 
        // $query = "INSERT INTO `t_order` ( ordNumber, idClient, ordDate) VALUES ( ':orderNumber', ':idClient', ':ordDate') ";

        //$query = "INSERT INTO `t_order` (`ordNumber`, `idClient`, `ordDate`, `ordTotal`, `ordStatus`) VALUES ( ':orderNumber', ':idClient', ':ordDate', ':ordTotal', ':ordStatus') ";

        $query = "INSERT INTO `t_order` SET ordNumber=:orderNumber, idClient=:idClient, ordDate=:ordDate, ordTotal=:ordTotal, ordStatus=:ordStatus";

        $binds = array(
            0=>array(
                'var' => "randomShitGoBrrrrrr",
                'marker' => ":orderNumber",
                'type' => PDO::PARAM_STR
            ),
            1=>array(
                'var' => $idClient,
                'marker' => ":idClient",
                'type' => PDO::PARAM_STR
            ),
            2=>array(
                'var' =>  date("Y-m-d H:i:s"),
                'marker' => ":ordDate",
                'type' => PDO::PARAM_STR
            ),
            3=>array(
                'var' =>  $total,
                'marker' => ":ordTotal",
                'type' => PDO::PARAM_STR
            ),
            4=>array(
                'var' =>  "en cours",
                'marker' => ":ordStatus",
                'type' => PDO::PARAM_STR
            )
        );

        $result = $this->queryPrepareExecute($query, $binds);
        return $result; 
    }

    /**
     * get client's order history
     *
     * @param [type] $clientId
     * @return array
     */
    public function getOrders($clientId)
    {
        $query = "SELECT * FROM `t_order` WHERE `idClient` LIKE :id ORDER BY `ordDate` DESC";
        $binds = array(
            0=> array(
                'var' => $clientId,
                'marker' => ":id",
                'type' => PDO::PARAM_STR
            )
        );
        $result = $this->queryPrepareExecute($query,$binds);
        return $result;
    }

    /**
     * create a client account
     *
     * @param [type] $username
     * @param [type] $password
     * @return void
     */
    public function createAccount($username, $password)
    {
        //echo $username . " : " . $password;
        // $query = "INSERT INTO t_client ( cliPassword, cliFirstName, cliLastName, cliAddress, cliPostalCode, cliCity, cliState, cliCountry, cliPhoneNumber, cliEmailAddress) VALUES (':password', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ':username') ";
        $query = "INSERT INTO t_client SET cliPassword=:password, cliFirstName=:firstname, cliLastName=:lastname, cliAddress=:address, cliPostalCode=:postalcode, cliCity=:city, cliState=:state, cliCountry=:country, cliPhoneNumber=:phoneNumber, cliEmailAddress=:username";
       
        //on doit bind chaque valeur sinon erreur
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
            ),
            2 => array(
                'var' => null,
                'marker' => ':firstname',
                'type' => PDO::PARAM_STR
            ),
            3 => array(
                'var' => null,
                'marker' => ':lastname',
                'type' => PDO::PARAM_STR
            ),
            4 => array(
                'var' => null,
                'marker' => ':address',
                'type' => PDO::PARAM_STR
            ),
            5 => array(
                'var' => null,
                'marker' => ':postalcode',
                'type' => PDO::PARAM_STR
            ),
            6 => array(
                'var' => null,
                'marker' => ':city',
                'type' => PDO::PARAM_STR
            ),
            7 => array(
                'var' => null,
                'marker' => ':state',
                'type' => PDO::PARAM_STR
            ),
            8 => array(
                'var' => null,
                'marker' => ':country',
                'type' => PDO::PARAM_STR
            ),
            9 => array(
                'var' => null,
                'marker' => ':phoneNumber',
                'type' => PDO::PARAM_STR
            ),
        );

        $result = $this->queryPrepareExecute($query,$binds);
        return $result; 
    }

    
    /**
     * updates client's address information
     *
     * @param [type] $username
     * @param [type] $firstname
     * @param [type] $lastname
     * @param [type] $address
     * @param [type] $postalCode
     * @param [type] $city
     * @param [type] $state
     * @param [type] $country
     * @param [type] $phoneNumber
     * @return void
     */
    public function updateAddress($username, $firstname, $lastname, $address, $postalCode, $city, $state, $country, $phoneNumber)
    { 
        $query = "UPDATE t_client SET 
        cliFirstName = :firstname,
        cliLastName = :lastname, 
        cliAddress = :cliAddress, 
        cliPostalCode = :postalCode, 
        cliCity = :city, 
        cliState = :cliState, 
        cliCountry = :country, 
        cliPhoneNumber = :phoneNumber 

        WHERE t_client.cliEmailAddress = :username ";

        $binds = array(
            0 => array(
                'var' => $username,
                'marker' => ':username',
                'type' => PDO::PARAM_STR
            ),
            1 => array(
                'var' => $firstname,
                'marker' => ':firstname',
                'type' => PDO::PARAM_STR
            ),
            2 => array(
                'var' => $lastname,
                'marker' => ':lastname',
                'type' => PDO::PARAM_STR
            ),
            3 => array(
                'var' => $address,
                'marker' => ':cliAddress',
                'type' => PDO::PARAM_STR
            ),
            4 => array(
                'var' => $postalCode,
                'marker' => ':postalCode',
                'type' => PDO::PARAM_STR
            ),
            5 => array(
                'var' => $city,
                'marker' => ':city',
                'type' => PDO::PARAM_STR
            ),
            6 => array(
                'var' => $state,
                'marker' => ':cliState',
                'type' => PDO::PARAM_STR
            ),
            7 => array(
                'var' => $country,
                'marker' => ':country',
                'type' => PDO::PARAM_STR
            ),
            8 => array(
                'var' => $phoneNumber,
                'marker' => ':phoneNumber',
                'type' => PDO::PARAM_STR
            )
        );
        
        $result = $this->queryPrepareExecute($query,$binds);
        return $result;
    }

    /**
     * reduces stocks after an order 
     *
     * @param [type] $id
     * @param [type] $quantity
     * @return void
     */
    public function reduceStocks($id, $quantity)
    {
        //il faut bind plus mais je ne veux pas changer les autres infos...
        $query = "UPDATE t_article 
        SET artStock = artStock-:quantity
        WHERE t_article.idArticle = :id";

        $binds = array(
            0=>array(
                'var' => $id,
                'marker' => ':id',
                'type' => PDO::PARAM_STR
            ),
            1=>array(
                'var' => $quantity,
                'marker' => ':quantity',
                'type' => PDO::PARAM_STR
            )
        );
        $result = $this->queryPrepareExecute($query, $binds);
        return $result;
    }
    
}

?>