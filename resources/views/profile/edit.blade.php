<x-app-layout>
 @push('head')
   
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '928734065914549');
fbq('track', 'PageView');
fbq('track', 'SignUp');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=928734065914549&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
    

     @endpush
    <style>
        .form_style1 .form-control:disabled{
            background-color: rgb(217 217 217);
        }
    </style>
     <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" />
    <section class="pt-70 pb-70">
        <div class="container content">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    {{-- <h2 class="sec-ttl-2 text-green"> Profile Update </h2> --}}
                    <h2 class="sec-ttl-2 text-green"> Update your profile to continue  </h2>
                    <form class="form_style1" id="updateProfileForm" autocomplete="off">
                        @csrf
                        <div class="row">
                            {{-- <div class="form-group col-lg-6">
                                <label> First Name <span class="required">* </span> </label>
                                <input type="text" name="name" id="name" value="{{ $user->name ?? null }}" placeholder="First Name" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label> Last Name <span class="required">* </span> </label>
                                <input type="text" name="last_name" id="last_name" value="{{ $user->last_name ?? null }}" placeholder="Last Name" class="form-control">
                            </div> --}}
                            <div class="form-group col-lg-6">
                                <label> Full Name <span class="required">*</span> </label>
                                <input type="text" name="name" id="name" value="{{ $user->name ?? null }}" placeholder="Full Name" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label> Email</label>
                                <input type="text" placeholder="Email"  id="email" value="{{ $user->email ?? null }}" disabled  class="form-control">
                            </div>
                            <div class="col-lg-6 ">
                                <div class="row">
                                <div class=" col-3 pe-2">
                                    <div class="form-group ">
                                        <label> Dial Code </label>
                                        <select id="dial_code" class="form-control">
                                            <option value="" selected>{{ $user->dial_code ?? null }}</option>
                                        </select>
                                        <input type="hidden" id="dial_code_selected" name="dial_code" value="{{ $user->dial_code ?? null }}">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <label> Mobile Number </label>
                                        <input type="text" placeholder="Mobile Number" name="mobile" id="mobile" value="{{ $user->mobile ?? null }}"  class="form-control phoneNumber">
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <label> Gender
                                    <span class="required">* </span>
                                </label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">-Select Gender-</option>
                                    <option value="male" {{ ($user->gender == 'male') ? 'selected': '' }}>Male</option>
                                    <option value="female" {{ ($user->gender == 'female') ? 'selected': '' }}>Female</option>
                                    <option value="other" {{ ($user->gender == 'other') ? 'selected': '' }}>Other</option>
                                    <option value="not_to_say" {{ ($user->gender == 'not_to_say') ? 'selected': '' }}>Prefer not to say</option>
                                </select>
                            </div>
                            {{-- <div class="col-lg-6 ">
                                <div class="row">
                                <div class=" col-3 pe-2">
                                    <div class="form-group ">
                                        <label> Dial Code </label>
                                        <select id="dial_code_alt" class="form-control">
                                            <option value="" selected>{{ $user->dial_code_alt ?? null }}</option>
                                        </select>
                                        <input type="hidden" id="dial_code_alt_selected" name="dial_code_alt" value="{{ $user->dial_code_alt ?? null }}">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <label> Alternate Contact Number</label>
                                        <input type="text" placeholder="Alternate Contact Number" name="secondary_contact_number" id="secondary_contact_number" value="{{ $user->secondary_contact_number ?? null }}"  class="form-control phoneNumber">
                                    </div>
                                </div>
                                </div>
                            </div> --}}
                            <div class="form-group col-lg-3">
                                <label> Date of Birth <span class="required">*</span> </label>
                                <div class="input-group date date-picker" id="datepicker">
                                    <input type="text" class="form-control " id="dob" data-date-format="dd-mm-yyyy" name="dob" value="{{ $user->dob ? date('d-m-Y', strtotime($user->dob)) : '' }}"/>
                                    <span class="input-group-append" >
                                        <span class="input-group-text bg-light d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                                <div class="dob-error"></div>
                            </div>
                            {{-- <div class="form-group col-lg-3">
                                <label> Age (Optional)
                                </label>
                                <input type="text" placeholder="Age" name="age" id="age" value="{{ $user->age ?? '' }}" class="form-control age">
                            </div> --}}



                            <div class="form-group col-lg-6">
                                <label>Country <span class="required">* </span> </label>
                                <select  name="country"  id="country" value="{{ $user->country }}" class="form-select form-control country-select " data-flag="true" aria-label="">
                                </select>
                                <div class="country-error"></div>
                            </div>
                            {{-- <div class="form-group col-lg-6">
                                <label> City </label>
                                <input type="text" placeholder="City" name="city"  id="city" value="{{ $user->city }}" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label> Address <span class="required">* </span></label>
                                <textarea class="form-control" placeholder="Address" name="address"  id="address" value="" id="floatingTextarea">{{ $user->address }}</textarea>
                            </div> --}}
                            {{-- <div class="form-group col-lg-6">
                                <label> ZIP / Postal Code (Optional)
                                </label>
                                <input type="text" placeholder="ZIP / Postal Code" name="zipcode" id="zipcode" value="{{ $user->zipcode }}" class="form-control zipcode">
                            </div> --}}
                            {{-- <div class="form-group col-lg-6">
                                <label for=""> Are You a Professional Photographer? </label>
                                <br>
                                <label>
                                    <input type="radio" name="is_professional" id="" value="1" {{ $user->is_professional === 1 ? 'checked':'' }}> Yes
                                </label>
                                <label for="" class="mx-2">
                                    <input type="radio" name="is_professional" id="" value="0" {{ $user->is_professional === 0 ? 'checked':'' }}> No
                                </label>
                            </div> --}}
                            <div class="form-group col-lg-3">
                                <label for=""> Are You a Student? <span class="required">* </span></label>
                                <br><br>
                                <label>
                                    <input type="radio" name="is_student" id="is_student_yes" value="1" {{ $user->is_student === 1 ? 'checked':'' }} > Yes
                                </label>
                                <label for="" class="mx-2">
                                    <input type="radio" name="is_student" id="is_student_no" value="0" {{ $user->is_student === 0 ? 'checked':'' }}> No
                                </label>
                                <div class="is_student-error"></div>
                            </div>
                            <div class="form-group col-lg-3" id="institution_field">
                                <label for="">  Name of the Institution  <span class="required">* </span></label>
                                <br>
                                <input type="text" placeholder="Name of the Institution" name="institution" id="Institution" value="{{ $user->institution ?? null }}"  class="form-control Institution">
                                <div class="institution-error"></div>
                            </div>
                            {{-- <div class="form-group col-lg-6">
                                <label> Facebook URL  (Optional)</label>
                                <input type="text" placeholder="Facebook URL" name="facebook_link" id="facebook_link" value="{{ $user->facebook_link }}" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label> Instagram URL (Optional)</label>
                                <input type="text" placeholder="Instagram URL" name="instagram_link" id="instagram_link" value="{{ $user->instagram_link }}" class="form-control">
                            </div> --}}
                            {{-- Category space --}}
                            {{-- Category Space ends --}}
                        </div>

                        <div class="row align-items-center mt-0 mt-md-5">
                            <div class="col-lg-12">
                                <p class="text-start text-md-end">
                                    <button type="submit"  class="default-btn default-btn btn-geen mt-md-0 mt-0 pe-0">
                                        <span class="icon"> <img src> </span>
                                        <span class="update_profile_btn_txt"> Update Profile </span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
  <!-- Modal -->
  <div class="modal fade response-modal" data-bs-backdrop="static" data-bs-keyboard="false" id="" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body  text-end">
            <button type="button" class="btn-close" onclick="location.reload();" aria-label="Close"></button>
            <div class="response-handler-content text-center">
                <h3 class="text-green">Awesome!</h3>
                <h2 class="mb-5 text-green">Your profile update completed Successfully.</h2>
                <a href="{{ route('profile.photograph.upload') }}">Upload your photograph now</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
<style>
    @media (max-width: 1440px){
      .select2-container--default .select2-selection--single { height: 40px !important; padding: 0px;    }
      .select2-container--default .select2-selection--single .select2-selection__arrow{ top:10px}
      .select2-container--default .select2-selection--single .select2-selection__rendered {
          color: #444;  line-height: 40px;}
      }

.select2-container--open .select2-dropdown{ width: 400px !important}
  @media (max-width: 767px){
      .select2-container--open .select2-dropdown{ width: 70%!important}

  }
</style>
<script>
    const userSelectedCountryCode = "{{ $user->country ?? '' }}";
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
        const maxLength = 20;
        inputValue = numericValue.slice(0, maxLength);
        // Update the input value with the restricted numeric characters
        input.value = inputValue;
    }



    const zipInputs = document.getElementsByClassName("zipcode");
    // Attach event listeners to each zip input
    Array.from(zipInputs).forEach(function(input) {
    input.addEventListener("input", restrictToZipNumbers);
    });
    // Restrict input to numbers only
    function restrictToZipNumbers(event) {
        const input = event.target;
        let inputValue = input.value;
        const restrictedValue = inputValue.replace(/[^0-9-]/g, "");
        input.value = restrictedValue;
    }

</script>
<script>
    let isStudent = {{ $user->is_student ? 'true' : 'false' }};
    $('#institution_field').toggle(isStudent);

    $('input[name="is_student"]').change(function () {
        $('#institution_field').toggle($(this).val() === '1');
    });
</script>
<script>
    $(document).ready(function() {
        $('#updateProfileForm').submit(function(event) {
            event.preventDefault();
            var form = $(this);
            $('.error-text').remove();
            $('.update_profile_btn_txt').html('PROCESSING...');
            $.ajax({
                type: 'POST',
                url: "{{ route('profile.update') }}",
                data: form.serialize(),
                beforeSend: function(){
                    $('#updateProfileForm .form-control').attr('style','border:none;');
                },
                success: function(response) {
                    $('.update_profile_btn_txt').html('UPDATE PROFILE');
                    $('.response-modal').modal('show');
                    // window.location.href = "{{ route('profile.photograph.upload') }}";
                },
                error: function(xhr, status, error) {
                    $('.update_profile_btn_txt').html('UPDATE PROFILE');
                    if (xhr.status === 422) {
						var errors = xhr.responseJSON.errors;
						$.each(errors, function(field, messages) {
							var errorHtml = '<div class="text-danger error-text text-start">' + messages[0] + '</div>';
                            if(field == 'country' || field == 'dob' || field == 'photographer_category'  || field == 'is_student' || field == 'institution'){
                                $('.'+field+'-error').html(errorHtml);
                            }else{
                                $('#' + field).after(errorHtml);
                            }
							$('#' + field).attr('style','border:1px solid red')
						});
					} else {
						alert('An error occurred during registration.');
					}
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        const countries =
            [
                {
                text: "Afghanistan",
                dialCode: "+93",
                id: "AF"
                },
                {
                text: "Aland Islands",
                dialCode: "+358",
                id: "AX"
                },
                {
                text: "Albania",
                dialCode: "+355",
                id: "AL"
                },
                {
                text: "Algeria",
                dialCode: "+213",
                id: "DZ"
                },
                {
                text: "AmericanSamoa",
                dialCode: "+1684",
                id: "AS"
                },
                {
                text: "Andorra",
                dialCode: "+376",
                id: "AD"
                },
                {
                text: "Angola",
                dialCode: "+244",
                id: "AO"
                },
                {
                text: "Anguilla",
                dialCode: "+1264",
                id: "AI"
                },
                {
                text: "Antarctica",
                dialCode: "+672",
                id: "AQ"
                },
                {
                text: "Antigua and Barbuda",
                dialCode: "+1268",
                id: "AG"
                },
                {
                text: "Argentina",
                dialCode: "+54",
                id: "AR"
                },
                {
                text: "Armenia",
                dialCode: "+374",
                id: "AM"
                },
                {
                text: "Aruba",
                dialCode: "+297",
                id: "AW"
                },
                {
                text: "Australia",
                dialCode: "+61",
                id: "AU"
                },
                {
                text: "Austria",
                dialCode: "+43",
                id: "AT"
                },
                {
                text: "Azerbaijan",
                dialCode: "+994",
                id: "AZ"
                },
                {
                text: "Bahamas",
                dialCode: "+1242",
                id: "BS"
                },
                {
                text: "Bahrain",
                dialCode: "+973",
                id: "BH"
                },
                {
                text: "Bangladesh",
                dialCode: "+880",
                id: "BD"
                },
                {
                text: "Barbados",
                dialCode: "+1246",
                id: "BB"
                },
                {
                text: "Belarus",
                dialCode: "+375",
                id: "BY"
                },
                {
                text: "Belgium",
                dialCode: "+32",
                id: "BE"
                },
                {
                text: "Belize",
                dialCode: "+501",
                id: "BZ"
                },
                {
                text: "Benin",
                dialCode: "+229",
                id: "BJ"
                },
                {
                text: "Bermuda",
                dialCode: "+1441",
                id: "BM"
                },
                {
                text: "Bhutan",
                dialCode: "+975",
                id: "BT"
                },
                {
                text: "Bolivia, Plurinational State of",
                dialCode: "+591",
                id: "BO"
                },
                {
                text: "Bosnia and Herzegovina",
                dialCode: "+387",
                id: "BA"
                },
                {
                text: "Botswana",
                dialCode: "+267",
                id: "BW"
                },
                {
                text: "Brazil",
                dialCode: "+55",
                id: "BR"
                },
                {
                text: "British Indian Ocean Territory",
                dialCode: "+246",
                id: "IO"
                },
                {
                text: "Brunei Darussalam",
                dialCode: "+673",
                id: "BN"
                },
                {
                text: "Bulgaria",
                dialCode: "+359",
                id: "BG"
                },
                {
                text: "Burkina Faso",
                dialCode: "+226",
                id: "BF"
                },
                {
                text: "Burundi",
                dialCode: "+257",
                id: "BI"
                },
                {
                text: "Cambodia",
                dialCode: "+855",
                id: "KH"
                },
                {
                text: "Cameroon",
                dialCode: "+237",
                id: "CM"
                },
                {
                text: "Canada",
                dialCode: "+1",
                id: "CA"
                },
                {
                text: "Cape Verde",
                dialCode: "+238",
                id: "CV"
                },
                {
                text: "Cayman Islands",
                dialCode: "+ 345",
                id: "KY"
                },
                {
                text: "Central African Republic",
                dialCode: "+236",
                id: "CF"
                },
                {
                text: "Chad",
                dialCode: "+235",
                id: "TD"
                },
                {
                text: "Chile",
                dialCode: "+56",
                id: "CL"
                },
                {
                text: "China",
                dialCode: "+86",
                id: "CN"
                },
                {
                text: "Christmas Island",
                dialCode: "+61",
                id: "CX"
                },
                {
                text: "Cocos (Keeling) Islands",
                dialCode: "+61",
                id: "CC"
                },
                {
                text: "Colombia",
                dialCode: "+57",
                id: "CO"
                },
                {
                text: "Comoros",
                dialCode: "+269",
                id: "KM"
                },
                {
                text: "Congo",
                dialCode: "+242",
                id: "CG"
                },
                {
                text: "Congo, The Democratic Republic of the Congo",
                dialCode: "+243",
                id: "CD"
                },
                {
                text: "Cook Islands",
                dialCode: "+682",
                id: "CK"
                },
                {
                text: "Costa Rica",
                dialCode: "+506",
                id: "CR"
                },
                {
                text: "Cote d'Ivoire",
                dialCode: "+225",
                id: "CI"
                },
                {
                text: "Croatia",
                dialCode: "+385",
                id: "HR"
                },
                {
                text: "Cuba",
                dialCode: "+53",
                id: "CU"
                },
                {
                text: "Cyprus",
                dialCode: "+357",
                id: "CY"
                },
                {
                text: "Czech Republic",
                dialCode: "+420",
                id: "CZ"
                },
                {
                text: "Denmark",
                dialCode: "+45",
                id: "DK"
                },
                {
                text: "Djibouti",
                dialCode: "+253",
                id: "DJ"
                },
                {
                text: "Dominica",
                dialCode: "+1767",
                id: "DM"
                },
                {
                text: "Dominican Republic",
                dialCode: "+1849",
                id: "DO"
                },
                {
                text: "Ecuador",
                dialCode: "+593",
                id: "EC"
                },
                {
                text: "Egypt",
                dialCode: "+20",
                id: "EG"
                },
                {
                text: "El Salvador",
                dialCode: "+503",
                id: "SV"
                },
                {
                text: "Equatorial Guinea",
                dialCode: "+240",
                id: "GQ"
                },
                {
                text: "Eritrea",
                dialCode: "+291",
                id: "ER"
                },
                {
                text: "Estonia",
                dialCode: "+372",
                id: "EE"
                },
                {
                text: "Ethiopia",
                dialCode: "+251",
                id: "ET"
                },
                {
                text: "Falkland Islands (Malvinas)",
                dialCode: "+500",
                id: "FK"
                },
                {
                text: "Faroe Islands",
                dialCode: "+298",
                id: "FO"
                },
                {
                text: "Fiji",
                dialCode: "+679",
                id: "FJ"
                },
                {
                text: "Finland",
                dialCode: "+358",
                id: "FI"
                },
                {
                text: "France",
                dialCode: "+33",
                id: "FR"
                },
                {
                text: "French Guiana",
                dialCode: "+594",
                id: "GF"
                },
                {
                text: "French Polynesia",
                dialCode: "+689",
                id: "PF"
                },
                {
                text: "Gabon",
                dialCode: "+241",
                id: "GA"
                },
                {
                text: "Gambia",
                dialCode: "+220",
                id: "GM"
                },
                {
                text: "Georgia",
                dialCode: "+995",
                id: "GE"
                },
                {
                text: "Germany",
                dialCode: "+49",
                id: "DE"
                },
                {
                text: "Ghana",
                dialCode: "+233",
                id: "GH"
                },
                {
                text: "Gibraltar",
                dialCode: "+350",
                id: "GI"
                },
                {
                text: "Greece",
                dialCode: "+30",
                id: "GR"
                },
                {
                text: "Greenland",
                dialCode: "+299",
                id: "GL"
                },
                {
                text: "Grenada",
                dialCode: "+1473",
                id: "GD"
                },
                {
                text: "Guadeloupe",
                dialCode: "+590",
                id: "GP"
                },
                {
                text: "Guam",
                dialCode: "+1671",
                id: "GU"
                },
                {
                text: "Guatemala",
                dialCode: "+502",
                id: "GT"
                },
                {
                text: "Guernsey",
                dialCode: "+44",
                id: "GG"
                },
                {
                text: "Guinea",
                dialCode: "+224",
                id: "GN"
                },
                {
                text: "Guinea-Bissau",
                dialCode: "+245",
                id: "GW"
                },
                {
                text: "Guyana",
                dialCode: "+595",
                id: "GY"
                },
                {
                text: "Haiti",
                dialCode: "+509",
                id: "HT"
                },
                {
                text: "Holy See (Vatican City State)",
                dialCode: "+379",
                id: "VA"
                },
                {
                text: "Honduras",
                dialCode: "+504",
                id: "HN"
                },
                {
                text: "Hong Kong",
                dialCode: "+852",
                id: "HK"
                },
                {
                text: "Hungary",
                dialCode: "+36",
                id: "HU"
                },
                {
                text: "Iceland",
                dialCode: "+354",
                id: "IS"
                },
                {
                text: "India",
                dialCode: "+91",
                id: "IN"
                },
                {
                text: "Indonesia",
                dialCode: "+62",
                id: "ID"
                },
                {
                text: "Iran, Islamic Republic of Persian Gulf",
                dialCode: "+98",
                id: "IR"
                },
                {
                text: "Iraq",
                dialCode: "+964",
                id: "IQ"
                },
                {
                text: "Ireland",
                dialCode: "+353",
                id: "IE"
                },
                {
                text: "Isle of Man",
                dialCode: "+44",
                id: "IM"
                },
                {
                text: "Israel",
                dialCode: "+972",
                id: "IL"
                },
                {
                text: "Italy",
                dialCode: "+39",
                id: "IT"
                },
                {
                text: "Jamaica",
                dialCode: "+1876",
                id: "JM"
                },
                {
                text: "Japan",
                dialCode: "+81",
                id: "JP"
                },
                {
                text: "Jersey",
                dialCode: "+44",
                id: "JE"
                },
                {
                text: "Jordan",
                dialCode: "+962",
                id: "JO"
                },
                {
                text: "Kazakhstan",
                dialCode: "+77",
                id: "KZ"
                },
                {
                text: "Kenya",
                dialCode: "+254",
                id: "KE"
                },
                {
                text: "Kiribati",
                dialCode: "+686",
                id: "KI"
                },
                {
                text: "Korea, Democratic People's Republic of Korea",
                dialCode: "+850",
                id: "KP"
                },
                {
                text: "Korea, Republic of South Korea",
                dialCode: "+82",
                id: "KR"
                },
                {
                text: "Kuwait",
                dialCode: "+965",
                id: "KW"
                },
                {
                text: "Kyrgyzstan",
                dialCode: "+996",
                id: "KG"
                },
                {
                text: "Laos",
                dialCode: "+856",
                id: "LA"
                },
                {
                text: "Latvia",
                dialCode: "+371",
                id: "LV"
                },
                {
                text: "Lebanon",
                dialCode: "+961",
                id: "LB"
                },
                {
                text: "Lesotho",
                dialCode: "+266",
                id: "LS"
                },
                {
                text: "Liberia",
                dialCode: "+231",
                id: "LR"
                },
                {
                text: "Libyan Arab Jamahiriya",
                dialCode: "+218",
                id: "LY"
                },
                {
                text: "Liechtenstein",
                dialCode: "+423",
                id: "LI"
                },
                {
                text: "Lithuania",
                dialCode: "+370",
                id: "LT"
                },
                {
                text: "Luxembourg",
                dialCode: "+352",
                id: "LU"
                },
                {
                text: "Macao",
                dialCode: "+853",
                id: "MO"
                },
                {
                text: "Macedonia",
                dialCode: "+389",
                id: "MK"
                },
                {
                text: "Madagascar",
                dialCode: "+261",
                id: "MG"
                },
                {
                text: "Malawi",
                dialCode: "+265",
                id: "MW"
                },
                {
                text: "Malaysia",
                dialCode: "+60",
                id: "MY"
                },
                {
                text: "Maldives",
                dialCode: "+960",
                id: "MV"
                },
                {
                text: "Mali",
                dialCode: "+223",
                id: "ML"
                },
                {
                text: "Malta",
                dialCode: "+356",
                id: "MT"
                },
                {
                text: "Marshall Islands",
                dialCode: "+692",
                id: "MH"
                },
                {
                text: "Martinique",
                dialCode: "+596",
                id: "MQ"
                },
                {
                text: "Mauritania",
                dialCode: "+222",
                id: "MR"
                },
                {
                text: "Mauritius",
                dialCode: "+230",
                id: "MU"
                },
                {
                text: "Mayotte",
                dialCode: "+262",
                id: "YT"
                },
                {
                text: "Mexico",
                dialCode: "+52",
                id: "MX"
                },
                {
                text: "Micronesia, Federated States of Micronesia",
                dialCode: "+691",
                id: "FM"
                },
                {
                text: "Moldova",
                dialCode: "+373",
                id: "MD"
                },
                {
                text: "Monaco",
                dialCode: "+377",
                id: "MC"
                },
                {
                text: "Mongolia",
                dialCode: "+976",
                id: "MN"
                },
                {
                text: "Montenegro",
                dialCode: "+382",
                id: "ME"
                },
                {
                text: "Montserrat",
                dialCode: "+1664",
                id: "MS"
                },
                {
                text: "Morocco",
                dialCode: "+212",
                id: "MA"
                },
                {
                text: "Mozambique",
                dialCode: "+258",
                id: "MZ"
                },
                {
                text: "Myanmar",
                dialCode: "+95",
                id: "MM"
                },
                {
                text: "Namibia",
                dialCode: "+264",
                id: "NA"
                },
                {
                text: "Nauru",
                dialCode: "+674",
                id: "NR"
                },
                {
                text: "Nepal",
                dialCode: "+977",
                id: "NP"
                },
                {
                text: "Netherlands",
                dialCode: "+31",
                id: "NL"
                },
                {
                text: "Netherlands Antilles",
                dialCode: "+599",
                id: "AN"
                },
                {
                text: "New Caledonia",
                dialCode: "+687",
                id: "NC"
                },
                {
                text: "New Zealand",
                dialCode: "+64",
                id: "NZ"
                },
                {
                text: "Nicaragua",
                dialCode: "+505",
                id: "NI"
                },
                {
                text: "Niger",
                dialCode: "+227",
                id: "NE"
                },
                {
                text: "Nigeria",
                dialCode: "+234",
                id: "NG"
                },
                {
                text: "Niue",
                dialCode: "+683",
                id: "NU"
                },
                {
                text: "Norfolk Island",
                dialCode: "+672",
                id: "NF"
                },
                {
                text: "Northern Mariana Islands",
                dialCode: "+1670",
                id: "MP"
                },
                {
                text: "Norway",
                dialCode: "+47",
                id: "NO"
                },
                {
                text: "Oman",
                dialCode: "+968",
                id: "OM"
                },
                {
                text: "Pakistan",
                dialCode: "+92",
                id: "PK"
                },
                {
                text: "Palau",
                dialCode: "+680",
                id: "PW"
                },
                {
                text: "Palestinian Territory, Occupied",
                dialCode: "+970",
                id: "PS"
                },
                {
                text: "Panama",
                dialCode: "+507",
                id: "PA"
                },
                {
                text: "Papua New Guinea",
                dialCode: "+675",
                id: "PG"
                },
                {
                text: "Paraguay",
                dialCode: "+595",
                id: "PY"
                },
                {
                text: "Peru",
                dialCode: "+51",
                id: "PE"
                },
                {
                text: "Philippines",
                dialCode: "+63",
                id: "PH"
                },
                {
                text: "Pitcairn",
                dialCode: "+872",
                id: "PN"
                },
                {
                text: "Poland",
                dialCode: "+48",
                id: "PL"
                },
                {
                text: "Portugal",
                dialCode: "+351",
                id: "PT"
                },
                {
                text: "Puerto Rico",
                dialCode: "+1939",
                id: "PR"
                },
                {
                text: "Qatar",
                dialCode: "+974",
                id: "QA"
                },
                {
                text: "Romania",
                dialCode: "+40",
                id: "RO"
                },
                {
                text: "Russia",
                dialCode: "+7",
                id: "RU"
                },
                {
                text: "Rwanda",
                dialCode: "+250",
                id: "RW"
                },
                {
                text: "Reunion",
                dialCode: "+262",
                id: "RE"
                },
                {
                text: "Saint Barthelemy",
                dialCode: "+590",
                id: "BL"
                },
                {
                text: "Saint Helena, Ascension and Tristan Da Cunha",
                dialCode: "+290",
                id: "SH"
                },
                {
                text: "Saint Kitts and Nevis",
                dialCode: "+1869",
                id: "KN"
                },
                {
                text: "Saint Lucia",
                dialCode: "+1758",
                id: "LC"
                },
                {
                text: "Saint Martin",
                dialCode: "+590",
                id: "MF"
                },
                {
                text: "Saint Pierre and Miquelon",
                dialCode: "+508",
                id: "PM"
                },
                {
                text: "Saint Vincent and the Grenadines",
                dialCode: "+1784",
                id: "VC"
                },
                {
                text: "Samoa",
                dialCode: "+685",
                id: "WS"
                },
                {
                text: "San Marino",
                dialCode: "+378",
                id: "SM"
                },
                {
                text: "Sao Tome and Principe",
                dialCode: "+239",
                id: "ST"
                },
                {
                text: "Saudi Arabia",
                dialCode: "+966",
                id: "SA"
                },
                {
                text: "Senegal",
                dialCode: "+221",
                id: "SN"
                },
                {
                text: "Serbia",
                dialCode: "+381",
                id: "RS"
                },
                {
                text: "Seychelles",
                dialCode: "+248",
                id: "SC"
                },
                {
                text: "Sierra Leone",
                dialCode: "+232",
                id: "SL"
                },
                {
                text: "Singapore",
                dialCode: "+65",
                id: "SG"
                },
                {
                text: "Slovakia",
                dialCode: "+421",
                id: "SK"
                },
                {
                text: "Slovenia",
                dialCode: "+386",
                id: "SI"
                },
                {
                text: "Solomon Islands",
                dialCode: "+677",
                id: "SB"
                },
                {
                text: "Somalia",
                dialCode: "+252",
                id: "SO"
                },
                {
                text: "South Africa",
                dialCode: "+27",
                id: "ZA"
                },
                {
                text: "South Sudan",
                dialCode: "+211",
                id: "SS"
                },
                {
                text: "South Georgia and the South Sandwich Islands",
                dialCode: "+500",
                id: "GS"
                },
                {
                text: "Spain",
                dialCode: "+34",
                id: "ES"
                },
                {
                text: "Sri Lanka",
                dialCode: "+94",
                id: "LK"
                },
                {
                text: "Sudan",
                dialCode: "+249",
                id: "SD"
                },
                {
                text: "Suriname",
                dialCode: "+597",
                id: "SR"
                },
                {
                text: "Svalbard and Jan Mayen",
                dialCode: "+47",
                id: "SJ"
                },
                {
                text: "Swaziland",
                dialCode: "+268",
                id: "SZ"
                },
                {
                text: "Sweden",
                dialCode: "+46",
                id: "SE"
                },
                {
                text: "Switzerland",
                dialCode: "+41",
                id: "CH"
                },
                {
                text: "Syrian Arab Republic",
                dialCode: "+963",
                id: "SY"
                },
                {
                text: "Taiwan",
                dialCode: "+886",
                id: "TW"
                },
                {
                text: "Tajikistan",
                dialCode: "+992",
                id: "TJ"
                },
                {
                text: "Tanzania, United Republic of Tanzania",
                dialCode: "+255",
                id: "TZ"
                },
                {
                text: "Thailand",
                dialCode: "+66",
                id: "TH"
                },
                {
                text: "Timor-Leste",
                dialCode: "+670",
                id: "TL"
                },
                {
                text: "Togo",
                dialCode: "+228",
                id: "TG"
                },
                {
                text: "Tokelau",
                dialCode: "+690",
                id: "TK"
                },
                {
                text: "Tonga",
                dialCode: "+676",
                id: "TO"
                },
                {
                text: "Trinidad and Tobago",
                dialCode: "+1868",
                id: "TT"
                },
                {
                text: "Tunisia",
                dialCode: "+216",
                id: "TN"
                },
                {
                text: "Turkey",
                dialCode: "+90",
                id: "TR"
                },
                {
                text: "Turkmenistan",
                dialCode: "+993",
                id: "TM"
                },
                {
                text: "Turks and Caicos Islands",
                dialCode: "+1649",
                id: "TC"
                },
                {
                text: "Tuvalu",
                dialCode: "+688",
                id: "TV"
                },
                {
                text: "Uganda",
                dialCode: "+256",
                id: "UG"
                },
                {
                text: "Ukraine",
                dialCode: "+380",
                id: "UA"
                },
                {
                text: "United Arab Emirates",
                dialCode: "+971",
                id: "AE"
                },
                {
                text: "United Kingdom",
                dialCode: "+44",
                id: "GB"
                },
                {
                text: "United States",
                dialCode: "+1",
                id: "US"
                },
                {
                text: "Uruguay",
                dialCode: "+598",
                id: "UY"
                },
                {
                text: "Uzbekistan",
                dialCode: "+998",
                id: "UZ"
                },
                {
                text: "Vanuatu",
                dialCode: "+678",
                id: "VU"
                },
                {
                text: "Venezuela, Bolivarian Republic of Venezuela",
                dialCode: "+58",
                id: "VE"
                },
                {
                text: "Vietnam",
                dialCode: "+84",
                id: "VN"
                },
                {
                text: "Virgin Islands, British",
                dialCode: "+1284",
                id: "VG"
                },
                {
                text: "Virgin Islands, U.S.",
                dialCode: "+1340",
                id: "VI"
                },
                {
                text: "Wallis and Futuna",
                dialCode: "+681",
                id: "WF"
                },
                {
                text: "Yemen",
                dialCode: "+967",
                id: "YE"
                },
                {
                text: "Zambia",
                dialCode: "+260",
                id: "ZM"
                },
                {
                text: "Zimbabwe",
                dialCode: "+263",
                id: "ZW"
                }
        ];


        function formatCountry(country) {
            if (!country.id) {
                return country.text;
            }
            var $country = $(
                '<span class="flag-icon flag-icon-' + country.id.toLowerCase() + ' flag-icon-squared"></span>' +
                '<span class="flag-text"> ' + country.text + ' </span>' +
                '<span class="dial-code">(' + country.dialCode + ')</span>'
            );
            return $country;
        }
        var $select = $('#dial_code').select2({
            placeholder: "-Dial Code -",
            templateResult: formatCountry,
            data: countries
        });
        // var $select_alt = $('#dial_code_alt').select2({
        //     placeholder: "-Dial Code -",
        //     templateResult: formatCountry,
        //     data: countries
        // });
        $select.next().find('.select2-selection__rendered').html($('#dial_code').select2('data')[0].text);
        // $select_alt.next().find('.select2-selection__rendered').html($('#dial_code_alt').select2('data')[0].text);

        $select.on('change', function () {
            // console.log($(this).select2('data'));
            let selectedCountry = $(this).select2('data');
            // var selectedCountry = event.params.data;
            if (selectedCountry && selectedCountry[0].dialCode) {
                // var selectedText = selectedCountry[0].text + ' (' + selectedCountry[0].dialCode + ')';
                var selectedText =  selectedCountry[0].dialCode;
                $select.next().find('.select2-selection__rendered').html(selectedText);
                $('#dial_code_selected').val(selectedText);
            }
        });

        // $select_alt.on('change', function () {
        //     // console.log($(this).select2('data'));
        //     let selectedCountry = $(this).select2('data');
        //     // var selectedCountry = event.params.data;
        //     if (selectedCountry && selectedCountry[0].dialCode) {
        //         // var selectedText = selectedCountry[0].text + ' (' + selectedCountry[0].dialCode + ')';
        //         var selectedText =  selectedCountry[0].dialCode;
        //         $select_alt.next().find('.select2-selection__rendered').html(selectedText);
        //         $('#dial_code_alt_selected').val(selectedText);
        //     }
        // });
    });
</script>
