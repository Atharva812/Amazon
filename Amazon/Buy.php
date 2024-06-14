<?php
session_start();
$productPrice = isset($_GET['price']) ? $_GET['price'] : '';
$deliveryCost = isset($_GET['delivery']) ? $_GET['delivery'] : '';
$totalPrice = $productPrice + $deliveryCost;
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$addresses = [];


function getAddressesByUsername($name)
{
    $conn = mysqli_connect("localhost:3306", "root", "", "amazon");

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $query = "SELECT id, fullname, mobile, country, pincode, address, landmark, city, state FROM addresses WHERE name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    $addresses = [];
    while ($row = $result->fetch_assoc()) {
        $addresses[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $addresses;
}


$addresses = getAddressesByUsername($name);


$selectedAddress = !empty($addresses) ? $addresses[0] : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Images/amazon-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" />
    <title>Select a payment Method -Amazon</title>
    <link rel="stylesheet" href="./CSS/Buy.css?v=<?php echo time(); ?>">
</head>
<script>
    function redirectToNextPage(paymentMethod) {
        if (paymentMethod === 'upi') {
            window.location.href = "Transaction.php";
        }
    }

</script>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="#"><img
                        src="https://th.bing.com/th/id/R.4ecb200971f06a7e6b64bf096f6c9438?rik=%2fjB%2bQDjlj5mp4g&riu=http%3a%2f%2fwww.ranklogos.com%2fwp-content%2fuploads%2f2014%2f10%2fAmazon.in_-500x107.jpg&ehk=3Oak0NN6Tb4yKzkDzGegUU5pRiQR09vyNqP4V7ACMyo%3d&risl=&pid=ImgRaw&r=0"
                        id="logo1"></a></li>
            <li><a href="#" id="text">Checkout </a></li>
            <li><a href="#" id="font"><i class="fa-solid fa-lock" style="color: #9f9d9d;"></i></a></li>
        </ul>
    </nav>

    <div class="line"></div>

    <div class="class">
        <p class="p">1 &ensp; Delivery address</p>

        <?php if ($selectedAddress): ?>

            <p id="p1" style="margin-top: -35px;">
                <?php echo $selectedAddress['fullname']; ?><br>
                <?php echo $selectedAddress['address']; ?><br>
                <?php echo $selectedAddress['city']; ?>,&ensp;
                <?php echo $selectedAddress['state']; ?>&ensp;
                <?php echo $selectedAddress['pincode']; ?>
            </p>

        <?php else: ?>
            <p>No address found for the user.</p>
        <?php endif; ?>
    </div>
    <p class="link" id="p2" style="margin: -17px 0 14px 679px;">Add delivery instructions</p>
    <p class="link" id="p4" style="margin-top: -79px;">Change</p>

    <hr style="margin-left: 258px; width: 899px; border-top: 1px solid #BBBFBF; margin-top: 75px;">

    <p id="p3">2 &ensp; Select a payment method</p>
    <div id="box">
        <p class="p_text1">Your available balance</p>

        <hr style="margin-left: 20px; width: 826px; border-top: 1px solid #BBBFBF;">

        <input type="checkbox" name="balance" style="margin-left: 32px;">
        <p class="p_text2"> Use your <b>₹500.00 Amazon Pay balance</b></p><br>
        <i class="fa-regular fa-plus" id="plus"></i>
        <input type="text" name="code" id="code" placeholder="Enter Code">
        <input type="submit" value="Apply" id="apply">
        <p class="p_text1" style="margin-top: 20px;">Another payment method</p>

        <hr style="margin-left: 20px; width: 826px; border-top: 1px solid #BBBFBF;">

        <input type="radio" name="net_banking" style="margin-left: 32px;">
        <p class="p_text2"><b>Pay with Debit/Credit/ATM Cards</b></p><br>
        <p class="p_text2" style="margin-left: 62px;">You can save your cards as per new RBI guidelines.<a href="#"
                class="link"> Learn More</a></p>
        <img src="./Images/card.png" alt="" id="card">

        <input type="radio" name="net_banking" style="margin-left: 32px; margin-top: 40px;"
            onclick="redirectToNextPage('net_banking')">
        <!-- <p class="p_text2"><b>Net Banking</b></p><br> -->
        <!-- <input type="radio" name="paymentMethod" id="net_banking" value="net_banking"> -->
        <label for="net_banking" class="p_text2"><b>Net Banking</b></label><br>
        <select name="Option" id="option" title="Choose an Option">
            <option value="">Choose an Option</option>
            <optgroup>
                <option value="">Airtel Payments Bank</option>
                <option value="">Axis Bank</option>
                <option value="">HDFC Bank</option>
                <option value="">ICICI Bank</option>
                <option value="">Kotak Bank</option>
                <option value="">State Bank of India</option>
            </optgroup>
            <optgroup>
                <option value="">Allahabad Bank</option>
                <option value="">Andhra Bank</option>
                <option value="">Bank of India</option>
                <option value="">Bank of Maharashtra</option>
                <option value="">Canara Bank</option>
                <option value="">Catholic Syrian Bank</option>
                <option value="">Central Bank of India</option>
                <option value="">City Union Bank</option>
                <option value="">Corporation Bank</option>
                <option value="">Cosmos Bank</option>
                <option value="">DCB Bank Ltd</option>
                <option value="">Deutsche Bank</option>
                <option value="">Dhanlakshmi Bank</option>
                <option value="">Federal Bank</option>
                <option value="">IDBI Bank</option>
                <option value="">IDFC Bank</option>
                <option value="">ING Vysya Bank</option>
                <option value="">Indian Bank</option>
                <option value="">Indian Overseas Bank</option>
                <option value="">IndusInd Bank</option>
                <option value="">Jammu & Kashmir Bank</option>
                <option value="">Janata Sahakari Bank</option>
                <option value="">Karnataka Bank Ltd</option>
                <option value="">Karur Vysya Bank</option>
                <option value="">Laxmi Vilas Bank</option>
                <option value="">Oriental Bank of Commerce</option>
                <option value="">PNB YUVA Netbanking</option>
                <option value="">Punjab National Bank - Corporate Banking</option>
                <option value="">Saraswat Bank</option>
                <option value="">Shamrao Vitthal Co-operative Bank</option>
                <option value="">South Indian Bank</option>
                <option value="">Standard Chartered Bank</option>
                <option value="">State Bank of Bikaner & Jaipur</option>
                <option value="">State Bank of Hyderabad</option>
                <option value="">State Bank of Mysore</option>
                <option value="">State Bank of Patiala</option>
                <option value="">State Bank of Travancore</option>
                <option value="">Syndicate Bank</option>
                <option value="">Tamilnad Mercantile Bank Ltd.</option>
                <option value="">Union Bank of India</option>
                <option value="">United Bank of India</option>
                <option value="">Yes Bank Ltd</option>
            </optgroup>
        </select><br>

        <input type="radio" name="net_banking" style="margin-left: 32px; margin-top: 30px;" onclick="redirectToNextPage('upi')">
        <!-- <p class="p_text2"><b>Other UPI Apps</b></p><br> -->
        <label for="upi" class="p_text2"><b>Other UPI Apps</b></label><br>


        <input type="radio" name="net_banking" style="margin-left: 32px; margin-top: 30px;" onclick="redirectToNextPage('emi')">
        <!-- <p class="p_text2"><b>EMI</b></p><br> -->
        <label for="emi" class="p_text2"><b>EMI</b></label><br>

        <input type="radio" name="net_banking" style="margin-left: 32px; margin-top: 30px; "
            onclick="redirectToNextPage('cod')">
        <!-- <p class="p_text2"><b>Cash on Delivery/Pay on Delivery</b></p><br> -->
        <label for="cod" class="p_text2"><b>Cash on Delivery/Pay on Delivery</b></label><br>

        <p class="p_text2" style="margin-left: 62px;">Scan & Pay using Amazon app. Cash, UPI, Cards also accepted.<a
                href="#" class="link"> Know more.</a></p>

        <div class="pay">
            <input type="button" value="Use this payment method" id="payment" onclick="redirectToNextPage('upi')">


        </div>
    </div>


    <div id="box2">
        <input type="submit" value="Use this payment method" id="payment2">
        <p class="p6" style="margin-left: 25px;">&ensp;Choose a payment method to continue<br>
            checking out. You will still have a chance to<br>
            review and edit your order before it is final.
        </p>
        <hr style="width: 235px; border-top: 1px solid #BBBFBF;">
        <p class="p" style="margin-left: 20px;">Order Summary</p>
        <p class="p6">Items:</p>
        <p class="p6" style="margin-left: 146px;"> ₹
            <?php echo $productPrice; ?>
        </p>
        <p class="p6" style="top: -16px;">Delivery:</p>
        <p class="p6" style="margin-left: 149px; top: -16px;">₹
            <?php echo $deliveryCost; ?>
        </p>
        <p class="p6" style="top: -32px;">Total:</p>
        <p class="p6" style="margin-left: 151px; top: -32px;">₹
            <?php echo $productPrice; ?>
        </p>
        <p class="p6" style="top: -48px;">Promotion Applied:</p>
        <p class="p6" style="margin-left: 92px; top: -47px;"></p>
        <hr style="width: 235px; border-top: 1px solid #BBBFBF; margin-top: -53px;">
        <p class="p7" style="margin-left: 20px;">Order Total:</p>
        <p class="p7" style="margin-left: 53px;">₹
            <?php echo $totalPrice; ?>
        </p>
        <hr style="width: 220px; border-top: 1px solid #BBBFBF; margin-top: -20px;">
        <div class="pay" style="height: 51px;">
            <p class="link"
                style="background-color: transparent; font-size: 13px; margin-left: 20px; margin-top: 18px;">How are
                delivery costs calculated?</p>
        </div>
    </div>

    <hr style="margin-left: 258px; width: 899px; border-top: 1px solid #BBBFBF;">
    <p class="p">3 &ensp; Offers</p>
    <hr style="margin-left: 258px; width: 899px; border-top: 1px solid #BBBFBF;">
    <p class="p">4 &ensp; Items and Delivery</p>
    <hr style="margin-left: 258px; width: 899px; border-top: 2px solid #BBBFBF;">
    <p id="p5">
        Need help? Check our <a href="#" class="link">help pages</a> or <a href="#" class="link">contact us</a><br><br>
        When your order is placed, we'll send you an e-mail message acknowledging receipt of your order. If you choose
        to pay using an electronic payment <br>method (credit card, debit card or net banking), you will be directed to
        your bank's website to complete your payment. Your contract to <br>purchase an item will not be complete until
        we receive your electronic payment and dispatch your item. If you choose to pay using Pay on Delivery<br> (POD),
        you can pay using cash/card/net banking when you receive your item. <br><br>
        See Amazon.in's <a href="#" class="link">Return Policy.</a><br>
        <br>
        Need to add more items to your order? Continue shopping on the <a href="#" class="link">Amazon.in homepage.</a>
    </p>
    </div>
</body>

</html>