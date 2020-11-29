@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:-23px;">
    <br>
        <div class="w3-content" style="max-width:1200px ;padding-right:10%;padding-left:10%">
        <img class="mySlides" src="/storage/admin/Banner2.jpg" style="width:100%;display:none">
        <img class="mySlides" src="/storage/admin/Banner3.jpg" style="width:100%">
        <img class="mySlides" src="/storage/admin/Banner4.jpg" style="width:100%;display:none">
        <img class="mySlides" src="/storage/admin/Banner5.jpg" style="width:100%;display:none">
        
        <div class="row" style="background-color:#797A84 ;padding-right:2%;padding-left:2%;">
        <div class="w3-row-padding w3-section" style="background-color:#373947 ;padding:2%;">
            <div class="w3-col s3">
            <img class="demo w3-opacity w3-hover-opacity-off" src="/storage/admin/Banner2.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
            </div>
            <div class="w3-col s3">
            <img class="demo w3-opacity w3-hover-opacity-off" src="/storage/admin/Banner3.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(2)">
            </div>
            <div class="w3-col s3">
            <img class="demo w3-opacity w3-hover-opacity-off" src="/storage/admin/Banner4.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(3)">
            </div>
            <div class="w3-col s3">
            <img class="demo w3-opacity w3-hover-opacity-off" src="/storage/admin/Banner5.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(4)">
            </div>
            </div>
        </div>
    </div>

    <script>
        function currentDiv(n) {
        showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
            }
            x[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " w3-opacity-off";
        }
    </script>
</div>
<br>
@endsection

