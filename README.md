# Amazon Clone

This project is a simplified clone of the Amazon website, built using PHP and MySQL for educational purposes. It includes functionalities for browsing products, adding items to a shopping cart, updating cart quantities, removing items from the cart, and proceeding to checkout.

## Features

- User Registration and Authentication
- Product Listing
- Shopping Cart
  - Add items to the cart
  - Update item quantities in the cart
  - Remove items from the cart
  - Clear the entire cart
- Checkout

## Technologies Used

- PHP
- MySQL
- HTML/CSS
- JavaScript

## Setup Instructions

### Prerequisites

- PHP (>= 7.4)
- MySQL
- Apache or any other web server
- Composer (optional, if you use PHP packages)

### Installation

1. **Clone the repository:**

   ```sh
   git clone https://github.com/your-username/amazon-clone.git
   cd amazon-clone
   ```

2. **Set up the database:**

   - Create a MySQL database.
   - Import the provided SQL file (`database.sql`) into your database. You can use a tool like phpMyAdmin or the MySQL command line:

     ```sh
     mysql -u username -p database_name < database.sql
     ```

3. **Update the configuration:**

   - Rename `config.sample.php` to `config.php`.
   - Update the database configuration in `config.php`:

     ```php
     <?php
     $conn = mysqli_connect('localhost', 'your_username', 'your_password', 'your_database_name');
     if (!$conn) {
         die('Connection failed: ' . mysqli_connect_error());
     }
     ?>
     ```

4. **Set up the web server:**

   - Ensure your web server is configured to serve the project directory.
   - If using Apache, you may need to configure the `.htaccess` file for URL rewriting.

5. **Start the web server and visit the site:**

   - Open your web browser and go to `http://localhost/amazon-clone` (or your configured domain).

## Usage

### User Registration and Login

1. Register a new account or log in with an existing account.
2. Browse the available products on the website.
3. Add products to the shopping cart.

### Managing the Shopping Cart

1. View the shopping cart to see added items.
2. Update the quantity of items directly from the cart.
3. Remove items from the cart.
4. Clear the entire cart if needed.

### Checkout

1. Proceed to the checkout page to complete your order.
2. Fill in the required details and submit the order.

## File Structure

- `index.php`: The homepage displaying products.
- `cart.php`: The shopping cart page.
- `checkout.php`: The checkout page.
- `config.php`: Database configuration file.
- `header.php`: Common header included in multiple pages.
- `footer.php`: Common footer included in multiple pages.
- `css/`: Directory containing CSS files.
- `js/`: Directory containing JavaScript files.
- `uploaded_img/`: Directory for storing uploaded product images.

## Contribution

Contributions are welcome! Please fork the repository and submit a pull request for any improvements or bug fixes.


## Contact

For any inquiries or issues, please contact athu812talathi@gmail.com.

