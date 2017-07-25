<?php
add_action( 'widgets_init', 'sidebars_and_widgets' );

function sidebars_and_widgets()
{
	register_widget( 'GTCD_Widget' );
	register_widget( 'Carousel' );
	register_widget('Phone_Header_Widget');
	register_widget('Full_Specs');
	register_widget('Feat_Widget');
	register_widget('Top_Deals');
	register_widget('Footer1_Widget');
	register_widget('Footer2_Widget');
	register_widget('Footer3_Widget');
	register_widget('Footer4_Widget');
	register_widget('Find_By_Type');
	register_widget('Loan_Calculator');
    register_widget('Arrivals_Widget');
    register_widget('Seller_Widget');
	
	$sidebars = array(		
		'sidebar' => array(
							'id'            => 'sidebar',
							'name'          => __( 'Sidebar', 'language' ),
							'description'   => __( 'Left Sidebar', 'language' ),
							'before_title'  => '<h3>',
							'after_title'   => '</h3>',
							'before_widget' => '<div class="side-widget">',
							'after_widget'  => '</div>',
				),	
		'search'  => array(
							'id'            => 'search',
							'name'          => __( 'AutoSales Sidebar', 'language' ),
							'description'   => __( 'Add all AutoSales widgets here', 'language' ),
							'before_title'  => '<h3 class="search-title">',
							'after_title'   => '</h3>',
							'before_widget' => '<div class="side-widget">',
							'after_widget'  => '</div>',
				), 
		'carousel' => array(
							'id'            => 'carousel',
							'name'          => __( 'AutoSales Carousel', 'language' ),
							'description'   => __( 'Homepage Slideshow', 'language' ),
				),	
		'phone' => array(
							'id'            => 'phone',
							'name'          => __( 'Header Phone Number', 'language' ),
							'description'   => __( 'Business phone number in header', 'language' ),
				),
		'specs' =>  array(
							'id'            => 'specs',
							'name'          => __( 'Vehicle Specifications', 'language' ),
							'description'   => __( 'Accordion widget in listing page ', 'language' ),
							'before_title'  => '<h3>',
							'after_title'   => '</h3>',
				),	
		'featured' =>  array(
							'id'            => 'featured',
							'name'          => __( 'Featured Vehicles', 'language' ),
							'description'   => __( 'Featured vehicles widget', 'language' ),
				),
		'type' => array(
							'id'            => 'type',
							'name'          => __( 'Find by Vehicle Type', 'language' ),
							'description'   => __( 'Select vehicles by type.', 'language' ),
							'before_title'  => '<h3 class="hidden-xs">',
							'after_title'   => '</h3>',
				),
		'footer' => array(
							'id'            => 'footer',
							'name'          => __( 'Footer', 'language' ),
							'description'   => __( 'Footer widgets', 'language' ),
							'before_title'  => '<h3>',
							'after_title'   => '</h3>',
							'before_widget' => '<div class="col-sm-3">',
							'after_widget'  => '</div>',
				),
       'arrivals' => array(
							'id'            => 'arrivals',
							'name'          => __( 'Home Listings', 'language' ),
							'description'   => __( 'Add new arrivals listing grid on home page.', 'language' ),
				),
        'seller' => array(
							'id'            => 'seller',
							'name'          => __( 'Seller Information', 'language' ),
							'description'   => __( 'Add seller name & phone on listing page.', 'language' ),
				),
	);	
	foreach($sidebars as $sidebar):
		register_sidebar($sidebar);
	endforeach;
	$active_widgets = get_option( 'sidebars_widgets' );
	if(
		!empty($active_widgets['search' ]) || 
		!empty($active_widgets['carousel'] ) ||
		!empty($active_widgets['phone'] )||
		!empty($active_widgets['specs'] )||
		!empty($active_widgets['featured'] )||
		!empty($active_widgets['type'] )||
        !empty($active_widgets['seller'] )||
        !empty($active_widgets['arrivals'] )||
		!empty($active_widgets['footer'] )
		
	) return;
	$counter = 1;
	$active_widgets['search'][0] = 'gtcd_widget-' . $counter;
	$search_title[ $counter ] = array ( 'title' => 'Shop all Cars' );
	update_option( 'widget_gtcd_widget', $search_title );
    
    $active_widgets['seller'][0] = 'seller_widget-' . $counter;
	$search_title[ $counter ] = array ( 'title' => 'Seller Information' );
	update_option( 'widget_seller_widget', $search_title );
    
    $active_widgets['arrivals'][0] = 'arrivals_widget-' . $counter;
	$number[ $counter ] = array ( 'number' => '12' );
	update_option( 'widget_arrivals_widget', $number );
    
	$active_widgets['carousel'][0] = 'create_carousel-' . $counter;
	$number_listings[ $counter ] = array ( 'title' => '5' );
	update_option( 'widget_create_carousel', $number_listings );
	$active_widgets['phone'][0] = 'phone_widget-' . $counter;
	$phone_number[ $counter ] = array ( 'title' => '1800.80000.888' );
	update_option( 'widget_phone_widget', $phone_number );
	
	$active_widgets['specs'][0] = 'full_specs-' . $counter;
	$specs_text[ $counter ] = array (
		'title'         => 'Full Specifications',
		'title2'        => 'Warranty',
		'title3'        => 'Financing',
		'title4'        => 'Trade-In',
		'text2'			=> '5-Day Money-Back Guarantee At Car Dealer, we know that not every car is perfect for every person, so all used Car Dealer cars come with our 5-Day Money-Back Guarantee. You can return any car for any reason within a 5-day period. Simply bring it back in the condition in which it was purchased, and you will get a full refund.',
		'text3'			=> 'Affordable solutions
Car Dealer offers some of the most competitive terms in the industry with solutions for a wide range of credit profiles.

Speed
Fill out our quick credit application and get decisions in a matter of minutes.

Trust
We only use respected and reputable finance sources, and we always protect our customers information.

Integrity
Straightforward, honest business practices are the standard at Car Dealer, and our financing is no exception. If you find a more competitive offer elsewhere, you have three business days to change your mind.',
		'text4'			=> 'Sell your current car and buy a new one at the same place!
You can even apply your written offer towards the purchase of a new car.',
	);
	update_option( 'widget_full_specs', $specs_text );
	$active_widgets['featured'][0] = 'feat_widget-' . $counter;
	$feat_text[ $counter ] = array (
		'title'         => 'Featured Vehicles',
		'number'        => '8',
);	
	update_option( 'widget_feat_widget', $feat_text );
	$active_widgets['footer'][0] = 'footer_1-' . $counter;
	$foot1_text[ $counter ] = array (
		'title'         => __('Sell your Car','language'),
		'pagelink'			=> get_bloginfo('url').'/'.__('sell-your-car','language'),
		'text'			=>  __('Thinking about selling your current vehicle?

Bring your car for an appraisal, and get a free written offer good for 7 days.

Submit your vehicle information now.','language'),
	);
	update_option( 'widget_footer_1', $foot1_text );	
	$active_widgets['footer'][1] = 'footer_2-' . $counter;
	$foot2_text[ $counter ] = array ( 'title' => __('News','language') );
	update_option( 'widget_footer_2', $foot2_text );
$active_widgets['footer'][2] = 'footer_3-' . $counter;
	$foot3_text[ $counter ] = array (
		'title'         => __('Office','language'),
		'text'			=>  __('<p>1180 Seven Seas Dr<br/>Lake Buena Vista, FL 32830</p>

<p>Tel: 1.AUTO.88MAX</p>

info@gorillathemesauto.com','language'),
	);
	update_option( 'widget_footer_3', $foot3_text );	
	$active_widgets['footer'][3] = 'footer_4-' . $counter;
	$foot3_text[ $counter ] = array (
		'title'         => __('Directions','language'),
		'address'			=>  __('1180 Seven Seas Dr, Lake Buena Vista, FL 32830','language'),
	);
	update_option( 'widget_footer_4', $foot3_text );
	$active_widgets['search'][1] = 'top-deals-' . $counter;
	$deals[ $counter ] = array (
		'deals_title'         => __('Deal of the Week','language'),
		'num_deals'			=>  '3',
	);
	update_option( 'widget_top-deals', $deals );
	$active_widgets['type'][0] = 'find_by_type-' . $counter;
	$type[ $counter ] = array (
		'title'         => __('Search by Vehcile Type','language'),
	);
	update_option( 'widget_find_by_type', $type );
	$counter++;	
	update_option( 'sidebars_widgets', $active_widgets );
}
class Loan_Calculator extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'create_calc',
			__( 'AutoSales: Loan Calculator', 'language' ),
			array(
				'description' => __( 'Top Search Module', 'language' ),
				'classname'   => 'calculator',
			)
		);

	}
	public function widget( $args, $instance ) {
		
		   extract($args);
		
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		echo $before_widget; 
		?>
		<script language="JavaScript">
function checkForZero(field){
    if (field.value == 0 || field.value.length == 0) {
        alert ("This field can't be 0!");
        field.focus(); }
    else
        calculatePayment(field.form);
		}
		function cmdCalc_Click(form)
		{
    if (form.price.value == 0 || form.price.value.length == 0) {
        alert ("The Price field can't be 0!");
        form.price.focus(); }
    else if (form.ir.value == 0 || form.ir.value.length == 0) {
        alert ("The Interest Rate field can't be 0!");
        form.ir.focus(); }
    else if (form.term.value == 0 || form.term.value.length == 0) {
        alert ("The Term field can't be 0!");
        form.term.focus(); }
    else
        calculatePayment(form);
		}
	function calculatePayment(form)
		{
    princ = form.price.value - form.dp.value;
    intRate = (form.ir.value/100) / 12;
    months = form.term.value * 12;
    form.pmt.value = Math.floor((princ*intRate)/(1-Math.pow(1+intRate,(-1*months)))*100)/100;
    form.principle.value = princ;
    form.payments.value = months;
		}
	</script>
<script language="JavaScript">
	function checkForZero(field)
	{
    if (field.value == 0 || field.value.length == 0) {

        }
    else
        calculatePayment(field.form);
	}
	function cmdCalc_Click(form)
	{
    if (form.price.value == 0 || form.price.value.length == 0) {
        alert ("The Price field can't be 0!");
        form.price.focus(); }
    else if (form.ir.value == 0 || form.ir.value.length == 0) {
        alert ("The Interest Rate field can't be 0!");
        form.ir.focus(); }
    else if (form.term.value == 0 || form.term.value.length == 0) {
        alert ("The Term field can't be 0!");
        form.term.focus(); }
    else
        calculatePayment(form);
	}
	function calculatePayment(form)
	{
    princ = form.price.value - form.dp.value;
    intRate = (form.ir.value/100) / 12;
    months = form.term.value * 12;
    form.pmt.value = Math.floor((princ*intRate)/(1-Math.pow(1+intRate,(-1*months)))*100)/100;
    form.principle.value = princ;
    form.payments.value = months;
	}
	</script>
	<?php $options = my_get_theme_options();?>
    <h3><?php echo $title;?></h3>
    <form name="Loan Calculator" class="calculate-form">
	    <div class="calc-container">
      <span class="calc-label">
        <label class="loan-title" for="l-amount">
          <?php _e('Purchase price: ','language');echo $options['currency_text'];?> 
        </label>
      </span>
      <span class="calc-input">
        <input type="text" size="14" name="price" value="0"  class="l-inputbar" id="l-amount" onBlur="checkForZero(this)" onChange="checkForZero(this)">
      </span>
	    </div>
	     <div class="calc-container">
           <span class="calc-label">
        <label class="loan-title" for="l-down">
          <?php _e('Down Payment: ','language');echo $options['currency_text'];?>
        </label>
      </span>
          <span class="calc-input">
        <input type="text" size="14" name="dp" id="l-down"   class="l-inputbar" value="0"  onChange="calculatePayment(this.form)">
      </span>
	     </div>
	      <div class="calc-container">
           <span class="calc-label">
        <label class="loan-title" for="l-interest">
          <?php _e('Interest Rate: ','language');echo '%';?>
        </label>
      </span>
            <span class="calc-input">
        <input type="text" size="14"  name="ir" value="2.5" class="l-inputbar" onBlur="checkForZero(this)" onChange="checkForZero(this)">
      </span>
	      </div>
	       <div class="calc-container">
           <span class="calc-label">
        <label class="loan-title" for="l-years">
          <?php _e('Loan Term: ','language'); echo '<span class="calc-years">Years</span>'?>
        </label>
      </span>
           <span class="calc-input">
        <input type="text" size="14"  name="term" value="5" class="l-inputbar"  onBlur="checkForZero(this)" onChange="checkForZero(this)">
      </span>
	       </div>
	        <div class="calc-container results">
           <span class="calc-label">
        <label class="loan-title-results" for="l-payment">
          <?php _e('Monthly Payment:  ','language');?>
        </label>
           </span>
             <span class="calc-input results"><?php echo '<span class="currency-color"> '.$options['currency_text'];?>
			 <input type="label" size="12"  class="l-result" value="0.00"  name="pmt">
        </span>
     </div>
     
    </form>
     <div style="clear:both"></div>
  	<?php echo $after_widget;				
	}
	public	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', ) );
		$title = strip_tags($instance['title']);
?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e("Title: ","language");?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>			
<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
	return $instance;
	}
}
// Top_Deals Widget
class Top_Deals extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'top-deals',
			__( 'AutoSales Top Deals', 'language' ),
			array(
				'description' => __( 'Top Deals Widget in Sidebar', 'language' ),
				'classname'   => 'side-widget',
			)
		);
	}
	public function widget( $args, $instance ) {
		global $post;
		$dealstitle = ( ! empty( $instance['deals_title'] ) ) ? $instance['deals_title'] : '';
		$numdeals = ( ! empty( $instance['num_deals'] ) ) ? $instance['num_deals'] : '';
		echo $args['before_widget'];
		echo '<h3 class="deals-week-title">'.$dealstitle.'</h3>';
		wp_reset_query();	
		$query = new WP_Query(array(
							'post_type' => array('gtcd','user_listing'),
							'meta_key' => '_topdeal',
							'meta_value' => 'Yes',
							'posts_per_page' => $numdeals,
							));
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	$options = my_get_theme_options();$fields = get_post_meta($post->ID, 'mod1', true);?>
     <div class="deals">
	   <a href="<?php the_permalink($post->ID);?>" >
          <?php gorilla_img ($post->ID,'medium'); ?>
            <span class="top-deals">
	      <span class="top-deals-title">
   <?php if ( isset( $fields[ 'year' ] ) ) {
			echo $fields['year'];
		}
		else { echo '';		}?>  <?php the_title();?> <span class="top-deals-price"><?php  if (is_numeric( $fields['price'])){ echo $options['currency_text']; echo number_format($fields['price']);} else {  echo $fields['price']; } ?> 
		</span>
			</span>
	     </span>
	   </a>
        </div>
		<div clear="both"></div>
      <?php endwhile; else: ?>
	      	<img class="img-responsive" src="http://placehold.it/300x180">
	      <?php endif;
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
			'deals_title' => '',
			'num_deals' => '',
		) );
		$dealstitle = !empty( $instance['deals_title'] ) ? $instance['deals_title'] : '';
		$numdeals = !empty( $instance['num_deals'] ) ? $instance['num_deals'] : '';
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'deals_title' ) . '" >' . __( 'Title', 'language' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'deals_title' ) . '" name="' . $this->get_field_name( 'deals_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'language' ) . '" value="' . esc_attr( $dealstitle ) . '">';
		echo '	<span class="description">' . __( 'Widget title.', 'language' ) . '</span>';
		echo '</p>';
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'num_deals' ) . '" >' . __( 'Number', 'language' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'num_deals' ) . '" name="' . $this->get_field_name( 'num_deals' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'language' ) . '" value="' . esc_attr( $numdeals ) . '">';
		echo '	<span class="description">' . __( 'Number of vehicles.', 'language' ) . '</span>';
		echo '</p>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['deals_title'] = !empty( $new_instance['deals_title'] ) ? strip_tags( $new_instance['deals_title'] ) : '';
		$instance['num_deals'] = !empty( $new_instance['num_deals'] ) ? strip_tags( $new_instance['num_deals'] ) : '';
		return $instance;
	}

}
function deals_register_widgets() {
	register_widget( 'Top_Deals' );
}
add_action( 'widgets_init', 'deals_register_widgets' );

class Footer3_Widget extends WP_Widget {

	public function __construct()
	{                      // id_base        ,  visible name
		parent::__construct( 'footer_3', 'AutoSales: Footer 3 Module Widget' );
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$text = empty($instance['text']) ? ' ' : apply_filters('widget_text', $instance['text']); ?>
<div class="col-sm-3">
  <h3><?php echo $title;?></h3>
  </p><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?> </p></div>
<?php	
		}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = strip_tags($new_instance['text']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
		}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = $instance['text']; ?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("Title: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
</p>
<textarea id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" rows="10" cols="30" ><?php echo $text; ?></textarea>
<p>
  <input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />
  &nbsp;
  <label for="<?php echo $this->get_field_id('filter'); ?>">
    <?php _e('Automatically add paragraphs','language'); ?>
  </label>
</p>
<?php

	}
}
class Footer4_Widget extends WP_Widget {
	public function __construct()
	{                      // id_base        ,  visible name
		parent::__construct( 'footer_4', 'AutoSales: Footer 4 Module Widget' );
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);	
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$address = empty($instance['address']) ? ' ' : apply_filters('widget_title', $instance['address']);?>
<div class="col-sm-3">
  <h3><?php echo $title;?></h3>
 <single-address><?php echo $address;?></single-address>
                        <script type="text/javascript">
	$(document).ready(function(){
   $("single-address").each(function(){                         
      var embed ="<div class='map'><iframe frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?f=q&amp;z=15&amp;source=s_q&amp;hl=en&amp;geocode=&amp;iwloc=near&amp;q="+ encodeURIComponent( $(this).text() ) +";&amp;output=embed'></iframe></div>";
      $(this).html(embed);                      
   });
});
	</script>
</div>
<?php	
		}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = strip_tags($new_instance['address']);
		return $instance;
		}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '','address' => '') );
		$title = strip_tags($instance['title']);
		$address = strip_tags($instance['address']);
		?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("Title: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
      </label>
   <label for="<?php echo $this->get_field_id('address'); ?>">
    <?php _e("Address: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
  </label>
</p>
<?php }

}
class Footer2_Widget extends WP_Widget {		
	public function __construct()
	{                      // id_base        ,  visible name
		parent::__construct( 'footer_2', 'AutoSales: Footer 2 Module Widget' );
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);?>
<div class="col-sm-3">
  <h3><?php echo $title;?></h3>
  <ul class="news">
    <?php $query = new WP_Query(array(
					'post_type' => array('post'),
					'posts_per_page' => 4
					));
						if ( $query->have_posts() ) while ( $query->have_posts() ) : $query->the_post(); 
					?>
    <p><li><a href="<?php the_permalink();?>">
      <?php the_title();?>
      </a></li></p>
    <?php endwhile; wp_reset_query(); ?>
  </ul>
</div>
<?php }
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
		$text = $instance['text'];
		?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("Title: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
</p>
<?php
	}
}
class Footer1_Widget extends WP_Widget {
	public function __construct()
	{                      // id_base        ,  visible name
		parent::__construct( 'footer_1', 'AutoSales: Footer 1 Module Widget' );
	}
	public function widget($args, $instance) {
		extract($args, EXTR_SKIP);	
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$text = empty($instance['text']) ? ' ' : apply_filters('widget_text', $instance['text']);	
		$pagelink = empty($instance['pagelink']) ? ' ' : apply_filters('widget_pagelink', $instance['pagelink']);
		$blogurl = get_bloginfo('template_url');								
		?>
<div class="col-sm-3">
  <h3><?php echo $title;?></h3>
  <p><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></p>
  <p><a class="learn-more" href='<?php echo $pagelink; ?>'> <i class="fa fa-arrow-circle-o-right"></i> <?php _e('Learn more','language');?></a><div style="clear:both"></div></p>
</div>
<?php }
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['pagelink'] = strip_tags($new_instance['pagelink']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
		}	
		function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '','pagelink' => '' ) );
		$title = strip_tags($instance['title']);
		$text = $instance['text'];
		$pagelink = strip_tags($instance['pagelink']);
		?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("Title: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('pagelink'); ?>">
    <?php _e("URL for full page : ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('pagelink'); ?>" name="<?php echo $this->get_field_name('pagelink'); ?>" type="text" value="<?php echo esc_attr($pagelink); ?>" />
  </label>
</p>
<textarea id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" rows="10" cols="30" ><?php echo $text; ?></textarea>
<p>
  <input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />
  &nbsp;
  <label for="<?php echo $this->get_field_id('filter'); ?>">
    <?php _e('Automatically add paragraphs','language'); ?>
  </label>
</p>
<?php
	}
}
class Feat_Widget extends WP_Widget {
function __construct() {
		parent::__construct(
			'feat_widget', 
			__('AutoSales: Featured Vehicles Module', 'language'), 
			array( 'description' => __( 'Featured Vehicles Module in Single Listing Page', 'language' ), ) 
		);
	}
	         public function widget( $args, $instance ) {
			$title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
			$number = isset( $instance['number'] ) ? apply_filters( 'widget_number', $instance['number'] ) : '';
		if ( ! empty( $title ) )
		  ?>
		  <div class="hideOnSearch featured-bottom">
			  <?php  echo $args['before_title'] .'<h3>'.$title .'</h3>'. $args['after_title'];?>
		<div class="product-list-wrapper">
			<div class="tricol-product-list">
				<div class="row row-no-gutter">
				<?php $query = new WP_Query(array(
					'post_type' => array('gtcd','user_listing'),
					'posts_per_page' => '4',
					'meta_key' => '_featured',
					'meta_value' => 'Yes'
					));
						if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); global $post; $fields = get_post_meta($post->ID, 'mod1', true); $fields3 = get_post_meta($post->ID, 'mod3', true); $fields2 = get_post_meta($post->ID, 'mod2', true);  $options = my_get_theme_options();?>				  		
				<div class="col-sm-3">
				<div class="item-container">
				<a class="arrivals-link" href="<?php the_permalink();?>">
					<div class="image-container">				 
							<div class="<?php echo $fields['statustag'];?>"></div>					
<?php if ( 'user_listing' == get_post_type($post->ID) ) {
										$args = array(
										'order'          => 'ASC',
										'orderby'        => 'menu_order',
										'post_type'      => 'attachment',
										'post_parent'    => $post->ID,
										'post_mime_type' => 'image',
										'post_status'    => null,
										'numberposts'    => 1,
										);
										$attachments = get_posts($args);										
										if ($attachments) {
											foreach ($attachments as $attachment) {
												arrivals_img ($post->ID,'medium');
												}
											} 
										} elseif ( 'gtcd' == get_post_type($post->ID) ) {
												gorilla_img ($post->ID,'medium');
										}?> 
					</div></a>
                    <div class="arrivals-details">
					<p class="title"><?php the_title();?></p>
					<div class="price-style"><?php  if (is_numeric( $fields['price'])){ echo $options['currency_text']; echo number_format($fields['price']);} else {  echo $fields['price']; } ?> </div>
					<div class="meta-style"><?php if ( $fields['year']){ echo $fields['year'].' | ';} else {  echo ''; } ?> <?php	 if ( $fields['miles']){ echo $fields['miles'].' '.$options['miles_text'];} elseif ($fields['miles'] == '0' ){ echo _e('0','language').' '.$options['miles_text'];} else {echo '';}  ?></div>
						<?php  echo '<p class="strong grid-location">';?>			
						<?php $terms_child = get_the_terms($post->ID,'location');
													$sorted_terms_child = array();
													$find_child = 0;
													for( $i = 0; $i < sizeof($terms_child); ++$i) {
														if (is_array($terms_child))
														{
													   foreach ($terms_child as $term_child) {
													      if ($term_child->parent == $find_child) {
													         $find_child = $term_child->term_id;
													         $sorted_terms_child[] = $term_child;
													      }
													   }
													   }
													}
													if ( ! isset($sorted_terms_child[1])) {
													$sorted_terms_child[1] = null;
													} else {
													echo $sorted_terms_child[1]->name; }		
													$terms = get_the_terms($post->ID,'location');
													$sorted_terms = array();
													$find_parent = 0;
													for( $i = 0; $i < sizeof($terms); ++$i) {	
														if (is_array($terms)){
													   foreach ($terms as $term) {
													      if ($term->parent == $find_parent) {
													         $find_parent = $term->term_id;
													         $sorted_terms[] = $term;
													      }
													   }
													}
													}
														if ( ! isset($sorted_terms[0])) {
														$sorted_terms[0] = null;
													} else {
														echo ', '.$sorted_terms[0]->name;
														}										
													?>
					<div style="clear: both"></div>
                     </div>
                     <p><a class="detail-btn" href="<?php the_permalink();?>"><?php _e('View Details','language');?></a></p>  
				</div></div>
			<?php endwhile; wp_reset_query(); ?> </div> 
            	<?php else: ?>   				
			<?php endif; ?>      
		</div>
	</div>
</div>  
		<?php		
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Title', 'language' );
		}
		if ( isset( $instance[ 'number' ] ) ) {
			$number = $instance[ 'number' ];
		}
		else {
			$number = __( 'Number of vehicles', 'language' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'language'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of Vehicles:','language' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>">
		</p>
		<?php 
	}
		public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
		return $instance;	
	}
} 
class Phone_Header_Widget extends WP_Widget
{
	public	function __construct() {
			parent::__construct( 'phone_widget', 'AutoSales Header Phone Number' );
	}
	function widget($args, $instance) {
			extract($args, EXTR_SKIP);
			$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
			$link = empty($instance['link']) ? ' ' : apply_filters('widget_link', $instance['link']);?>
	<div class="call-us"> 
		<a class="font" href="tel:<?php echo $title;?>">
			<?php echo $title;?>
		</a>
		<a class="phone"><i class="fa fa-phone-square fa-3x "></i></a>
	</div>
	<?php
	}
	function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['link'] = strip_tags($new_instance['link']);
			return $instance;
	}
	function form($instance) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'link' => '' ) );
			$title = strip_tags($instance['title']);
			$link = strip_tags($instance['link']);?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e("Phone Number: ","language");?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>			
<?php
	}
}
class Find_By_Type extends WP_Widget
{
	public	function __construct(){
			parent::__construct( 'find_by_type', 'Find Vehicles by Type' );
	}
	function widget($args, $instance) {
			extract($args, EXTR_SKIP);	
			$before_widget;
			 $after_title;
		
require_once(AUTODEALER_MAIN.'/find-cars.php');
    
		
		$after_widget;
	}
	function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
	}
	function form($instance) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'profile_id' => '' ) );
			$title = strip_tags($instance['title']);
	?>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
    	<?php _e("Title: ","language");?>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</label> 
 	</p>
 	<?php
 	}
}
class GTCD_Widget extends WP_Widget
{
	public	function __construct(){
			parent::__construct( 'gtcd_widget', 'AutoSales Search Module' );
	}
	function widget($args, $instance) {
			extract($args, EXTR_SKIP);	
			$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);	
			$blogurl = get_bloginfo('template_url')	;
			echo '<span class="hidden-xs">'.$before_widget;
			echo '<h3 class="search-title hidden-xs">'.$title.'</h3>';
			echo $after_title;
			?>
    <div class="collapse navbar-collapse  navbar-search" role="navigation">
	   	<?php cps_search_form();?>  
    </div>
	<?php		
		echo $after_widget.'</span>';
	}
	function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
	}
	function form($instance) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'profile_id' => '' ) );
			$title = strip_tags($instance['title']);
	?>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
    	<?php _e("Title: ","language");?>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</label> 
 	</p>
 	<?php
 	}
}
class Carousel extends WP_Widget
{
	public function __construct()
	{                      // id_base        ,  visible name
		parent::__construct( 'create_carousel', 'AutoSales: Carousel' );
	}
	function widget($args, $instance) {		

?>

<div id="myCarousel" class="carousel fade home col-sm-12 hideOnSearch" data-interval="10000" data-ride="carousel">
	<!-- Wrapper for slides -->
	
	
	
	<div class="carousel-inner">
		<div class="item active">
		<div class="row">
			
			
		<?php

		$the_query = new WP_Query(array(
			'post_type' => array('post','gtcd'),
			'meta_key' =>'_featured',
			'meta_value' => 'Yes',              
			'orderby' => 'date',               
			'order' => 'DESC' ,
			'posts_per_page' => $title,
		));
		

		$counter = 0;
  				

	if ($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post();
		
		
		
			  							global $post; $fields = get_post_meta($post->ID, 'mod1', true); $fields3 = get_post_meta($post->ID, 'mod3', true); $fields2 = get_post_meta($post->ID, 'mod2', true);  $options = my_get_theme_options();$mytype=get_post_type();
			  							
			  						
			  							
			echo $counter % 1 == 0 && $counter != 0 ? '</div><!-- end row --></div><!-- end item --><div class="item"><div class="row">' : '';
		?>
	

		<?php 
if ($mytype=='gtcd') {
?> <a href="<?php the_permalink();?>"><?php gorilla_img ($post->ID,'large'); ?></a>
	  							<div class="carousel-caption">
		  							<!-- Start Carousel Caption  --> 
										<h2>
										<?php 
				$content = get_the_content();
				$content = preg_replace("/<img[^>]+\>/i", " ", $content);          
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]>', $content);
				?><?php if ( $fields['year']){ echo $fields['year'];}else {  echo ''; }?></span> <?php  $terms_child = get_the_terms($post->ID,'makemodel');
					$terms = get_the_terms($post->ID,'makemodel');
					$sorted_terms = array();
					$find_parent = 0;
					for( $i = 0; $i < sizeof($terms); ++$i) {
						if (is_array($terms))
					{
					foreach ($terms as $term) {
					      if ($term->parent == $find_parent) {
					         $find_parent = $term->term_id;
					         $sorted_terms[] = $term; }
					   		}
						}
					}
					if ( ! isset($sorted_terms[0])) {
					$sorted_terms[0] = null; } else {
				    echo $sorted_terms[0]->name.' ';}
				    $sorted_terms_child = array();
				    $find_child = 0;
				    for( $i = 0; $i < sizeof($terms_child); ++$i) {
						if (is_array($terms_child)) {
						foreach ($terms_child as $term_child) {
					      if ($term_child->parent == $find_child) {
					         $find_child = $term_child->term_id;
					         $sorted_terms_child[] = $term_child; }
							}
						}
					}
					if ( ! isset($sorted_terms_child[1])) {
				  $sorted_terms_child[1] = null; } else {
				  echo $sorted_terms_child[1]->name;} ?>
		  								<span class="price-style"><?php  if (is_numeric( $fields['price'])){ echo '&nbsp;&nbsp;'.$options['currency_text']; echo number_format($fields['price']);} else {  echo $fields['price']; } ?>
		  								</span>
		  							</h2>
								</div> 
								 <?php 
} else { ?><a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail', array( 'class'	=> "img-responsive"));} ?></a>


		<?php $counter++; endwhile; else : ?>
		
		<?php require_once(AUTODEALER_INCLUDES.'/init/carousel.php'); ?>	 											
<?php endif; ?>

		
		</div><!-- end row -->
		</div><!-- end item -->
	</div><!-- end carousel-inner -->

<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<i class="fa fa-angle-left fa-2x"></i></a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<i class="fa fa-angle-right fa-2x"></i></a>
						<!-- End Carousel-Nav -->
						<div style="clear:both"></div>
						</div><!-- end carousel -->	

			<?php wp_reset_postdata();?>
				<div style="clear:both"></div>	

<?php
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'profile_id' => '' ) );
		$title = strip_tags($instance['title']);
?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("Number of listings: ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
</p>
<?php
	}
}
class Full_Specs extends WP_Widget{
		public function __construct()
	{                    
		parent::__construct( 'full_specs', 'AutoSales Vehicle Specifications' );
	}
		function widget($args, $instance) {
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$title2 = empty($instance['title2']) ? ' ' : apply_filters('widget_title', $instance['title2']);
		$text2  = apply_filters( 'widget_textarea', empty( $instance['text2'] ) ? '' : $instance['text2'], $instance );	
		$title3 = empty($instance['title3']) ? ' ' : apply_filters('widget_title', $instance['title3']);
		$text3  = apply_filters( 'widget_textarea', empty( $instance['text3'] ) ? '' : $instance['text3'], $instance );		
		$title4 = empty($instance['title4']) ? ' ' : apply_filters('widget_title', $instance['title4']);			
		$text4  = apply_filters( 'widget_textarea', empty( $instance['text4'] ) ? '' : $instance['text4'], $instance );		
		?>
<div class="specs side-lift-block" >
  <ul class="refine-nav">
    <?php if(empty($instance['title'])){echo '';} else { ?>
    <li class="first"> <span><?php echo $title ?></span>
      <?php  
			  	global $post, $fields, $fields2, $fields3, $options;
			  	$fields = get_post_meta($post->ID, 'mod1', true);
			  	$fields2 = get_post_meta($post->ID, 'mod2', true);
			  	$fields3 = get_post_meta($post->ID, 'mod3', true);
			  	$options = my_get_theme_options(); ?>
      <ul>
        <li>
          <?php if (!empty( $fields['drive'])){ echo '<p class="strong">'.$options['drive_text'].': </p>'.$fields['drive'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['enginetype'])){ echo  '<p class="strong">'.$options['engine_type_text'].': </p>'.$fields2['enginetype'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['cylinders'])){ echo '<p class="strong">'.$options['number_cylinders_text'].': </p>'.$fields2['cylinders'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['horsepower'])){ echo '<p class="strong">'.$options['horsepower_text'].': </p>'.$fields2['horsepower'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['torque'])){ echo '<p class="strong">'.$options['torque_text'].': </p>'.$fields2['torque'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['enginesize'])){ echo '<p class="strong">'.$options['engine_size_text'].': </p>'.$fields2['enginesize'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['bore'])){ echo '<p class="strong">'.$options['bore_text'].': </p>'.$fields2['bore'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['stroke'])){ echo '<p class="strong">'.$options['stroke_text'].': </p>'.$fields2['stroke'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['valvespercylinder'])){ echo '<p class="strong">'.$options['valves_text'].': </p>'.$fields2['valvespercylinder'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['fuelcapacity'])){ echo '<p class="strong">'.$options['fuel_capacity_text'].': </p>'.$fields2['fuelcapacity'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields['epamileage'])){ echo '<p class="strong">'.$options['epa_mileage_text'].': </p>'.$fields['epamileage'];}else {  echo ''; }?>
        </li>
        <li>
        <?php   if (!empty( $fields['EPA_CITY_MPG'])){ echo '<li><p class="strong">'.__('EPA City MPG:','language').'</p> '.$fields['EPA_CITY_MPG'].'</li>';}else {  echo ''; }?>
      </li>                              
         <li>                                                                          <?php   if (!empty( $fields['EPA_HIGHWAY_MPG'])){ echo '<li><p class="strong">'.__('EPA Highway MPG:','language').'</p> '.$fields['EPA_HIGHWAY_MPG'].'</li>';}else {  echo ''; }?>
         </li>
         <li>                                                                          <?php   if (!empty( $fields2['FRONT_AIR_CONDITIONING'])){ echo '<li><p class="strong">'.__('Front Air Conditioning:','language').'</p> '.$fields2['FRONT_AIR_CONDITIONING'].'</li>';}else {  echo ''; }?>
         </li>                                                   
        <li>                                                                          <?php   if (!empty( $fields2['FRONT_BRAKE_TYPE'])){ echo '<li><p class="strong">'.__('Front Brake Type:','language').'</p> '.$fields2['FRONT_BRAKE_TYPE'].'</li>';}else {  echo ''; }?>
         </li>         
        <li>                                                                          <?php   if (!empty( $fields2['ANTILOCK_BRAKING_SYSTEM'])){ echo '<li><p class="strong">'.__('Antilock Braking System:','language').'</p> '.$fields2['ANTILOCK_BRAKING_SYSTEM'].'</li>';}else {  echo ''; }?>
         </li>   
        <li>                                                                          <?php   if (!empty( $fields2['BRAKING_ASSIST'])){ echo '<li><p class="strong">'.__('Braking Assist:','language').'</p> '.$fields2['BRAKING_ASSIST'].'</li>';}else {  echo ''; }?>
         </li>           
        <li>                                                                          <?php   if (!empty( $fields2['REAR_BRAKE_DIAMETER'])){ echo '<li><p class="strong">'.__('Rear Brake Diameter:','language').'</p> '.$fields2['REAR_BRAKE_DIAMETER'].'</li>';}else {  echo ''; }?>
         </li>        
        <li>                                                                          <?php   if (!empty( $fields2['AUTO_DIMMING_REARVIEW_MIRROR'])){ echo '<li><p class="strong">'.__('Auto Dimming Rearview Mirror:','language').'</p> '.$fields2['AUTO_DIMMING_REARVIEW_MIRROR'].'</li>';}else {  echo ''; }?>
         </li>  
        <li>                                                                          <?php   if (!empty( $fields2['RUNNING_BOARDS'])){ echo '<li><p class="strong">'.__('Running Boards:','language').'</p> '.$fields2['RUNNING_BOARDS'].'</li>';}else {  echo ''; }?>
         </li>          
        <li>                                                                          <?php   if (!empty( $fields2['ROOF_RACK'])){ echo '<li><p class="strong">'.__('Roof Rack:','language').'</p> '.$fields2['ROOF_RACK'].'</li>';}else {  echo ''; }?>
         </li>          
        <li>                                                                          <?php   if (!empty( $fields2['POWER_DOOR_LOCKS'])){ echo '<li><p class="strong">'.__('Power Door Locks:','language').'</p> '.$fields2['POWER_DOOR_LOCKS'].'</li>';}else {  echo ''; }?>
         </li>                
        <li>                                                                          <?php   if (!empty( $fields2['ANTI_THEFT_ALARM_SYSTEM'])){ echo '<li><p class="strong">'.__('Anti Theft Alarm System:','language').'</p> '.$fields2['ANTI_THEFT_ALARM_SYSTEM'].'</li>';}else {  echo ''; }?>
         </li>           
        <li>                                                                          <?php   if (!empty( $fields2['CRUISE_CONTROL'])){ echo '<li><p class="strong">'.__('Cruise Control:','language').'</p> '.$fields2['CRUISE_CONTROL'].'</li>';}else {  echo ''; }?>
         </li>
         <li>                                                                          <?php   if (!empty( $fields2['1ST_ROW_VANITY_MIRRORS'])){ echo '<li><p class="strong">'.__('First Row Vanity Mirros:','language').'</p> '.$fields2['1ST_ROW_VANITY_MIRRORS'].'</li>';}else {  echo ''; }?>
         </li> 
         <li>                                                                          <?php   if ( !empty($fields2['HEATED_DRIVER_SIDE_MIRROR'])){ echo '<li><p class="strong">'.__('Heated Driver Side Mirror:','language').'</p> '.$fields2['HEATED_DRIVER_SIDE_MIRROR'].'</li>';}else {  echo ''; }?>
         </li>  
         <li>                                                                          <?php   if (!empty( $fields2['HEATED_PASSENGER_SIDE_MIRROR'])){ echo '<li><p class="strong">'.__('Heated Driver Passenger Mirror:','language').'</p> '.$fields2['HEATED_PASSENGER_SIDE_MIRROR'].'</li>';}else {  echo ''; }?>
         </li> 
         <li>                                                                          <?php   if (!empty( $fields2['TRAILER_WIRING'])){ echo '<li><p class="strong">'.__('Trailer Wiring:','language').'</p> '.$fields2['TRAILER_WIRING'].'</li>';}else {  echo ''; }?>
         </li>          
         <li>                                                                          <?php   if (!empty( $fields2['TRAILER_HITCH'])){ echo '<li><p class="strong">'.__('Trailer Hitch:','language').'</p> '.$fields2['TRAILER_HITCH'].'</li>';}else {  echo ''; }?>
         </li>          
         <li>                                                                          <?php   if (!empty( $fields2['CRUISE_CONTROLS_ON_STEERING_WHEEL'])){ echo '<li><p class="strong">'.__('Cruise Control on Steering Wheel:','language').'</p> '.$fields2['CRUISE_CONTROLS_ON_STEERING_WHEEL'].'</li>';}else {  echo ''; }?>
         </li>                      
         <li>                                                                          <?php   if (!empty( $fields2['AUDIO_CONTROLS_ON_STEERING_WHEEL'])){ echo '<li><p class="strong">'.__('Audio Control on Steering Wheel:','language').'</p> '.$fields2['AUDIO_CONTROLS_ON_STEERING_WHEEL'].'</li>';}else {  echo ''; }?>
         </li>          
         <li>                                                                          <?php   if (!empty( $fields2['FOLDING_2ND_ROW'])){ echo '<li><p class="strong">'.__('Folding Second Row Seats:','language').'</p> '.$fields2['FOLDING_2ND_ROW'].'</li>';}else {  echo ''; }?>
         </li>
         <li>                                                                          <?php   if (!empty( $fields2['1ST_ROW_POWER_OUTLET'])){ echo '<li><p class="strong">'.__('First Row Power Outlet:','language').'</p> '.$fields2['1ST_ROW_POWER_OUTLET'].'</li>';}else {  echo ''; }?>
         </li>             
         <li>                                                                          <?php   if (!empty( $fields2['CARGO_AREA_POWER_OUTLET'])){ echo '<li><p class="strong">'.__('Cargo Area Power Outlet:','language').'</p> '.$fields2['CARGO_AREA_POWER_OUTLET'].'</li>';}else {  echo ''; }?>
         </li> 
         <li>                                                                          <?php   if (!empty( $fields2['INDEPENDENT_SUSPENSION'])){ echo '<li><p class="strong">'.__('Independent Suspension:','language').'</p> '.$fields2['INDEPENDENT_SUSPENSION'].'</li>';}else {  echo ''; }?>
         </li>  
         <li>                                                                          <?php   if (!empty( $fields2['REAR_SUSPENSION_TYPE'])){ echo '<li><p class="strong">'.__('Independent Suspension:','language').'</p> '.$fields2['REAR_SUSPENSION_TYPE'].'</li>';}else {  echo ''; }?>
         </li>
         <li>                                                                          <?php   if (!empty( $fields2['FRONT_SUSPENSION_TYPE'])){ echo '<li><p class="strong">'.__('Rear Suspension Type:','language').'</p> '.$fields2['FRONT_SUSPENSION_TYPE'].'</li>';}else {  echo ''; }?>
         </li> 
         <li>                                                                          <?php   if (!empty( $fields2['MAX_CARGO_CAPACITY'])){ echo '<li><p class="strong">'.__('Maximum Cargo Capacity Suspension:','language').'</p> '.$fields2['MAX_CARGO_CAPACITY'].'</li>';}else {  echo ''; }?>
         </li>               
         <li>                                                                          <?php   if (!empty( $fields2['PASSENGER_AIRBAG'])){ echo '<li><p class="strong">'.__('Passenger Airbags:','language').'</p> '.$fields2['PASSENGER_AIRBAG'].'</li>';}else {  echo ''; }?>
         </li>          
        <li>
          <?php if (!empty( $fields2['wheelbase'])){ echo '<p class="strong">'.$options['wheelbase_text'].': </p>'.$fields2['wheelbase'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['overalllength'])){ echo '<p class="strong">'.$options['overall_length_text'].': </p>'.$fields2['overalllength'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['width'])){ echo '<p class="strong">'.$options['width_text'].': </p>'.$fields2['width'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['height'])){ echo '<p class="strong">'.$options['height_text'].': </p>'.$fields2['height'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['curbweight'])){ echo '<p class="strong">'.$options['curb_weight_text'].': </p>'.$fields2['curbweight'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['legroom'])){ echo '<p class="strong">'.$options['leg_room_text'].': </p>'.$fields2['legroom'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['headroom'])){ echo '<p class="strong">'.$options['head_room_text'].': </p>'.$fields2['headroom'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['seatingcapacity'])){ echo '<p class="strong">'.$options['seating_text'].': </p>'.$fields2['seatingcapacity'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields2['tires'])){ echo '<p class="strong">'.$options['tires_text'].': </p>'.$fields2['tires'];}else {  echo ''; }?>
        </li>
        <li>
          <?php if (!empty( $fields['transmission'])){ echo '<p class="strong">'.$options['transmission_text'].': </p>'.$fields['transmission'];}else {  echo ''; }?>
        </li>
      </ul>
    </li>
    <?php } ?>
    <?php if(empty($instance['title2'])){echo '';}else{?>
    <li class="second"> <span><?php echo $title2 ?></span>
      <ul>
        <li><?php echo wpautop( $text2 ) ; ?></li>
      </ul>
    </li>
    <?php } ?>
    <?php if(empty($instance['title3'])){echo '';}else{?>
    <li class="third"> <span><?php echo $title3; ?></span>
      <ul>
        <?php echo wpautop ($text3); ?>
      </ul>
    </li>
    <?php } ?>
    <?php if(empty($instance['title4'])){echo '';}else{?>
    <li class="fourth"> <span><?php echo $title4; ?></span>
      <ul>
        <?php echo $text4; ?>
      </ul>
    </li>
    <?php } ?>
  </ul>
</div>
<?php }
		function form($instance) {
			$title = $instance['title'];
			$title2 = $instance['title2'];
			$title3 = $instance['title3'];			
			$title4 = $instance['title4'];			
			$text2 = $instance['text2'];
			$text3 = $instance['text3'];
			$text4 = $instance['text4'];
			?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e("<strong>Enter Vehicle Specifications title:</strong> <br/>(leave empty to hide) ","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('title2'); ?>">
    <?php _e("<strong>Enter title for second module:</strong> <br/>(leave empty to hide)","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo esc_attr($title2); ?>" />
  </label>
</p>
<textarea id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>" rows="10" cols="33" ><?php echo wpautop( $text2 ); ?></textarea>
<p>
  <label for="<?php echo $this->get_field_id('title3'); ?>">
    <?php _e("Enter title for third module:</strong> <br/>(leave empty to hide)","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title3'); ?>" name="<?php echo $this->get_field_name('title3'); ?>" type="text" value="<?php echo esc_attr($title3); ?>" />
  </label>
</p>
<textarea id="<?php echo $this->get_field_id('text3'); ?>" name="<?php echo $this->get_field_name('text3'); ?>" rows="10" cols="33" ><?php  echo wpautop( $text3 ); ?></textarea>
<p>
  <label for="<?php echo $this->get_field_id('title4'); ?>">
    <?php _e("<strong>Enter title for fourth module:</strong> <br/>(leave empty to hide)","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('title4'); ?>" name="<?php echo $this->get_field_name('title4'); ?>" type="text" value="<?php echo esc_attr($title4); ?>" />
  </label>
</p>
<textarea id="<?php echo $this->get_field_id('text4'); ?>" name="<?php echo $this->get_field_name('text4'); ?>" rows="10" cols="33" ><?php echo wpautop( $text4 );?></textarea>
<?php
	}		
	function update($new_instance, $old_instance) {	return $new_instance; }		
}
class Arrivals_Widget extends WP_Widget {
	
	public	function __construct() {                    
			parent::__construct( 'arrivals_widget', 'AutoSales: Home Listings');
	}
	function widget($args, $instance) {
			extract($args, EXTR_SKIP);
			$number = empty($instance['number']) ? ' ' : apply_filters('widget_number', $instance['number']);
			require_once(AUTODEALER_MAIN.'/arrivals.php');

			}
	function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['number'] = strip_tags($new_instance['number']);
			return $instance;
	}
	function form($instance) {
			
			$instance = wp_parse_args( (array) $instance, array( 'number' => '' ) );
			$number = strip_tags($instance['number']);


			?>
<p>
  <label for="<?php echo $this->get_field_id('number'); ?>">
    <?php _e("Enter Number of Vehicles","language");?>
    <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
  </label>
</p>
<?php
}
}


class Seller_Widget extends WP_Widget {
	
	public	function __construct() {                    
			parent::__construct( 'seller_widget', 'AutoSales: Seller Information');
	}
	function widget($args, $instance) {
			extract($args, EXTR_SKIP);
	
global $post;
$author_id=$post->post_author;
?>
        <div class="side-widget seller">
            <ul>
        <li>
          <span class="strong">Seller: </span><?php the_author_meta( 'first_name', $author_id );?> <?php the_author_meta( 'last_name', $author_id );?>
        </li>
                
                <li>
          <span class="strong">Phone: </span><?php the_author_meta( 'phone', $author_id );?>
        </li>
                
                
        </ul>
	
		</div>
        <?php

			}
	function update($new_instance, $old_instance) {
			$instance = $old_instance;
			return $instance;
	}
	function form($instance) {
			
		

			?>
<p>
</p>
<?php
}
}