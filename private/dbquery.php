<?php
    //query database
    // require("config.php");
    function get_result($query){
        if($query){
            $result = mysqli_fetch_assoc($query);
            return $result;
        }
    }

    function dbquery($db, $name, $value, $use){
        $query = mysqli_query($db, "SELECT * FROM users WHERE $name = '$value' ");
        //get the result
        $res = get_result($query);
        return $res[$use];
    }
   
?>