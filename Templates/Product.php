<?php
class Product
{
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getAllData($item_type = 'mobile')
    {
        $response = array();
        $query = "SELECT * FROM `mobile` WHERE `item_type` = '$item_type'";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $response[] = $row;
        }
        return $response;
    }

    public function getSection($item_type = 'mobile', $section_id = '1')
    {
        $response = array();
        $query = "SELECT * FROM `mobile` WHERE `item_type` = '$item_type' and `section_id` = '$section_id'";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $response[] = $row;
        }
        return $response;
    }

    public function getUniqueBrandName($item_type = 'mobile')
    {
        $response = array();
        $query = "SELECT DISTINCT `item_brand` FROM `mobile` WHERE `item_type` = '$item_type' ORDER BY `item_brand` ASC";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $response[] = $row;
        }
        return $response;
    }

    public function getUniqueItemSectionName($item_type = 'mobile')
    {
        $response = array();
        $query = "SELECT `section_id` FROM `mobile` WHERE `item_type` = '$item_type'";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $subquery = "select * from `section` where `id` = '" . $row['section_id'] . "'";
            $subqueryresult = mysqli_query($this->con, $subquery);
            while ($req = mysqli_fetch_array($subqueryresult, MYSQLI_ASSOC)) {
                $response[] = $req;
            }
        }
        return $response;
    }


    public function getItem($item_id)
    {
        $response = array();
        $query = "SELECT * FROM `mobile` WHERE `item_id` = '$item_id'";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $response[] = $row;
        }
        return $response;
    }


    public function getAllAccessoriesData($item_type = 'accessories')
    {
        $response = array();
        $query = "SELECT m.*, s.name FROM mobile m, section s WHERE m.item_type = '$item_type' AND m.section_id = s.id";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $response[] = $row;
        }
        // print_r($response);
        return $response;
    }

    public function getCartAndWishlistItems($table_name, $user_id)
    {
        $response = array();
        $query = "SELECT m.item_id, m.item_name, m.item_brand, m.item_price, m.item_image, m.section_id, c.quantity from $table_name c, mobile m where c.user_id = '$user_id' and c.item_id = m.item_id";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $response[] = $row;
        }
        return $response;
    }
    public function getWishlistItems($table_name, $user_id)
    {
        $response = array();
        $query = "SELECT m.item_id, m.item_name, m.item_brand, m.item_price, m.item_image, m.section_id, w.quantity from $table_name w, mobile m where w.user_id = '$user_id' and w.item_id = m.item_id";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $response[] = $row;
        }
        return $response;
    }
}
