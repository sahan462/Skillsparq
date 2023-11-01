function updateBudget() {
    const amountInput = document.querySelector('input[name="amount"]');
    const budgetOutput = document.getElementById('budget-output'); 

    const amount = parseFloat(amountInput.value);
    
    if (isNaN(amount)) {
        budgetOutput.innerHTML = 'Invalid amount';
    } else {
        const budget = "$" + amount.toFixed(2); 
        budgetOutput.innerHTML = "Hello";
    }
}

const publishSelect = document.getElementById('publish');
const auctionDiv = document.getElementById('auction');
const fixedPrice = document.getElementById('fixed-price');

publishSelect.addEventListener('change', function () {
    const selectedOption = publishSelect.value;
    
    if (selectedOption === 'Auction Mode') {
        auctionDiv.style.display = 'flex';
        auctionDiv.style.border = '2px solid #c5c6c9';
        auctionDiv.style.borderRadius = '5px';
        fixedPrice.style.display = 'none';
    } else {
        auctionDiv.style.display = 'none';
        fixedPrice.style.display = 'block';
    }
});






