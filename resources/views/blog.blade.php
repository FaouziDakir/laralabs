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
					<!-- Post item -->
					@foreach ($posts as $post)
					<div class="post-item">
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
								<a href="/{{$post->id}}/blog-post">{{$post->comments->count()}} Comments</a>
							</div>
							<p>{{$post->message}}</p>
							<a href="/{{$post->id}}/blog-post" class="read-more">Read More</a>
						</div>
					</div>
					@endforeach
					<!-- Pagination -->
					{{$posts->links()}}
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
							@foreach ($tags as $tag)
							<li><a href="">{{$tag->tag_name}}</a></li>
							@endforeach
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