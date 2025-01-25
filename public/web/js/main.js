(function($){
	"use strict";
    //  home Slides
    $('.home-slides').owlCarousel({
        loop: false, // Enable looping
        nav: false,
        dots: true,
        autoplayHoverPause: true,
        autoplay: true, // Enable autoplay
        autoplayTimeout: 5000, // Set autoplay interval to 5 seconds
        smartSpeed: 1500,
        margin: 0,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },
            1200: {
                items: 1,
            }
        }
    });
// Header Sticky
    $(window).on('scroll',function() {
        if ($(this).scrollTop() > 600){
            $('.navbar-area').addClass("is-sticky");
        }
        else{
            $('.navbar-area').removeClass("is-sticky");
        }
    });
    // Mean Menu
    jQuery('.mean-menu').meanmenu({
        meanScreenWidth: "991"
    });
    // IS Services Slides
    $('.team-slides').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        autoplayHoverPause: true,
        autoplay: false,
        autoplayTimeout: 1500,
        smartSpeed: 1500,
        margin: 50,
        navText: [
            "<img src='web/img/black-prev.svg'>",
            "<img src='web/img/black-next.svg'>"
        ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 3,
            }
        }
    });
// winner_slides Slides
    $('.winner_slides').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        items: 1,
        autoplayHoverPause: true,
        autoplay: false,
        autoplayTimeout: 1500,
        smartSpeed: 2000,
    // animateOut: 'fadeOut',
        margin: 10,
        navText: [
            "<i class='fa-solid fa-chevron-left'></i>",
            "<i class='fa-solid fa-chevron-right'></i>"
        ],
        navContainer: '.wp-nav .custom-nav',
        responsive: {

            1200: {
                items: 1,
            }
        }
    });





// winner_slides Slides
$('.video_slides').owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    items: 1,
    autoplayHoverPause: true,
    autoplay: false,
    autoplayTimeout: 1500,
    smartSpeed: 2000,
// animateOut: 'fadeOut',
    margin: 10,
    navText: [
        "<img src='web/img/black-prev.svg'>",
        "<img src='web/img/black-next.svg'>"
    ],

    responsive: {
       767: { margin: 0,
            items: 1,
        },
        1200: {
            items: 1,
        }
    }
});






    // Go to Top
    $(function(){
        // Scroll Event
        $(window).on('scroll', function(){
            var scrolled = $(window).scrollTop();
            if (scrolled > 600) $('.go-top').addClass('active');
            if (scrolled < 600) $('.go-top').removeClass('active');
        });
        // Click Event
        $('.go-top').on('click', function() {
            $("html, body").animate({ scrollTop: "0" },  500);
        });
    });
    // WoW
    new WOW().init();
    // Preloader

    $(function () {
        $('.popup-youtube').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    });
    // Popup Image
    $(document).ready(function(){
        $('.mfp-counter').hide();
        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom',
            gallery:{
                        enabled:true
                    },

            zoom: {
                    enabled: true,
                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function
                    opener: function(openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                } ,
            callbacks: {
                open: function() {
                    $('.mfp-title').hide(); // Remove the title
                    $('.mfp-counter').hide(); // Remove the count
                }
            }
        });
    });
}(jQuery));

(function($) {
    $(function() {
        var isoCountries = [
            { id: '', text: '-Select A Country-'},
            { id: 'AF', text: 'Afghanistan'},
            { id: 'AX', text: 'Aland Islands'},
            { id: 'AL', text: 'Albania'},
            { id: 'DZ', text: 'Algeria'},
            { id: 'AS', text: 'American Samoa'},
            { id: 'AD', text: 'Andorra'},
            { id: 'AO', text: 'Angola'},
            { id: 'AI', text: 'Anguilla'},
            { id: 'AQ', text: 'Antarctica'},
            { id: 'AG', text: 'Antigua And Barbuda'},
            { id: 'AR', text: 'Argentina'},
            { id: 'AM', text: 'Armenia'},
            { id: 'AW', text: 'Aruba'},
            { id: 'AU', text: 'Australia'},
            { id: 'AT', text: 'Austria'},
            { id: 'AZ', text: 'Azerbaijan'},
            { id: 'BS', text: 'Bahamas'},
            { id: 'BH', text: 'Bahrain'},
            { id: 'BD', text: 'Bangladesh'},
            { id: 'BB', text: 'Barbados'},
            { id: 'BY', text: 'Belarus'},
            { id: 'BE', text: 'Belgium'},
            { id: 'BZ', text: 'Belize'},
            { id: 'BJ', text: 'Benin'},
            { id: 'BM', text: 'Bermuda'},
            { id: 'BT', text: 'Bhutan'},
            { id: 'BO', text: 'Bolivia'},
            { id: 'BA', text: 'Bosnia And Herzegovina'},
            { id: 'BW', text: 'Botswana'},
            { id: 'BV', text: 'Bouvet Island'},
            { id: 'BR', text: 'Brazil'},
            { id: 'IO', text: 'British Indian Ocean Territory'},
            { id: 'BN', text: 'Brunei Darussalam'},
            { id: 'BG', text: 'Bulgaria'},
            { id: 'BF', text: 'Burkina Faso'},
            { id: 'BI', text: 'Burundi'},
            { id: 'KH', text: 'Cambodia'},
            { id: 'CM', text: 'Cameroon'},
            { id: 'CA', text: 'Canada'},
            { id: 'CV', text: 'Cape Verde'},
            { id: 'KY', text: 'Cayman Islands'},
            { id: 'CF', text: 'Central African Republic'},
            { id: 'TD', text: 'Chad'},
            { id: 'CL', text: 'Chile'},
            { id: 'CN', text: 'China'},
            { id: 'CX', text: 'Christmas Island'},
            { id: 'CC', text: 'Cocos (Keeling) Islands'},
            { id: 'CO', text: 'Colombia'},
            { id: 'KM', text: 'Comoros'},
            { id: 'CG', text: 'Congo'},
            { id: 'CD', text: 'Congo}, Democratic Republic'},
            { id: 'CK', text: 'Cook Islands'},
            { id: 'CR', text: 'Costa Rica'},
            { id: 'CI', text: 'Cote D\'Ivoire'},
            { id: 'HR', text: 'Croatia'},
            { id: 'CU', text: 'Cuba'},
            { id: 'CY', text: 'Cyprus'},
            { id: 'CZ', text: 'Czech Republic'},
            { id: 'DK', text: 'Denmark'},
            { id: 'DJ', text: 'Djibouti'},
            { id: 'DM', text: 'Dominica'},
            { id: 'DO', text: 'Dominican Republic'},
            { id: 'EC', text: 'Ecuador'},
            { id: 'EG', text: 'Egypt'},
            { id: 'SV', text: 'El Salvador'},
            { id: 'GQ', text: 'Equatorial Guinea'},
            { id: 'ER', text: 'Eritrea'},
            { id: 'EE', text: 'Estonia'},
            { id: 'ET', text: 'Ethiopia'},
            { id: 'FK', text: 'Falkland Islands (Malvinas)'},
            { id: 'FO', text: 'Faroe Islands'},
            { id: 'FJ', text: 'Fiji'},
            { id: 'FI', text: 'Finland'},
            { id: 'FR', text: 'France'},
            { id: 'GF', text: 'French Guiana'},
            { id: 'PF', text: 'French Polynesia'},
            { id: 'TF', text: 'French Southern Territories'},
            { id: 'GA', text: 'Gabon'},
            { id: 'GM', text: 'Gambia'},
            { id: 'GE', text: 'Georgia'},
            { id: 'DE', text: 'Germany'},
            { id: 'GH', text: 'Ghana'},
            { id: 'GI', text: 'Gibraltar'},
            { id: 'GR', text: 'Greece'},
            { id: 'GL', text: 'Greenland'},
            { id: 'GD', text: 'Grenada'},
            { id: 'GP', text: 'Guadeloupe'},
            { id: 'GU', text: 'Guam'},
            { id: 'GT', text: 'Guatemala'},
            { id: 'GG', text: 'Guernsey'},
            { id: 'GN', text: 'Guinea'},
            { id: 'GW', text: 'Guinea-Bissau'},
            { id: 'GY', text: 'Guyana'},
            { id: 'HT', text: 'Haiti'},
            { id: 'HM', text: 'Heard Island & Mcdonald Islands'},
            { id: 'VA', text: 'Holy See (Vatican City State)'},
            { id: 'HN', text: 'Honduras'},
            { id: 'HK', text: 'Hong Kong'},
            { id: 'HU', text: 'Hungary'},
            { id: 'IS', text: 'Iceland'},
            { id: 'IN', text: 'India'},
            { id: 'ID', text: 'Indonesia'},
            { id: 'IR', text: 'Iran}, Islamic Republic Of'},
            { id: 'IQ', text: 'Iraq'},
            { id: 'IE', text: 'Ireland'},
            { id: 'IM', text: 'Isle Of Man'},
            { id: 'IL', text: 'Israel'},
            { id: 'IT', text: 'Italy'},
            { id: 'JM', text: 'Jamaica'},
            { id: 'JP', text: 'Japan'},
            { id: 'JE', text: 'Jersey'},
            { id: 'JO', text: 'Jordan'},
            { id: 'KZ', text: 'Kazakhstan'},
            { id: 'KE', text: 'Kenya'},
            { id: 'KI', text: 'Kiribati'},
            { id: 'KR', text: 'Korea'},
            { id: 'KW', text: 'Kuwait'},
            { id: 'KG', text: 'Kyrgyzstan'},
            { id: 'LA', text: 'Lao People\'s Democratic Republic'},
            { id: 'LV', text: 'Latvia'},
            { id: 'LB', text: 'Lebanon'},
            { id: 'LS', text: 'Lesotho'},
            { id: 'LR', text: 'Liberia'},
            { id: 'LY', text: 'Libyan Arab Jamahiriya'},
            { id: 'LI', text: 'Liechtenstein'},
            { id: 'LT', text: 'Lithuania'},
            { id: 'LU', text: 'Luxembourg'},
            { id: 'MO', text: 'Macao'},
            { id: 'MK', text: 'Macedonia'},
            { id: 'MG', text: 'Madagascar'},
            { id: 'MW', text: 'Malawi'},
            { id: 'MY', text: 'Malaysia'},
            { id: 'MV', text: 'Maldives'},
            { id: 'ML', text: 'Mali'},
            { id: 'MT', text: 'Malta'},
            { id: 'MH', text: 'Marshall Islands'},
            { id: 'MQ', text: 'Martinique'},
            { id: 'MR', text: 'Mauritania'},
            { id: 'MU', text: 'Mauritius'},
            { id: 'YT', text: 'Mayotte'},
            { id: 'MX', text: 'Mexico'},
            { id: 'FM', text: 'Micronesia}, Federated States Of'},
            { id: 'MD', text: 'Moldova'},
            { id: 'MC', text: 'Monaco'},
            { id: 'MN', text: 'Mongolia'},
            { id: 'ME', text: 'Montenegro'},
            { id: 'MS', text: 'Montserrat'},
            { id: 'MA', text: 'Morocco'},
            { id: 'MZ', text: 'Mozambique'},
            { id: 'MM', text: 'Myanmar'},
            { id: 'NA', text: 'Namibia'},
            { id: 'NR', text: 'Nauru'},
            { id: 'NP', text: 'Nepal'},
            { id: 'NL', text: 'Netherlands'},
            { id: 'AN', text: 'Netherlands Antilles'},
            { id: 'NC', text: 'New Caledonia'},
            { id: 'NZ', text: 'New Zealand'},
            { id: 'NI', text: 'Nicaragua'},
            { id: 'NE', text: 'Niger'},
            { id: 'NG', text: 'Nigeria'},
            { id: 'NU', text: 'Niue'},
            { id: 'NF', text: 'Norfolk Island'},
            { id: 'MP', text: 'Northern Mariana Islands'},
            { id: 'NO', text: 'Norway'},
            { id: 'OM', text: 'Oman'},
            { id: 'PK', text: 'Pakistan'},
            { id: 'PW', text: 'Palau'},
            { id: 'PS', text: 'Palestinian Territory}, Occupied'},
            { id: 'PA', text: 'Panama'},
            { id: 'PG', text: 'Papua New Guinea'},
            { id: 'PY', text: 'Paraguay'},
            { id: 'PE', text: 'Peru'},
            { id: 'PH', text: 'Philippines'},
            { id: 'PN', text: 'Pitcairn'},
            { id: 'PL', text: 'Poland'},
            { id: 'PT', text: 'Portugal'},
            { id: 'PR', text: 'Puerto Rico'},
            { id: 'QA', text: 'Qatar'},
            { id: 'RE', text: 'Reunion'},
            { id: 'RO', text: 'Romania'},
            { id: 'RU', text: 'Russian Federation'},
            { id: 'RW', text: 'Rwanda'},
            { id: 'BL', text: 'Saint Barthelemy'},
            { id: 'SH', text: 'Saint Helena'},
            { id: 'KN', text: 'Saint Kitts And Nevis'},
            { id: 'LC', text: 'Saint Lucia'},
            { id: 'MF', text: 'Saint Martin'},
            { id: 'PM', text: 'Saint Pierre And Miquelon'},
            { id: 'VC', text: 'Saint Vincent And Grenadines'},
            { id: 'WS', text: 'Samoa'},
            { id: 'SM', text: 'San Marino'},
            { id: 'ST', text: 'Sao Tome And Principe'},
            { id: 'SA', text: 'Saudi Arabia'},
            { id: 'SN', text: 'Senegal'},
            { id: 'RS', text: 'Serbia'},
            { id: 'SC', text: 'Seychelles'},
            { id: 'SL', text: 'Sierra Leone'},
            { id: 'SG', text: 'Singapore'},
            { id: 'SK', text: 'Slovakia'},
            { id: 'SI', text: 'Slovenia'},
            { id: 'SB', text: 'Solomon Islands'},
            { id: 'SO', text: 'Somalia'},
            { id: 'ZA', text: 'South Africa'},
            { id: 'GS', text: 'South Georgia And Sandwich Isl.'},
            { id: 'ES', text: 'Spain'},
            { id: 'LK', text: 'Sri Lanka'},
            { id: 'SD', text: 'Sudan'},
            { id: 'SR', text: 'Suriname'},
            { id: 'SJ', text: 'Svalbard And Jan Mayen'},
            { id: 'SZ', text: 'Swaziland'},
            { id: 'SE', text: 'Sweden'},
            { id: 'CH', text: 'Switzerland'},
            { id: 'SY', text: 'Syrian Arab Republic'},
            { id: 'TW', text: 'Taiwan'},
            { id: 'TJ', text: 'Tajikistan'},
            { id: 'TZ', text: 'Tanzania'},
            { id: 'TH', text: 'Thailand'},
            { id: 'TL', text: 'Timor-Leste'},
            { id: 'TG', text: 'Togo'},
            { id: 'TK', text: 'Tokelau'},
            { id: 'TO', text: 'Tonga'},
            { id: 'TT', text: 'Trinidad And Tobago'},
            { id: 'TN', text: 'Tunisia'},
            { id: 'TR', text: 'Turkey'},
            { id: 'TM', text: 'Turkmenistan'},
            { id: 'TC', text: 'Turks And Caicos Islands'},
            { id: 'TV', text: 'Tuvalu'},
            { id: 'UG', text: 'Uganda'},
            { id: 'UA', text: 'Ukraine'},
            { id: 'AE', text: 'United Arab Emirates'},
            { id: 'GB', text: 'United Kingdom'},
            { id: 'US', text: 'United States'},
            { id: 'UM', text: 'United States Outlying Islands'},
            { id: 'UY', text: 'Uruguay'},
            { id: 'UZ', text: 'Uzbekistan'},
            { id: 'VU', text: 'Vanuatu'},
            { id: 'VE', text: 'Venezuela'},
            { id: 'VN', text: 'Viet Nam'},
            { id: 'VG', text: 'Virgin Islands}, British'},
            { id: 'VI', text: 'Virgin Islands}, U.S.'},
            { id: 'WF', text: 'Wallis And Futuna'},
            { id: 'EH', text: 'Western Sahara'},
            { id: 'YE', text: 'Yemen'},
            { id: 'ZM', text: 'Zambia'},
            { id: 'ZW', text: 'Zimbabwe'}
        ];

        function formatCountry (country) {
          if (!country.id) { return country.text; }
          var $country = $(
            '<span class="flag-icon flag-icon-'+ country.id.toLowerCase() +' flag-icon-squared"></span>' +
            '<span class="flag-text">'+ country.text+"</span>"
          );
          return $country;
        };

        //Assuming you have a select element with name country
        // e.g. <select name="name"></select>
        if($("[name='country']").length > 0){
            $("[name='country']").select2({
                placeholder: "Select a country",
                templateResult: formatCountry,
                data: isoCountries
            });
        }
    });



       // FAQ Accordion
       $(function() {
        $('.accordion').find('.accordion-title').on('click', function(){
            // Adds Active Class
            $(this).toggleClass('active');
            // Expand or Collapse This Panel
            $(this).next().slideToggle('fast');
            // Hide The Other Panels
            $('.accordion-content').not($(this).next()).slideUp('fast');
            // Removes Active Class From Other Titles
            $('.accordion-title').not($(this)).removeClass('active');
        });
    });









})(jQuery);
