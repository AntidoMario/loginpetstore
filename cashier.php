<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store Cashier</title>
    <link rel="stylesheet" href="cash.css">
</head>
<body>
    <div class="container">
      
        <div class="header">
            <div class="admin-info">
                <img src="logo.png" alt="Admin Image" class="admin-image">
                <h2>Pet Shop</h2>
            </div>
            <button class="logbut" onclick="location.href='login.php';">Log Out</button>
        </div>

        <div class="box1">
        <div class="product-details">
            <label for="product-name">Product Name:</label>
            <input type="text" id="product-name" required>
            <label for="product-quantity">Quantity:</label>
            <input type="number" id="product-quantity" required>
            <label for="product-price">Price:</label>
            <input type="text" id="product-price" required> <br>
            <button id="add-button">Add</button>
        </div>
        
        <div class="transaction-table">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="transaction-list">
                    <!-- Transaction items will be displayed here -->
                </tbody>
            </table>
        </div>
        </div>
        <div class="totals">
        <div>Total Payment: <span id="total">₱0.00</span></div>
            <label for="amount-paid">Amount Paid:</label>
            <input type="text" id="amount-paid" required>
            <button id="pay-button">Pay</button>
        </div>
        
        <div class="remove-section">
            <h3>Remove Product</h3>
            <label for="remove-index">Product Index:</label>
            <input type="number" id="remove-index" required>
            <button id="remove-button">Remove</button>
        </div>
        
        <div id="payment-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Payment Details</h2>
                <p id="payment-amount">Total Payment: ₱0.00</p>
                <p id="change-amount">Change: ₱0.00</p>
            </div>
        </div>
    </div>
    <script src="cashier.js"></script>
</body>
</html>
