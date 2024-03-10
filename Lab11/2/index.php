<html lang="en">


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
    <script>
        function showData() {
            document.getElementById("customerID").value = "<?php echo $_COOKIE["CustomerId"]; ?>";
            document.getElementById("firstname").value = "<?php echo $_COOKIE["FirstName"]; ?>";
            document.getElementById("lastname").value = "<?php echo $_COOKIE["LastName"]; ?>";
            document.getElementById("address").value = "<?php echo $_COOKIE["Address"]; ?>";
            document.getElementById("email").value = "<?php echo $_COOKIE["Email"]; ?>";
            document.getElementById("phone").value = "<?php echo $_COOKIE["Phone"]; ?>";
        }

        function clearData() {
            document.getElementById("customerID").value = "";
            document.getElementById("firstname").value = "";
            document.getElementById("lastname").value = "";
            document.getElementById("address").value = "";
            document.getElementById("email").value = "";
            document.getElementById("phone").value = "";
        }

        window.addEventListener('load', function() {
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        });
    </script>



</head>

<body>
    <?php
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('customers.db');
        }
    }
    $db = new MyDB();
    if (!$db) {
        echo $db->lastErrorMsg();
    } else {
        $sql = "SELECT * FROM customers LIMIT 1";
        $ret = $db->query($sql);
        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $customer = (object) $row;

            if (isset($_POST['save'])) {
                $customerId = $customer->CustomerId;
                $firstname = $customer->FirstName;
                $lastname = $customer->LastName;
                $address = $customer->Address;
                $email = $customer->Email;
                $phone = $customer->Phone;
                setcookie('CustomerId', $customerId, time() + (86400), "/");
                setcookie('FirstName', $firstname, time() + (86400), "/");
                setcookie('LastName', $lastname, time() + (86400), "/");
                setcookie('Address', $address, time() + (86400), "/");
                setcookie('Email', $email, time() + (86400), "/");
                setcookie('Phone', $phone, time() + (86400), "/");

                echo '<script> clearData()</script>';
                echo '<script>window.location.href = "' . $_SERVER["PHP_SELF"] . '";</script>';
                exit();
            }

            if (isset($_POST['show']) && isset($_COOKIE["CustomerId"])) {

                echo '<script>showData()</script>';
            }
            if (isset($_POST['clear'])) {

                echo '<script> clearData()</script>';
                foreach ($_COOKIE as $name => $value) {
                    setcookie($name, '', time() - 3600, '/'); // Set the expiration time to a past date to delete the cookie
                }
                echo '<script>window.location.href = "' . $_SERVER["PHP_SELF"] . '";</script>';
                exit();
            }

            if (!isset($_COOKIE["CustomerId"])) {
                echo 'Read from customers.db';
            } else {
                echo 'customer in cookie = ' . $_COOKIE["FirstName"];
            }

            echo '<div class="w-100 mt-5 d-flex justify-content-center mt-2">';
            echo '<form style="width:40%;" method="POST" class="justify-content-center ">';
            echo '<div class="form-floating mb-3">';
            echo '<input class="form-control" name="customerID" id="customerID"  value="';
            // echo $customer->CustomerId;
            // echo $customer->CustomerId;
            if (isset($_COOKIE["CustomerId"]) && !isset($_POST['show'])) {
                echo '';
            } else {
                echo $customer->CustomerId;
            }
            echo '">';
            echo '<label for="customerID">customerID</label>';
            echo '</div>';

            echo '<div class="row mb-3 justify-content-around">
            <div class="col-6 form-floating">';
            echo '<input class="form-control" name="firstname" id="firstname"  value="';
            if (isset($_COOKIE["FirstName"]) && !isset($_POST['show'])) {
                echo '';
            } else {
                echo $customer->FirstName;
            }
            echo '">';
            echo '<label class="ml-2" for="firstname">Firstname</label>
            </div>';

            echo '<div class="col-6 form-floating">';
            echo '<input class="form-control" name="lastname" id="lastname"  value="';
            if (isset($_COOKIE["LastName"]) && !isset($_POST['show'])) {
                echo '';
            } else {
                echo $customer->LastName;
            }
            echo '">';
            echo '<label class="ml-2" for="lastname">Lastname</label>
            </div>
            </div>';

            echo '<div class="form-floating mb-3">';
            echo '<textarea class="form-control" style="height:100px" name="address" id="address"
            >';
            if (isset($_COOKIE["Address"]) && !isset($_POST['show'])) {
                echo '';
            } else {
                echo $customer->Address;
            }
            echo '</textarea>';
            echo '<label for="address">Address</label>';
            echo '</div>';

            echo '<div class="form-floating mb-3">';
            echo '<input class="form-control" type="email" name="email" id="email"  value="';
            if (isset($_COOKIE["Email"]) && !isset($_POST['show'])) {
                echo '';
            } else {
                echo $customer->Email;
            }
            echo '">';
            echo '<label for="email">Email</label>';
            echo '</div>';

            echo '<div class="form-floating mb-3">';
            echo '<input class="form-control" name="phone" id="phone"  value="';
            if (isset($_COOKIE["Phone"]) && !isset($_POST['show'])) {
                echo '';
            } else {
                echo $customer->Phone;
            }
            echo '">';
            echo '<label for="phone">Phone</label>';
            echo '</div>';

            echo '<div class="justify-content-around d-flex">
            <button class="btn btn-info" name="save">Save Data</button>
            <button class="btn btn-primary" name="show">Show Data</button>
            <button class="btn btn-danger" name="clear" onclick="clearData()">Clear Data</button>
        </div>';
            echo '</form>';
        }
    }

    ?>
</body>



</html>