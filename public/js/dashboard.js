document.addEventListener('DOMContentLoaded', function() {
    // Toggle menu button
    const menuToggle = document.getElementById('menu-toggle');
    menuToggle.addEventListener('click', function(e) {
        e.preventDefault();
        document.body.classList.toggle('sb-toggled');
    });

    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Companies Chart

    // Models Chart

});
