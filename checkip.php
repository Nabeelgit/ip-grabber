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
        <h1><a href="./">IP Grabber</a></h1>
    </header>
    <?php
    if(!isset($_GET['code'])){
        header('Location: ./');
    }
    $code = $_GET['code'];
    ?>
    <div class="container">
        <form action="./checkip.php" method="get">
            <label for="code">Enter code to check grabbed ips: </label>
            <input name="code" placeholder="Enter code..." value="<?php echo $code?>" required>
            <button type="submit">Submit</button>
        </form>
        <?php
        require './vendor/autoload.php';
        $conn = new MongoDB\Client('mongodb://localhost:27017');
        $table = $conn->IPGrabber->ips;
        $matches = $table->find(['code' => $code])->toArray();
        $len = count($matches);
        if($len === 0){
            ?>
            <h1 style="margin-top: 1rem;">No one has clicked on this code</h1>
            <?php
        } else {
            ?>
            <h1 style="margin-top: 1rem;">Clicks: </h1>
            <?php
        }
        foreach($matches as $match) {
            ?>
            <h2 style="margin-top: 1rem;"><?php echo $match['ip']?></h2>
            <?php
        }
        ?>
    </div>
</body>
</html>