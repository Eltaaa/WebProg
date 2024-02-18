<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <link rel="stylesheet" href="style.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="w-100">
    <form id="form1" action="" method="POST" class="d-flex justify-content-center mt-5">
      <div class="row d-flex w-50 flex-row justify-content-center">
        <label class="form-text w-auto">Month: </label>
        <!-- <input type="number" class="form-input form-control w-auto mx-3" name="num"> -->
        <select class="form-control w-50 mx-3" name="Select1">
          <option>January</option>
          <option>February</option>
          <option>March</option>
          <option>April</option>
          <option>May</option>
          <option>June</option>
          <option>July</option>
          <option>August</option>
          <option>September</option>
          <option>October</option>
          <option>November</option>
          <option>December</option>
        </select>
        <button class="btn btn-primary w-auto" type="submit" name="submitButton">Show</button>
      </div>
    </form>
  </div>
  </div>

  <?php
  $DayOfMonth = array( // Key => Value
    "January" => 31,
    "February" => 28,
    "March" => 31,
    "April" => 30,
    "May" => 31,
    "June" => 30,
    "July" => 31,
    "August" => 31,
    "September" => 30,
    "October" => 31,
    "November" => 30,
    "December" => 31
  );

  $DayStartAt = array(
    "January" => 1,
    "February" => 4,
    "March" => 5,
    "April" => 1,
    "May" => 3,
    "June" => 6,
    "July" => 1,
    "August" => 4,
    "September" => 0,
    "October" => 2,
    "November" => 5,
    "December" => 0
  );


  if (isset($_POST['submitButton'])) {
    $month = $_POST['Select1'];
    $dayCount = $DayOfMonth[$month];
    $start = $DayStartAt[$month];
    $dayAt = 1;
    echo '<p class="fw-bold text-center w-100 mt-5">' .$month . ' 2024</p>';

    echo '<div class="w-100 d-flex justify-content-center ">';
    echo '<table class="w-25 table table-bordered text-center">';
    echo '<tr>
    <th class="fw-bold">Su</th>
    <th class="fw-bold">Mo</th>
    <th class="fw-bold">Tu</th>
    <th class="fw-bold">We</th>
    <th class="fw-bold">Th</th>
    <th class="fw-bold">Fr</th>
    <th class="fw-bold">Sa</th>
    </tr>';
    while ($dayCount >= $dayAt) {
      echo '<tr>';
      if ($dayAt == 1) {
        for ($j = 0; $j < $start; $j++) {
          echo '<th></th>';
        }

        for ($j = $start; $j <= 6; $j++) {
          echo "<th>" . $dayAt . "</th>";
          $dayAt++;
        }
      }

      echo '<tr>';
      for ($j = 0; $j <= 6; $j++) {
        if ($dayAt <= $dayCount) {
          echo '<th>' . $dayAt . '</th>';
          $dayAt++;
        } else {
          echo '<th></th>';
        }
      }
      echo "</tr>";
    }
  }
  ?>
</body>

</html>