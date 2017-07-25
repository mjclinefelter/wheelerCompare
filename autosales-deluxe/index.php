<?php get_header(); ?>
	<div class="col-sm-9 home col-sm-push-3" id="content">
			<?php cps_ajax_search_results(); ?>	
			<?php if ( ! dynamic_sidebar( 'carousel' ) ) : endif; ?>
			<?php if ( is_active_sidebar( 'arrivals' ) ) : ?>
            <?php dynamic_sidebar( 'arrivals' ); ?>  
            <?php endif; ?>		
		</div>
		<div class="col-sm-3 col col-sm-pull-9">
			<?php if ( ! dynamic_sidebar( 'search' ) ) : endif; ?>
			<?php if ( ! dynamic_sidebar('sidebar')) : endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>