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
        <form name="form1" action="" method="POST" class="w-50 justify-content-center ">

            <div class="row d-flex w-100  justify-content-left">
                <label class="form-label">Name:</label>
                <input class="form-control " id="firstname" name="firstname" value="<?php if (isset($_POST['myform'])) echo $_POST['firstname'] ?>"></input>
            </div>

            <div class="row d-flex w-100  justify-content-left">
                <label class="form-label">Address:</label>
                <textarea class="form-control" id="address" name="address" type="area">    <?php if (isset($_POST['myform'])) echo $_POST['address'] ?>     </textarea>
            </div>

            <div class="row d-flex justify-content-left">
                <label class="form-label">Age:</label>
                <input class="form-control" type="number" min="0" id="age" name="age" style="width:15%" value="<?php if (isset($_POST['myform'])) echo $_POST['age'] ?>"></input>
            </div>

            <div class="row d-flex w-100  justify-content-left">
                <label class="form-label">Profession</label>
                <input class="form-control " id="prof" name="prof" value="<?php if (isset($_POST['myform'])) echo $_POST['prof'] ?>"></input>
            </div>

            <div class="row d-flex w-100  justify-content-left">
                <label class="form-label">Residential Status:</label>
                <div class="form-check form-check-inline">
                    <input class="" type="radio" name="resident" value="rad1" <?php if (isset($_POST['myform']) && isset($_POST['resident']) == "rad1") echo 'checked'  ?>></input>
                    <label class="form-check-label mr-2">Resident</label>
                    <input class="" type="radio" name="resident" value="rad2" <?php if (isset($_POST['myform']) && isset($_POST['resident']) == "rad2") echo 'checked'  ?>></input>
                    <label class="form-check-label">Non-Resident</label>

                    
                </div>
            </div>

            <button class="btn btn-primary mt-3" name="myform">Submit</button>

        </form>
    </div>

    

    <?php
    if (isset($_POST['myform'])) {
        // echo "I'm working!";
        $name = $_POST['firstname'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $profession = $_POST['prof'];
        
        $resident = $_POST['resident'];

        if (isset($_POST['resident'])) {
            $resident = $_POST['resident'];
        } else {
            $resident = null;
        }

        echo '<div class="w-100 d-flex justify-content-center text-left">';
        echo '<div class="w-50 text-center text-danger">';
        // echo '</div>';

        if (strlen($name) < 5) {
            echo '<p class="text-danger">ชื่อต้องมีความยาวไม่ต่ำกว่า 5 อักษร</p>';
        }


        if (strlen($address) < 5) {
            echo '<p class="text-danger">ที่อยู่ต้องมีความยาวไม่ต่ำกว่า 5 อักษร</p>';
        }

        if (strlen($profession) < 5) {
            echo '<p class="text-danger">อาชีพต้องมีความยาวไม่ต่ำกว่า 5 อักษร</p>';
        }

        if ($resident == null) {
            echo '<p class="text-danger">เลือก residential credit ด้วยครับพี่</p>';
        }
    }



    echo '</div>';
    echo '</div>';

    ?>

</body>


</html>