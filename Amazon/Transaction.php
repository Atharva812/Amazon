<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .payment-container {
            text-align: center;
            padding: 20px;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #timer {
            font-size: 24px;
            color: #333;
        }
        #qr-code {
            margin-top: 20px;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <div class="payment-container">
        <h1>Transaction Payment Page</h1>

  

        <p>Please wait while we process your payment.</p>
        
       
        <p id="timer">Transaction will complete in: <span id="countdown"></span></p>


        <img id="qr-code" src="./Images/QR_Image.jpg" alt="QR Code" width="150" height="150">

    </div>

    <script>
       
        var timerDuration = 300; 

       
        function updateTimer() {
            var minutes = Math.floor(timerDuration / 60);
            var seconds = timerDuration % 60;

           
            document.getElementById('countdown').innerHTML = minutes + 'm ' + seconds + 's';

            
            timerDuration--;

          
            if (timerDuration < 0) {
                clearInterval(timerInterval);
                document.getElementById('timer').innerHTML = "Transaction completed!";
                
        }

      
        updateTimer();

       
        var timerInterval = setInterval(updateTimer, 1000);
    </script>

</body>
</html>
