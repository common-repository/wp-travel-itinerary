<div class="wpti-widget">
	<?php if( ! empty( $legs ) ) : ?>
    	<p id="wpti-current-location">
    		<?php echo $settings['wpti_introduction']; ?>&nbsp;<span class="wpti-title"><?php echo $current_location ?></span>
    	</p>
    	<?php if ($settings['wpti_hide_schedule'] == true): ?>
    	<ul>
    		<li><a id="wpti-schedule-link" href="javascript:wpti_schedule_toggle( '<?php echo $settings['wpti_show_schedule_text']; ?>', '<?php echo $settings['wpti_hide_schedule_text']; ?>' )"><?php echo $settings['wpti_show_schedule_text']; ?></a></li>
    	</ul>
    	<?php endif ?>
    	<div id="wpti-schedule" style="display:<?php echo $settings['wpti_hide_schedule'] == true ? 'none' : 'block'; ?>">
    		<div id="wpti-meetup">
    			<form method="post"	action="#">
    				<label for="wpti-meetup-location"><?php echo $settings['wpti_lets_meetup_text']; ?></label>
    				<select id="wpti-meetup-location">
    					<?php foreach( $locations as $location ) { ?>
    						<option value="<?php echo $location; ?>"><?php echo $location; ?></option>
    					<?php } ?>
    				</select>
    		    <label for="wpti-meetup-name"><?php echo __( 'Name' ) ?></label>
    		    <input class="wpti-meetup-text" type="text" id="wpti-meetup-name" />
    		    <label for="wpti-meetup-email"><?php echo __( 'E-mail' ) ?></label>
    		    <input class="wpti-meetup-text" type="text" id="wpti-meetup-email" />
    		    <label for="wpti-meetup-message"><?php echo __( 'Message' ) ?></label>
    		    <textarea rows="3" class="wpti-meetup-text" id="wpti-meetup-message"></textarea>
    		    <input type="button" value="<?php echo __( 'Submit' ) ?>" id="wpti-meetup-submit" onclick="javascript:wpti_meetup_send( '<?php echo AJAX_DIR ?>' )" />
    		    <img id="wpti-meetup-sending" src="<?php echo BLOG_DIR ?>/wp-admin/images/loading.gif" alt="Sending" />
    		    <a class="wpti-meetup-close" href="javascript:wpti_meetup_close()"><?php echo __( 'Close' ) ?></a>
    			</form>
    		</div>
    		<div id="wpti-meetup-success">
    			<div><?php echo __( 'Done' ) ?></div>
    		</div>
    		<?php $i = 0; ?>
    		<?php foreach( $legs as $key=>$value ) { ?>			
    			<div class="wpti-flag">				
    				<a style="background:#fff url('<?php echo WPTI_DIR . 'img/' . strtolower( $value['wpti_country_code'] ) ?>.png')" href="http://globetrooper.com/<?php echo strtolower( str_replace( ' ', '-', $value['wpti_country_name'] ) ); ?>">
    					<img src="<?php echo WPTI_DIR . 'img/' . strtolower( $value['wpti_country_code'] ) ?>.png" alt="What To Do In <?php echo $value['wpti_country_name'] ?>" />	
    					<?php echo $value['wpti_country_name'] ?>
    				</a>
    			</div>
    			<div class="wpti-title">
    				<?php 
    					if ( empty( $value['wpti_place'] ) ) {
    						echo $value['wpti_country_name'];
    					} else {
    						echo $value['wpti_place'] . ', ' . $value['wpti_country_name'];
    					} 
    				?>
    			</div>
    			<ul>
    				<li>
    					<?php echo date_i18n( 'j M Y', $value['wpti_from_date'] ); ?>
    					&nbsp;-&nbsp;
    					<?php echo date_i18n( 'j M Y', $value['wpti_to_date'] ); ?>
    				</li>
    				<?php if ($settings['wpti_meetups_enabled']): ?>
    					<li><a id="wpti-meet-link" href="javascript:wpti_meetup_toggle( '<?php echo $i ?>' )"><?php echo $settings['wpti_lets_meetup_text']; ?></a></li>
    				<?php endif; ?>
    			</ul>
    			<?php $i++; ?>
    		<?php } ?>
    	</div>
	<?php else : ?>
		<p>Travel schedule not configured.</p>
	<?php endif ?>
	<div class="wpti-sig" style="color:#eee;height:0;overflow:hidden;width:0;"><a href="http://globetrooper.com">Group Travel</a></div>
</div>