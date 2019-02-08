<?php /* Template Name: Homepage Template */
  get_header();
?>

<div uk-height-viewport class="tmcc-home-hero uk-flex uk-flex-column uk-flex-between uk-background-norepeat uk-background-cover uk-background-center-center" style="background-image:url(<?php the_field('background_image'); ?>);">
  <div class="uk-margin-large-top">
    <div class="uk-container">
      <img class="tmcc-home-hero__logo" src="<?php echo get_stylesheet_directory_uri() . '/public/assets/tmcc.svg'; ?>" uk-svg>
      <?php if ( get_field('introduction_text') ) : ?>
        <h1 class="uk-h2"><?php the_field( 'introduction_text' ) ; ?></h1>
      <?php endif; ?>
      <a class="uk-button uk-button-default tmcc-home-hero__connect-button" href="/contact-us">Connect with us</a>
    </div>
  </div>
  <div>
    <div class="uk-container">
      <div>
        <a class="tmcc-home-hero__link">
          <span class="uk-h3">Get to know us</span>
          <p>Scroll down to learn more</p>
          <span uk-icon="icon: arrow-down"></span>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="uk-section uk-section-secondary uk-light">
  <div class="uk-container">
    <div uk-grid>
      <div class="uk-width-3-5">
        <h2>About Us</h2>
        <?php

          if ( get_field('about_text') ) {
              echo '<p>'.the_field('about_text').'</p>';
          }

          $quoteGroup = get_field('quote');
            if ( $quoteGroup['quote_text'] ) {
              echo '<blockquote>';
                echo $quoteGroup['quote_text'];
                if ( $quoteGroup['quote_source'] ) {
                  echo '<footer>'.$quoteGroup['quote_source'].'</footer>';
                }
              echo '</blockquote>';
            }

        ?>
      </div>
      <?php
        if ( get_field('about_image') ) {
          echo '<div><img src="'.get_field( 'about_image' ).'"></div>';
        }
      ?>
    </div>
  </div>
</div>

<div class="uk-section tmcc-services-section uk-container">
  <div class="uk-flex uk-flex-right" uk-grid>
    <div class="uk-width-1-2">
      <h2>Our Services</h2>
      <?php
        if( get_field('services_introduction') ) {
          echo '<p>'.get_field('services_introduction').'</p>';
        }
      ?>
      <?php
        if( have_rows('services') ):
          ?>
          <ul class="uk-list uk-list-divider">
          <?php
          while ( have_rows('services') ) : the_row();
            echo '<li><div uk-grid><div class="uk-width-2-3">';
            if( get_sub_field('service_name') ) {
              echo '<h3>'.get_sub_field('service_name').'</h3>';
            }
            if( get_sub_field('service_description') ) {
              echo '<p>'.get_sub_field('service_description').'</p></div>';
            }
            if( get_sub_field('service_page') ) {
              echo '<div class="uk-width-1-3 uk-text-right"><a href="'.get_sub_field('service_page').'">Learn More</a></div>';
            }
            echo '</div></li>';
          endwhile;
          ?>
          </ul>
          <?php
        endif;
      ?>
    </div>
  </div>
  <?php 
    // $bg_image_one = if(get_field('services_image_one')) ? 'https://via.placeholder.com/400x300' : get_field('services_image_one');
    // $bg_image_two = if(get_field('services_image_two')) ? 'https://via.placeholder.com/300x600' : get_field('services_image_two');
    $bg_image_one = 'https://via.placeholder.com/400x300';
    $bg_image_two = 'https://via.placeholder.com/300x600';
    if( get_field('services_image_one') ) {
      $bg_image_one = get_field('services_image_one');
    }
    if( get_field('services_image_two') ) {
      $bg_image_two = get_field('services_image_two');
    }
  ?>
  <div class="tmcc-services-section__background tmcc-services-section__background--one" role="display" style="background-image:url(<?php echo $bg_image_one; ?>);"></div>
  <div class="tmcc-services-section__background tmcc-services-section__background--two" role="display" style="background-image:url(<?php echo $bg_image_two; ?>);"></div>
</div>


  <?php
    if( have_rows('clients') ):
      ?>
      <div class="uk-section uk-container uk-container-xsmall">
        <h2 class="uk-text-center">Who we've worked with</h2>
        <div uk-grid class="uk-child-width-1-4">
      <?php
      while ( have_rows('clients') ) : the_row();
        echo '<div>';
        if( get_sub_field('client_name') && get_sub_field('client_logo') && get_sub_field('client_link') ) {
          echo '<a href="'.get_sub_field('client_link').'"><img src="'.get_sub_field('client_logo').'" al="'.get_sub_field('client_name').'"></a>';
        }
        echo '</div>';
      endwhile;
      ?>
        </div>
      </div>
      <?php
    endif;
  ?>

<?php get_footer(); ?>
