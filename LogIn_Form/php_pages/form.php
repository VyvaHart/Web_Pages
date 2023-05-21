<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="/lab_6/css/style0.css">
</head>
<body>

    <?php
        session_start();
        if(!isset($_SESSION["login"])){
            session_destroy();
            header('Location: ../index.php');
        } else{
            if(isset($_POST["logout"])){
                session_destroy();
                header('Location: ../index.php');
            } 
            if (isset($_POST["submit"])) {
                $_SESSION["name"] = $_POST["name"];
                $_SESSION["surname"] = $_POST["surname"];
                $_SESSION["date"] = $_POST["date"];
                $_SESSION["pesel"] = $_POST["pesel"];
                $_SESSION["city"] = $_POST["city"];
                $_SESSION["street"] = $_POST["street"]; // Записываем значение из input в переменную
                $_SESSION["building"] = $_POST["building"];
                $_SESSION["flat"] = $_POST["flat"];
                $_SESSION["postcode"] = $_POST["postcode"];
                $_SESSION["phone"] = $_POST["phone"];
                $_SESSION["car"] = $_POST["car"];
                $_SESSION["gender"] = $_POST["gender"];
                $_SESSION["message"] = $_POST["message"];
                header('Location: summary.php');
            }
        }
    ?>

    <div class="container">
        <div class="header">
            <h2>Application form</h2>
        </div>

        <form method="POST" action="#" class="form" id="form">
            <div class="form-control">
                 <label>Name</label>
                 <input name="name" type="text" placeholder="Brendan" id="name">
            </div>

            <div class="form-control">
                <label>Surname</label>
                <input name="surname" type="text" placeholder="Fraser" id="surname">
           </div>

           <div class="form-control">
                <label>Birth date</label>
                <input name="date" type="text" placeholder="dd-mm-yyyy" id="date">
            </div>

            <div class="form-control">
                <label>Pesel</label>
                <input name="pesel" type="text" placeholder="np. 02390248345" id="pesel">
            </div>

            <div class="form-control">
                <label>City</label>
                <input name="city" type="text" placeholder="" id="city">
            </div>

            <div class="form-control">
                <label>Street</label>
                <input name="street" type="text" placeholder="" id="street">
            </div>

            <div class="form-control">
                <label>Building number</label>
                <input name="building" type="text" placeholder="" id="building">
            </div>

            <div class="form-control">
                <label>Flat</label>
                <input name="flat" type="text" placeholder="" id="flat">
            </div>

            <div class="form-control">
                <label>Postcode</label>
                <input name="postcode" type="text" placeholder="" id="postcode">
            </div>

            <div class="form-control">
                <label>Gender</label>
                <br>
                <select name="gender" id="gender">
                  <option value="">Please select one…</option>
                  <option value="female">Female</option>
                  <option value="male">Male</option>
                  <option value="non-binary">Non-Binary</option>
                  <option value="other">Other</option>
                  <option value="Prefer not to answer">Perfer not to Answer</option>
                </select>
            </div>

            <div class="form-control">
                <label>Phone</label>
                <input name="phone" type="text" placeholder="" id="phone">
            </div>

            <div class="form-control">
                <label>Driver license</label>
                <select name="car" placeholder="" id="car">
                  <option value="">Please select one…</option>
                  <option value="Have">Have</option>
                  <option value="Have not">Have not</option>
                </select>
            </div>

            <div class="form-control">
                <label>Comment</label>
                <br>
                <textarea name="message" rows="5" cols="33" placeholder="..." id="info"></textarea>
            </div>

            <button type='submit' name='submit' id='submit'>Submit</button>
            <br>
            <button type='submit' name='logout'>Logout</button>

        </form>

    </div>
</body>
</html>