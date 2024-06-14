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
        <title>Home Products Sale - Great Deals &amp; Discounts on Home DÃƒÆ'Ã†â€™Ãƒâ€šÃ,Â©cor, Furnishing, Indoor Lighting and many more Online in India @ Amazon.in</title>

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" />
        <link rel="stylesheet" href="./CSS/decor.css?v=<?php echo time(); ?>">
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

        <nav class="navbar3">
            <ul>
                <li><a href="#"><b>Amazon Home</b></a></li>
                <li><a href="#" class="link2">Kitchen & Home Applainces</a></li>
                <li><a href="#" class="link2">Large Appliances</a></li>
                <li><a href="#" class="link2">Kitchen & Dining</a></li>
                <li><a href="#" class="link2">Furniture</a></li>
                <li><a href="#" class="link2">Home Furnishing</a></li>
                <li><a href="#" class="link2">Home Decor</a></li>
                <li><a href="#" class="link2">Home Improvement</a></li>
                <li><a href="#" class="link2">Garden & Outdoor</a></li>
                <li><a href="#" class="link2">Storage & Organisation</a></li>
                <li><a href="#" class="link2">Lighting</a></li>
            </ul>
        </nav>

        <hr>
        <p id="h">Buy Home and Decor Products Online at Amazon India</p>
        <p id="explore">Explore the wide range of home and decor products at Amazon India. Buy top quality and reliable products by popular brands and set up your home with class. Shop from a collection of at affordable prices on Amazon.in <a href="#" class="link">home décor</a>, <a href="#" class="link">home furnishing</a>, <a href="#" class="link">home storage</a>, <a href="#" class="link">lighting solutions</a>, <a href="#" class="link">craft supplies</a> at affordable prices on Amazon.in</p>

        <a href="#"><img src="./Images/decor.png" alt="" class="decor_img"></a>

        <img src="./Images/solutions.jpg" alt="" id="img">

        <div id="box">
        <div class="Slideshow">
  <div class="mySlides">
    <div class="numbertext"></div>
    <img src="./Images/live1.png" style="width:1600px; height: 430px; margin: 10px 0 0 15px">
  </div>

  <div class="mySlides">
    <div class="numbertext"></div>
    <img src="./Images/live2.png" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext"></div>
    <img src="./Images/live3.png" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext"></div>
    <img src="./Images/live4.png" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext"></div>
    <img src="./Images/live5.png" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext"></div>
    <img src="./Images/live6.png" style="width:100%">
  </div>

  <!-- <a class="prev" onclick="plusSlides(-1)">❮</a>
 
  <a class="next" onclick="plusSlides(1)">❯</a> -->

 

 
</div>

 </div>

        <div id="box2">
            <div id="box3">
                <p id="wish">Shop Top Categories</p>
                <div class="container1">
                    <a href="#"><img src="./Images/cotton_bedsheets.jpg" alt="" class="item"></a>
                    <a href="#"><img src="./Images/pillows.jpg" alt="" class="item"></a>
                    <a href="#"><img src="./Images/curtains.jpg" alt="" class="item"></a>
                    <a href="#"><img src="./Images/cushion.jpg" alt="" class="item"></a>
                    <a href="#"><img src="./Images/flowers.jpg" alt="" class="item"></a>
                    <a href="#"><img src="./Images/clock.jpg" alt="" class="item"></a>
                    <a href="#"><img src="./Images/towels.jpg" alt="" class="item"></a>
                </div>
            </div>
        </div>

        <img src="fresh.jpg" alt="" style="margin-left: 120px;">
        <a href="#"><img src="./Images/local_shops.jpg" alt="" style="margin-left: 30px; width: 1630px;"></a>
       
        <nav class="navbar1">
            <ul>
                <li><b><a href="#">Back to top</a></b></li>
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
                <ul class="list1 list2" >
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
                <button class="dropbtn2"><span class="icon"><ion-icon name="globe-outline"></ion-icon> English</span></button>
                <div class="dropdown-content2">
                    <a href="">English-EN</a>
                    <a href="">हिंदी-HI</a>
                </div>
            </div>
        </div>
        <nav class="navbar2">
            <ul>

                <li><a href="#">Austrailia</a></li>
                <li><a href="#">Brazil</a></li>
                <li><a href="#">Canada</a></li>
                <li><a href="#">China</a></li>
                <li><a href="#">France</a></li>
                <li><a href="#">Germany</a></li>
                <li><a href="#">Italy</a></li>
                <li><a href="#">Japan</a></li>
                <li><a href="#">Mexico</a></li>
                <li><a href="#">Netherlands</a></li>
                <li><a href="#">Poland</a></li>
                <li><a href="#">Singapore</a></li>
                <li><a href="#">Spain</a></li>
                <li><a href="#">Turkey</a></li>
                <li><a href="#">United Arab Emirates</a></li><br>
            </ul>
            <ul>      
                <li><a href="#">United Kingdom</a></li>                
                <li><a href="#">United States</a></li>
            </ul>
        </nav>
        <script>
            let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
        </script>
    </body>
</html>