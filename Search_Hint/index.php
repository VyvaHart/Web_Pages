<html>
  <head>
    <link rel="stylesheet" href="/Search_Hint/style0.css">
    <script>
      function showHint(str) {
        if (str.length == 0) {
          document.getElementById("txtHint").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "words.php?q=" + str, true);
          xmlhttp.send();
        }
      }
    </script>
  </head>
  <body>
    <a href="/Search_Hint/screenshot/code.html"><button type="submit" id="scrn">PHP ScreenShots</button></a>
    <form>
      <div class="form-control">
        <label>
          <b>Start typing random name in input below:</b>
        </label>
        <br>
        <input type="text" onkeyup="showHint(this.value)">
        <p>Suggestions: <span id="txtHint"></span>
        </p>
      </div>
      <div class="form-control">
      </div>
    </form>
  </body>
</html>