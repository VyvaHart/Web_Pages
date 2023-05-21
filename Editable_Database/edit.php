<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="/Editable_Database/css/style0.css">
</head>
<body>

    <?php
        session_start();
        $conn = new mysqli("localhost", "killervyva", "killervyva", "student");
        // if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['age']) && isset($_SESSION["id"])) {
        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['age'])) {
            $name = $_POST['name'];
            $surname = $_POST["surname"];
            $age = $_POST["age"];
            $id = $_SESSION["id"];
            $sql = "UPDATE student SET name='$name', surname='$surname', age='$age' WHERE id=".$id."";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Data edited successfully.');</script>";
            } else {
                echo "<script>alert('Edition error.')</script>";
            }
            mysqli_close($conn);
            header("Location: /Editable_Database/home.php");
        }
    ?>

    <div class="container">
        <div class="header">
            <h2>Edit form</h2>
        </div>

        <!-- <form method="post" action="/lab7/edit.php" class="form" id="form"> -->
        <form method="post" action="#" class="form" id="form">
            <div class="form-control">
                 <label>Name</label>
                 <input name="name" type="text" id="name">
            </div>

            <div class="form-control">
                <label>Surname</label>
                   <input name="surname" type="text" id="surname">
            </div>

            <div class="form-control">
                <label>Age</label>
                <input name="age" type="text" id="surname">
            </div>

            <button type="submit">Confirm</button>

        </form>

    </div>

</body>
</html>

<!-- $server = "sql212.epizy.com";
$username = "epiz_34151572"; 
$password = "dycsGje2Nlfm";
$dbname = "epiz_34151572_student"; -->