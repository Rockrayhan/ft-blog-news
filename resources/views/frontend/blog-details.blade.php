@extends('frontend.layouts.app')
@section('content')


	<!-- Breadcrumb -->
	<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<a href="blog-list-01.html" class="breadcrumb-item f1-s-3 cl9">
					Blog 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					 {{$blog->title}}
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div>
			
	<!-- Content -->
	<section class="bg0 p-b-70 p-t-5">
		<!-- Title -->
		<div class="bg-img1 size-a-18 how-overlay1" style="background-image: url('{{ asset('uploads/' . $blog->image) }}');">
			<div class="container h-full flex-col-e-c p-b-58">
				<a href="#" class="f1-s-10 cl0 hov-cl10 trans-03 text-uppercase txt-center m-b-33">
					{{$blog->category->name}}
				</a>

				<h3 class="f1-l-5 cl0 p-b-16 txt-center respon2">
					{{$blog->title}}
				</h3>

				<div class="flex-wr-c-s">
					<span class="f1-s-3 cl8 m-rl-7 txt-center">
						<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
							by  {{$blog->author}}
						</a>

						<span class="m-rl-3">-</span>

						<span>
							Feb 18
						</span>
					</span>

					<span class="f1-s-3 cl8 m-rl-7 txt-center">
						5239 Views
					</span>

					<a href="" class="f1-s-3 cl8 m-rl-7 txt-center hov-cl10 trans-03">
						0 Comment
					</a>
				</div>
			</div>
		</div>

		<!-- Detail -->
		<div class="container p-t-82">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-100">
					<div class="p-r-10 p-r-0-sr991">
						<!-- Blog Detail -->
						<div class="p-b-70">
							<div>
                                {!! $blog->content !!}
                            </div>

							<!-- Tag -->
							<div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
									Tags:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<span  class="f1-s-12 cl8  m-r-15">
										{{ $blog->tags }}
									</span>
								</div>
							</div>

							<!-- Share -->
							<div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
                                    <!-- Facebook Share -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                       class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" 
                                       target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-facebook-f m-r-7"></i>
                                        Facebook
                                    </a>
                                
                                    <!-- Twitter Share -->
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title ?? 'Check this out!') }}" 
                                       class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" 
                                       target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-twitter m-r-7"></i>
                                        Twitter
                                    </a>
                                
                                
                                    <!-- Pinterest Share -->
                                    <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->fullUrl()) }}&media={{ asset('uploads/' . $blog->image) }}&description={{ urlencode($blog->title) }}" 
                                       class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" 
                                       target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-pinterest-p m-r-7"></i>
                                        Pinterest
                                    </a>
                                </div>
                                
							</div>
						</div>

						<!-- Leave a comment -->
						<div>
							<h4 class="f1-l-4 cl3 p-b-12">
								Leave a Comment
							</h4>

							<p class="f1-s-13 cl8 p-b-40">
								Your email address will not be published. Required fields are marked *
							</p>

							<form>
								<textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Comment..."></textarea>

								<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">

								<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*">

								<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="website" placeholder="Website">

								<button class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
									Post Comment
								</button>
							</form>
						</div>
					</div>
				</div>
				
				<div class="col-md-10 col-lg-4 p-b-100">
					<div class="p-l-10 p-rl-0-sr991">
						<!-- ADD Banner -->
						<div class="flex-c-s">
							<a href="#">
								<img class="max-w-full" src="{{asset('images/banner-02.jpg')}}" alt="IMG">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection