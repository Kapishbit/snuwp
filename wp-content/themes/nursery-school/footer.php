<?php
/**
 * Displaying Footer.
 * @package Nursery School
 */
?>
<footer id="footer-section" role="contentinfo">
	<!-- <div class="footer-overlay"></div> -->
	<svg viewBox="0 0 1440 215" id="footersvg1">
		<path fill-rule="evenodd" d="M1.000,59.000 C41.471,23.315 93.064,2.728 147.000,1.000 C203.400,-0.807 258.470,18.132 302.000,54.000 C346.020,38.858 392.494,32.430 437.000,38.000 C471.062,42.263 498.725,53.736 513.000,63.000 C527.610,72.481 540.323,84.295 551.000,98.000 C579.518,89.411 609.295,86.024 639.000,88.000 C669.848,90.052 700.004,97.850 728.000,111.000 C748.904,94.554 772.025,81.397 797.000,72.000 C818.011,64.094 868.163,54.796 920.000,57.000 C975.064,59.342 1024.969,75.972 1041.000,86.000 C1058.998,97.259 1074.688,111.431 1088.000,128.000 C1120.104,120.811 1153.234,121.086 1185.000,129.000 C1208.920,134.959 1231.533,145.109 1252.000,159.000 C1263.891,153.924 1276.275,150.241 1289.000,148.000 C1303.200,145.499 1317.618,144.830 1332.000,146.000 C1347.627,120.003 1372.534,100.745 1402.000,93.000 C1437.132,83.766 1474.336,92.022 1503.000,114.000 C1503.000,270.000 1503.000,426.000 1503.000,582.000 C1002.000,582.000 501.000,582.000 0.000,582.000 C0.333,407.667 0.667,233.333 1.000,59.000 Z"></path>
	</svg>
	<svg viewBox="0 0 1440 200" id="footersvg">
		<path fill-rule="evenodd" d="M1.000,59.000 C41.471,23.315 93.064,2.728 147.000,1.000 C203.400,-0.807 258.470,18.132 302.000,54.000 C346.020,38.858 392.494,32.430 437.000,38.000 C471.062,42.263 498.725,53.736 513.000,63.000 C527.610,72.481 540.323,84.295 551.000,98.000 C579.518,89.411 609.295,86.024 639.000,88.000 C669.848,90.052 700.004,97.850 728.000,111.000 C748.904,94.554 772.025,81.397 797.000,72.000 C818.011,64.094 868.163,54.796 920.000,57.000 C975.064,59.342 1024.969,75.972 1041.000,86.000 C1058.998,97.259 1074.688,111.431 1088.000,128.000 C1120.104,120.811 1153.234,121.086 1185.000,129.000 C1208.920,134.959 1231.533,145.109 1252.000,159.000 C1263.891,153.924 1276.275,150.241 1289.000,148.000 C1303.200,145.499 1317.618,144.830 1332.000,146.000 C1347.627,120.003 1372.534,100.745 1402.000,93.000 C1437.132,83.766 1474.336,92.022 1503.000,114.000 C1503.000,270.000 1503.000,426.000 1503.000,582.000 C1002.000,582.000 501.000,582.000 0.000,582.000 C0.333,407.667 0.667,233.333 1.000,59.000 Z"></path>
	</svg>
	<?php
		get_template_part( 'template-parts/footer/footer', 'widgets' );
		
		get_template_part( 'template-parts/footer/site', 'info' );
	?>
</footer>

<?php wp_footer(); ?>

</body>
</html>