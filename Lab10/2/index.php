<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('questions.db');
        }
    }

    $db = new MyDB();
    if (!$db) {
        echo $db->lastErrorMsg();
    } else {
    }

    if (!isset($_SESSION['lastQID'])) {
        $_SESSION['lastQID'] = 0;
        $_SESSION['score'] = 0;
    }

    $sql = "SELECT * FROM questions WHERE QID > " . $_SESSION['lastQID'] . " LIMIT 1";
    $ret = $db->query($sql);

    // echo $sql . '<br>';
    // echo 'score ' . $_SESSION["score"];

    if ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        createQuestion($row);
    } else {
        finishquiz();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_answer'])) {
        if (scoring()) {
            $_SESSION['lastQID']++;
            header("Refresh:0");
        }
    }
    ?>

    <?php
    function scoring()
    {
        $current_question = $_SESSION['lastQID'] + 1;
        $x = 'q' . $current_question;
        $selected_choice = @$_POST[$x];

        if (!isset($selected_choice)) {
            echo '<div class="w-100 d-flex justify-content-center mt-2 align-items-end text-center">';
            echo '<p class="text-danger fw-bolder">*Please select an answer*</p>';
            echo '</div>';
            return 0;
        }

        $retrieve_correct_answer = "SELECT Correct from questions WHERE QID = $current_question";

        global $db;
        $ret = $db->query($retrieve_correct_answer);
        if ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $_SESSION['score'] +=  ($row["Correct"] == $selected_choice);
        }

        return 1;
    }

    function createQuestion($question)
    {
        echo '<div class="w-100 h-50 d-flex justify-content-center mt-5 align-items-end ">';
        echo '<form name="form1" action="" method="POST" class="w-50 justify-content-center border border-1 rounded-2 border-dark-subtle p-5">';

        echo '<div class="row">';
        echo '<p class="col-auto fw-bold">' . $question["QID"] . ')</p>';
        echo '<p class="col-auto">' . $question["Stem"] . '</p>';
        echo '</div>';

        // choice group
        echo '<div class="mx-5 ">';

        for ($i = ord('A'); $i <= ord('D'); $i++) {
            // each choice for each $i
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="radio" name="q' . $question['QID']  . '"' . "  value=" . chr($i) . ">";
            echo '<label class="form-check-label">';
            $choice = 'Alt_' . chr($i);
            echo $question[$choice];
            echo '</label>';
            echo '</div>';
        }

        // choices group
        echo '</div>';

        // button
        echo '<div class="d-flex justify-content-left mt-3 mx-5">';
        echo '<button class="btn btn-primary" name="submit_answer">Submit Answer</button>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
    }

    function finishquiz()
    {
        echo '<div class="main-bg">
        <div
          class="content-container text-center align-items-center justify-content-center mt-5 d-flex"
        >
          <div>
            <label class="display-4 text-center">Your score</label>';
        echo '<label class="font-title w-100 font-weight-bold text-success">';
        echo $_SESSION['score'];
        echo '</label>
            <label class="display-5">Out of 10</label>
            <br />
            <label>Nice</label>
          </div>
        </div>
        <div class="w-100 d-flex justify-content-center mt-5">
        <form method="POST">
          <button class="btn btn-primary" name="reattempt">Reattempt quiz</button>
        </form>
        </div>
      </div>
    </body>';


        if (isset($_POST['reattempt'])) {
            $_SESSION['lastQID'] = 0;
            $_SESSION['score'] = 0;
            header("Refresh:0");
        }
    }
    ?>
</body>


</html>