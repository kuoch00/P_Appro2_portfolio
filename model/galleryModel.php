<?php
header("Content-Type: text/html;charset=UTF-8");
include_once 'BaseModel.php';
class GalleryModel extends BaseModel
{
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

    public function catExists($catId)
    {
        $query = "SELECT * FROM `t_category` WHERE idCategory LIKE :catId ";
        $binds = array(
            0=>array(
                'var'=>$catId,
                'marker'=> ':catId',
                'type'=>PDO::PARAM_STR
            )
        );
        $result = $this->queryPrepareExecute($query,$binds);
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

    public function getGalleryAll($catId)
    {
        $query = "SELECT * FROM `t_image` WHERE `idCategory` = :catId ORDER BY `idImage` DESC ";
        $binds=array(
            0=>array(
                'var'=> $catId,
                'marker'=> ':catId',
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
    
}
?>