<?php include_once("dbcon.php"); ?>

<?php 
if(isset($_GET["id"])) {

    $id = $_GET["id"];

    $query = "DELETE FROM students WHERE id = $id";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed " . mysqli_error($connection));
    }
    else{
        header("Location: index.php?delete_msg=You have deleted the record");
        exit();
    }
}
?>