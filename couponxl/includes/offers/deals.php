<div class="white-block offer-box  <?php echo esc_attr( $offer_view ) ?> <?php echo $col == '12' ? 'clearfix' : '' ?>">
    <div class="white-block-media  <?php echo $col == '12' ? 'col-sm-4 no-padding' : '' ?>">
        <div class="embed-responsive embed-responsive-16by9">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'offer-box', array( 'class' => 'embed-responsive-item' ) );
			}
			?>
        </div>
	    <?php if ( couponxl_is_plugin_active( 'couponxl-cpt/couponxl-cpt.php' ) ) : ?>
		    <?php couponxl_cpt_share(); ?>
	    <?php endif; ?>
        <a href="<?php the_permalink() ?>" class="btn"><?php _e( 'VIEW DEAL', 'couponxl' ) ?></a>
    </div>

    <div class="white-block-content  <?php echo $col == '12' ? 'col-sm-8' : '' ?>">
        <ul class="list-unstyled list-inline top-meta">
            <li>
				<?php echo couponxl_get_ratings() ?>
            </li>
            <li>
				<?php
				$offer_expire = get_post_meta( get_the_ID(), 'offer_expire', true );
				echo couponxl_remaining_time( $offer_expire );
				?>
            </li>
        </ul>

        <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

        <ul class="list-unstyled list-inline bottom-meta">
            <li>
                <i class="fa fa-dot-circle-o icon-margin"></i>
				<?php
				$store_id = get_post_meta( get_the_ID(), 'offer_store', true );
				echo '<a href="' . get_permalink( $store_id ) . '">' . get_the_title( $store_id ) . '</a>';
				?>
            </li>
            <li>
                <i class="fa fa-map-marker icon-margin"></i>
				<?php if ( in_array( 'wordpress-seo/wp-seo.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
					<?php $loc = new WPSEO_Primary_Term( 'location', get_the_id() );
					$loc       = $loc->get_primary_term();
					$locName   = get_cat_name( $loc );
					echo $locName ?>
				<?php else: // if YOAST is not installed ?>
					<?php echo couponxl_taxonomy( 'location', 1 ) ?>
				<?php endif; ?>
            </li>
        </ul>
    </div>

    <div class="white-block-footer  <?php echo $col == '12' ? 'col-sm-12' : '' ?>">
        <div class="white-block-content">
			<?php echo couponxl_get_deal_price(); ?>
        </div>
    </div>
</div>