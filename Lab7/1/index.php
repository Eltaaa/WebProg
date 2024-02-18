<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="w-100">
        <form id="form1" action="" method="POST" class="w-100 d-flex justify-content-center mt-5">
            <div class="row d-flex w-50 flex-row">
                <label class="form-text w-auto">กรอกสูตรคูณ: </label>
                <input type="number" class="form-input form-control w-auto mx-3" name="num">
                <button class="btn btn-primary w-auto" type="submit" name="submitButton">แสดงตาราง</button>
            </div>
        </form>
    </div>

    <?php
    if(isset($_POST['submitButton'])){
      $num = $_POST['num'];
      echo "<p class='fw-bold bold mx-5' >ตารางสูตรคูณแม่ " . $num . "<br>";
      echo "<div class='w-25 text-center mx-3'>";

      for ($i = 1; $i<=12; $i++){
        echo "<p class='m-3'>" .$num . " x " .$i . " = " . intval($num) * $i . "<hr>";  
      }

      echo "</div>";
    }
    ?>
  </body>
</html>
