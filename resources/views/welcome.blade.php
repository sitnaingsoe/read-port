<!DOCTYPE html>
<html lang="en">
@include('component.user-head')
<body class="body">
			@include('component.user-header')
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
											<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/8Svxxm1gbOGYt3y3mzc5nMhWYZB9cTQ8VvP2pjm1.webp" alt="">
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
											<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/8Svxxm1gbOGYt3y3mzc5nMhWYZB9cTQ8VvP2pjm1.webp" alt="">
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
											<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/8Svxxm1gbOGYt3y3mzc5nMhWYZB9cTQ8VvP2pjm1.webp" alt="">
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
											<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/8Svxxm1gbOGYt3y3mzc5nMhWYZB9cTQ8VvP2pjm1.webp" alt="">
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
												<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="A Young Man is Depressed" class="upcoming-image">
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
												<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="Strong Woman"class="upcoming-image">
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
												<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="To My Dearest Daughter" class="upcoming-image">
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
												<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="အကြင်သူသည်" class="upcoming-image">
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
												<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="Strong Woman" class="upcoming-image">
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
												<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="Strong Woman" class="upcoming-image">
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
											<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
											
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
											<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
											
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
									<a href="#" >
									<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
										<div class="card">
											<div class="card__cover">
												<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
												
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
									<a href="#" >
									<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
										<div class="card">
											<div class="card__cover">
												<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
												
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
									<a href="#" >
									<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
										<div class="card">
											<div class="card__cover">
												<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
												
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
									<a href="#" >
									<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
										<div class="card">
											<div class="card__cover">
												<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
												
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
							</div>
						</div>			
						<div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="3-tab">
							<div class="row">

								<!-- card -->
								<a href="#" >
										<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
											<div class="card">
												<div class="card__cover">
													<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
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
													<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
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
													<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
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
											<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
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
											<img src="https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/y9LQMg6E7AKQb9pImeFKcl01USNPSfBdIEXuPMlC.jpg" alt="">
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
								
								<!-- end card -->
							</div>
						</div>
					</div>
				</div>
			</section>
		@include('component.user-fooder')
	
		@include('component.user-js')
	  
		
</body>

</html>