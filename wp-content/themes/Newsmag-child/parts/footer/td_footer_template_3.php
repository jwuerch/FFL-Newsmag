<div class="td-footer-container td-container">
	<div class="td-pb-row">
		<div class="td-pb-span4">
			<?php
				td_util::vc_set_column_number(1);
				locate_template('parts/footer/td_footer_extra.php', true);
				dynamic_sidebar('Footer 1');
			?>
		</div>

		<div class="td-pb-span8">
			<?php
				td_util::vc_set_column_number(2);
				dynamic_sidebar('Footer 2');
			?>
		</div>
	</div>
</div>