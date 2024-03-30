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
</head>
<body>
    <style>

*{
    font-family: cursive;
 }

.container {
    background-color: white;
    max-width: 80%;
    margin: 5px auto;
    padding: 0px;
    border: 2px solid pink;
    border-radius: 5px;
    box-shadow: 5px 2px gray;
}

.header{
    background-color: pink;
}


.logbut{
    padding: 10px 20px;
    background-color: #ff66cc;
    border: none;
    color: #ffffff;
    cursor: pointer;
    border-radius: 3px;
}

.product-details, .transaction-table, .totals, .remove-section {
    margin-bottom: 20px;
}

.product-details label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

#product-name, #product-quantity, #product-price {
    width: calc(90% - 5px);
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-bottom: 10px;
}

#add-button{
    margin-left: 50%;
}

#add-button, #pay-button {
    padding: 10px 20px;
    background-color: #ff66cc;
    border: none;
    color: #ffffff;
    cursor: pointer;
    border-radius: 3px;
}

.transaction-table table {
    width: 100%;
    border-collapse: collapse;
}

.transaction-table th, .transaction-table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

.totals {
    text-align: right;
}

.remove-section {
    background-color: #f2e6ff;
    padding: 10px;
    border-radius: 5px;
}

.remove-section h3 {
    margin-top: 0;
    color: #ff66cc;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 5px;
}

.admin-info {
    display: flex;
    align-items: center;
}

.admin-image {
    width: 40px; /* Adjust size as needed */
    height: 40px; /* Adjust size as needed */
    margin-right: 20px;
}

h2 {
    margin: 0;
}

.product-details {
    margin-bottom: 20px;
}

.transaction-table {
    margin-top: 30px;
    margin-left: 10%;
}

.totals {
    margin-bottom: 20px;
}

.remove-section {
    margin-bottom: 20px;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 10px;
    border: 1px solid pink;
    width: 50%;
    border-radius: 5px;
}

.modal-content h2{
    background-color: pink;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.box1{
    margin: 3%;
    display: flex;
}

  
    </style>
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
