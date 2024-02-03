<?php
/**
 * Template Name: Home Custom Page
 */
?>

<?php get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'nursery_school_above_slider' ); ?>

  <?php if( get_theme_mod('nursery_school_slider_hide_show', false) != ''){ ?> 

    <section id="slider" class="m-0 p-0 mw-100">
       
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"> 
        <?php $nursery_school_content_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'nursery_school_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $nursery_school_content_pages[] = $mod;
            }
          }
          if( !empty($nursery_school_content_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $nursery_school_content_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>             
              <div class="sliderbg-img">
                  <?php the_post_thumbnail(); ?>
                  <div class="slide-oly"></div>
              </div>
              <div class="slider-content">
                  <div class="inner_carousel">
                    <p>
                      <?php $nursery_school_excerpt = get_the_excerpt(); echo esc_html( nursery_school_string_limit_words( $nursery_school_excerpt,20 ) ); ?>
                    </p>
                    
                    <h1><?php the_title(); ?></h1>
                    
                    <div class="read-btn">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><span><?php esc_html_e( 'Contact Us', 'nursery-school' ); ?></span><span class="screen-reader-text"><?php esc_html_e( 'Contact Us', 'nursery-school' );?></span></a>
                    </div>
                  </div>
                
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>

            <svg viewBox="0 0 1440 215" id="slidersvg1">
              <path fill-rule="evenodd" d="M1.000,59.000 C41.471,23.315 93.064,2.728 147.000,1.000 C203.400,-0.807 258.470,18.132 302.000,54.000 C346.020,38.858 392.494,32.430 437.000,38.000 C471.062,42.263 498.725,53.736 513.000,63.000 C527.610,72.481 540.323,84.295 551.000,98.000 C579.518,89.411 609.295,86.024 639.000,88.000 C669.848,90.052 700.004,97.850 728.000,111.000 C748.904,94.554 772.025,81.397 797.000,72.000 C818.011,64.094 868.163,54.796 920.000,57.000 C975.064,59.342 1024.969,75.972 1041.000,86.000 C1058.998,97.259 1074.688,111.431 1088.000,128.000 C1120.104,120.811 1153.234,121.086 1185.000,129.000 C1208.920,134.959 1231.533,145.109 1252.000,159.000 C1263.891,153.924 1276.275,150.241 1289.000,148.000 C1303.200,145.499 1317.618,144.830 1332.000,146.000 C1347.627,120.003 1372.534,100.745 1402.000,93.000 C1437.132,83.766 1474.336,92.022 1503.000,114.000 C1503.000,270.000 1503.000,426.000 1503.000,582.000 C1002.000,582.000 501.000,582.000 0.000,582.000 C0.333,407.667 0.667,233.333 1.000,59.000 Z"></path>
          </svg>

          <svg viewBox="0 0 1440 205" id="slidersvg">
            <path fill-rule="evenodd" d="M1.000,59.000 C41.471,23.315 93.064,2.728 147.000,1.000 C203.400,-0.807 258.470,18.132 302.000,54.000 C346.020,38.858 392.494,32.430 437.000,38.000 C471.062,42.263 498.725,53.736 513.000,63.000 C527.610,72.481 540.323,84.295 551.000,98.000 C579.518,89.411 609.295,86.024 639.000,88.000 C669.848,90.052 700.004,97.850 728.000,111.000 C748.904,94.554 772.025,81.397 797.000,72.000 C818.011,64.094 868.163,54.796 920.000,57.000 C975.064,59.342 1024.969,75.972 1041.000,86.000 C1058.998,97.259 1074.688,111.431 1088.000,128.000 C1120.104,120.811 1153.234,121.086 1185.000,129.000 C1208.920,134.959 1231.533,145.109 1252.000,159.000 C1263.891,153.924 1276.275,150.241 1289.000,148.000 C1303.200,145.499 1317.618,144.830 1332.000,146.000 C1347.627,120.003 1372.534,100.745 1402.000,93.000 C1437.132,83.766 1474.336,92.022 1503.000,114.000 C1503.000,270.000 1503.000,426.000 1503.000,582.000 C1002.000,582.000 501.000,582.000 0.000,582.000 C0.333,407.667 0.667,233.333 1.000,59.000 Z"></path>
          </svg>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous', 'nursery-school' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next', 'nursery-school' );?></span>
        </a>
      </div>   
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'nursery_school_below_slider' ); ?>

  <?php if( get_theme_mod('nursery_school_service_category') != ''){ ?>
    <section id="service-section" class="pb-5">
      <div class="container">

        <?php if(get_theme_mod('nursery_school_btn_serviceheading') != ''){ ?>
          <div class="service-head">
            <h4><?php echo esc_html(get_theme_mod('nursery_school_btn_serviceheading')); ?></h4>
            <svg class="titleicon" xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 73.295 73.295" xml:space="preserve">
            <path d="M70.119 20.541a6.066 6.066 0 0 0 1.132-3.153c.082-1.177-.145-2.312-.648-3.277a4.7 4.7 0 0 0-2.092-2.037c-.529-2.242-2.137-3.9-4.227-4.137-.985-2.043-2.77-3.394-4.854-3.394l-.26.007c-.499.028-.967.157-1.419.327-1.124-1.656-2.785-2.706-4.669-2.706l-.28.007c-1.024.056-1.946.429-2.744.999C48.411.935 46.032-.322 43.552.073c-4.026.647-6.42 5.13-5.57 10.425.435 2.693 1.663 4.938 3.294 6.409-.591.858-1.018 1.801-1.2 2.846-1.018 5.862 3.262 9.483 6.093 11.875.637.54 1.243 1.043 1.729 1.546 1.735 1.791 2.039 4.771.682 6.643-.096.135-.256.321-.452.557-2 2.422-7.328 8.854-5.248 15.847 1.184 3.991 3.948 6.467 8.216 7.354 1.195.249 2.341.374 3.408.374 6.446 0 10.422-4.473 10.637-11.964.084-2.865.531-5.109 1.421-7.092 2.914-6.612 7.635-17.369 3.557-24.352zM29.743 9.417c-2.472-.397-4.852.86-6.503 3.104-.801-.572-1.721-.945-2.751-1.001l-.276-.007c-1.884 0-3.54 1.048-4.669 2.709a4.821 4.821 0 0 0-1.424-.332l-.254-.007c-2.084 0-3.867 1.351-4.852 3.395-2.075.236-3.676 1.873-4.216 4.099a4.518 4.518 0 0 0-1.447 1.109c-.944 1.088-1.418 2.637-1.304 4.251a6.07 6.07 0 0 0 1.128 3.147c-4.074 6.981.646 17.739 3.572 24.385.88 1.954 1.326 4.197 1.411 7.064.219 7.49 4.197 11.962 10.639 11.962 1.065 0 2.213-.126 3.408-.377 4.263-.887 7.027-3.357 8.215-7.35 2.082-6.989-3.243-13.422-5.247-15.844-.196-.237-.354-.425-.453-.56-1.357-1.872-1.054-4.854.682-6.646.486-.502 1.095-1.006 1.73-1.547 2.832-2.393 7.109-6.015 6.088-11.875-.181-1.042-.606-1.988-1.197-2.843 1.63-1.472 2.859-3.716 3.29-6.407.354-2.191.137-4.392-.615-6.197-.974-2.34-2.778-3.88-4.955-4.232z"></path></svg>
          </div>
        <?php }?>

        <div class="row">
          <?php $nursery_school_catData =  get_theme_mod('nursery_school_service_category');
          if($nursery_school_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($nursery_school_catData,'nursery-school'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>  
              
              <div class="col-lg-4 col-md-6 row serbx ">
                <div class="service-box text-center ">
                  <div class="service-img">
                    <?php the_post_thumbnail(); ?>

                    <svg class="boxsvgshape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 388 90">
                          <path fill-rule="evenodd" d="M391.011,8.780 C387.986,33.461 369.757,53.596 345.778,59.039 C321.243,64.608 295.568,53.691 282.452,31.899 C272.537,42.469 258.817,48.771 244.256,48.987 C227.286,49.239 211.360,41.209 201.034,27.879 C190.383,52.565 167.017,69.195 140.724,71.101 C115.898,72.900 91.871,61.358 77.398,40.946 C62.045,45.571 45.484,44.157 31.160,36.925 C16.392,29.469 5.203,16.435 0.000,0.739 C0.000,34.580 0.000,68.420 0.000,102.261 C130.002,102.261 260.004,102.261 390.005,102.261 C390.341,71.101 390.676,39.941 391.011,8.780 Z"></path>
                      </svg>
                      <div class="clearfix"></div>
                  </div>
                  <div class="service-content">
                      
                    <a href="<?php echo esc_url( get_permalink() );?>">
                        <div class="title"><?php the_title();?></div>
                    </a>

                    <p>
                      <?php $nursery_school_excerpt = get_the_excerpt(); echo esc_html( nursery_school_string_limit_words( $nursery_school_excerpt,20 ) ); ?> 
                    </p>
                    <div class="button"><a href="<?php the_permalink(); ?>"><span><?php echo esc_html('Read More', 'nursery-school'); ?></span></a></div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <!-- </div> -->
            <?php endwhile; 
            wp_reset_postdata();
          } ?>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>
  <?php do_action( 'nursery_school_below_best_sellers' ); ?>

  <div class="container entry-content py-4">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>
<?php get_footer(); ?>