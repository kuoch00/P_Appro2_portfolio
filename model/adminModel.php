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

    public function getCategory($catName)
    {
        $query="SELECT * FROM `t_category` WHERE `catName` LIKE :catName ";
        $binds=array(
            0=>array(
                'var'=>$catName,
                'marker'=>':catName',
                'type'=>PDO::PARAM_STR
            )
        );
        $result = $this->queryPrepareExecute($query, $binds);
        return $result;
    }

    public function getSubcategory($subName)
    {
        $query="SELECT * FROM `t_subcategory` WHERE `subName` LIKE :subName ";
        $binds=array(
            0=>array(
                'var'=>$subName,
                'marker'=>':subName',
                'type'=>PDO::PARAM_STR
            )
        );
        $result = $this->queryPrepareExecute($query, $binds);
        return $result;
    }

    public function addCategory($catName)//marche pas ?
    {
        $query="INSERT INTO `t_category` SET catName=:catName";
        $binds=array(
            0=>array(
                'var'=>$catName,
                'marker'=>':catName',
                'type'=>PDO::PARAM_STR
            )
        );
        $result = $this->queryPrepareExecute($query, $binds);
        return $result;
    }

    public function addSubcategory($subName)//marche pas ?
    {
        
        $query="INSERT INTO `t_subcategory` SET subName=:subname";
        $binds=array(
            0=>array(
                'var'=>$subName,
                'marker'=>':subName',
                'type'=>PDO::PARAM_STR
            )
        );
        $result = $this->queryPrepareExecute($query, $binds);
        return $result;
        
    }

    public function addWork($idCat, $idSub, $filename)
    {
        // INSERT INTO `t_image` (`idImage`, `idCategory`, `idSubCategory`, `imaFilename`) VALUES (NULL, '3', '1', 'filenameme.jpg') 
        
        $query="INSERT INTO `t_image` SET idCategory=:idCat , idSubCategory=:idSub , imaFilename=:imaFilename) ";
        $binds=array(
            0=>array(
                'var'=>$idCat,
                'marker'=>':idCat',
                'type'=>PDO::PARAM_STR
            ),
            0=>array(
                'var'=>$idSub,
                'marker'=>':idSub',
                'type'=>PDO::PARAM_STR
            ),
            0=>array(
                'var'=>$filename,
                'marker'=>':imaFilename',
                'type'=>PDO::PARAM_STR
            )
        );
        $result = $this->queryPrepareExecute($query, $binds);
        return $result;
    }

    public function addArticle($name, $description, $price, $stock, $imageFile)
    {
        $query = "INSERT INTO `t_article` SET artName=:artName, artDescription=:artDescription, artPrice=:artPrice, artStock=:artStock, artImage=:artImage";

        $binds = array(
            0=>array(
                'var' => $name,
                'marker'=> ':artName',
                'type'=> PDO::PARAM_STR
            ),
            1=>array(
                'var' => $description,
                'marker'=> ':artDescription',
                'type'=> PDO::PARAM_STR
            ),
            2=>array(
                'var' => $price,
                'marker'=> ':artPrice',
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