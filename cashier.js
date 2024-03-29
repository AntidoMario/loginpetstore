document.addEventListener("DOMContentLoaded", function() {
    const addButton = document.getElementById("add-button");
    const payButton = document.getElementById("pay-button");
    const removeButton = document.getElementById("remove-button");
    const transactionList = document.getElementById("transaction-list");
    const totalElement = document.getElementById("total");
    const amountPaidInput = document.getElementById("amount-paid");
    const paymentModal = document.getElementById("payment-modal");
    const paymentAmount = document.getElementById("payment-amount");
    const changeAmount = document.getElementById("change-amount");
    const closePaymentModal = document.getElementsByClassName("close")[0];
    const productNameInput = document.getElementById("product-name");
    const productQuantityInput = document.getElementById("product-quantity");
    const productPriceInput = document.getElementById("product-price");
    
    addButton.addEventListener("click", function(event) {
        event.preventDefault();

        const productName = productNameInput.value;
        const productQuantity = productQuantityInput.value;
        const productPrice = productPriceInput.value;

        if (productName && productQuantity && productPrice) {
            const subtotal = parseFloat(productQuantity) * parseFloat(productPrice);
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td>${productName}</td>
                <td>${productQuantity}</td>
                <td>${productPrice}</td>
                <td>${subtotal.toFixed(2)}</td>
                <td><button class="remove-item">Remove</button></td>
            `;
            transactionList.appendChild(newRow);
            updateTotal();
            // Clear input fields
            productNameInput.value = "";
            productQuantityInput.value = "";
            productPriceInput.value = "";
        } else {
            alert("Please fill in all fields.");
        }
    });

    payButton.addEventListener("click", function(event) {
        event.preventDefault();
        const totalPayment = parseFloat(totalElement.innerText.replace("₱", ""));
        const amountPaid = parseFloat(amountPaidInput.value);
        if (!isNaN(amountPaid)) {
            const change = amountPaid - totalPayment;
            paymentAmount.innerText = `Total Payment: ₱${totalPayment.toFixed(2)}`;
            changeAmount.innerText = `Change: ₱${change.toFixed(2)}`;
            paymentModal.style.display = "block";
            clearTransactionList();
            updateTotal();
            amountPaidInput.value = "";
        } else {
            alert("Please enter a valid amount paid.");
        }
    });

    removeButton.addEventListener("click", function(event) {
        event.preventDefault();
        const removeIndex = parseInt(document.getElementById("remove-index").value);
        if (!isNaN(removeIndex)) {
            const rows = transactionList.getElementsByTagName("tr");
            if (removeIndex >= 0 && removeIndex < rows.length) {
                transactionList.removeChild(rows[removeIndex]);
                updateTotal();
            } else {
                alert("Invalid index.");
            }
        } else {
            alert("Please enter a valid index.");
        }
    });

    closePaymentModal.onclick = function() {
        paymentModal.style.display = "none";
    }

    document.addEventListener("click", function(event) {
        if (event.target.classList.contains("remove-item")) {
            const row = event.target.closest("tr");
            transactionList.removeChild(row);
            updateTotal();
        }
    });

    function updateTotal() {
        let total = 0;
        const rows = transactionList.getElementsByTagName("tr");
        for (let i = 0; i < rows.length; i++) {
            const subtotal = parseFloat(rows[i].getElementsByTagName("td")[3].innerText);
            total += subtotal;
        }
        totalElement.innerText = "₱" + total.toFixed(2);
    }

    function clearTransactionList() {
        transactionList.innerHTML = "";
    }
});
