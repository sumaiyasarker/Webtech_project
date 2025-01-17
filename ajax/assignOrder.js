function assignOrder(orderId, riderId)
 {
    $.ajax({
        url: '../control/assignOrder.php',
        type: 'POST',
        data:
         {
            action: 'assignOrder',
            order_id: orderId,
            rider_id: riderId
        },

        dataType: 'json',
        success: function(response) 
        {
            if (response.success)
             {
                alert(response.message);
                
                $('#order-' + orderId + ' .status').text('Accepted');
                $('#order-' + orderId + ' .assigned-rider').text('Rider ID: ' + riderId);
            } 
            else 
            {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr, status, error)
         {
            console.error('Error Details:', xhr.responseText);  
            alert('An error occurred while accepting the order. Please check the console for more details.');
        }
    });
}
