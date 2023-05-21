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

        $server = "localhost";
        $username = "killervyva"; 
        $password = "killervyva";
        $dbname = "student";
        // Create a connection
        $conn = new mysqli($server, $username, $password, $dbname);

        if (isset($_POST['edit'])){
            $_SESSION['id'] = $_POST['id'];
            $conn->close();
            header("Location: /Editable_Database/edit.php");
        }

        if (isset($_POST["remove"])) {
            $id = $_POST["id"];
  
            $stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
  
            if ($stmt->affected_rows > 0) {        
                echo "<script>alert('Student with ID $id was deleted successfully.');</script>";
            } else {
                echo "<script>alert('Error deleting student.');</script>";
            }
  
            $stmt->close();
            $conn->close();
            header("Location: /Editable_Database/home.php");
            exit;  
        }

        if (isset($_POST['name']) && isset($_POST["surname"]) && isset($_POST["age"]) && isset($_POST["add"])) {
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $age = $_POST["age"];
            $sql = "INSERT INTO student (name, surname, age) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $surname, $age);
            $stmt->execute();
            $stmt->close();
        }
        
        // Close the connection
        $conn->close();
    ?>
    <div class="container">
        <div class="header">
            <h2>Your DATA</h2>
        </div>

        <form method="POST" action="/Editable_Database/home.php" class="form" id="form">
            <div class="form-control">
                 <label for="name">Name</label>
                 <input name="name" type="text" placeholder="Brendan" id="name">
            </div>

            <div class="form-control">
                <label for="surname">Surname</label>
                <input name="surname" type="text" placeholder="Fraser" id="surname">
           </div>

           <div class="form-control">
                <label for="age">Age</label>
                <input name="age" type="text" placeholder="" id="age">
            </div>

            <button name="add">Add</button>

            <br>

            <table>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Age</th>
            </tr>
            <?php
                $servername = "localhost";
                $username = "killervyva"; 
                $password = "killervyva"; 
                $dbname = "student"; 

                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "SELECT * FROM student"; // Replace with your actual table name
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    
                        $id = $row["id"];
                        $name = $row["name"];
                        $surname = $row["surname"];
                        $age = $row["age"];

                        echo "<tr>";
                        echo "<td>" . $name . "</td>";
                        echo "<td>".$surname."</td>";
                        echo "<td>".$age."</td>";
                        echo "<form action='home.php' method='POST'>";
                        echo "<input type='hidden' name='id' value='" . $id . "'>";
                        echo "<td><button name='edit' type='submit'>Edit</button></td>";
                        echo "</form>";
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='id' value='" . $id . "'>";
                        echo "<td><button name='remove'>Remove</button></td>";
                        echo "</form>";

                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
            ?>
        </table>
        </form>

    </div>
    <a href="/Editable_Database/html/code.html"><button type="submit" name="screenshots">PHP ScreenShots</button></a>
</body>
</html>
