<html lang="en">

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
  <div class="w-100 d-flex justify-content-center mt-5">
    <form name="form1" action="" method="POST" class="justify-content-center ">
      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="" class="col-form-label">Enter a record number</label>
        </div>
        <div class="col-auto">
          <input type="number" class="form-control" min="1" name="row_select" id="row_select">
        </div>
      </div>
      <div class="d-flex justify-content-center mt-3">
        <button class="btn btn-primary" name="myform">Display</button>
      </div>
    </form>
  </div>




  <?php
  if (isset($_POST['myform'])) {

    $servername = "localhost";
    $username = "root"; //ตามที่กำหนดให้
    $password = ""; //ตามที่กำหนดให้
    $dbname = "s163h";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $num = $_POST['row_select'];
    $sql = "SELECT * FROM course;";
    $result = mysqli_query($conn, $sql);

    // echo $name;
    $i = 0;
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $i++;
        if ($i == $num) {
          echo '<div class="d-flex justify-content-center mt-3">';

          echo " " . $row["course_id"] . " " . $row["title"] .
            " " . $row["dept_name"] . " " . $row["credits"] . "<br>";

          echo '</div>';
          break;
        }
      }
      if ($row == null) {
        echo '<div class="d-flex justify-content-center mt-3">';
        echo "no result in row number " . $num;
        echo '</div>';
      }
    }
  }
  ?>
</body>


</html>