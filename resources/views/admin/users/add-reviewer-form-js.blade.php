<script>
    $('.user_type input[type="checkbox"]').on('change', function() {
       $('.user_type input[type="checkbox"]').not(this).prop('checked', false);
   });

   $('#userForm').submit(function(e) {
        e.preventDefault();
       var formData = $(this).serialize();
       $('.form-control').removeClass('is-invalid')
       $('.error-msg').html('')
       let selectedRole = $('.user_type input[type="checkbox"]:checked').val();
       // Perform AJAX form submission to Laravel backend for validation
       $.post(AdminURL+'/submit-user-form', formData, function(response) {
           // Handle the response from the server, e.g., show success message, update the UI, etc. // Close the modal on success (you can handle this based on your server response)
           alert("Successfully Added Member");
           location.reload();
           swal({
               title: `New member added`,
               text: `You've successfully created new member with (${selectedRole}) role`,
               icon: 'success',
               buttons: 'Ok',
               dangerMode: true,
           }).then(function(startConfirmed) {
               if (startConfirmed) {
               //   alert("fsdfsdfsf")
            //    location.reload();
               }
           });
       }).fail(function(xhr, textStatus, errorThrown) {
           // Handle the validation errors from the server and display them on the form
           var errors = xhr.responseJSON.errors;
           for (var field in errors) {
               var errorMessage = errors[field][0];
               $('#' + field).addClass('is-invalid');
               if(field == 'role'){
                   $('.role-error').html(errorMessage);
               }
               $('#' + field).after('<span class="error-msg text-danger">'+errorMessage+'</span>');
           }
       });
   });
 </script>
