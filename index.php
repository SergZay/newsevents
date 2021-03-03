<?php get_header(); ?>
    <section class="news">
        <div class="container">
            <p class="news__title">News</p>
            <ul class="menu-news">
                <li><a class="current" href="all">All</a></li>
				<?php $args = array(
					'taxonomy' => 'taxonomy',
					'parent'   => 0
				);

				$categories = get_categories( $args );
				foreach ( $categories as $category ) {
					echo '<li><a href="' . $category->slug . '">' . $category->name . '</a></li>';
				} ?>
            </ul>
            <div class="news__wrapper">
                <div class="row">
					<?php $query = new WP_Query(
						array(
							'post_type'      => 'news',
							'posts_per_page' => '5'
						)
					); ?>
					<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
						<?php get_template_part( 'inc/template/item' ); ?>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="container">
            <p class="news__title">Events</p>
            <select class="news-select" name="" id="">
                <option value="all">All</option>
				<?php $args = array(
					'taxonomy' => 'taxonomy',
					'parent'   => 0
				);

				$categories = get_categories( $args );
				foreach ( $categories as $category ) {
					echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
				} ?>
            </select>
            <div class="news__wrapper--events">
                <div class="row">
					<?php if ( have_rows( 'events', 'option' ) ): ?>
						<?php while ( have_rows( 'events', 'option' ) ): the_row(); ?>
							<?php
							if ( get_row_index() <= 5 ) {
								get_template_part( 'inc/template/item', 'acf' );
							} else {
								break;
							}
							?>
						<?php endwhile; ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>