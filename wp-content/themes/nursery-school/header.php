<?php
/**
 * Display Header.
 * @package Nursery School
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<header role="banner" class="banner">
		<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'nursery-school' ); ?></a>
		<div id="header">
			<div class="container position-relative">
				<div class="header-box">
					<div class="row marrgin-0">
						<div class="logo col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12 padding-0">
							<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
						</div>
						<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12 padding-0 HeaderRbx">
							<div class="menu-section text-lg-center">
								<div class="<?php if( get_theme_mod( 'nursery_school_sticky_header', false) != '') { ?>sticky-menubox<?php } else { ?>close-sticky <?php } ?>">
						    		<?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 padding-0 mobdisplayHide">
							<div class="row marrgin-0">
								<div class="col-xl-6 col-lg-7 padding-0">
									<div class="phn">
									<?php if(get_theme_mod('nursery_school_phone') != ''){ ?>
										<a href="tel:<?php echo esc_attr(get_theme_mod('nursery_school_phone')); ?>"><i class="fas fa-phone me-2"></i>
										<?php echo esc_html(get_theme_mod('nursery_school_phone')); ?></a>
									<?php }?>
									</div>
								</div>
								<div class="col-xl-6 col-lg-5 padding-0">
									<div class="contactusbtn">
									<?php if(get_theme_mod('nursery_school_btn_link') != ''){ ?>
										<a href="<?php echo esc_html(get_theme_mod('nursery_school_btn_link')); ?>"><?php echo esc_html(get_theme_mod('nursery_school_btn_text')); ?><//?php echo esc_html('Contact Us', 'nursery-school'); ?> </a>
									<?php }?>
									</div>
								</div>
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</header>

	<?php if(is_singular()) {?>
		<div class="inner-head">
			<img src="<?php if ( get_header_image() ){ echo esc_url(get_header_image()); } else { echo esc_url(get_template_directory_uri()) ?>/assets/images/head-bg.jpg<?php }?>" class="head-img" alt="<?php echo esc_html('Header Background Image', 'nursery-school'); ?>">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 align-self-center">
						<div class="header-content">
							<h1><?php single_post_title(); ?></h1>
							<div class="lt-breadcrumbs">
								<?php nursery_school_breadcrumb(); ?>
							</div>
						</div>
					</div>
					<?php if(has_post_thumbnail()){?>
						<div class="col-lg-6 col-md-6 align-self-end">
							
						</div>
					<?php }?>
				</div>
				
			</div>
		</div>
	<?php }?>