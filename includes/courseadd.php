<!-- Header -->
<?php include "../header.php" ?>

<?php
if (isset($_POST['create'])) {
  $courseAdd = $_POST['courseAdd'];

  // SQL query to insert user data into the users table
  $query = "INSERT INTO subject(subject_name) VALUES('{$courseAdd}')";
  $add_user = mysqli_query($conn, $query);

  // displaying proper message for the user to see whether the query executed perfectly or not 
  if (!$add_user) {
    echo "something went wrong " . mysqli_error($conn);
  } else {
    echo "<script type='text/javascript'>alert('User added successfully!')</script>";
  }
}
?>

<h1 class="text-center">Add User details </h1>
<div class="container ">
  <form action="" method="post">
    <div class="form-group">
      <label for="courseAdd">course name </label>
      <input type="text" name="courseAdd" class="form-control" required>
    </div>

    <div class="form-group">
      <input type="submit" name="create" class="btn btn-primary mt-2" value="Add subject">
    </div>
  </form>
</div>

<!-- a BACK button to go to the home page -->
<div class="container text-center mt-5">
  <a href="students.php" class="btn btn-warning mt-5"> Back </a>
  <div>