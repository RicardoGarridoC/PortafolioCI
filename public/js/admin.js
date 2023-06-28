
function borrarJugador(jugadorId) {
    $.ajax({
      url: '<?php echo base_url(); ?>AdminDashboard/borrar',
      type: 'POST',
      data: { id: jugadorId },
      dataType: 'json',
      success: function(response) {
        // Handle success response, e.g., remove the row from the table or display a success message
      },
      error: function(response) {
        // Handle error response, e.g., display an error message
      }
    });
  }