<?php
session_start();
$productPrice = 649.00; 
$deliveryCost = 00.00;
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$pincode = '';
$city = '';

function getPincodeAndCityByUsername($name) {
 
    $conn = mysqli_connect("localhost:3306", "root", "", "amazon");

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $query = "SELECT city, pincode FROM addresses WHERE name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pincode = $row['pincode'];
        $city = $row['city'];

       
        $stmt->close();
        $conn->close();

        
        return ['pincode' => $pincode, 'city' => $city];
    } else {
       
        $stmt->close();
        $conn->close();

   
        return null;
    }
}


$result = getPincodeAndCityByUsername($name);

if ($result !== null) {

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
        <title>Buy Campus Mens Rodeo Pro BLK/T.BLU Running Shoe - 9 UK (CG-237)atAmazon.in </title>

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" />
        <link rel="stylesheet" href="./CSS/pro2.css?v=<?php echo time(); ?>" />
        <link href="https://fonts.cdnfonts.com/css/amazon-ember" rel="stylesheet">

    </head>
    <script>
     
     function updateDeliveryInformation() {
         var currentDate = new Date();

         var tomorrowDate = new Date(currentDate);
         tomorrowDate.setDate(currentDate.getDate() + 1);

         var deliveryDate = new Date(currentDate);
         deliveryDate.setDate(currentDate.getDate() + 3);

      
         var options = { weekday: 'long', month: 'long', day: 'numeric' };
         var formattedDeliveryDate = deliveryDate.toLocaleDateString('en-US', options);
         document.getElementById('deliveryDate').innerHTML = formattedDeliveryDate;

         var options = { weekday: 'long', month: 'long', day: 'numeric' };
         var tomorrowDeliveryDate = tomorrowDate.toLocaleDateString('en-US', options);
         document.getElementById('tomorrowDate').innerHTML = tomorrowDeliveryDate;
     }

 
     function showTodaysDate() {
         var today = new Date();
         var options = { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' };
         var formattedDate = today.toLocaleDateString('en-US', options);

         document.getElementById('todaysDate').innerHTML = formattedDate;
     }

    
     function populateQuantityDropdown() {
         var quantityDropdown = document.getElementById('quantity');

        
         quantityDropdown.innerHTML = '';

         
         for (var i = 1; i <= 16; i++) {
             var option = document.createElement('option');
             option.value = i;
             option.text = i;
             quantityDropdown.add(option);
         }
     }

     
     window.onload = function() {
         updateDeliveryInformation();
         showTodaysDate();
         populateQuantityDropdown();

        
         setInterval(updateDeliveryInformation, 60000); 
     };

     
     function redirectToCheckout() {
    var productPrice = <?php echo json_encode($productPrice, JSON_NUMERIC_CHECK); ?>;
    var deliveryCost = <?php echo json_encode($deliveryCost, JSON_NUMERIC_CHECK); ?>;

    // Redirect to checkout page with product information
    window.location.href = 'Buy.php?price=' + productPrice + '&delivery=' + deliveryCost;
}

 </script>
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
                    <input type="text" class="search-input" placeholder="Search Amazon.in" />
                    <div class="search-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="language-container border-white">

                    <div class="lauguge-image">
                        <img
                            src="https://media.istockphoto.com/vectors/vector-flag-of-the-republic-of-india-proportion-23-the-national-flag-vector-id1051236720?k=20&m=1051236720&s=612x612&w=0&h=ATObRTHmTosADa9zaB2dQPn_VAQmG1XYH2x92kzc304=">
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
                <li><a><i class="fa-solid fa-bars fa-sharp" id="bar"></i>All</a></li>
                <li><a>Amazon miniTV</a></li>
                <li><a>Sell</a></li>
                <li><a>Best Sellers</a></li>
                <li><a>Mobiles</a></li>
                <li><a>Today's Deals</a></li>
                <li><a>Customer Service</a></li>
                <li><a>Electronic</a></li>
                <li><a>Prime</a></li>
                <li><a>New Releases</a></li>
                <li><a>Amazon Pay</a></li>
                <li><a>Home & Kitchen</a></li>
                <li><a>Fashion</a></li>
                
            </ul>
        </nav>

        <nav class="navbar3">
            <ul>
                <li><a><b>Electronics</b></a></li>
                <li><a class="link2">Mobiles & Accessories</a></li>
                <li><a class="link2">Laptop & Accessories</a></li>
                <li><a class="link2">Tv & Home Entertainment</a></li>
                <li><a class="link2">Audio</a></li>
                <li><a class="link2">Cameras</a></li>
                <li><a class="link2">Computer Pheripherals</a></li>
                <li><a class="link2">Smart Technology</a></li>
                <li><a class="link2">Musical Instrument</a></li>
                <li><a class="link2">Office & Stationery</a></li>
            </ul>
        </nav>
        <hr style=" width: 100%; border-top: 1px solid #BBBFBF;">

        <p id="p1">Shoes & Handbags > Shoes > Men's Shoes > Sports & Outdoor Shoes > Running Shoes</p>

        <p id="title"><b>Campus mens Rodeo Pro Running<br> Shoe</b></p>
        <img src="./Images/stars2.jpg" alt="" id="img2">
        <hr style="margin-left: 750px; width: 470px; border-top: 1px solid #BBBFBF;">



        <p id="p2">-50%</p>
        <p id="p3"><sup style="font-size: 13px;">₹</sup>649</p>
        <p id="p4">M.R.P.: <strike style="color: #767676;">₹1,299</strike></p>
        <img src="./Images/taxes.png" alt="" style="margin-left: 750px; height: 40px;">
        <hr style="margin-left: 750px; margin-top: 12px; width: 470px; border-top: 1px solid #BBBFBF;">



        <img src="./Images/offers.png" alt="" style="margin-left: 750px; height: 30px;">
        <!-- <div id="box">
            <p style="margin-left: 10px;"><b>Bank Offer</b></p>
            <p style="margin-left: 10px; margin-top: -3px;">Upto ₹1,500.00<br>discount on select...</p>
            <p class="link" style="margin-left: 10px; margin-top: -7px;">21 offers ></p>
        </div> -->
        <div id="box3">
            <p style="margin-left: 10px;"><b>Partner Offers</b></p>
            <p style="margin-left: 10px; margin-top: -3px;">Get GST invoice and<br>save up to 28% on...</p>
            <p class="link" style="margin-left: 10px; margin-top: -7px;">1 offers ></p>
        </div>
        <hr style="margin-left: 750px; margin-top: 25px; width: 470px; border-top: 1px solid #BBBFBF;">

        <img src="./Images/campus_shoes.jpg" alt="" id="img1">

        <img src="./Images/order_features.png" alt="" style="margin-left: 750px; height: 90px; width: 400px; margin-top: -57px;">
        <hr style="margin-left: 750px; margin-top: 12px; width: 470px; border-top: 1px solid #BBBFBF;">

        <hr style="margin-left: 750px; margin-top: 25px; width: 470px; border-top: 1px solid #898b8b;">

        <div id="details">
            <p style="font-size: 20px;"><b>Product Details</b></p>
            <p style="display: inline;"><b>Material</b></p>
            <p style="display: inline-block; margin: 0px; margin-left: 77px; margin-right: 41px;">Mesh</p>
            <p style="display: inline-block; margin-bottom: 0px;"><b>Closure Type</b></p>
            <p style="display: inline-block; margin-left: 43px; margin-right: 44px; margin-bottom: 0px;"">Lace-Up</p>
            <p style="display: inline-block; margin-bottom: 0px;"><b>Heel Type</b></p>
            <p style="display: inline-block;margin-bottom: 0px; margin-left: 66px; margin-right: 22px;"">Flat</p>
            <p style="display: inline-block; margin-bottom: 0px;"><b>Water Resistance</b></p>
            <p style="display: inline-block; margin-left: 15px; margin-bottom: 0px;"">Not Water Resistance</p>
            <p style="display: inline-block;margin-top: 0px; margin-right: 174px;margin-bottom: 0px;"><b>Level</b></p>
            <p style="display: inline-block; margin-bottom: 0px;"><b>Sole Material</b></p>
            <p style="display: inline-block; margin-left: 45px; margin-bottom: 0px; margin-right: 82px;"">Rubber</p>
            <p style="display: inline-block; margin-bottom: 0px;"><b>Style</b></p>
            <p style="display: inline-block; margin-left: 97px; margin-bottom: 0px;">Sneaker</p>
            <p style="display: inline-block;"><b>Country of Origin</b></p>
            <p style="display: inline-block; margin-left: 15px;"">India</p>
        </div>
        <hr style="margin-left: 750px; width: 470px; border-top: 1px solid #898b8b;">



        <p id="p5"><b>About this item</b></p>
        <ul id="features">
            <li>Lifestyle: Running Shoes</li>
            <li>Warranty Type: Manufacturer</li>
            <li>Care Instructions: Allow your pair of shoes to air and de-odorize<br> at a regular basis, this also helps them retain their natural<br>shape; use shoes bags to prevent any stains or mildew; dust any<br>dry dirt from the surface using a clean cloth, do not use polish<br>or shiner</li>
            
        </ul>

        <div id="box2">
            <p id="p6"><sup style="font-size: 15px;">₹</sup><?php echo $productPrice; ?><sup style="font-size: 15px;">00</sup></p>
            <div id="p7">
                <p class="link" style="display: inline-block; margin: -10px 0 0 20px;">Free delivery</p><p id="deliveryDate" style="margin: 0 0 0 20px;">Loading...</p></b>
                <p style="display: inline-block; margin: 0 0 0 20px;"><b>November.</b></p>
                <p class="link" style="display: inline-block; margin: 0;">Details</p>
                <!-- <img src="./Images/deliver.png" alt="" style="margin: 0 0 0 15px; height: 33px; width: 216px;"> -->
                <div class="icon-address" style="margin-left: 20px;">
                       <i class="fas fa-location-dot"></i>
                       <p id="address"  ><p>Deliver to <?php echo $name; ?><br><?php echo $city; ?>&nbsp <?php echo $pincode; ?></p>
                </div>
                <p id="p8">In stock</p>
                <p style="margin: 0 5px 0 20px; display: inline-block;">Sold by <p class="link" style="display: inline-block; margin: 0px;"> Camusactivewear</p> and<p class="link" style="display: inline-block; margin: 0 0 0 20px;"> Fulfilled by Amazon</p></p>
                <p style="margin: 0 0 0 20px"><b>Shows what is inside.</b> Item often ships in manufacturer container to reduce packaging. If this is a gift, consider shipping to a different address.</p>
                <!-- <p style="margin: 10px 0 0 20px; font-size: 15px; display: inline-block;">Quantity</p>
                <select style="margin-left: 5px; border-radius: 4px; height: 20px; width: 30px;">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select> -->
                <input type="submit" value="Add to Cart" id="cart">
                <input type="submit" value="Buy Now" id="buy" onclick="redirectToCheckout()" >
            </div>
        </div>

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
    </body>

</html>