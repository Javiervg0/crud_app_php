<?php include("header.php"); ?>
<?php include_once("dbcon.php"); ?>

<?php
// 🔹 OBTENER DATOS POR ID (GET)
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed " . mysqli_error($connection));
    }

    $row = mysqli_fetch_assoc($result);
}
?>

<?php
// 🔹 ACTUALIZAR DATOS (POST)
if (isset($_POST["update_students"])) {

    $id = $_POST["id"];
    $fname = $_POST["f_name"];
    $lname = $_POST["l_name"];
    $age = $_POST["age"];

    $query = "UPDATE students 
              SET first_name = '$fname', last_name = '$lname', age = '$age' 
              WHERE id = $id";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed " . mysqli_error($connection));
    } else {
        header("Location: index.php?update_msg=Data updated successfully");
        exit();
    }
}
?>

<div class="container mt-5">
    <h2>Update Student</h2>

    <form action="update_page_1.php" method="POST">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="f_name" class="form-control"
                value="<?php echo isset($row['first_name']) ? $row['first_name'] : ''; ?>">

            <label>Last Name</label>
            <input type="text" name="l_name" class="form-control"
                value="<?php echo isset($row['last_name']) ? $row['last_name'] : ''; ?>">

            <label>Age</label>
            <input type="text" name="age" class="form-control"
                value="<?php echo isset($row['age']) ? $row['age'] : ''; ?>">
        </div>

        <!-- ID oculto -->
        <input type="hidden" name="id"
            value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">

        <br>

        <input type="submit" name="update_students" class="btn btn-primary" value="Update">
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include("footer.php"); ?>