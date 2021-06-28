@extends('layouts.app')

@section('content')

	<!-- Page header -->
	<div class="page-top-section">
            <div class="overlay"></div>
            <div class="container text-right">
                <div class="page-info">
                    <h2>Blog</h2>
                    <div class="page-links">
                        <a href="#">Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page header end-->
    
    
        <!-- page section -->
        <div class="page-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-7 blog-posts">
                        <!-- Single Post -->
                        <div class="single-post">
                            <div class="post-thumbnail">
                                <img src="/storage/uploads/posts/{{$post->image}}" alt="">
                                <div class="post-date">
                                    <h2>{{$post->created_at->format('d')}}</h2>
                                    <h3>{{$post->created_at->format('M Y')}}</h3>
                                </div>
                            </div>
                            <div class="post-content">
                                <h2 class="post-title">{{$post->titre}}</h2>
                                <div class="post-meta">
                                    <a href="">Loredana Papp</a>
                                    <a href="">
                                        @foreach ($post->tags as $tag)
                                        {{$tag->tag_name}}
                                        @endforeach
                                    </a>
                                    <a href="">{{$post->comments->count()}} Comments</a>
                                </div>
                                <p>{{$post->message}}</p>
                            </div>
                            <!-- Post Author -->
                            <div class="author">
                                <div class="avatar">
                                    <img width="40" src="/storage/uploads/users/{{$post->auteur()->avatar}}" alt="">
                                </div>
                                <div class="author-info">
                                    <h2>{{$post->auteur()->name}} <span>Author</span></h2>
                                    <p>{{$post->auteur()->biographie}}</p>
                                </div>
                            </div>
                            <!-- Post Comments -->
                            <div class="comments">
                            <h2>Comments ({{$post->comments->count()}})</h2>
                                <ul class="comment-list">
                                @foreach ($post->comments as $comment)
                                <li>
                                    <div class="avatar">
                                        <img src="/storage/uploads/users/{{$comment->avatar()}}" alt="">
                                    </div>
                                    <div class="commetn-text">
                                        <h3>{{$comment->auteur}} | {{$comment->created_at->format('d M')}}, {{$comment->created_at->format('Y')}} | Reply</h3>
                                        <p>{{$comment->message}}</p>
                                    </div>
                                </li>
                                @endforeach
                                </ul>
                            </div>
                            <!-- Commert Form -->
                            <div class="row">
                                <div class="col-md-9 comment-from">
                                    <h2>Leave a comment</h2>
                                    <form method="POST" action="/{{$post->id}}/blog-post" class="form-class">
                                        @csrf
                                        <div class="row">
                                            @guest
                                            <div class="col-sm-6">
                                                    <input type="text" name="auteur" placeholder="Your name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="email" placeholder="Your email">
                                                </div>
                                            @endguest
                                            <div class="col-sm-12">
                                                <input type="text" name="subject" placeholder="Subject">
                                                <textarea name="message" placeholder="Message"></textarea>
                                                <button class="site-btn">send</button>
                                            </div>
                                        </div>
                                        @if ($errors->any())
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li class="bg-warning text-danger">{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar area -->
                    <div class="col-md-4 col-sm-5 sidebar">
                        <!-- Single widget -->
                        <div class="widget-item">
                            <form action="#" class="search-form">
                                <input type="text" placeholder="Search">
                                <button class="search-btn"><i class="flaticon-026-search"></i></button>
                            </form>
                        </div>
                        <!-- Single widget -->
                        <div class="widget-item">
                            <h2 class="widget-title">Categories</h2>
                            <ul>
                                <li><a href="#">Vestibulum maximus</a></li>
                                <li><a href="#">Nisi eu lobortis pharetra</a></li>
                                <li><a href="#">Orci quam accumsan </a></li>
                                <li><a href="#">Auguen pharetra massa</a></li>
                                <li><a href="#">Tellus ut nulla</a></li>
                                <li><a href="#">Etiam egestas viverra </a></li>
                            </ul>
                        </div>
                        <!-- Single widget -->
                        <div class="widget-item">
                            <h2 class="widget-title">Instagram</h2>
                            <ul class="instagram">
                                <li><img src="img/instagram/1.jpg" alt=""></li>
                                <li><img src="img/instagram/2.jpg" alt=""></li>
                                <li><img src="img/instagram/3.jpg" alt=""></li>
                                <li><img src="img/instagram/4.jpg" alt=""></li>
                                <li><img src="img/instagram/5.jpg" alt=""></li>
                                <li><img src="img/instagram/6.jpg" alt=""></li>
                            </ul>
                        </div>
                        <!-- Single widget -->
                        <div class="widget-item">
                            <h2 class="widget-title">Tags</h2>
                            <ul class="tag">
                                <li><a href="">branding</a></li>
                                <li><a href="">identity</a></li>
                                <li><a href="">video</a></li>
                                <li><a href="">design</a></li>
                                <li><a href="">inspiration</a></li>
                                <li><a href="">web design</a></li>
                                <li><a href="">photography</a></li>
                            </ul>
                        </div>
                        <!-- Single widget -->
                        <div class="widget-item">
                            <h2 class="widget-title">Quote</h2>
                            <div class="quote">
                                <span class="quotation">‘​‌‘​‌</span>
                                <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. Sed lacinia turpis at ultricies vestibulum.</p>
                            </div>
                        </div>
                        <!-- Single widget -->
                        <div class="widget-item">
                            <h2 class="widget-title">Add</h2>
                            <div class="add">
                                <a href=""><img src="img/add.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page section end-->
    
    
        <!-- newsletter section -->
        <div class="newsletter-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="col-md-9">
                        <!-- newsletter form -->
                        <form class="nl-form">
                            <input type="text" placeholder="Your e-mail here">
                            <button class="site-btn btn-2">Newsletter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter section end-->
    
    
        <!-- Footer section -->
        <footer class="footer-section">
            <h2>2017 All rights reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></h2>
        </footer>
        <!-- Footer section end -->

        </html>


@endsection