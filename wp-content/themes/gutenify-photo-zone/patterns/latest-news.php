<?php
 /**
  * Title: Latest News
  * Slug: gutenify-photo-zone/latest-news
  * Categories: gutenify-photo-zone
  */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","right":"40px","bottom":"100px","left":"40px"},"blockGap":"0px"}},"backgroundColor":"background","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group has-background-background-color has-background" style="padding-top:100px;padding-right:40px;padding-bottom:100px;padding-left:40px"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"slider-title"} -->
<h2 class="wp-block-heading has-text-align-center has-slider-title-font-size" style="font-style:normal;font-weight:600">Recent News</h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","right":"15px","bottom":"15px","left":"15px"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:separator {"backgroundColor":"primary"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background"/>
<!-- /wp:separator --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":"3","offset":"0","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"tagName":"main","align":"wide","layout":{"inherit":false}} -->
<main class="wp-block-query alignwide"><!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"backgroundColor":"background-secondary","className":"has-shadow-dark  ","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group has-shadow-dark has-background-secondary-background-color has-background" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:cover {"useFeaturedImage":true,"minHeight":270,"minHeightUnit":"px","customGradient":"linear-gradient(180deg,rgba(0,0,0,0) 56%,rgba(0,0,0,0.61) 100%)","contentPosition":"bottom left","isDark":false,"style":{"spacing":{"padding":{"left":"40px","bottom":"20px"}}}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="padding-bottom:20px;padding-left:40px;min-height:270px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient" style="background:linear-gradient(180deg,rgba(0,0,0,0) 56%,rgba(0,0,0,0.61) 100%)"></span><div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} /--></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"40px","bottom":"40px","left":"40px"},"margin":{"top":"0px"},"blockGap":"10px"}},"backgroundColor":"background"} -->
<div class="wp-block-group alignwide has-background-background-color has-background" style="margin-top:0px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:post-title {"level":3,"isLink":true,"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}}} /-->

<!-- wp:post-date {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} /-->

<!-- wp:post-excerpt {"moreText":"Know More","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></main>
<!-- /wp:query -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"10px","margin":{"top":"20px","bottom":"20px"}}}} -->
<div class="wp-block-buttons" style="margin-top:20px;margin-bottom:20px"><!-- wp:button {"style":{"spacing":{"padding":{"right":"35px","left":"35px"}}},"className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="#" style="padding-right:35px;padding-left:35px"><?php echo esc_html__( 'Explore More', 'gutenify-photo-zone' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->