<?php
    require '../../../config.php';
    function remove_user($email)
    {

        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );
        if($db_found)
        {
            $SQL = "DELETE FROM user WHERE user.email=\"".$email."\"";
            if(!mysqli_query($db_handle,$SQL))
            {
                echo "Echec de la suppression.";
            }
        }
    }

    function remove_item($id)
    {
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );
        if($db_found)
        {
            $SQL = "DELETE FROM item WHERE item.id=\"".$id."\"";
            if(!mysqli_query($db_handle,$SQL))
            {
                echo "Echec de la suppression.";
            }
        }
    }

    function change_priority_type($id,$prioriy_type)
    {
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );
        if($db_found)
        {
            $SQL = "UPDATE item SET priority_level=\"".$prioriy_type."\" WHERE item.id=\"".$id."\"";
            if(!mysqli_query($db_handle,$SQL))
            {
                echo "Echec de la modification.";
            }
        }
    }