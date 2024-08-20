document.addEventListener('DOMContentLoaded', function() {
    const ticketQuantity = document.getElementById('ticket-quantity');
    const totalPrice = document.getElementById('total-price');

    if (ticketQuantity && totalPrice) {
        ticketQuantity.addEventListener('input', function() {
            const quantity = parseInt(ticketQuantity.value);
            const pricePerTicket = 55.00;
            totalPrice.textContent = (quantity * pricePerTicket).toFixed(2);
        });
    }
});