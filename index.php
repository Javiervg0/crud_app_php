<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>

        <div class="box1">
            <h2>ALL STUDENTS</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    ADD STUDENT
</button>
        </div>

        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM students";

                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("query Failed".mysqli_error());
                } else {

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["first_name"]; ?></td>
                            <td><?php echo $row["last_name"]; ?></td>
                            <td><?php echo $row["age"]; ?></td>
                        </tr>

                        <?php
                    }
                }
                ?>
            </tbody>
        </table>

<?php 
if(isset($_GET["message"])) {
    echo "<h6 class='alert alert-danger'>".$_GET["message"]."</h6>";
}

if(isset($_GET["insert_msg"])) {
    echo "<h6 class='alert alert-success'>".$_GET["insert_msg"]."</h6>";
}
?>


        <!-- Modal -->
<form action="insert_data.php" method="post">         
<div class="modal fade" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
       
            <div class="form-group">
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" class="form-control">
                <label for="l_name">Last last</label>
                <input type="text" name="l_name" class="form-control">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control">
            </div>
      
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>

    </div>
  </div>
</div>
  </form>
        <?php include("footer.php") ?>