<div class="col-md-4">
    <div class="item">
		<?php $image = get_sub_field( 'image' ); ?>
        <div class="item__wrp-img">
            <img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php $image['alt']; ?>">
        </div>
        <div class="item__info">
            <div class="item__wrp-date-cat">
                <p class="item__date"><?php the_sub_field( 'date' ); ?></p>
				<?php $parent_title = get_sub_field( 'taxonomy' ); ?>
                <p class="item__cat"><?php echo $parent_title[0]->name; ?></p>
            </div>
            <p class="item__title"><?php the_sub_field( 'title' ); ?></p>
            <a class="item__read-more" href="<?php the_permalink(); ?>"><?php _e( 'Learn more', 'newsevents' ); ?></a>
        </div>
    </div>
</div>
