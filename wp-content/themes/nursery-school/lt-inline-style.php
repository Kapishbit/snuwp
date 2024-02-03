<?php 

	$nursery_school_custom_css = '';

	// Site Title Color
	$nursery_school_site_title_color = get_theme_mod('nursery_school_site_title_color');
	$nursery_school_custom_css .= '.logo h1 a, .logo p.site-title a {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_site_title_color) . ';';
	$nursery_school_custom_css .= '}';

	// Site Tagline Color
	$nursery_school_site_tagline_color = get_theme_mod('nursery_school_site_tagline_color');
	$nursery_school_custom_css .= '.logo p.site-description {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_site_tagline_color) . ';';
	$nursery_school_custom_css .= '}';

	// Slider
	$nursery_school_slider_hide_show = get_theme_mod('nursery_school_slider_hide_show',false);
	if($nursery_school_slider_hide_show == true){
		$nursery_school_custom_css .= '.page-template-home-custom .inner-head {';
			$nursery_school_custom_css .= 'display: none;';
		$nursery_school_custom_css .= '}';
	}

	// Menus Color
	$nursery_school_menu_color = get_theme_mod('nursery_school_menu_color');
	$nursery_school_custom_css .= '.primary-navigation ul li a {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_menu_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_menu_hover_color = get_theme_mod('nursery_school_menu_hover_color');
	$nursery_school_custom_css .= '.primary-navigation ul li a:hover {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_menu_hover_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_submenu_color = get_theme_mod('nursery_school_submenu_color');
	$nursery_school_custom_css .= '.primary-navigation ul.sub-menu li a {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_submenu_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_submenu_hover_color = get_theme_mod('nursery_school_submenu_hover_color');
	$nursery_school_custom_css .= '.primary-navigation ul.sub-menu li a:hover {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_submenu_hover_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_submenubdr_color = get_theme_mod('nursery_school_submenubdr_color');
	$nursery_school_custom_css .= '.primary-navigation ul ul {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_submenubdr_color) . ';';
	$nursery_school_custom_css .= '}';
		
	$nursery_school_submenu_bg_color = get_theme_mod('nursery_school_submenu_bg_color');
	$nursery_school_custom_css .= '.primary-navigation ul ul a {';
		$nursery_school_custom_css .= 'background-color: ' . esc_attr($nursery_school_submenu_bg_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_submenu_bghvr_color = get_theme_mod('nursery_school_submenu_bghvr_color');
	$nursery_school_custom_css .= '.primary-navigation ul ul a:hover {';
		$nursery_school_custom_css .= 'background-color: ' . esc_attr($nursery_school_submenu_bghvr_color) . ';';
	$nursery_school_custom_css .= '}';

	//Topbar color
	$nursery_school_topbar_text_color = get_theme_mod('nursery_school_topbar_text_color');
	$nursery_school_custom_css .= '#header .phn a{';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_topbar_text_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_social_icons_color = get_theme_mod('nursery_school_social_icons_color');
	$nursery_school_custom_css .= '#header .phn a i {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_social_icons_color) . ';';
	$nursery_school_custom_css .= '}';
	
	$nursery_school_timing_color = get_theme_mod('nursery_school_timing_color');
	$nursery_school_custom_css .= '.contact-detail p {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_timing_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_topbar_btntext_color = get_theme_mod('nursery_school_topbar_btntext_color');
	$nursery_school_custom_css .= '#header .contactusbtn a{';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_topbar_btntext_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_topbar_btnbg_color = get_theme_mod('nursery_school_topbar_btnbg_color');
	$nursery_school_custom_css .= '#header .contactusbtn {';
		$nursery_school_custom_css .= 'background-color: ' . esc_attr($nursery_school_topbar_btnbg_color) . ';';
	$nursery_school_custom_css .= '}';

	// Slider Color
	$nursery_school_slider_title_color = get_theme_mod('nursery_school_slider_title_color');
	$nursery_school_custom_css .= '#slider .inner_carousel h1 {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_slider_title_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_slider_text_color = get_theme_mod('nursery_school_slider_text_color');
	$nursery_school_custom_css .= '#slider .inner_carousel p {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_slider_text_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_slider_btn_text_color = get_theme_mod('nursery_school_slider_btn_text_color');
	$nursery_school_slider_btn_border_color = get_theme_mod('nursery_school_slider_btn_border_color');
	$nursery_school_custom_css .= '#slider .read-btn a {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_slider_btn_text_color) . '; border-color: ' . esc_attr($nursery_school_slider_btn_border_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_slider_btn_text_hover_color = get_theme_mod('nursery_school_slider_btn_text_hover_color');
	$nursery_school_slider_btnbg_hover_color = get_theme_mod('nursery_school_slider_btnbg_hover_color');
	$nursery_school_slider_btn_border_hover_color = get_theme_mod('nursery_school_slider_btn_border_hover_color');
	$nursery_school_custom_css .= '#slider .read-btn a:hover {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_slider_btn_text_hover_color) . '; border-color: ' . esc_attr($nursery_school_slider_btn_border_hover_color) . '; background-color: ' . esc_attr($nursery_school_slider_btnbg_hover_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_slider_npbtn_color = get_theme_mod('nursery_school_slider_npbtn_color');
	$nursery_school_slider_npbtnbg_color = get_theme_mod('nursery_school_slider_npbtnbg_color');
	$nursery_school_custom_css .= '#slider .carousel-control-next-icon i, #slider .carousel-control-prev-icon i {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_slider_npbtn_color) . '; background-color: ' . esc_attr($nursery_school_slider_npbtnbg_color) . ';';
	$nursery_school_custom_css .= '}';

	// Product color options
	$nursery_school_product_title_color = get_theme_mod('nursery_school_product_title_color');
	$nursery_school_custom_css .= '.woocommerce ul.products li.product .woocommerce-loop-product__title {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_product_title_color) . ' !important;';
	$nursery_school_custom_css .= '}';

	$nursery_school_product_price_color = get_theme_mod('nursery_school_product_price_color');
	$nursery_school_custom_css .= '.woocommerce ul.products li.product .price {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_product_price_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_product_btn_color = get_theme_mod('nursery_school_product_btn_color');
	$nursery_school_product_btn_bg_color = get_theme_mod('nursery_school_product_btn_bg_color');
	$nursery_school_custom_css .= '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, a.added_to_cart.wc-forward {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_product_btn_color) . '; background-color: ' . esc_attr($nursery_school_product_btn_bg_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_product_btn_hover_color = get_theme_mod('nursery_school_product_btn_hover_color');
	$nursery_school_product_sale_color = get_theme_mod('nursery_school_product_sale_color');
	$nursery_school_custom_css .= '.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, a.added_to_cart.wc-forward:hover {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_product_sale_color) . '; background-color: ' . esc_attr($nursery_school_product_btn_hover_color) . ';';
	$nursery_school_custom_css .= '}';

	$nursery_school_product_sale_bg_color = get_theme_mod('nursery_school_product_sale_bg_color');
	$nursery_school_product_sale_color = get_theme_mod('nursery_school_product_sale_color');
	$nursery_school_custom_css .= '.woocommerce span.onsale {';
		$nursery_school_custom_css .= 'color: ' . esc_attr($nursery_school_product_sale_color) . '; background-color: ' . esc_attr($nursery_school_product_sale_bg_color) . ';';
	$nursery_school_custom_css .= '}';