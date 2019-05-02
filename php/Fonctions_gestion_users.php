<?php
    function remove_user($email)
    {
        require '../../../config.php';
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        $database = "amazonece";
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $SQL =  "DELETE FROM `user` WHERE `user`.`email` =\"".$email."\"";
            $result = mysqli_query($db_handle, $SQL);
            if(!$result)
            {
                echo "echec de la suppression";
            }
        }
    }
