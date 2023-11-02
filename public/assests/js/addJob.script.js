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
const durationDiv = document.getElementById('duration');
const priceDiv = document.getElementById('price');

publishSelect.addEventListener('change', function () {
    const selectedOption = publishSelect.value;
    
    if (selectedOption === 'Auction Mode') {
        auctionDiv.style.display = 'block';
        auctionDiv.classList.add('custom-auction'); 
        durationDiv.classList.add('duration');
        priceDiv.classList.add('price');
        fixedPrice.style.display = 'none';
    } else {
        auctionDiv.style.display = 'none';
        auctionDiv.classList.remove('custom-styles'); 
        fixedPrice.style.display = 'block';
    }
});






