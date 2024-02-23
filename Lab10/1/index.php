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
    <!-- <script src="script.js"></script> -->
</head>

<body>
    <div class="d-flex justify-content-center mt-3">
        <p class="display-6 fw-bold">Customers Details</p>
    </div>




    <?php

    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('customers.db');
        }
    }

    // 2. Open Database 
    $db = new MyDB();
    if (!$db) {
        echo $db->lastErrorMsg();
    } else {

        echo '<div class="w-100 d-flex justify-content-center ">';
        echo '<table class="w-75 table  table-hover">';
        echo '<thead class="thead-dark">
                            <tr>
                                <th scope="col">Customer ID</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Company</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>';
    }

    // 3. Query Execution
    // SQL Statements

    $sql = "SELECT * FROM customers ORDER BY CustomerId";
    $ret = $db->query($sql);

    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        echo '<tr>';
        // $id = htmlspecialchars($row['CustomerID']);
        // $firstname = htmlspecialchars($row['FirstName']);
        // $lastname = htmlspecialchars($row['LastName']);
        // $company = htmlspecialchars($row['Company']);
        // $address = htmlspecialchars($row['Address']);
        // $phone = htmlspecialchars($row['Phone']);
        // $email = htmlspecialchars($row['Email']);

        echo "<td>" . $row["CustomerId"] . "</td>";
        echo "<td>" . $row["FirstName"] . "</td>";
        echo "<td>" . $row["LastName"] . "</td>";
        echo "<td>" . $row["Company"] . "</td>";
        echo "<td>" . $row["Address"] . "</td>";
        echo "<td>" . $row["Phone"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';


    echo '<div class="w-100 d-flex justify-content-center ">';
    echo '<form name="form1" action="" method="POST" class="justify-content-center ">';
    echo '<button class="btn btn-danger" name="del">Delete last row</div>';
    echo "</form>";

    echo '</div>';

    if (isset($_POST['del'])) {
        // echo "XD";
        $sql = "DELETE FROM customers WHERE CustomerId = (SELECT max(CustomerID) from `customers` limit 1)";
        $ret = $db->exec($sql);
        if (!$ret) {
            echo $db->lastErrorMsg();
        } else {
            // echo "Delete failed";
            echo '<script>window.location.href = "' . $_SERVER["PHP_SELF"] . '";</script>';
            exit();
        }
    }
    // echo "Operation done successfully<br>";

    // 4. Close database
    $db->close();
    ?>
</body>


</html>