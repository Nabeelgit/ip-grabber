<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate code</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
    <h1><a href="./">IP Grabber</a></h1>
    </header>
    <div class="container">
        <h1>Your code: </h1>
        <div class="code">
            <?php
            function generateRandomString($length) {
                $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomCharacter = $characters[rand(0, strlen($characters) - 1)];
                    $randomString .= $randomCharacter;
                }
                return $randomString;
            }
            require './vendor/autoload.php';
            $conn = new MongoDB\Client('mongodb://localhost:27017');
            $table = $conn->IPGrabber->ips;
            $code = generateRandomString(9);
            while($table->findOne(['code' => $code]) !== null){
                $code = generateRandomString(9);
            }
            
            ?>
            <h1><?php echo $code?></h1>
        </div>
        <h2 style="margin-top: 1rem">Share this url: </h2>
        <?php
        function url_origin( $s, $use_forwarded_host = false )
        {
            $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
            $sp       = strtolower( $s['SERVER_PROTOCOL'] );
            $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
            $port     = $s['SERVER_PORT'];
            $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
            $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
            $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
            return $protocol . '://' . $host;
        }
        $url = url_origin($_SERVER).'/cool.php?q='.$code;
        ?>
        <h3 style="color: blue"><?php echo $url?></h3>
    </div>
</body>
</html>