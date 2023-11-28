<!DOCTYPE html>
<html>
<head>
  <title>String Transformation</title>
</head>
<body>
  <h2>String Transformation</h2>
  <form method="post" action="">
    <label for="inputString">Enter a string:</label><br>
    <input type="text" id="inputString" name="inputString"><br><br>

    <label for="transformation">Select transformation:</label><br>
    <select id="transformation" name="transformation">
      <option value="uppercase">Uppercase</option>
      <option value="lowercase">Lowercase</option>
      <option value="ucFirst">First character to Uppercase</option>
    </select><br><br>

    <input type="submit" value="Transform">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];
    $transformation = $_POST['transformation'];

    if ($transformation === "uppercase") {
      $transformedString = strtoupper($inputString);
    } elseif ($transformation === "lowercase") {
      $transformedString = strtolower($inputString);
    } elseif ($transformation === "ucFirst") {
      $transformedString = ucfirst(strtolower($inputString));
    }

    if (isset($transformedString)) {
      echo "<h3>Transformed String:</h3>";
      echo "<p>$transformedString</p>";
    }
  }
  ?>
</body>
</html>
