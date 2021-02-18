<!-- Header -->
@include('frontend.layouts.header')
@extends('frontend.layouts.master')

@section('title','E-SHOP || About Us')

@section('main-content')
  <!-- About Us -->
  <section class="about-us section">
    <div class="container">
      <div class="row">
	<div class="col-lg-6 col-12">
	  <div class="about-content">
	    @php
	    $settings=DB::table('settings')->get();
	    @endphp
	    <h3>Welcome To <span>F And C</span></h3>
	    <p>@foreach($settings as $data) {{$data->description}} @endforeach</p>
	    <div class="button">
	      <a href="{{route('blog')}}" class="btn">Our Blog</a>
	      <a href="{{route('contact')}}" class="btn primary">Contact Us</a>
	    </div>
	  </div>
	</div>
	<div class="col-lg-6 col-12">
	  <div class="about-img overlay">
	    <img src="@foreach($settings as $data) {{$data->photo}} @endforeach"
		 alt="@foreach($settings as $data) {{$data->photo}} @endforeach">
	  </div>
	</div>
      </div>
    </div>
  </section>
  <!-- End About Us -->
  @include('frontend.layouts.footer')
@endsection

