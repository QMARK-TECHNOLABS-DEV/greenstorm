<x-app-layout>
   <section class="pt-70 pb-70">
      <div class="container content">
         <div class="row justify-content-center ">
         <div class="col-lg-12 mb-"> 
         <h2 class="sec-ttl-2 text-green mb-4"> Contact Us </h2>
         <div class="border-bottom-green mb-5"> </div>
         </div>
         <div class="col-lg-5 mx-auto col-md-12 col-sm-12 text-start   ">

            <div class="pe-2"> 

                <h5 class="text-green"> Address: </h5>
                {{-- <p> Greenstorm Foundation, North Avenue, Lisie Jn. Kochi 682018. Kerala, IN</p> --}}
                <p> Greenstorm Foundation, GTWRA 31, 
<br>  Parthasarathy Temple Road,<br>
                 Changampuzha Park, Kochi 682024 </br>  Kerala,india  <span class="number-fontfamily"> </span> </p>
                <div class="row">
                    <div class="col-12 col-lg-12 mt-3 mt-lg-5">
                        <h5 class="text-green"> Call Us: </h5>
                      <p> +91 99611 42800</p>
                        <p>+91 96459 43996</p>
                        <p><span class="number-fontfamily">  </span> </p>
                    </div>
                    <div class="col-12 col-lg-12 mt-3 mt-lg-5">
                        <h5 class="text-green">Email Us: </h5>
                        {{-- <p> green@greenstorm.green</p> --}}
                        <p> 
                            green@greenstorm.green <br>
                          
                        </p>
                    </div>

                </div>
                </div>
            </div>
     
            <div class="col-lg-7">
         
               <form class="form_style1 " id="contact-form" action="{{ route('contact.store') }}" method="POST">
                  @csrf
                  <div class="row">
                  <!-- <div class=" col-lg-12">  <h3 class="sec-ttl-2 text-green">         Get in touch </h3>  </div> -->
                     <div class="form-group col-lg-6">
                        <label> First Name <span class="required">* </span> </label>
                        <input type="text" placeholder=" " name="first_name" class="form-control">
                        <span class="error text-danger" id="error-first_name"></span>
                     </div>
                     <!-- end -->
                     <div class="form-group col-lg-6">
                        <label> Last Name <span class="required">* </span> </label>
                        <input type="text" placeholder=" "  name="last_name"  class="form-control">
                        <span class="error text-danger" id="error-last_name"></span>
                     </div>
                     <!-- end -->
                     <div class="form-group col-lg-6">
                        <label> Email</label>
                        <input type="text" placeholder="  "  name="email"  class="form-control">
                        <span class="error text-danger" id="error-email"></span>
                     </div>
                     <!-- end -->
                     <div class="form-group col-lg-6">
                        <label> Mobile <span class="required">* </span></label>
                        <input type="text" placeholder="  "  name="mobile"  class="form-control phoneNumber">
                        <span class="error text-danger" id="error-mobile"></span>
                     </div>
                     <!-- end -->
                     <!-- end -->
                     <div class="form-group col-lg-12">
                        <label> Message </label>
                        <textarea style="height:220px" class="form-control"  name="message"  placeholder=""  id="floatingTextarea"></textarea>
                        <span class="error text-danger" id="error-message"></span>
                     </div>
                     <!-- end -->
                     <div class="col-lg-12 mt-3">
                        <p class="text-start text-md-end">
                           <button type="submit" class="default-btn default-btn btn-geen mt-md-0 mt-0 pe-0">
                           <span class="icon"> <img src=""> </span>
                           <span>Submit</span>
                           </button>
                        </p>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</x-app-layout>
<script> 
   // Get all elements with class "phoneNumber"
   const phoneInputs = document.getElementsByClassName("phoneNumber");
   // Attach event listeners to each phone input
   Array.from(phoneInputs).forEach(function(input) {
   input.addEventListener("input", restrictToNumbers);
   });
   // Restrict input to numbers only
   function restrictToNumbers(event) {
       const input = event.target;
       let inputValue = input.value;
       // Remove any non-numeric characters from the input value
       const numericValue = inputValue.replace(/\D/g, "");
       // Limit the input value to a maximum of 10 digits
       const maxLength = 10;
       inputValue = numericValue.slice(0, maxLength);
       // Update the input value with the restricted numeric characters
       input.value = inputValue;
   }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script>
   $(document).ready(function() {
       $('#contact-form').submit(function(e) {
           e.preventDefault();
           
           $.ajax({
               url: $(this).attr('action'),
               type: 'POST',
               data: $(this).serialize(),
               success: function(response) {
                   // Handle successful form submission
                   console.log(response);
                   Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'Close' 
                        }).then((result) => {
                           $('#contact-form')[0].reset();
                        });
               },
               error: function(xhr, status, error) {
                   // Handle form submission errors
                   if (xhr.responseJSON && xhr.responseJSON.errors) {
                       var errors = xhr.responseJSON.errors;
                       console.log(errors)
                       for (var field in errors) {
                        console.log(field)
                           $('#error-' + field).text(errors[field][0]);
                       }
                   }
               }
           });
       });
   });
</script>
