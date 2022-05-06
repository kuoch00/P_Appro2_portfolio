<?php
header("Content-Type: text/html;charset=UTF-8");
include_once 'BaseModel.php';
class AdminModel extends BaseModel
{
    public function getCategories()
    {
        $query="SELECT * FROM t_category";
        $result = $this->querySimpleExecute($query);
        return $result;
    }
    public function getSubcategories()
    {
        $query="SELECT * FROM t_subcategory";
        $result = $this->querySimpleExecute($query);
        return $result;
    }

    public function addArticle($name, $description, $price, $stock, $imageFile)
    {
        $query = "INSERT INTO `t_article` SET artName=:artName, artPrice=:artPrice, artDescription=:artDescription, artStock=:artStock, artImage=:artImage";

        $binds = array(
            0=>array(
                'var' => $name,
                'marker'=> ':artName',
                'type'=> PDO::PARAM_STR
            ),
            1=>array(
                'var' => $description,
                'marker'=> ':artPrice',
                'type'=> PDO::PARAM_STR
            ),
            2=>array(
                'var' => $price,
                'marker'=> ':artDescription',
                'type'=> PDO::PARAM_STR
            ),
            3=>array(
                'var' => $stock,
                'marker'=> ':artStock',
                'type'=> PDO::PARAM_STR
            ),
            4=>array(
                'var' => $imageFile,
                'marker'=> ':artImage',
                'type'=> PDO::PARAM_STR
            )
        );

        $result = $this->queryPrepareExecute($query, $binds);
        return $result;

    }

    

}

?>