<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crypto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" />
</head>

<body style="background-color: #1e1e1e;">
    <h1 style="
            text-align: center;
            color: darkgrey; 
            font-weight: 600; 
            margin-bottom: 40px; 
            margin-top: 40px; 
            font-size: 60px;">
        Crypto API and AWS
    </h1>
    <div class="container" style="text-align: center; font-size: 18px; background-color: lightgray; padding: 40px;">
        <form id="myForm" class="form">
            <div style="margin-top: 20px;">
                <input type="email" name="user" id="user" required
                    style="padding-right: 200px; border: 0px; margin-left: 20px;" placeholder="E-Mail">
                <div>
                    <div style="margin-top: 20px; ">
                        <select name="crypto" size="3" required style="border:0px;" id="cryptoselect">
                            <option>BTC</option>
                            <option>ETH</option>
                            <option>DOGE</option>
                        </select>
                    </div>
                    <div style="margin-top: 20px;">
                        <button type="submit"
                            style="border: 0px; margin: 20px; padding: 20px; padding-left: 60px; padding-right: 60px;"
                            id="buttonselect">show</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    
</body>

</html>