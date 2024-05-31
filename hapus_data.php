<?php
include 'koneksi.php';


if ($_REQUEST) {
    $action = $_REQUEST["action"];
    function fetch($rs, $call)
    {
        switch ($call) {
            case "name":
                $fetch = @mysqli_fetch_assoc($rs);
                break;
            case "number":
                $fetch = @mysqli_fetch_row($rs);
        }
        return $fetch;
    }

    if ($action === 'deleteData') {

        $id = $_GET['id'];

        $sql = "DELETE FROM list_insiden WHERE id='$id'";

        $result = mysqli_query($conn, $sql);

        // echo $sql;

        if ($result) {
            echo "Data Deleting Successfully";
            return true;
        } else {
            echo "Error adding customer.";
            return http_response_code(500);
        }
    }
}
