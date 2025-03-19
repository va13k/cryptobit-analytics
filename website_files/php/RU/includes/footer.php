<footer class="footer">
	<div class="container my-auto">
		<div class="footer-menu">
			<div class="footer-brand" id="footerImage">
				<img class="footer-image" src="svg_images/main_logo.svg" alt="main_logo">
			</div>
		</div>
		<p class="footer-text">
			<img class="icon" width="25px" height="25px" style="margin-bottom: 3px;" src="jpg_png_images/phone2.png"
				alt="phone">
			+380 00 123 12 34
			<br>
			<img class="icon" src="jpg_png_images/email3.png" alt="email">
			cryptobitanalytics@gmail.com
		</p>
	</div>
</footer>

<div class="copyright">
	<div class="scrolling-text">
		© 2020-2021 - CryptoBitAnalytics.com
	</div>
</div>
</body>
<script type="text/javascript">
	let inpt = document.getElementById("phone");

	inpt.addEventListener('input', check)

	function check() {
		inpt.value = inpt.value.replace(/[^\d]/g, '');
	}
</script>