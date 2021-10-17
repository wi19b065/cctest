<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crypto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <?php
    $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
    $parameters = [
        'start' => '1',
        'limit' => '50',
        'convert' => 'EUR'
    ];

    $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: 5fc5e4fe-ff05-44d4-913d-03fe7ef61cbd'
    ];
    $qs = http_build_query($parameters); // query string encode the parameters
    $request = "{$url}?{$qs}"; // create the request URL


    $curl = curl_init(); // Get cURL resource
    // Set cURL options
    curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            // set the request URL
        CURLOPT_HTTPHEADER => $headers,     // set the headers 
        CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
    ));

    $response = curl_exec($curl); // Send the request, save the response
    //print_r(json_decode($response)); // print json decoded response
    curl_close($curl); // Close request
    ?>
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
                <input type="email" name="user" id="user" required style="padding-right: 200px; border: 0px; margin-left: 20px;" placeholder="E-Mail">
                <div>
                    <div style="margin-top: 20px; ">
                        <select name="crypto" size="3" required style="border:0px;" id="cryptoselect">
                            <option>BTC</option>
                            <option>ETH</option>
                            <option>DOGE</option>
                        </select>
                    </div>
                    <div style="margin-top: 20px;">
                        <button style="border: 0px; margin: 20px; padding: 20px; padding-left: 60px; padding-right: 60px;" id="buttonselect" type="submit">
                            show
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container" id="dataContainer" style="color:white;">

    </div>


    <script>
        
        //myForm.addEventListener("submit", (e) => {
        //    e.preventDefault();
        //});

        let response = JSON.parse(<?php echo json_encode($response); ?>);
        console.log(response);

        $('#buttonselect').click(function() {
            let email = $('#user').val();
            let selectedCoin = $('#cryptoselect option:selected').val();
            let coinData;

            response.data.forEach(element => {
                if(element.symbol === selectedCoin) {
                    coinData = element;
                }
            });
            
            

            console.log(coinData);
            let symbol = coinData.symbol;
            let name = coinData.name;
            let price = coinData.quote.EUR.price;
            let currency = 'EUR';

            alert( 'Selected coin: ' + name + '(' + symbol + ')' + ', Price: ' + price + '€');
            //$('#dataContainer').text(
            //    'Selected coin: ' + name + '(' + symbol + ')' + ', Price: ' + price + '€'
            //);

            document.cookie='email=' + email;
            document.cookie='selected_coin=' + selectedCoin;
            document.cookie='symbol=' + symbol;
            document.cookie='name=' + name;
            document.cookie='price=' + price;
            document.cookie='currency=' + currency;

            console.log(email, selectedCoin, symbol, name, price, currency);


        });

        <?php
            $servername = "localhost:3306";
            $username = "cctest";
            $password = "Kjrb910?";

            $email = $_COOKIE['email'];
            $selectedCoin = $_COOKIE['selected_coin'];
            $symbol = $_COOKIE['symbol'];
            $name = $_COOKIE['name'];
            $price = $_COOKIE['price'];
            $currency = $_COOKIE['currency'];

            // Create connection
            $conn = mysqli_connect($servername, $username, $password);

            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }
            //echo "Connected successfully";

            $presql = "use cctest;";
            $sql = "INSERT INTO `crypto_data` (`email`, `symbol`, `name`, `price`, `currency`) VALUES ('$email', '$selectedCoin', '$name', '$price', '$currency')";


            

            //$conn->query($sql);
            if ($conn->query($presql) === TRUE) {
                //echo "New record created successfully";
              } else {
                //echo "Error: " . $presql . "<br>" . $conn->error;
            }
            //$conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
              } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();

        ?>
    </script>
    
    
    

</body>

</html>