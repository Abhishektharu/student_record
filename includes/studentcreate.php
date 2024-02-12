<!-- Header -->
<?php include "../header.php" ?>

<?php
// Assuming you have a database connection in $conn

if (isset($_POST['create'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject_id = $_POST['subject_names']; // Assuming 'subject_names' is the dropdown field
    $faculty_id = $_POST['faculty']; // Assuming 'faculty' is the dropdown field

    // SQL query to insert user data into the user_details table
    $query = "INSERT INTO user(firstname, lastname, gender, email, number, subject_names, faculty) 
              VALUES('{$firstname}', '{$lastname}', '{$gender}', '{$email}', '{$number}', '{$subject_id}', '{$faculty_id}')";
    $add_user = mysqli_query($conn, $query);

    // displaying proper message for the user to see whether the query executed perfectly or not 
    if (!$add_user) {
        echo "Something went wrong: " . mysqli_error($conn);
    } else {
        echo "<script type='text/javascript'>alert('User added successfully!')</script>";
    }
}

// Fetch subject names from the subject_names table
$subject_query = "SELECT * FROM subject";
$subject_result = mysqli_query($conn, $subject_query);
$subjects = mysqli_fetch_all($subject_result, MYSQLI_ASSOC);
?>
<!-- Your HTML form -->
<h1 class="text-center">Add User details</h1>
<div class="container">
    <form action="" method="post">
        <!-- Additional form fields -->
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="text" name="gender" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="number">Number:</label>
            <input type="text" name="number" class="form-control" required>
        </div>

        <!-- Fetch faculties from the database -->
        <?php
        $faculty_query = "SELECT * FROM faculty";
        $faculty_result = mysqli_query($conn, $faculty_query);
        $faculties = mysqli_fetch_all($faculty_result, MYSQLI_ASSOC);
        ?>

        <!-- Display the drop-down menu for faculty selection -->
        <div class="form-group">
            <label for="faculty">Select Faculty:</label>
            <select name="faculty" class="form-control" required>
                <?php foreach ($faculties as $faculty) : ?>
                    <option value="<?php echo $faculty['id']; ?>">
                        <?php echo $faculty['faculty']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Existing form fields -->

        <!-- New form field for subject names dropdown -->
        <div class="form-group">
            <label for="subject_names">Select Subject:</label>
            <select name="subject_names" class="form-control" required>
                <?php foreach ($subjects as $subject) : ?>
                    <option value="<?php echo $subject['id']; ?>">
                        <?php echo $subject['subject_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Submit button -->
        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary mt-2" value="Add">
        </div>
    </form>
</div>

<!-- BACK button to go to the home page -->
<div class="container text-center mt-5">
    <a href="students.php" class="btn btn-warning mt-5">Back</a>
</div>
