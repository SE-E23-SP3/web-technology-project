function toggleOrder() {
    var orderInput = document.getElementById('order-input');
    var currentOrder = orderInput.value;

    // Toggle between 'ascending' and 'descending' order
    orderInput.value = currentOrder === 'asc' ? 'desc' : 'asc';
    // Submit the form
    document.getElementById('sorting-form').submit();
}

document.getElementById('genre-picker').addEventListener('change', function() {
    console.log('Genre changed');
    document.getElementById('sorting-form').submit();
});