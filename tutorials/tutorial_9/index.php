<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h1>Age Chart</h1>
<div style="width:800px">
  <canvas id="myChart"></canvas>
</div>
<?php
require_once "config.php";
$sql = "SELECT first_name,last_name,age FROM users";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    $age = array();
    $first_name = array();
    $last_name = array();
    while ($row = $result->fetch_assoc()) {
        $age[] = $row["age"];
        $name[] = $row["first_name"]." ".$row["last_name"];
    }
}
mysqli_close($conn);
?>

<script>
const age=<?php echo json_encode($age); ?>;
const name=<?php echo json_encode($name); ?>;
const data={
labels: name,
  datasets: [{
    label: 'Age',
    data: age,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const config = {
  type: 'bar',
  data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
const myChart = new Chart(
  document.getElementById('myChart'),
  config
);
</script>
</body>
</html>