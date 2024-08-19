$(document).ready(function() {
    $('form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'login.php',
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    $('#error-message').text(response.error).show();
                } else if (response.success) {
                    window.location.href = 'dashboard.php';
                }
            }
        });
    });
});

function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex';
}
function hideSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none';
}