<?php
session_start();
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$pincode = '';
$city = '';

function getPincodeAndCityByUsername($name) {
    // Your database connection code here
    $conn = mysqli_connect("localhost:3306", "root", "", "amazon");

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Fetch pincode and city from the database
    $query = "SELECT city, pincode FROM addresses WHERE name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pincode = $row['pincode'];
        $city = $row['city'];

        // Close the database connection
        $stmt->close();
        $conn->close();

        // Return an associative array with pincode and city
        return ['pincode' => $pincode, 'city' => $city];
    } else {
        // Close the database connection
        $stmt->close();
        $conn->close();

        // Return null if no results found
        return null;
    }
}

// Call the function to get pincode and city
$result = getPincodeAndCityByUsername($name);

if ($result !== null) {
    // Set pincode and city for display
    $pincode = $result['pincode'];
    $city = $result['city'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon"href="./Images/amazon-icon.png" >
        <title>Your Addresses</title>

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" />
        <link rel="stylesheet" href="./CSS/addaddress.css?v=<?php echo time(); ?>">
        <link href="https://fonts.cdnfonts.com/css/amazon-ember" rel="stylesheet">

    </head>
    <body>
        <header class="header">
            <div class="container ">
                <div class="logo-container border-white">
                    <div class="logo"></div>
                    <span class="dotin">.in</span>
                </div>

                <div class="address-container border-white" onclick="redirectToAddressPage()">
                   <div class="icon-address">
                      <i class="fas fa-location-dot"></i>
                      <p id="address"><span><p>Deliver to <?php echo $name; ?><br><?php echo $city; ?>&nbsp <?php echo $pincode; ?></p>
                      <p></p>
                   </div>
                </div>

               <script>
                        function redirectToAddressPage() 
                        {
                          window.location.href = 'Address.php';
                        }
               </script>

                <div class="search-container">
                    <select class="search-select">
                        <option hidden>All</option>
                        <option>All Categories</option>
                        <option>Alexa Skills</option>
                        <option>Amazon Devices</option>
                        <option>Amazon Fashion</option>
                        <option>Amazon Fresh</option>
                        <option>Amazon Pharmacy</option>
                        <option>Appliances</option>
                        <option>Apps & Games</option>
                        <option>Baby</option>
                        <option>Beauty</option>
                        <option>Books</option>
                        <option>Car & Motorbike</option>
                        <option>Clothing & Accesories</option>
                        <option>Collectibles</option>
                        <option>Computers & Accesories</option>
                        <option>Deals</option>
                        <option>Electronics</option>
                        <option>Furniture</option>
                        <option>Garden & Outdoors</option>
                        <option>Gift Cards</option>
                        <option>Grocery & Gourmet Foods</option>
                        <option>Health & Personal Care</option>
                        <option>Home & Kitchen</option>
                        <option>Industrial & Scientific</option>
                        <option>Jwellery</option>
                        <option>Kindle Store</option>
                        <option>Luggage & Bags</option>
                        <option>Luxury Beauty</option>
                        <option>Movies & TV Shows</option>
                        <option>Music</option>
                        <option>Musical Instruments</option>
                        <option>Office Products</option>
                        <option>Pet Supplies</option>
                        <option>Prime Video</option>
                        <option>Shoes & Handbags</option>
                        <option>Software</option>
                        <option>Sports, Fitness & Outdoors</option>
                        <option>Subscribe & Save</option>
                        <option>Tools & Home Improvement</option>
                        <option>Toys & Games</option>
                        <option>Under ₹500</option>
                        <option>Video Games</option>
                        <option>Watches</option>
                    </select>
                    <input type="text" class="search-input" placeholder="Search Amazon.in"/>
                    <div class="search-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="language-container border-white">
                    
                    <div class="lauguge-image">
                        <img src="https://media.istockphoto.com/vectors/vector-flag-of-the-republic-of-india-proportion-23-the-national-flag-vector-id1051236720?k=20&m=1051236720&s=612x612&w=0&h=ATObRTHmTosADa9zaB2dQPn_VAQmG1XYH2x92kzc304=">
                    </div>
                    <p>EN</p>
                </div>

                <div class="login-container border-white">
                    <!-- <p>Hello,<span>sign in</span></p>
                    <p id="account">Account & Lists</p> -->
                
                    <div class="container ">
                        <div class="dropdown">
                            <button class="dropbtn">
                                <span class="icon">
                                    Hello,<?php echo $name; ?><p id="account">Account & Lists</p>
                                </span></button>
                            <div class="dropdown-content">
                                <input type="submit" value="Log out" id="continue" onclick="location.href='Index.php'">
                                <p id="new">New customer? <a href="Account.php" class="link">Start here.</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="return-order-container">
                    <p>Returns
                        <div id="order">& Orders</div>
                    </p>
                </div>

                <div class="cart-container border-white">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Cart
                </div>
            </div>
        </header>

        <nav class="navbar">
            <ul>
                <li><a href="#"><i class="fa-solid fa-bars fa-sharp" id="bar"></i>All</a></li>
                <li><a href="#">Amazon miniTV</a></li>
                <li><a href="#">Sell</a></li>
                <li><a href="#">Best Sellers</a></li>
                <li><a href="#">Mobiles</a></li>
                <li><a href="#">Today's Deals</a></li>
                <li><a href="#">Customer Service</a></li>
                <li><a href="#">Electronic</a></li>
                <li><a href="#">Prime</a></li>
                <li><a href="#">New Releases</a></li>
                <li><a href="#">Amazon Pay</a></li>
                <li><a href="#">Home & Kitchen</a></li>
                <li><a href="#">Fashion</a></li>
            </ul>
        </nav>
    <p id="p1">Your Account > Your Addresses > <span style="color: #c45500;">New Address</span></p>
    <p id="p2"><b>Add a new address</b></p>

    <form action="Save.php" method="post">
        <form id="addressForm" action="process_address.php" method="POST">
            <label for="coutry"><b>Country/Region</b></label>
            <select name="country" id="sel" class="box" required>
                <option value="AF">Afghanistan</option>
                <option value="AX">Aland Islands</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AO">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AQ">Antarctica</option>
                <option value="AG">Antigua and Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AM">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austira</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas, The</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BZ">Belize</option>
                <option value="BM">Bermuda</option>
                <option value="BT">Bhutan</option>
                <option value="BO">Bolivia</option>
                <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                <option value="BW">Botswana</option>
                <option value="BV">Bouvet Island</option>
                <option value="BR">Brazil</option>
                <option value="IO">British Indian Ocean Territory</option>
                <option value="BN">Brunei Darussalam</option>
                <option value="BG">Bulgaria</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodia</option>
                <option value="CM">Cameroon</option>
                <option value="CA">Canada</option>
                <option value="IC">Canary Islands</option>
                <option value="CV">Cape Verde</option>
                <option value="KY">Cayman Islands</option>
                <option value="CF">Central African Republic</option>
                <option value="TD">Chad</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CX">Christmas Island</option>
                <option value="CC">Cocos (Keeling) Islands</option>
                <option value="CO">Colombia</option>
                <option value="KM">Comoros</option>
                <option value="CG">Congo</option>
                <option value="CD">Congo, Democratic Republic of</option>
                <option value="CK">Cook Islands</option>
                <option value="CR">Costa Rica</option>
                <option value="HR">Croatia</option>
                <option value="CW">Curacao</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominica, Commonwealth of</option>
                <option value="DO">Dominican Republic</option>
                <option value="TL">East Timor</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Equatorial Guinea</option>
                <option value="ER">Eritrea</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FK">Falkland Islands</option>
                <option value="FO">Faroe Islands</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="GF">French Guiana</option>
                <option value="PF">French Polynesia</option>
                <option value="TF">French Southern Territories</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambia, The</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GR">Greece</option>
                <option value="GL">Greenland</option>
                <option value="GD">Grenada</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GG">Guernsey</option>
                <option value="GN">Guinea</option>
                <option value="GW">Guinea-Bissau</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haiti</option>
                <option value="HM">Heard Isalands and the McDonald Islands</option>
                <option value="VA">Holy Sea</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN" selected>India</option>
                <option value="ID">Indonesia</option>
                <option value="IQ">Iraq</option>
                <option value="IE">Ireland, Replublic of</option>
                <option value="IM">Isle of Man</option>
                <option value="IL">ISrael</option>
                <option value="IT">Italy</option>
                <option value="CI">Ivory Coast (Code D'ivoire)</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JE">Jersey</option>
                <option value="JO">Jordon</option>
                <option value="KZ">Kazakhastan</option>
                <option value="KE">Kenya</option>
                <option value="KI">Kiribati</option>
                <option value="KR">Korea, Republic of</option>
                <option value="XK">Kosovo</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyztan</option>
                <option value="LA">Lao, People's Democratic Republic</option>
                <option value="LV">Latvia</option>
                <option value="LB">Lebanon</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Liberia</option>
                <option value="LY">Libya</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macao</option>
                <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                <option value="MG">Madagascar</option>
                <option value="MW">Malawi</option>
                <option value="MY">Malaysia</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malta</option>
                <option value="MH">Marshall Islands</option>
                <option value="MQ">Martinique</option>
                <option value="MR">Mauritania</option>
                <option value="MU">Mauritius</option>
                <option value="YT">Mayotte</option>
                <option value="MX">Mexico</option>
                <option value="FM">Micronesia, Federated States of</option>
                <option value="MD">Moldova, Replublic of</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolia</option>
                <option value="ME">Montenegro</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Morocco</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Namibia</option>
                <option value="NR">Nauru</option>
                <option value="NP">Nepal</option>
                <option value="NL">Netherlands</option>
                <option value="AN">Netherlands Antilles</option>
                <option value="NC">New Caledonia</option>
                <option value="NZ">New Zealand</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="NU">Niue</option>
                <option value="NF">Norfolk Island</option>
                <option value="MP">Northern Mariana Islands</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palau</option>
                <option value="PS">Palestinian Territories</option>
                <option value="PA">Panama</option>
                <option value="PG">Papua New Guinea</option>
                <option value="PY">Paraguay</option>
                <option value="PE">Peru</option>
                <option value="PH">Philippines</option>
                <option value="PN">Pitcarin</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="QA">Quatar</option>
                <option value="RE">Reunion</option>
                <option value="RO">Romania</option>
                <option value="RU">Russian Federation</option>
                <option value="RW">Rwanda</option>
                <option value="BL">Saint Barthelemy</option>
                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                <option value="KN">Saint Kitts and Nevis</option>
                <option value="LC">Saint Lucia</option>
                <option value="MF">Saint Martin</option>
                <option value="PM">Saint Pierre and Miquelon</option>
                <option value="VC">Saint Vincent and the Grenadines</option>
                <option value="WS">Samoa</option>
                <option value="SM">San Marino</option>
                <option value="ST">Sao Tome and Principe</option>
                <option value="SA">Saudi Arabia</option>
                <option value="SN">Senegal</option>
                <option value="RS">Serbia</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapore</option>
                <option value="SX">Sint Maarten</option>
                <option value="SK">Slovakia</option>
                <option value="SI">Slovenia</option>
                <option value="SB">Solomon Islands</option>
                <option value="SO">Somalia</option>
                <option value="ZA">South Africa</option>
                <option value="GS">South Georgia and the South Sandwich Islands</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SR">Suriname</option>
                <option value="SJ">Svalbard and Jan Mayen</option>
                <option value="SZ">Swaziland</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="TW">Taiwan</option>
                <option value="TJ">Tajikistan</option>
                <option value="TZ">Tanzania, United Republic of</option>
                <option value="TH">Thailand</option>
                <option value="TG">Togo</option>
                <option value="Tk">Tokelau</option>
                <option value="To">Tonga</option>
                <option value="TT">Trinidad and Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Turkey</option>
                <option value="TM">Turkmenistan</option>
                <option value="TX">Turks and Caicos Islands</option>
                <option value="TV">Tuvalu</option>
                <option value="UG">Ugnada</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB">United Kingdom</option>
                <option value="US">United States</option>
                <option value="UM">United States Minor Outlying Islands</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Vietnam</option>
                <option value="VG">Virgin Islands, British</option>
                <option value="VI">Virgin Islands, US</option>
                <option value="WF">Wallis and Futuna</option>
                <option value="EH">Western Sahara</option>
                <option value="YE">Yemen</option>
                <option value="ZM">Zambia</option>
                <option value="ZW">Zimbabwe</option>
            </select>

            <label for="name"><b>Full name (First and Last Name)</b></label>
            <input type="text" id="fullname" name="fullname" class="box" required>

            <label for="mobile"><b>Mobile Number</b></label>
            <input type="text" id="mobile" name="mobile" class="box" style="margin-bottom: 0px;" required>
            <p style="margin-top: 5px; margin-bottom: 12px; font-size: 13px;">May be used to assist delivery</p>

            <label for="country"><b>Pincode</b></label>
            <input type="text" id="country" name="country" class="box" placeholder="6 digits [0-9] PIN code" required>

            <label for="pincode"><b>Flat, House no., Building, Company, Apartment</b></label>
            <input type="text" id="pincode" name="pincode" class="box" required>

            <label for="address"><b>Area, Street, Sector, Village</b></label>
            <input type="text" id="address" name="address" class="box" required>

            <label for="landmark"><b>Landmark</b></label>
            <input type="text" id="landmark" name="landmark" class="box" placeholder="E.g. near apollo hospital" required>

            <label for="city" style="display: inline-block;"><b>Town/City</b></label>
            <label for="state" style="display: inline-block; margin-left: 162px;"><b>State</b></label>

            <input type="text" id="city" name="city" class="box" style="width: 222px;" required>

            
            <select name="state" id="sel" class="box" style="width: 210px; margin-left: 15px;" required>
                <option value="" hidden>Choose a state</option>
                <option value="ANDAMAN & NICOBAR ISLANDS">ANDAMAN & NICOBAR ISLANDS</option>
                <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                <option value="ASSAM">ASSAM</option>
                <option value="BIHAR">BIHAR</option>
                <option value="CHANDIGARH">CHANDIGARH</option>
                <option value="CHHATTISGARH">CHHATTISGARH</option>
                <option value="DADRA AND NAGAR HAVELI AND DAMAN AND DIU">DADRA AND NAGAR HAVELI AND DAMAN AND DIU</option>
                <option value="DELHI">DELHI</option>
                <option value="GOA">GOA</option>
                <option value="GUJARAT">GUJARAT</option>
                <option value="HARYANA">HARYANA</option>
                <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                <option value="JAMMU & KASHMIR">JAMMU & KASHMIR</option>
                <option value="JHARKHAND">JHARKHAND</option>
                <option value="KARNATKAKA">KARNATKAKA</option>
                <option value="KERALA">KERALA</option>
                <option value="LADAKH">LADAKH</option>
                <option value="LAKSHADWEEP">LAKSHADWEEP</option>
                <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                <option value="MAHARASHTRA">MAHARASHTRA</option>
                <option value="MANIPUR">MANIPUR</option>
                <option value="MEGHALAYA">MEGHALAYA</option>
                <option value="MIZORAM">MIZORAM</option>
                <option value="NAGALAND">NAGALAND</option>
                <option value="ODISHA">ODISHA</option>
                <option value="PUDUCHERRY">PUDUCHERRY</option>
                <option value="PUNJAB">PUNJAB</option>
                <option value="RAJASTHAN">RAJASTHAN</option>
                <option value="SIKKIM">SIKKIM</option>
                <option value="TAMIL NADU">TAMIL NADU</option>
                <option value="TELANGANA">TELANGANA</option>
                <option value="TRIPURA">TRIPURA</option>
                <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                <option value="UTTARAKHAND">UTTARAKHAND</option>
                <option value="WEST BENGAL">WEST BENGAL</option>
            </select>

            <button type="submit" id="add">Add Address</button>
        </form>

        <nav class="navbar1">
            <ul>
                <li><b><a>Back to top</a></b></li>
            </ul>
        </nav>
        <div class="footer">
            <div class="footercon">
                <ul class="list1">
                    <li><b>Get to know us</b></li>
                    <li><a href="">About us</a></li>
                    <li><a href="">Careers</a></li>
                    <li><a href="">Press releases</a></li>
                    <li><a href="">Amazon Science</a></li>
                </ul>
                <ul class="list1 list3">
                    <li><b>Connect with us</b></li>
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Twitter</a></li>
                    <li><a href="">Instagram</a></li>
                </ul>
                <ul class="list1 list2">
                    <li><b>Make Money with us</b></li>
                    <li><a href="">Sell on Amazon</a></li>
                    <li><a href="">Sell under Amazon Acclerator </a></li>
                    <li><a href="">Protect and Built with us</a></li>
                    <li><a href="">Become an Affilitate</a></li>
                    <li><a href="">Fulfilment by Amazon</a></li>
                    <li><a href="">Advertise your Products</a></li>
                    <li><a href="">Amazon Pay on Merchants</a></li>
                </ul>
                <ul class="list1 list2">
                    <li><b>Let us Help You</b></li>
                    <li><a href="">COVID-19 and Amazon</a></li>
                    <li><a href="">Your Account</a></li>
                    <li><a href="">Return Center</a></li>
                    <li><a href="">100% Purchase Protection</a></li>
                    <li><a href="">Amazon App Download</a></li>
                    <li><a href="">Amazon Assistant Download</a></li>
                    <li><a href="">Help</a></li>
                </ul>
            </div>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <div class="container container-header">
            <div class="logo-container border-white">
                <img src="./Images/Amazon-logo4.png" alt="" class="logo">

            </div>
            <div class="dropdown2">
                <button class="dropbtn2"><span class="icon"><ion-icon name="globe-outline"></ion-icon>
                        English</span></button>
                <div class="dropdown-content2">
                    <a href="">English-EN</a>
                    <a href="">हिंदी-HI</a>
                </div>
            </div>
        </div>
        <nav class="navbar2">
            <ul>

                <li><a>Austrailia</a></li>
                <li><a>Brazil</a></li>
                <li><a>Canada</a></li>
                <li><a>China</a></li>
                <li><a>France</a></li>
                <li><a>Germany</a></li>
                <li><a>Italy</a></li>
                <li><a>Japan</a></li>
                <li><a>Mexico</a></li>
                <li><a>Netherlands</a></li>
                <li><a>Poland</a></li>
                <li><a>Singapore</a></li>
                <li><a>Spain</a></li>
                <li><a>Turkey</a></li>
                <li><a>United Arab Emirates</a></li><br>
            </ul>
            <ul>
                <li><a>United Kingdom</a></li>
                <li><a>United States</a></li>
            </ul>
        </nav>

</html>