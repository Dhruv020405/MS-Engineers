
function updateUnreadCount() {
    // Fetch count of unread messages using AJAX
    $.ajax({
        url: 'get_unread_count.php',
        type: 'GET',
        success: function(response) {
            // Update the badge count
            $('#unreadCountBadge').text(response);
        }
    });
}

// Call the updateUnreadCount function when the page loads
$(document).ready(function() {
    updateUnreadCount();
});

// Call the updateUnreadCount function at regular intervals (e.g., every 30 seconds)
setInterval(updateUnreadCount, 30000);
