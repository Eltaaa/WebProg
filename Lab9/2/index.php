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
  <script src="script.js"></script>
</head>

<body>
  <div class="d-flex justify-content-center mt-3">
    <p class="display-6 fw-bold">Course Details</p>
  </div>
  <div class="w-100 d-flex justify-content-center mt-2">

    <form name="form1" action="" method="POST" class="justify-content-center ">
      <div class="row g-3 align-items-center mb-3">
        <div class="col-auto">
          <label for="" class="col-form-label">Course ID</label>
        </div>
        <div class="col-3">
          <input class="form-control " name="courseID" id="courseID">
        </div>
        <div class="col-auto">
          <label for="" class="col-form-label">Title</label>
        </div>
        <div class="col">
          <input class="form-control" name="new_title" id="new_title">
        </div>
      </div>
      <div class="row g-3 align-items-center mb-3">
        <div class="col-auto">
          <label for="" class="col-form-label">Department Name</label>
        </div>
        <div class="col">
          <input class="form-control " min="1" name="new_dept" id="new_dept">
        </div>
      </div>
      <div class="row g-3 align-items-left">
        <div class="col-auto">
          <label for="" class="col-form-label">Credits</label>
        </div>
        <div class="col-3">
          <input class="form-control" type="number" name="new_credits" id="new_credits">
        </div>
      </div>
      <div class="d-flex justify-content-center mt-3">
        <button class="btn btn-primary mr-3" name="update">Update</button>
        <button class="btn btn-danger" name="delete">Delete</button>
      </div>
      <div class="d-flex justify-content-center mt-3">
        <p class="text-danger" id="error_text"></p>
      </div>
    </form>
  </div>

  <?php
  function reloadpage()
  {
    echo '<script>window.location.href = "' . $_SERVER["PHP_SELF"] . '";</script>';
    exit();
  }

  function call_fk_error($dept_name)
  {
    echo '<script>';
    echo 'error_textbox = document.getElementById("error_text");';

    echo "error_textbox.innerHTML = 'Foreign Key Error, Dept. Name `$dept_name` does not exist '";
    echo '</script>';
  }

  $servername = "localhost";
  $username = "root"; //ตามที่กำหนดให้
  $password = ""; //ตามที่กำหนดให้
  $dbname = "s163h";    //ตามที่กำหนดให้


  $conn = mysqli_connect($servername, $username, $password, $dbname);



  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $query = "SELECT * FROM course;";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {

    echo '<div class="w-100 d-flex justify-content-center ">';
    echo '<table class="w-75 table ">';
    echo '<thead>
      <tr>
        <th scope="col">Course ID</th>
        <th scope="col">Title</th>
        <th scope="col">Dept. Name</th>
        <th scope="col">Credits</th>
      </tr>
    </thead>
    <tbody >';

    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      $id = htmlspecialchars($row['course_id']);
      $title = htmlspecialchars($row['title']); 
      $dept = htmlspecialchars($row['dept_name']);
      $credits = htmlspecialchars($row['credits']);
      echo "<th> <a id='$id' href='#' onclick=\"insertData('$id','$title','$dept','$credits')\"> $id </a> </th>";
      echo "<td>" . $row["title"] . '</td>';
      echo "<td>" . $row["dept_name"] . '</td>';
      echo "<td>" . $row["credits"] . '</td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table';
    echo '</div>';
  }

  if (isset($_POST['update'])) {
    $id = $_POST["courseID"];
    $query = "SELECT title, dept_name, credits FROM course WHERE course_id = '$id'";
    // echo $query;
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      // echo $id;
      $new_title = $_POST["new_title"];
      $new_dept_name = $_POST["new_dept"];
      $new_credits = $_POST["new_credits"];

      $update_query = "UPDATE course SET course.title='$new_title', course.dept_name='$new_dept_name', course.credits='$new_credits' WHERE course.course_id = '$id'";
      try {
        mysqli_query($conn, $update_query);
        reloadpage();
      } catch (Exception $e) {
        call_fk_error($new_dept_name);
      }
    }
  }

  if (isset($_POST['delete'])) {
    $id = $_POST["courseID"];

    $del_query = "DELETE from course where course.course_id = '$id';";
    // echo $del_query;
    mysqli_query($conn, $del_query);
    reloadpage();
  }


  ?>
</body>


</html>