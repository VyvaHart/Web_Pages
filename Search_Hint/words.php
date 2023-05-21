<?php

$servername = "localhost";
$username = "killervyva";
$password = "killervyva";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$q = $_REQUEST["q"];
$hint = "";


$sql = "SELECT * FROM names WHERE name LIKE '%$q%'";
$result = $conn->query($sql);


if ($result !== null && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $a[] = $row['name'];
    }
}

if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  $sugg_num = 0;
  foreach($a as $name) {
      if (stristr($q, substr($name, 0, $len))) {
        if($sugg_num < 3) {
          
          if ($hint === "") {
              $hint = $name;
          } else {
              $hint .= ", $name";
          }
        $sugg_num++;
        }
      }
  }
}


$conn->close();
// '-' if no suggestion
echo $hint === "" ? "-" : $hint;
?>