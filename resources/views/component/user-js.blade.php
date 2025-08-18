			<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
			<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
			<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
			<script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
			<script src="{{ asset('js/jquery.mCustomScrollbar.min.js') }}"></script>
			<script src="{{ asset('js/wNumb.js') }}"></script>
			<script src="{{ asset('js/nouislider.min.js') }}"></script>
			<script src="{{ asset('js/plyr.min.js') }}"></script>
			<script src="{{ asset('js/jquery.morelines.min.js') }}"></script>
			<script src="{{ asset('js/photoswipe.min.js') }}"></script>
			<script src="{{ asset('js/photoswipe-ui-default.min.js') }}"></script>
			<script src="{{ asset('js/main.js') }}"></script>

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