// JavaScript to prevent form submission with Enter key (Sometimes needed for search forms with AJAX functionality)
document.getElementById('suprd_search_form_area').addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
    }
});