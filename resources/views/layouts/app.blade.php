<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSRF Token -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 40%;
        }
        .card:hover {
        box-shadow: 0 20px 40px 0 rgba(0,0,0,0.2);
        }
        .cardj{
            box-shadow: 0 20px 40px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .cardj:hover {
        box-shadow: 0 35px 60px 0 rgba(0,0,0,0.2);
        }
        img.blur {
            -webkit-filter: blur(4px);
            filter: blur(4px);
            filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='4');
        }    
        .pagination > .active > a,{
            color:#5DADE2;
        }
    
    </style>

</head>
<body>
    <header>
        <!--<div class="top_nav" style="">
            <div class="container">
                <ul class="list-inline info">
                    <li><a href="/#"><span class="fa fa-phone"></span> 076 - 7000249 </a></li>
                    <li><a href="/#"><span class="fa fa-envelope"></span> nkbram95@gmail.com</a></li>
                    <li><a href="/#"><span class="fa fa-clock-o"></span> Mon - Sat 9:00 am - 6:00 pm</a></li>
                </ul>
                <ul class="list-inline social_icon">
                    <li><a href="/"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="/"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="/"><span class="fa fa-behance"></span></a></li>
                    <li><a href="/"><span class="fa fa-dribbble"></span></a></li>
                    <li><a href="/"><span class="fa fa-linkedin"></span></a></li>
                    <li><a href="/"><span class="fa fa-youtube"></span></a></li>
                </ul>			
            </div>
        </div>-->
        @include('inc.navbar')
    </header>
    
    <div class="container" style="width:100%;">
        <div class="row" style="margin-top:-23px;">
            @include('inc.message')
        </div>
        <div class="row" >
            @yield('content')
        </div>
    </div>
    <footer >
        <!--<div class="container footer_top">
            <div class="row">
                <div class="col-lg-4 col-sm-7">
                    <div class="footer_item">
                        <h4>About Jewelry</h4>
                        <a href="/"><img class="logo" style="width:250px;" src="/storage/admin/logo.png" alt="Construction"></a>
                        <p>
                            We are enlarging and improving our website to bring you the same fine quality over the web that you receive in-store! Stop back frequently over the next few weeks to check out what’s new as we wrap up our website facelift and bring you a website experience like no other!
                        </p>

                        <ul class="list-inline footer_social_icon">
                            <li><a href="/"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="/"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="/"><span class="fa fa-youtube"></span></a></li>
                            <li><a href="/"><span class="fa fa-google-plus"></span></a></li>
                            <li><a href="/"><span class="fa fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-5">
                    <div class="footer_item">
                        <h4>Explore link</h4>
                        <ul class="list-unstyled footer_menu">
                            <li><a href="/services"><span class="fa fa-play"></span> Our services</a>
                            </li><li><a href="/services"><span class="fa fa-play"></span> Meet our team</a>
                            </li><li><a href="/services"><span class="fa fa-play"></span> Forum</a>
                            </li><li><a href="/services"><span class="fa fa-play"></span> Help center</a>
                            </li><li><a href="/services"><span class="fa fa-play"></span> Contact Cekas</a>
                            </li><li><a href="/services"><span class="fa fa-play"></span> Privacy Policy</a>
                            </li><li><a href="/services"><span class="fa fa-play"></span> Cekas terms</a>
                            </li><li><a href="/services"><span class="fa fa-play"></span> Site map</a>
                        </li></ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-7">
                    <div class="footer_item">
                        <h4>Latest product</h4>
                        <ul class="list-unstyled post">
                            <li><a href="/products"><span class="date">07 <small>Dec</small></span>Necklace</a></li>
                            <li><a href="/products"><span class="date">25 <small>NOV</small></span>Bangles</a></li>
                            <li><a href="/products"><span class="date">16 <small>OCT</small></span>Belly chain</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-5">
                    <div class="footer_item">
                        <h4>Contact us</h4>
                        <ul class="list-unstyled footer_contact">
                            <li><a href="/about"><span class="fa fa-map-marker"></span>Vavuniya Campus, University of Jaffna, Park Road, Vavuniya</a></li>
                            <li><a href="/about"><span class="fa fa-envelope"></span> nkbram95@gmail.com</a></li>
                            <li><a href="/about"><span class="fa fa-mobile"></span></a><p><a href="/">+94 076 7000 249 </a></p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="footer_bottom text-center">
            <p class="wow fadeInRight">
                Made with 
                <i class="fa fa-heart"></i>
                by Copyright © 
                <a  href="/SystemInformation">Karunaaharan Bavaram</a> 
                in 2018. All Rights Reserved
            </p>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</body>
   
</html>
