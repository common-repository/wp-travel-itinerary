<div class="wrap">
	<div id="icon-tools" class="icon32"></div><h2>Travel Meetups</h2>
	<h3>Manage Proposed Meetups</h3>	
	<table class="widefat">
		<thead>
			<tr>
				<th width="10%">Posted Date</th>
				<th width="15%">From Name</th>
				<th width="15%">From Email</th>
				<th width="15%">Location</th>
				<th>Message</th>
				<th width="10%">Admin</th>				
			</tr>
		</thead>
		<tfoot>
			<tr>							
				<th>Posted Date</th>
				<th>From Name</th>
				<th>From Email</th>
				<th>Location</th>
				<th>Message</th>
				<th>Admin</th>
			</tr>
		</tfoot>
		<tbody>
			<?php if( is_array( $options ) ) { ?>
				<?php array_multisort( $options, SORT_DESC ); ?>
				<?php foreach( $options as $key=>$value ) { ?>								
					<tr>
						<td><?php echo date( 'd-M-Y', $value['wpti_date'] ) ?></td>
						<td><?php echo $value['wpti_name']; ?></td>
						<td><?php echo $value['wpti_email']; ?></td>
						<td><?php echo $value['wpti_location']; ?></td>
						<td><?php echo $value['wpti_message']; ?></td>
						<td>
							<form method="post" action="options.php">
								<?php settings_fields( 'wpti_meetups' ); ?>
								<input type="hidden" name="wpti-delete" value="<?php echo $key; ?>" />
								<input type="submit" class="button-secondary" value="Delete" />
							</form>
						</td>
					</tr>
				<?php } ?>
			<?php } ?>												
		</tbody>
	</table>
</div>