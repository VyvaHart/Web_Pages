<?php
  session_start();
  if(!isset($_SESSION["login"])){
    session_destroy();
    header("Location: ../index.php");
  } else {
    if (isset($_POST["logout"])){
        session_destroy();
        header("Location: ../index.php");
    } else {
        $name = $_SESSION["name"];
        $surname = $_SESSION["surname"];
        $date = $_SESSION["date"];
        $pesel = $_SESSION["pesel"];
        $city = $_SESSION["city"];
        $street = $_SESSION["street"];
        $building = $_SESSION["building"];
        $flat = $_SESSION["flat"];
        $postcode = $_SESSION["postcode"];
        $phone = $_SESSION["phone"];
        $car = $_SESSION["car"];
        $gender = $_SESSION["gender"];
        $message = $_SESSION["message"];
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="/LogIn_Form/css/style0.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Summary</h2>
        </div>

        <form action="#" method="POST" class="form" id="form">

            <div class="form-control">
                 <label>Imie</label>
                 <h4><?php echo $name; ?></h4>
            </div>

            <div class="form-control">
                <label>Nazwisko</label>
                <h4><?php echo $surname; ?></h4>
           </div>

           <div class="form-control">
                <label>Data urodzenia</label>
                <h4><?php echo $date; ?></h4>
            </div>

            <div class="form-control">
                <label>Pesel</label>
                <h4><?php echo $pesel; ?></h4>
            </div>

            <div class="form-control">
                <label>Miasto</label>
                <h4><?php echo $city; ?></h4>
            </div>

            <div class="form-control">
                <label>Ulica</label>
                <h4><?php echo $street; ?></h4>
            </div>

            <div class="form-control">
                <label>Numer domu</label>
                <h4><?php echo $building; ?></h4>
            </div>

            <div class="form-control">
                <label>Numer mieszkania</label>
                <h4><?php echo $flat; ?></h4>
            </div>

            <div class="form-control">
                <label>Kod pocztowy</label>
                <h4><?php echo $postcode; ?></h4>
            </div>

            <div class="form-control">
                <label>Telefon</label>
                <h4><?php echo $phone; ?></h4>
            </div>

            <div class="form-control">
                <label>Prawo jazdy</label>
                <h4><?php echo $car; ?></h4>
            </div>

            <div class="form-control">
                <label>Gender</label>
                <br>
                <h4><?php echo $gender; ?></h4>
            </div>

            <div class="form-control">
                <label>Uwagi</label>
                <h4><?php echo $message; ?></h4>
            </div>

            <button type='submit' name='logout'>Confirm and Logout</button>

        </form>

    </div>
</body>
</html>