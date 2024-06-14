<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"href="./Images/amazon-icon.png" >
    <title>Amazon Registration</title>
    <link rel="stylesheet" href="./CSS/account.css?v=<?php echo time(); ?>">
    <form action="DB.php" method="post">
        
</head>

<body>


    <div class="logo">
        <img src="https://th.bing.com/th/id/R.4ecb200971f06a7e6b64bf096f6c9438?rik=%2fjB%2bQDjlj5mp4g&riu=http%3a%2f%2fwww.ranklogos.com%2fwp-content%2fuploads%2f2014%2f10%2fAmazon.in_-500x107.jpg&ehk=3Oak0NN6Tb4yKzkDzGegUU5pRiQR09vyNqP4V7ACMyo%3d&risl=&pid=ImgRaw&r=0" id="logo1">
    </div>
    <div class="container block">
        <p id="create" class="margin">Create Account</p>
        
        <label class="block margin" id="name"><b>Your name</b></label>
        <input type="text" name="name" class="margin" id="text1" required class="block" placeholder="First and last name" required>
        
        <label class="block margin margin2" ><b>Mobile number</b></label>
        <select name="code" id="code" class="margin">
            <!-- <option data-calling-code="93" data-country-code="AF" value="AF" data-a-html-content="Afghanistan +93">AF +93</option>
            <option data-calling-code="335" data-country-code="AL" value="AL" data-a-html-content="Albania +91">AL +335</option>
            <option data-calling-code="213" data-country-code="DZ" value="DZ" data-a-html-content="Algeria +213">DZ +213</option>
            <option data-calling-code="1" data-country-code="AS" value="AS" data-a-html-content="American Samoa +1">AS +1</option>
            <option data-calling-code="376" data-country-code="AD" value="AD" data-a-html-content="Andorra +376">AD +376</option>
            <option data-calling-code="244" data-country-code="AO" value="AO" data-a-html-content="Angola +244">DO +244</option>
            <option data-calling-code="213" data-country-code="DZ" value="DZ" data-a-html-content="Antigua & Barbuda +1">AG +1</option>
            <option data-calling-code="54" data-country-code="AR" value="AR" data-a-html-content="Argentina +54">AR +54</option>
            <option data-calling-code="374" data-country-code="AM" value="AM" data-a-html-content="Armenia +374">AM +374</option>
            <option data-calling-code="297" data-country-code="AW" value="AW" data-a-html-content="Aruba +297">AW +297</option>
            <option data-calling-code="61" data-country-code="AU" value="AU" data-a-html-content="Australia +61">AU +61</option>
            <option data-calling-code="43" data-country-code="AT" value="AT" data-a-html-content="Austria +54">AT +43</option>
            <option data-calling-code="994" data-country-code="AZ" value="AZ" data-a-html-content="Azerbaijan +54">AZ +994</option>
            <option data-calling-code="1" data-country-code="BS" value="BS" data-a-html-content="Bahamas +1">BS +1</option> -->
            <option data-calling-code="91" data-country-code="IN" value="IN" data-a-html-content="India +91">IN +91</option>
        </select>
        <input type="text" name="number" id="text2" class="" placeholder="Mobile number">

        <label class="block margin margin2" ><b>Email(optional)</b></label>
        <input type="email" name="email" id="email" class="block margin">

        <label class="block margin margin2" ><b>Password</b></label>
        <input type="password" name="password" id="password" class="block margin" placeholder="At least 6 characters">
        <p class="block margin" id="char">Passwords must be at least 6 characters</p>

        <p class="block margin" id="consent">By enrolling your mobile phone number, you consent to receive automated security notifications via text message from Amazon. Message and data rates may apply.</p>

        <button class="block margin" id="continue" onclick="validate()" >Continue</button>

        <div id="line1"></div>

        <p class="block margin" id="account">Already have an account?<a href="#" class="link" onclick="location.href='login.php'"> Sign in</a></p>
        <p class="block margin" id="work">Buying for work?<a href="#" class="link"> Create a free buisness account</a></p>

        <p class="block margin" id="agree">By creating an account or logging in, you agree to Amazon's <a href="#" class="link">Conditions of Use </a>and <a href="#" class="link">Privacy Notice</a>.</p>

    </div>

    <div class="line"></div>

    <nav class="navbar">
        <ul>
            <li><a href="#">Conditions of Use</a></li>
            <li><a href="#">Privacy Notice</a></li>
            <li><a href="#">Help</a></li>
        </ul>
    </nav>
    <p id="inc">© 1996-2023, Amazon.com, Inc. or its affiliates</p>

    <script>
        function validate(){
            let name = document.getElementById('name').value;
            let password = document.getElementById('password').value;
            let number = document.getElementById('number').value;
            if(name == '')
            {
                alert('Name cannot be blank');
            }   
            if(number == '')
            {
                alert('Number cannot be blank');
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

</body>
</form>
</html>