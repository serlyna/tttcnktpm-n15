<?php

include('database.php')

?>

<?php
/**
 * 
 */
class danhmuc
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

   

    public function getBymadmAdmin($madm)
    {
        $query = "SELECT * FROM danhmuc where madm = '$madm'";
        $result = $this->db->select($query);
        return $result;
    }


    public function block($madm)
    {
        $query = "UPDATE danhmuc SET status = 0 where madm = '$madm' ";
        $result = $this->db->delete($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function active($madm)
    {
        $query = "UPDATE danhmuc SET status = 1 where madm = '$madm' ";
        $result = $this->db->delete($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>