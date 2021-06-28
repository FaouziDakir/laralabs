@extends('layouts.app')
        
<body>
@section('content')

  <!-- Intro Section -->
  <div class="hero-section">
    <div class="hero-content">
      <div class="hero-center">
        <img src="img/big-logo.png" alt="">
        <p>Get your freebie template now!</p>
      </div>
    </div>
    <!-- slider -->
    <div id="hero-slider" class="owl-carousel">
      <div class="item  hero-item" data-bg="img/01.jpg"></div>
      <div class="item  hero-item" data-bg="img/02.jpg"></div>
    </div>
  </div>
  <!-- Intro Section -->


  <!-- About section -->
  <div class="about-section">
    <div class="overlay"></div>
    <!-- card section -->
    <div class="card-section">
      <div class="container">
        <div class="row">
          <!-- single card -->
          @foreach ($projects as $project)
          <div class="col-md-4 col-sm-6">
            <div class="lab-card">
              <div class="icon">
                <i class="{{$project->icone}}"></i>
              </div>
              <h2>{{$project->name}}</h2>
              <p>{{$project->message}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- card section end-->


    <!-- About contant -->
    <div class="about-contant">
      <div class="container">
        <div class="section-title">
          <h2>Get in <span>the Lab</span> and discover the world</h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus. Donec maximus ipsum non ornare vporttitor porttitorestibulum. Sed libero nibh, feugiat at enim id, bibendum sollicitudin arcu.</p>
          </div>
          <div class="col-md-6">
            <p>Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices. Quisque porttitor porttitorlaoreet vel risus et luctus.</p>
          </div>
        </div>
        <div class="text-center mt60">
          <a href="" class="site-btn">Browse</a>
        </div>
        <!-- popup video -->
        <div class="intro-video">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <img src="img/video.jpg" alt="">
              <a href="https://www.youtube.com/watch?v=JgHfx2v9zOU" class="video-popup">
                <i class="fa fa-play"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About section end -->


  <!-- Testimonial section -->
  <div class="testimonial-section pb100">
    <div class="test-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-4">
          <div class="section-title left">
            <h2>What our clients say</h2>
          </div>
          <div class="owl-carousel" id="testimonial-slide">
            @foreach($testimonials as $testi)
            <!-- single testimonial -->
            <div class="testimonial">
              <span>‘​‌‘​‌</span>
              <p>{{$testi->message}}</p>
              <div class="client-info">
                <div class="avatar">
                  <img src="/storage/uploads/testimonials/{{$testi->image}}" alt="">
                </div>
                <div class="client-name">
                  <h2>{{$testi->name}}</h2>
                  <p>{{$testi->job}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonial section end-->


  <!-- Services section -->
  <div class="services-section spad">
    <div class="container">
      <div class="section-title dark">
        <h2>Get in <span>the Lab</span> and see the services</h2>
      </div>
      <div class="row">
       @foreach ($services as $service)
        <!-- single service -->
        <div class="col-md-4 col-sm-6">
            <div class="service">
              <div class="icon">
                <i class="{{$service->icone}}"></i>
              </div>
              <div class="service-text">
                <h2>{{$service->titre}}</h2>
                <p>{{$service->texte}}</p>
              </div>
            </div>
          </div>
       @endforeach
      </div>
      <div class="text-center">
        <a href="" class="site-btn">Browse</a>
      </div>
    </div>
  </div>
  <!-- services section end -->


  <!-- Team Section -->
  <div class="team-section spad">
    <div class="overlay"></div>
    <div class="container">
      <div class="section-title">
        <h2>Get in <span>the Lab</span> and meet the team</h2>
      </div>
      <div class="row">
        <!-- single member -->
        <div class="col-sm-4">
          <div class="member">
            <img src="/storage/uploads/{{$othersMembers->first()->teamimage}}" width="200" alt="">
            <h2>
              {{$othersMembers->first()->name}}
            </h2>
            <h3>{{$othersMembers->first()->teamrole}}</h3>
          </div>
        </div>
        <!-- single member -->
        <div class="col-sm-4">
          <div class="member">
            <img src="/storage/uploads/{{$teamMembers->teamimage}}" width="200" alt="">
            <h2>
              {{$teamMembers->name}}
            </h2>
            <h3>{{$teamMembers->teamrole}}</h3>
          </div>
        </div>
        <!-- single member -->
        <div class="col-sm-4">
          <div class="member">
            <img src="/storage/uploads/{{$othersMembers->last()->teamimage}}" width="200" alt="">
            <h2>
              {{$othersMembers->last()->name}}
            </h2>
            <h3>{{$othersMembers->last()->teamrole}}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Team Section end-->


  <!-- Promotion section -->
  <div class="promotion-section">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <h2>Are you ready to stand out?</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.</p>
        </div>
        <div class="col-md-3">
          <div class="promo-btn-area">
            <a href="" class="site-btn btn-2">Browse</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Promotion section end-->


  <!-- Contact section -->
  <div class="contact-section spad fix">
    <div class="container">
      <div class="row">
        <!-- contact info -->
        <div class="col-md-5 col-md-offset-1 contact-info col-push">
          <div class="section-title left">
            <h2>Contact us</h2>
          </div>
          <p>Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. </p>
          <h3 class="mt60">Main Office</h3>
          <p class="con-item">C/ Libertad, 34 <br> 05200 Arévalo </p>
          <p class="con-item">0034 37483 2445 322</p>
          <p class="con-item">hello@company.com</p>
        </div>
        <!-- contact form -->
        <div class="col-md-6 col-pull">
          <form method="POST" action="/mail" class="form-class" id="con_form">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <input type="text" name="name" placeholder="Your name">
              </div>
              <div class="col-sm-6">
                <input type="text" name="email" placeholder="Your email">
              </div>
              <div class="col-sm-12">
                <input type="text" name="subject" placeholder="Subject">
                <textarea name="message" placeholder="Message"></textarea>
                <button class="site-btn">send</button>
              </div>
            </div>
          </form>
          @if ($errors->any())
               <ul class="list-unstyled">
                   @foreach ($errors->all() as $error)
                       <li class="bg-warning text-danger">{{$error}}</li>
                   @endforeach
               </ul>
           @endif
        </div>
      </div>
    </div>
  </div>
  <!-- Contact section end-->


  <!-- Footer section -->
  <footer class="footer-section">
    <h2>2017 All rights reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></h2>
  </footer>
  <!-- Footer section end -->



</html>

@endsection