@extends('frontend.layouts.master')
@section('title','E-SHOP || HOME PAGE')
@section('main-content')
  @include('frontend.layouts.nav')
  
  <!-- Slider Area -->
  @if(count($banners)>0)
    <section id="Gslider" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @foreach($banners as $key=>$banner)
          <li data-target="#Gslider" data-slide-to="{{$key}}"
	      class="{{(($key==0)? 'active' : '')}}">
	  </li>
        @endforeach
      </ol>
      <div class="carousel-inner" role="listbox">
        @foreach($banners as $key=>$banner)
          <div class="carousel-item {{(($key==0)? 'active' : '')}}">
            <img class="first-slide" src="{{$banner->photo}}" alt="First slide">
            <div class="carousel-caption d-none d-md-block text-left">
              <h1 class="wow fadeInDown">{{$banner->title}}</h1>
              <p>{!! html_entity_decode($banner->description) !!}</p>
              <a class="btn btn-lg ws-btn wow fadeInUpBig"
		 href="{{route('product-grids')}}" role="button">
		Shop Now
		<i class="far fa-arrow-alt-circle-right"></i>
	      </a>
            </div>
          </div>  
        @endforeach   
      </div>
      <a class="carousel-control-prev" href="#Gslider" role="button"
	 data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#Gslider" role="button"
	 data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </section>
  @endif  
  <!--/ End Slider Area -->
  @include('frontend.layouts.footer2')
@endsection



@push('styles')

<style>
 /* Banner Sliding */
 #Gslider .carousel-inner {
   background: #000000;
   color:black;
 }

 #Gslider .carousel-inner{
   height: 100vh;
 }
 #Gslider .carousel-inner img{
   width: 100% !important;
   opacity: .8;
 }

 #Gslider .carousel-inner .carousel-caption {
   bottom: 60%;
 }

 #Gslider .carousel-inner .carousel-caption h1 {
   font-size: 50px;
   font-weight: bold;
   line-height: 100%;
   color: #F7941D;
 }

 #Gslider .carousel-inner .carousel-caption p {
   font-size: 18px;
   color: black;
   margin: 28px 0 28px 0;
 }

 #Gslider .carousel-indicators {
   bottom: 70px;
 }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<script>
 
 /*==================================================================
    [ Isotope ]*/
 var $topeContainer = $('.isotope-grid');
 var $filter = $('.filter-tope-group');

 // filter items on button click
 $filter.each(function () {
   $filter.on('click', 'button', function () {
     var filterValue = $(this).attr('data-filter');
     $topeContainer.isotope({filter: filterValue});
   });
   
 });

 // init Isotope
 $(window).on('load', function () {
   var $grid = $topeContainer.each(function () {
     $(this).isotope({
       itemSelector: '.isotope-item',
       layoutMode: 'fitRows',
       percentPosition: true,
       animationEngine : 'best-available',
       masonry: {
         columnWidth: '.isotope-item'
       }
     });
   });
 });

 var isotopeButton = $('.filter-tope-group button');

 $(isotopeButton).each(function(){
   $(this).on('click', function(){
     for(var i=0; i<isotopeButton.length; i++) {
       $(isotopeButton[i]).removeClass('how-active1');
     }

     $(this).addClass('how-active1');
   });
 });
</script>
<script>
 function cancelFullScreen(el) {
   var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
   if (requestMethod) { // cancel full screen.
     requestMethod.call(el);
   } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
     var wscript = new ActiveXObject("WScript.Shell");
     if (wscript !== null) {
       wscript.SendKeys("{F11}");
     }
   }
 }

 function requestFullScreen(el) {
   // Supports most browsers and their versions.
   var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

   if (requestMethod) { // Native full screen.
     requestMethod.call(el);
   } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
     var wscript = new ActiveXObject("WScript.Shell");
     if (wscript !== null) {
       wscript.SendKeys("{F11}");
     }
   }
   return false
 }
</script>

@endpush
