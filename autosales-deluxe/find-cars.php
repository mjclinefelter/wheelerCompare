<?php $options = my_get_theme_options();?>
<div class="col-sm-12 hidden-xs">
	<div class="full-width find-wrapper">
		<div id="cars-container">
			<ul class="cars-list list-one">
				<div class="col-sm-2">
					<li>
						<a   href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-UTILITY+TRUCKS/"><img class="img-fluid" src="<?php bloginfo('template_url'); ?>/assets/images/product-images/utility-trucks.png" alt="Utility-trucks" /></a>
						<a   href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-UTILITY+TRUCKS/">UTILITY TRUCKS</a>
					 </li>
				</div>
				<div class="col-sm-2">
					<li>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-CARGO+VANS/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/cargo-vans.png" alt="<?php echo $options['vehicle_type_3'];?>" /></a>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-CARGO+VANS/">CARGO VANS</a>
					</li>
				</div>
				<div class="col-sm-2">
					<li>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-PICK+UP+TRUCKS/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/pickups.png" alt="<?php echo $options['vehicle_type_5'];?>" /></a>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-PICK+UP+TRUCKS/">PICK UP TRUCKS</a>
					</li>
				</div>
				<div class="col-sm-2">
					<li>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-FLATBED+TRUCKS/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/flatbeds.png" alt="<?php echo $options['vehicle_type_6'];?>" /></a>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-FLATBED+TRUCKS/">FLATBED TRUCKS</a>
					</li>
				</div>
				<div class="col-sm-2">
					<li>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-BOX+TRUCKS/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/box-trucks.png" alt="<?php echo $options['vehicle_type_7'];?>" /></a>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-BOX+TRUCKS/">BOX TRUCKS</a>
						</li>
				</div>

				<div class="col-sm-2">
					<li>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-OTHER/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/other.png" alt="<?php echo $options['vehicle_type_7'];?>" /></a>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-OTHER/">OTHER</a>
						</li>
				</div>

			</ul>
		</div>
	</div>
</div>
