<div class="col-md-4">
    <div class="item">
        <div class="item__wrp-img">
			<?php the_post_thumbnail( 'large' ); ?>
        </div>
        <div class="item__info">
            <div class="item__wrp-date-cat">
                <p class="item__date"><?php the_time( 'm/d/y' ); ?></p>
                <p class="item__cat">
					<?php
					$terms = get_the_terms( $post->ID, 'taxonomy' );
					foreach ( $terms as $term ) {
						echo $term->name;
					}
					?>
                </p>
            </div>
            <p class="item__title"><?php the_title(); ?></p>
            <a class="item__read-more" href="<?php the_permalink(); ?>"><?php _e( 'Learn more', 'newsevents' ); ?></a>
        </div>
    </div>
</div>