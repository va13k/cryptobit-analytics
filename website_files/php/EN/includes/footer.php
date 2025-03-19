<footer class="footer">
		<div class="container my-auto">
			<div class="footer-menu">
				<div class="footer-brand" id="footerImage">
					<img class="footer-image" src="http://cryptobitanalytics/svg_images/main_logo.svg">
				</div>
			</div>
			<p class="footer-text">
				<img class="icon" width="25px" height="25px" style="margin-bottom: 3px;"
				src="http://cryptobitanalytics/jpg_png_images/phone2.png">
				+380 00 123 12 34
				<br>
				<img class="icon" src="http://cryptobitanalytics/jpg_png_images/email3.png">
				cryptobitanalytics@gmail.com
			</p>
		</div>
	</footer>
	
	<div class="copyright">
		<marquee>
		© 2020-2021 - CryptoBitAnalytics.com
		</marquee>
	</div>
</body>
<script type="text/javascript">
		let inpt = document.getElementById("phone");

		inpt.addEventListener('input', check)

		function check() {
			inpt.value = inpt.value.replace(/[^\d]/g,'');
		}
</script>