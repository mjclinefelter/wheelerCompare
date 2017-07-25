<?php
/*
Template Name: Financing Application
*/
?>
<?php get_header(); ?>
		<?php cps_ajax_search_results_single();?>	
		<div class="col-sm-9 col-sm-push-3 hideOnSearch" id="content">
					<div class="detail-page-content hideOnSearch">
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<div class="blog-post  financing">                 	 
								<h1><a href="<?php the_permalink() ?>"><?php the_title();?></a></h1>
							<div style="clear:both"></div>	
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?>
							<?php the_content();?>
							<?php $years = join(', ', generate_years( $options['year_start_text'], date('Y') ) );?>
								<div class="contact-us-page">
							<?php	if( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'contact-form' ) ) { echo do_shortcode('[contact-form][contact-field label="Purchase Type" class="select" type="select" options="New,Used"/][contact-field label="Year" class="select" type="select" options="'.$years.'"/][contact-field label="Condition" type="select" options="New,Used"/][contact-field label="Stock Number" type="text"/][contact-field label="Make" type="text"/][contact-field label="Model" type="text"/][contact-field label="VIN" type="text"/][contact-field label="First Name" type="name" class="name form-control" required="1"/][contact-field label="Last Name" type="name" class="name form-control" required="1"/][contact-field label="City" type="text"/][contact-field label="Email" type="email" class="form-control" required="1"/][contact-field label="Date of Birth (MM/DD/YY)" type="text"/][contact-field label="Address" type="text"/][/contact-form]'); };?>		
							<div style="clear: both"></div>
					</div>	</div>
				<?php endwhile; ?>	
            </div>
		</div>	
		<div class="col-sm-3 col col-sm-pull-9">
			<?php if ( ! dynamic_sidebar( 'search' ) ) : ?>
			<?php endif; ?>
			<?php if ( ! dynamic_sidebar('sidebar')) : ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>