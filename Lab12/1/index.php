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



</head>

<body>

    <form action="" method="POST">
        <label for="prodid">Name :</label>
        <input type="text" id="prodid" name="prodid" placeholder="Enter a Product ID (1-30)" required />
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $prodid = $_POST['prodid'];
        $url = "http://10.0.15.21/lab/lab12/restapis/products.php?prodid=" . $prodid;
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        $result = json_decode($response);
        echo "Product ID: " . $result->ProductID . " <br>";
        var_dump($url) . '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        var_dump($client) . '<br>';

        echo '<br>';
        echo '<br>';
        echo '<br>';
        var_dump($response) . '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        var_dump($result);
    }
    ?>



</body>



</html>