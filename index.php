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
    <div class="container">
        <form action="./checkip.php" method="get">
            <label for="code">Enter code to check grabbed ips: </label>
            <input name="code" placeholder="Enter code..." required>
            <button type="submit">Submit</button>
        </form>
        <h2 style="margin-top: 3rem">OR</h2>
        <a href="./generate.php" style="margin-top: 3rem">Generate code to start grabbing ips</a>
        <h1>How it works: </h1>
        <p>To start grabbing ips, click generate code and we will give you a url which you send to the desired person and a code which you can use to see which ips you have grabbed.</p>
        <h1>IMPORTANT NOTE:</h1>
        <strong>Please do NOT commit illegal activities with this information, grabbing stranger's ips is highly condemned, you can use this tool on your friends or family as long as <mark>THEY ARE OK WITH IT.</mark> DO NOT leak locations on social media or anywhere else.</strong>
    </div>
</body>
</html>