<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 1</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="container">
  <h1>Chess Tutorial</h1>
  <table>
    <?php
    $result = 0;
    for ($column = 0; $column < 8; $column++) {
      echo "<tr>";
      $result = $column;
      for ($row = 0; $row < 8; $row++) {
        if ($result % 2 == 0) {
          echo
          "<td class=\"td-black\"></td>";
          $result++;
        } else {
          echo
          "<td class=\"td-white\"></td>";
          $result++;
        }
      }
      echo "</tr>";
    }
    ?>
  </table>
</body>

</html>