<?php
// Include your configuration file
$conn = mysqli_connect("localhost:3306", "root", "", "amazon");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);}

// Function to update quantity in the cart
function updateQuantity($conn, $updateValue, $updateId) {
    $updateQuantityQuery = mysqli_query($conn, "UPDATE `cart` SET quantity = '$updateValue' WHERE id = '$updateId'");
    return $updateQuantityQuery;
}

// Function to remove an item from the cart
function removeFromCart($conn, $removeId) {
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$removeId'");
}

// Function to clear the entire cart
function clearCart($conn) {
    mysqli_query($conn, "DELETE FROM `cart`");
}

// Check if the update button is clicked
if (isset($_POST['update_update_btn'])) {
    $updateValue = $_POST['update_quantity'];
    $updateId = $_POST['update_quantity_id'];
    
    if (updateQuantity($conn, $updateValue, $updateId)) {
        header('location:cart.php');
    }
}

// Check if the remove button is clicked
if (isset($_GET['remove'])) {
    $removeId = $_GET['remove'];
    removeFromCart($conn, $removeId);
    header('location:cart.php');
}

// Check if delete all button is clicked
if (isset($_GET['delete_all'])) {
    clearCart($conn);
    header('location:cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head section remains unchanged -->
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Shopping Cart</h1>

   <table>

      <thead>
         <th>Image</th>
         <th>Name</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Total Price</th>
         <th>Action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo number_format($fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="Update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> Remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
            <td colspan="3">Grand Total</td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> Delete All </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Proceed to Checkout</a>
   </div>

</section>

</div>
   
<!-- Your script tag for custom JS file remains unchanged -->
<script src="js/script.js"></script>

</body>
</html>
