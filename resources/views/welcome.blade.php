<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->    
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>
	<style>
	

.upcoming-container {
  max-width: 1000px;
  margin: auto;
  padding: 20px;
}

.upcoming-row {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center; /* center the cards */
  margin-bottom: 5px; /* reduce space below the row */
}

.upcoming-col {
  flex: 0 0 300px; /* Fixed width */
  margin-bottom: 20px;
}

.upcoming-container {
  max-width: 1140px;
  margin: auto;
  padding: 20px 0; /* Reduced vertical padding */
}

.upcoming-card-image {
  flex: 0 0 30%;
  padding: 10px;
}

.upcoming-card-image img {
  width: 100%;
  display: block;
  border-radius: 4px;
}

.upcoming-card-content {
  padding: 10px;
  flex: 1;
}

.upcoming-title {
  margin: 0 0 10px;
  font-size: 18px;
}

.upcoming-title a {
  color: #fff;
  text-decoration: none;
}

.upcoming-category a {
  margin-right: 10px;
  font-size: 14px;
  color: #fff;
  text-decoration: none;
}

.upcoming-rating {
  margin: 10px 0;
  font-size: 14px;
  color: #f36c12;
}

.upcoming-image {
  width: 100%;
  height: 300px; /* Set your desired height here */
  object-fit: cover;
  border-radius: 5px;
}


.upcoming-description {
  font-size: 14px;
  color: #fff;
}

.upcoming-read-more {
  display: inline-block;
  margin-top: 8px;
  font-size: 14px;
  color: #007BFF;
  text-decoration: none;
}

.upcoming-read-more:hover {
  text-decoration: underline;
}

@media (max-width: 768px) {
  .upcoming-col {
    flex: 0 0 100%;
  }
}


</style>

</head>
<body class="body">
	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="index.html" class="header__logo">
								<img src="img/reportlogo.png" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<li class="header__nav-item">
									<a href="index.html" class="header__nav-link header__nav-link--active">Home</a>
								</li>

								<li class="header__nav-item">
									<a href="catalog1.html" class="header__nav-link">Premium</a>
								</li>

								<li class="header__nav-item">
									<a href="pricing.html" class="header__nav-link ">Review</a>
								</li>

								

								<!-- dropdown -->
								<li class="dropdown header__nav-item">
									<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
										<li><a href="about.html">About</a></li>
										<li><a href="signin.html">Sign In</a></li>
										<li><a href="signup.html">Sign Up</a></li>
										
									</ul>
								</li>
								<!-- end dropdown -->
							</ul>
							<!-- end header nav -->

							<!-- header auth -->
							<div class="header__auth">
								<button class="header__search-btn" type="button">
									<i class="icon ion-ios-search"></i>
								</button>

								<a href="signin.html" class="header__sign-in">
									<i class="icon ion-ios-log-in"></i>
									<span>sign in</span>
								</a>
							</div>
							<!-- end header auth -->

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- header search -->
		<form action="#" class="header__search">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input type="text" placeholder="Search for a movie, TV Series that you are looking for">

							<button type="button">search</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- end header search -->
	</header>
	<!-- end header -->

	<!-- home -->
	<section class="home">
		<!-- home bg -->
		<div class="owl-carousel home__bg">
			<div class="item home__cover" data-bg="img/covers/popular/popu1.jpg"></div>
			<div class="item home__cover" data-bg="img/covers/popular/popu2.jpg"></div>
			<div class="item home__cover" data-bg="img/covers/popular/popu3.jpg"></div>
			<div class="item home__cover" data-bg="img/covers/popular/popu4.jpg"></div>
			
		</div>
		<!-- end home bg -->

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="home__title"><b>POPULAR BOOKS</b> OF THIS SEASON</h1>

					<button class="home__nav home__nav--prev" type="button">
						<i class="icon ion-ios-arrow-round-back"></i>
					</button>
					<button class="home__nav home__nav--next" type="button">
						<i class="icon ion-ios-arrow-round-forward"></i>
					</button>
				</div>

				<div class="col-12">
					<div class="owl-carousel home__carousel">
						<div class="item">
							<!-- card -->
							<div class="card card--big">
								<div class="card__cover">
									<img src="img/covers/popular/popu1.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#"> <i class="fas fa-crown" style="color:gold;"></i>&nbsp;ခင်ဗျားကို ကျွန်တော်ချစ်တယ်</a></h3>
									<span class="card__category">
										<a href="#">စဝ်ခွန်ဇ</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star" style="color:orn"></i>8.4</span>
								</div>
							</div>
							<!-- end card -->
						</div>

						<div class="item">
							<!-- card -->
							<div class="card card--big">
								<div class="card__cover">
									<img src="img/covers/popular/popu2.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">  <i class="fas fa-crown" style="color:gold;"></i>&nbsp;ရေစက်တိုသည်လည်း တစ်ခါတစ်ရံ မဆုံသည်းသာ</a></h3>
									<span class="card__category">
										<a href="#">လမင်းမိုမို</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
							<!-- end card -->
						</div>

						<div class="item">
							<!-- card -->
							<div class="card card--big">
								<div class="card__cover">
									<img src="img/covers/popular/popu3.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">  <i class="fas fa-crown" style="color:gold;"></i>&nbsp;ဘ၀အတွေးထဲမှဒဿနများ</a></h3>
									<span class="card__category">
										<a href="#">အရှင်ဣဒ္ဓိပါလ(ရွှေသန္တာ)</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
							<!-- end card -->
						</div>

						<div class="item">
							<!-- card -->
							<div class="card card--big">
								<div class="card__cover">
									<img src="img/covers/popular/popu4.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#"> <i class="fas fa-crown" style="color:gold;"></i>&nbsp;အဖိုးတန်တဲ့လူအဖိုးတန်တဲ့ဘ၀</a></h3>
									<span class="card__category">
										<a href="#">ညီညီနိုင်</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
							<!-- end card -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end home -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">
							<i class="fas fa-clock" aria-hidden="true" style="margin-right: 10px;  color: #1aafff;"></i>
								It's Book O'clock
						</h2>



						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Upcoming</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Comedy</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Drama</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">Business</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">Detective</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-7" role="tab" aria-controls="tab-7" aria-selected="false">Thriller</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-8" role="tab" aria-controls="tab-8" aria-selected="false">Technical</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-9" role="tab" aria-controls="tab-9" aria-selected="false">Comic</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-10" role="tab" aria-controls="tab-10" aria-selected="false">History</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-11" role="tab" aria-controls="tab-11" aria-selected="false">Health</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-12" role="tab" aria-controls="tab-12" aria-selected="false">Agriculture</a>
							</li>
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Catalog">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Updates</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Comedy</a></li>

									<li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Drama</a></li>

									<li class="nav-item"><a class="nav-link" id="5-tab" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">Business</a></li>

									<li class="nav-item"><a class="nav-link" id="6-tab" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">Detective</a></li>

									<li class="nav-item"><a class="nav-link" id="7-tab" data-toggle="tab" href="#tab-7" role="tab" aria-controls="tab-7" aria-selected="false">Thriller</a></li>

									<li class="nav-item"><a class="nav-link" id="8-tab" data-toggle="tab" href="#tab-8" role="tab" aria-controls="tab-8" aria-selected="false">Technical</a></li>

									<li class="nav-item"><a class="nav-link" id="9-tab" data-toggle="tab" href="#tab-9" role="tab" aria-controls="tab-9" aria-selected="false">Comic</a></li>

									<li class="nav-item"><a class="nav-link" id="10-tab" data-toggle="tab" href="#tab-10" role="tab" aria-controls="tab-10" aria-selected="false">History</a></li>

									<li class="nav-item"><a class="nav-link" id="11-tab" data-toggle="tab" href="#tab-11" role="tab" aria-controls="tab-11" aria-selected="false">Health</a></li>

									<li class="nav-item"><a class="nav-link" id="12-tab" data-toggle="tab" href="#tab-12" role="tab" aria-controls="tab-12" aria-selected="false">Agriculture</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		
		<div class="container">	

				<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">

		<div class="upcoming-row">

			<!-- Card 1 -->
			<div class="upcoming-col">
			  <div class="upcoming-card" onclick='openDetail({
				"title": "A Young Man is Depressed",
				"category": ["Comedy", "Drama"],
				"rating": 7.9,
				"description": "❝ လူ့ဘဝမှာ အစွဲအလန်း သိပ်ကြီးတဲ့သူတွေဟာ...",
				"image": "img/covers/Latest/l1.jpg"
			  })'>
				<div class="upcoming-card-image">
				  <a href="detail.html">
					<img src="img/covers/Upcoming/l1.jpg" alt="A Young Man is Depressed" class="upcoming-image">
				  </a>
				</div>
				<div class="upcoming-card-content">
				  <h3 class="upcoming-title"><a href="detail.html">လူငယ်တစ်ယောက်စိတ်ဓာတ်ကျနေသည်</a></h3>
				  <div class="upcoming-category">
					<a href="#">သော်တာမင်း</a>
					
				  </div>
				  <div class="upcoming-rating">
					<i class="icon ion-ios-star"></i> 7.9
				  </div>
				  <div class="upcoming-description">
					<p>❝ လူ့ဘဝမှာ အစွဲအလန်း သိပ်ကြီးတဲ့သူတွေဟာ...</p>
					<a href="detail.html" class="upcoming-read-more">Read More</a>
				  </div>
				</div>
			  </div>
			</div>
		
			<!-- Card 2 -->
			<div class="upcoming-col">
			  <div class="upcoming-card"  onclick='openDetail({
				"title": "The Mystery Island",
				"category": ["Adventure", "Thriller"],
				"rating": 8.4,
				"description": "A thrilling journey to an uncharted island full of secrets.",
				"image": "img/covers/Upcoming/l2.jpg"
			  })'>
				<div class="upcoming-card-image">
				  <a href="detail.html">
					<img src="img/covers/Upcoming/l2.jpg" alt="Strong Woman"class="upcoming-image">
				  </a>
				</div>
				<div class="upcoming-card-content">
				  <h3 class="upcoming-title"><a href="catalog1.html">သန်မာတဲ့အမျိုးသမီး</a></h3>
				  <div class="upcoming-category">
					<a href="#">ဉာဏ</a>
					
				  </div>
				  <div class="upcoming-rating">
					<i class="icon ion-ios-star"></i> 8.4
				  </div>
				  <div class="upcoming-description">
					<p>ဒီစာအုပ်မှာ အမျိုးသမီးတွေအတွက် ဘဝရဲ့အကောင်းဆုံးပုံစံကို...</p>
					<a href="detail.html" class="upcoming-read-more">Read More</a>
				  </div>
				</div>
			  </div>
			</div>
		
			<!-- Card 3 -->
			<div class="upcoming-col">
			  <div class="upcoming-card">
				<div class="upcoming-card-image">
				  <a href="detail3.html">
					<img src="img/covers/Upcoming/l3.jpg" alt="To My Dearest Daughter" class="upcoming-image">
				  </a>
				</div>
				<div class="upcoming-card-content">
				  <h3 class="upcoming-title"><a href="detail3.html">အချစ်ရဆုံးသမီးလေးသို</a></h3>
				  <div class="upcoming-category">
					<a href="#">လွန်းထားထား</a>
				  </div>
				  <div class="upcoming-rating">
					<i class="icon ion-ios-star"></i> 7.1
				  </div>
				  <div class="upcoming-description">
					<p>အချစ်ရဆုံးသမီးလေးရေ… မိန်းကလေးတစ်ယောက်ရဲ့တန်ဖိုးမှာ...</p>
					<a href="detail3.html" class="upcoming-read-more">Read More</a>
				  </div>
				</div>
			  </div>
			</div>
		
			<!-- Card 4 -->
			<div class="upcoming-col">
			  <div class="upcoming-card">
				<div class="upcoming-card-image">
				  <a href="detail4.html">
					<img src="img/covers/Upcoming/l4.jpg" alt="အကြင်သူသည်" class="upcoming-image">
				  </a>
				</div>
				<div class="upcoming-card-content">
				  <h3 class="upcoming-title"><a href="detail4.html">အကြင်သူသည်</a></h3>
				  <div class="upcoming-category">
					<a href="#">သိုးဆောင်း</a>
				  </div>
				  <div class="upcoming-rating">
					<i class="icon ion-ios-star"></i> 7.1
				  </div>
				  <div class="upcoming-description">
					<p>"အကြင်သူသည်" စာအုပ်က လက်လှမ်းမီတဲ့အချစ်ကို ပြသ...</p>
					<a href="detail4.html" class="upcoming-read-more">Read More</a>
				  </div>
				</div>
			  </div>
			</div>

			<!-- Card 5 -->
			<div class="upcoming-col">
				<div class="upcoming-card">
				  <div class="upcoming-card-image">
					<a href="catalog1.html">
					  <img src="img/covers/Upcoming/l5.jpg" alt="Strong Woman" class="upcoming-image">
					</a>
				  </div>
				  <div class="upcoming-card-content">
					<h3 class="upcoming-title"><a href="catalog1.html">မောင့်ကိုပြောမပြချင်ဘူး</a></h3>
					<div class="upcoming-category">
					  <a href="#">ပုညခင်</a>
					  
					</div>
					<div class="upcoming-rating">
					  <i class="icon ion-ios-star"></i> 8.4
					</div>
					<div class="upcoming-description">
					  <p>မောင်နဲ့လက်ထပ်ခွင့်ကိုအရူးအမူးမျှော်လင့်ခဲ့တဲ့အကြောင်းမောင့်ကိုပြောမပြချင်ဘူး.....</p>
					  <a href="catalog1.html" class="upcoming-read-more">Read More</a>
					</div>
				  </div>
				</div>
			  </div><!--end card 5-->

			  <!-- Card 6 -->
			<div class="upcoming-col">
				<div class="upcoming-card">
				  <div class="upcoming-card-image">
					<a href="catalog1.html">
					  <img src="img/covers/Upcoming/l7.jpg" alt="Strong Woman" class="upcoming-image">
					</a>
				  </div>
				  <div class="upcoming-card-content">
					<h3 class="upcoming-title"><a href="catalog1.html">လက်ညှိးထိုး၍ပန်းဝေသည်</a></h3>
					<div class="upcoming-category">
					  <a href="#">သိုးဆောင်း</a>
					  
					</div>
					<div class="upcoming-rating">
					  <i class="icon ion-ios-star"></i> 8.4
					</div>
					<div class="upcoming-description">
					  <p>လောကဆိုတာမေတ္တာပေးရင်ရက်စက်တတ်တဲ့အမျိုးမဟုတ်မှန်းကျွန်တော်သိတာခဲ့တာကြာပါပြီ....</p>
					  <a href="catalog1.html" class="upcoming-read-more">Read More</a>
					</div>
				  </div>
				</div>
			  </div>
		  <!--end card 6-->
		 
		  </div>
		  </div>
				<!-- Comedy Books -->
				<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
					<div class="row">

						<!-- card -->
						<a href="#" >
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/comedy/cm1.jpg" alt="">
									
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">သူခိုး</a></h3>
									<span class="card__category">
										<a href="">အကြည်တော်</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div></a>
						<!-- end card -->

						<!-- card -->
						<a href="#" >
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/comedy/cm2.jpg" alt="">
									
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">"ရော"မြိုက ပြန်ခဲ့တယ်</a></h3>
									<span class="card__category">
										<a href="">ဆွေမင်:</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						</a>
						<!-- end card -->

						<!-- card -->
						<a href="#" >
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/comedy/cm3.jpg" alt="">
									
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">Comedy Collections</a></h3>
									<span class="card__category">
										<a href="">ခင်မောင်တိုး</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
						</div>
						</a>
						<!-- end card -->
						<!-- card -->
						<!-- card -->
<!-- card -->
<a href="#" >
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
		<div class="card">
			<div class="card__cover">
				<img src="img/covers/comedy/cm4.jpg" alt="">
				
			</div>
			<div class="card__content">
				<h3 class="card__title"><a href="#">အိုင်အိုဒင်း ကိုကိုကြီး</a></h3>
				<span class="card__category">
					<a href="#">အကြည်တော်</a>
				</span>
				<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
			</div>
		</div>
	</div></a>
	<!-- end card -->

							<!-- end card -->
	
							<!-- card -->
							<a href="#" >
							<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/comedy/cmd7.jpg" alt="">
										
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">စကားတောင်စားများနှင့် လှတောသား</a></h3>
										<span class="card__category">
											<a href="#">သိမ့်သိမ့်နွေး</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
									</div>
								</div>
							</div>
							</a>
							<!-- end card -->
	
							<!-- card -->
							<a href="#" >
							<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/comedy/cm6.jpg" alt="">
										
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">မှားပါတယ် အပျိုကြီးရယ်</a></h3>
										<span class="card__category">
											<a href="#">Many Writers</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
									</div>
								</div>
							</div>
							</a>
							<!-- end card -->
					</div>
				</div>


				<div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="4-tab">
					<div class="row">
						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/drama/dr1.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">အမှတ်တရ</a></h3>
									<span class="card__category">
										<a href="#">ဂျူး</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<a href="#" >
								<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
									<div class="card">
										<div class="card__cover">
											<img src="img/covers/drama/dr2.jpg" alt="">
											<a href="#" class="card__play">
												<i class="icon ion-ios-play"></i>
											</a>
										</div>
										<div class="card__content">
											<h3 class="card__title"><a href="#">သူငယ်ချင်းလိုပဲ ဆက်၍ခေါ်မည်...ခိုင်</a></h3>
											<span class="card__category">
												<a href="#">တက္ကသိုလ် ဘုန်းနိုင်</a>
											</span>
											<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
										</div>
									</div>
								</div>
								</a>
								<!-- end card -->

						<!-- card -->
						<a href="#" >
								<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
									<div class="card">
										<div class="card__cover">
											<img src="img/covers/drama/dr3.jpg" alt="">
											<a href="#" class="card__play">
												<i class="icon ion-ios-play"></i>
											</a>
										</div>
										<div class="card__content">
											<h3 class="card__title"><a href="#">လက်ကျန်လရောင်</a></h3>
											<span class="card__category">
												<a href="#">ပုညခင်</a>
											</span>
											<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
										</div>
									</div>
								</div>
								</a>
								<!-- end card -->

						<!-- card -->
						<a href="#" >
								<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
									<div class="card">
										<div class="card__cover">
											<img src="img/covers/drama/dr4.jpg" alt="">
											<a href="#" class="card__play">
												<i class="icon ion-ios-play"></i>
											</a>
										</div>
										<div class="card__content">
											<h3 class="card__title"><a href="#">လင်္ကာဒီပ ချစ်သူ</a></h3>
											<span class="card__category">
												<a href="#">ချစ်ဦးညို</a>
											</span>
											<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
										</div>
									</div>
								</div>
								</a>
								<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/drama/dr5.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">ပွင့်လင်းမြင်သာ ရင်ခုန်ပါ</a></h3>
									<span class="card__category">
										<a href="#">ဆုမြတ်မွန်မွန်</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/drama/dr6.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">မမကိုချစ်တယ်</a></h3>
									<span class="card__category">
										<a href="#">သျှင်မ</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						
					</div>
				</div>
				<div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">

						<!-- card -->
						<a href="#" >
								<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
									<div class="card">
										<div class="card__cover">
											<img src="img/covers/business/b1.jpg" alt="">
											<a href="#" class="card__play">
												<i class="icon ion-ios-play"></i>
											</a>
										</div>
										<div class="card__content">
											<h3 class="card__title"><a href="#">Network Marketing ၏ လျှိဝှက်ချက်မဟုတ်သော လျှိဝှက်ချက်</a></h3>
											<span class="card__category">
												<a href="#">ဒေါက်တာ မြမြသက်</a>
											</span>
											<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
										</div>
									</div>
								</div>
								</a>
								<!-- end card -->

						<!-- card -->
						<a href="#" >
								<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
									<div class="card">
										<div class="card__cover">
											<img src="img/covers/business/b2.jpg" alt="">
											<a href="#" class="card__play">
												<i class="icon ion-ios-play"></i>
											</a>
										</div>
										<div class="card__content">
											<h3 class="card__title"><a href="#">ကိုယ့်နောက်က လိုက်နေသည့်ငွေ</a></h3>
											<span class="card__category">
												<a href="#">ခင်မောင်ညို(ဘောဂ‌ဗေဒ)</a>
											</span>
											<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
										</div>
									</div>
								</div>
								</a>
								<!-- end card -->

						<!-- card -->
						<a href="#" >
								<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
									<div class="card">
										<div class="card__cover">
											<img src="img/covers/business/b3.jpg" alt="">
											<a href="#" class="card__play">
												<i class="icon ion-ios-play"></i>
											</a>
										</div>
										<div class="card__content">
											<h3 class="card__title"><a href="#">‌မောင်စူးစမ်း စီးပွားရေးအတွေးအမြင်</a></h3>
											<span class="card__category">
												<a href="#">မောင်စူးစမ်း</a>
											</span>
											<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
										</div>
									</div>
								</div>
								</a>
								<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/business/b4.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">အချစ်ဘ၀နှင့်ငွေကြေးဆိုင်ရာ နည်းဗျူဟာများ</a></h3>
									<span class="card__category">
										<a href="#">သန်းမြင့်ဦး</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/business/b5.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">ဗိုလ်ချုပ်အောင်ဆန်း၏ စီးပွားရေးအမြင်</a></h3>
									<span class="card__category">
										<a href="#">တင်စိုး(ဘောဂဂုဏ်)</a>
									
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/business/b6.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">ဂလိုဘယ်လိုက်ဇေးရှင်းခေတ် အိုင်ဒီယာစီးပွားရေး</a></h3>
									<span class="card__category">
										<a href="#">မောင်စူးစမ်း</a>
									
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
				<div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/detective/d1.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">တစ်ကိုယ်တော်ဘခက် နှင့် ရင်သိမ့်တုန်ဝတ္ထုများ</a></h3>
									<span class="card__category">
										<a href="#">ဆွေလှိင်ဦး</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/detective/d2.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">စုံနံ့သာမင်းမောင် နှင့် ပေးချင်တာပေးမောင်လူလေး</a></h3>
										<span class="card__category">
											<a href="#">မင်းပုည</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->


						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/detective/d3.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">ကိုယ်တွေ့စုံထောက်မှု</a></h3>
										<span class="card__category">
											<a href="#">ပုလိပ်အရာရှိတစ်ဦး(A2211)</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/detective/d4.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">စုံထောက်ကလေး သုံးယောက်နှင့် ကလေးဝတ္ထုတိုများ</a></h3>
										<span class="card__category">
											<a href="#">နိုင်မြင့်</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/detective/d5.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">သူသိပ်လျှိဝှက်သည်</a></h3>
									<span class="card__category">
										<a href="#">တက္ကသိုလ်တင်မြင့်</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/detective/d6.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">မြင်ကွင်းစုံမှုခင်း</a></h3>
									<span class="card__category">
										<a href="#">အသက်ဆွေ</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
				<div class="tab-pane fade" id="tab-7" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/thriller/t1.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">မဖဲဝါ နဲ့ အိမ်ကြီးရှင် သရဲမ</a></h3>
									<span class="card__category">
										<a href="#">ဧကန်မင်:</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/thriller/t2.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">တစ်ကျော့ပြန် ဝိညာဉ်ကျိန်စာ</a></h3>
										<span class="card__category">
											<a href="#">ရီရီဌေး</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/thriller/t3.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">တာတေ တ‌စ္ဆေမျက်လုံး</a></h3>
										<span class="card__category">
											<a href="#">တာတေ</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/thriller/t4.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">အပါယ်ရွာ</a></h3>
										<span class="card__category">
											<a href="#">ထွန်းလွင်</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/thriller/t5.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">မရဏကြေးမှု နှင့် လိပ်ပြာအကျဉ်းသား</a></h3>
									<span class="card__category">
										<a href="#">တြိစက္က</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/thriller/t6.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">တစ္ဆေတွေ နေတဲ့အိမ်</a></h3>
									<span class="card__category">
										<a href="#">တာတေ</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
				<div class="tab-pane fade" id="tab-8" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/Technical/te1.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">Oculus Link နည်းပညာ</a></h3>
									<span class="card__category">
										<a href="#">Internet Journal</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/Technical/te2.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">Graphic Designer များအတွက် Photoshop</a></h3>
										<span class="card__category">
											<a href="#">ခိုင်မောင်</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

							<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/Technical/te3.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">Wifi Internet Connection Hacking</a></h3>
										<span class="card__category">
											<a href="#">3thic0kiddi3</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

							<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/Technical/te4.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">သင်္ချာပညာ ငါဆရာ</a></h3>
										<span class="card__category">
											<a href="#">မောင်ဒီ</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/Technical/te5.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">Who Did It First?</a></h3>
									<span class="card__category">
										<a href="#">အောင်အေး(ရန်ကုန်တက္ကသိုလ်)</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/Technical/te6.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">အိုင်တီလောက</a></h3>
									<span class="card__category">
										<a href="#">မောင်ထူးချွန်</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
				<div class="tab-pane fade" id="tab-9" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/comic/cop1.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">ရွှေအိုရောင်မှတ်တမ်း</a></h3>
									<span class="card__category">
										<a href="#">Vuee</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/comic/cop2.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">လူနှင့်အချစ်</a></h3>
										<span class="card__category">
											<a href="#">Vuee</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

							<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/comic/cop3.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">လူပျိုတို၏မှတ်စုများ</a></h3>
										<span class="card__category">
											<a href="#">Vuee</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

							<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/comic/cop4.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">ကြိုးပြတ်နေသော ပတ္တလားသံသည် ပို၍ ချိုမြိန်၏</a></h3>
										<span class="card__category">
											<a href="#">Vuee</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/comic/cop5.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">မျှတသောမိုးရေ</a></h3>
									<span class="card__category">
										<a href="#">Vuee</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/comic/cop6.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">ကြိုးတစ်ချောင်းကို ဖြတ်ကျော်ခြင်း</a></h3>
									<span class="card__category">
										<a href="#">Vuee</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
				<div class="tab-pane fade" id="tab-10" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/history/hi1.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">ဧကရီ ဘုရင်မကြီး ရှင်စောပု</a></h3>
									<span class="card__category">
										<a href="#">စိမ့်(ပညာရေး)</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/history/hi2.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">တစ်ရံတစ်ခါက မဟာဒေဝီ စဝ်သုစန္ဒီ</a></h3>
										<span class="card__category">
											<a href="#">နိုင်ဦး</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

							<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/history/hi3.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">ဒဂုံမြိုမှသည် ရန်ကုန်မြိုတော်သို</a></h3>
										<span class="card__category">
											<a href="#">ဟိန်းလတ်</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

							<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/history/hi4.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">ခြောက်ထပ်ကြီး ရွှေသာလျောင်းဘုရားကြီးသမိုင်း</a></h3>
										<span class="card__category">
											<a href="#">အရှင်ဒေမိန္ဒသာမိ</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/history/hi5.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">အမှတ်တရ</a></h3>
									<span class="card__category">
										<a href="#">မောင်ဝံသ</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/history/hi6.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">အထင်ကရ မြန်မာ့နိုင်ငံရေး ခေါင်းဆောင်များ</a></h3>
									<span class="card__category">
										<a href="#">သန်းဝင်လှိင်</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
				<div class="tab-pane fade" id="tab-11" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/health/h1.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">အဆစ်အမြစ်ကိုက်ဝေဒနာများ</a></h3>
									<span class="card__category">
										<a href="#">ဆရာ၀န်တင်ရွှေ</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/health/h2.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">အဖြစ်များသောလေရောဂါ</a></h3>
										<span class="card__category">
											<a href="#">ကြည်လွင်မြင့်(မုဒြာ)</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->
							<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/health/h3.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">လက်တွေ့အသုံး၀င်ရိုးရာဆေးပင်နှင့်ဆေးနည်းများ</a></h3>
										<span class="card__category">
											<a href="#">မောင်ယဉ်နွယ်</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->
							<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/health/h4.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">ရောဂါသုတဆေးသုတ</a></h3>
										<span class="card__category">
											<a href="#">ဒေါက်တာအောင်နိုင်</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->
						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/health/h5.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">ကျေးဇူးပဲAIDSနှင့်ရင်ဖွင့်လွှာများ</a></h3>
									<span class="card__category">
										<a href="#">သုမောင်</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/health/h6.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">ဖြစ်တတ်သောနှလုံးနှင့်သွေးကြောရောဂါများ</a></h3>
									<span class="card__category">
										<a href="#">ပါမောက္ခဒေါက်တာခင်မောင်အေး</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
				<div class="tab-pane fade" id="tab-12" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/agriculture/a1.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">သစ်သီးပင်မျိုးပွားနည်းများ</a></h3>
									<span class="card__category">
										<a href="#">လယ်ယာစိုက်ပျိုးရေးနှင့်ဆည်မြောင်း၀န်ကြီးဌာန</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/agriculture/a2.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">မွေးမြူရေးလုင်ငန်းပိုင်ရှင်များနှင့်ခြံမန်နေဂျာများအတွက်ဆောင်ရန်ရှောင်ရန်</a></h3>
										<span class="card__category">
											<a href="#">၀င်းလွင်(လက်ပံတန်း)</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

							<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/agriculture/a3.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">ဟင်းသီးဟင်းရွက်စိုက်ပျိုးနည်းလမ်းညွှန်</a></h3>
										<span class="card__category">
											<a href="#">CBFF စီမံချက်</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

							<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="card">
									<div class="card__cover">
										<img src="img/covers/agriculture/a4.jpg" alt="">
										<a href="#" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">စားပင်ဟင်းရွက်သီးနှံများစိုက်ပျိုးနည်း</a></h3>
										<span class="card__category">
											<a href="#">သုတေသီဆရာငြိမ်း</a>
										</span>
										<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
									</div>
								</div>
							</div>
							<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/agriculture/a5.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">ဓာတ်မြေဩဇာနှင့်အာဟာရစီမံခန့်ခွဲမှု(စပါး)</a></h3>
									<span class="card__category">
										<a href="#">Agriculture Cluster-Myanmar</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="img/covers/agriculture/a6.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">အိမ်ခြံ၀င်းဟင်းခင်းပဒေသာအခြေခံလက်တွေ့စိုက်ပျိုးနည်းစနစ်</a></h3>
									<span class="card__category">
										<a href="#">မင်း၀င်းထိန်</a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
			</div>
			<!-- end content tabs -->
		</div>
	</section>
	<!-- end content -->

	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<!-- footer list -->
				<div class="col-12 col-md-3">
					<h6 class="footer__title">Download Our App</h6>
					<ul class="footer__app">
						<li><a href="#"><img src="img/Download_on_the_App_Store_Badge.svg" alt=""></a></li>
						<li><a href="#"><img src="img/google-play-badge.png" alt=""></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Resources</h6>
					<ul class="footer__list">
						<li><a href="#">About Us</a></li>
						<li><a href="#">Pricing Plan</a></li>
						<li><a href="#">Help</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Legal</h6>
					<ul class="footer__list">
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Security</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-12 col-sm-4 col-md-3">
					<h6 class="footer__title">Contact</h6>
					<ul class="footer__list">
						<li><a href="tel:+18002345678">+1 (800) 234-5678</a></li>
						<li><a href="mailto:support@moviego.com">support@flixgo.com</a></li>
					</ul>
					<ul class="footer__social">
						<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
						<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
						<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
						<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer copyright -->
				<div class="col-12">
					<div class="footer__copyright">
						<small><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></small>

						<ul>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<!-- end footer copyright -->
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- JS -->
	
	  
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/jquery.morelines.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>

	<script>
		function toggleDescription(button) {
		  const moreText = button.previousElementSibling.querySelector('.more-text');
		  if (moreText.style.display === "inline") {
			moreText.style.display = "none";
			button.textContent = "Read More";
		  } else {
			moreText.style.display = "inline";
			button.textContent = "Read Less";
		  }
		}
	  </script>

	  <script>
  function openDetail(book) {
    localStorage.setItem("selectedBook", JSON.stringify(book));
    window.location.href = "detail.html";
  }
</script>
	  
		
</body>

</html>