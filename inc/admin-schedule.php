<?php
$countries = array( 'AF'=>'Afghanistan', 'AX'=>'Aland Islands', 'AL'=>'Albania', 'DZ'=>'Algeria', 'AS'=>'American Samoa', 'AD'=>'Andorra', 'AO'=>'Angola', 'AI'=>'Anguilla', 'AQ'=>'Antarctica', 'AG'=>'Antigua And Barbuda', 'AR'=>'Argentina', 'AM'=>'Armenia', 'AW'=>'Aruba', 'AU'=>'Australia', 'AT'=>'Austria', 'AZ'=>'Azerbaijan', 'BS'=>'Bahamas', 'BH'=>'Bahrain', 'BD'=>'Bangladesh', 'BB'=>'Barbados', 'BY'=>'Belarus', 'BE'=>'Belgium', 'BZ'=>'Belize', 'BJ'=>'Benin', 'BM'=>'Bermuda', 'BT'=>'Bhutan', 'BO'=>'Bolivia', 'BQ'=>'Bonaire', 'BA'=>'Bosnia And Herzegovina', 'BW'=>'Botswana', 'BV'=>'Bouvet Island', 'BR'=>'Brazil', 'IO'=>'British Indian Ocean Territory', 'BN'=>'Brunei Darussalam', 'BG'=>'Bulgaria', 'BF'=>'Burkina Faso', 'BI'=>'Burundi', 'KH'=>'Cambodia', 'CM'=>'Cameroon', 'CA'=>'Canada', 'CV'=>'Cape Verde', 'KY'=>'Cayman Islands', 'CF'=>'Central African Republic', 'TD'=>'Chad', 'CL'=>'Chile', 'CN'=>'China', 'CX'=>'Christmas Island', 'CC'=>'Cocos Islands', 'CO'=>'Colombia', 'KM'=>'Comoros', 'CG'=>'Congo', 'CD'=>'Congo DR', 'CK'=>'Cook Islands', 'CR'=>'Costa Rica', 'CI'=>'Cote D\'ivoire', 'HR'=>'Croatia', 'CU'=>'Cuba', 'CW'=>'Curacao', 'CY'=>'Cyprus', 'CZ'=>'Czech Republic', 'DK'=>'Denmark', 'DJ'=>'Djibouti', 'DM'=>'Dominica', 'DO'=>'Dominican Republic', 'EC'=>'Ecuador', 'EG'=>'Egypt', 'SV'=>'El Salvador', 'GQ'=>'Equatorial Guinea', 'ER'=>'Eritrea', 'EE'=>'Estonia', 'ET'=>'Ethiopia', 'FK'=>'Falkland Islands', 'FO'=>'Faroe Islands', 'FJ'=>'Fiji', 'FI'=>'Finland', 'FR'=>'France', 'GF'=>'French Guiana', 'PF'=>'French Polynesia', 'GA'=>'Gabon', 'GM'=>'Gambia', 'GE'=>'Georgia', 'DE'=>'Germany', 'GH'=>'Ghana', 'GI'=>'Gibraltar', 'GR'=>'Greece', 'GL'=>'Greenland', 'GD'=>'Grenada', 'GP'=>'Guadeloupe', 'GU'=>'Guam', 'GT'=>'Guatemala', 'GG'=>'Guernsey', 'GN'=>'Guinea', 'GW'=>'Guinea-Bissau', 'GY'=>'Guyana', 'HT'=>'Haiti', 'HM'=>'Heard Island', 'VA'=>'Vatican City', 'HN'=>'Honduras', 'HK'=>'Hong Kong', 'HU'=>'Hungary', 'IS'=>'Iceland', 'IN'=>'India', 'ID'=>'Indonesia', 'IR'=>'Iran', 'IQ'=>'Iraq', 'IE'=>'Ireland', 'IM'=>'Isle Of Man', 'IL'=>'Israel', 'IT'=>'Italy', 'JM'=>'Jamaica', 'JP'=>'Japan', 'JE'=>'Jersey', 'JO'=>'Jordan', 'KZ'=>'Kazakhstan', 'KE'=>'Kenya', 'KI'=>'Kiribati', 'KP'=>'Korea, North', 'KR'=>'Korea, South', 'KW'=>'Kuwait', 'KG'=>'Kyrgyzstan', 'LA'=>'Laos', 'LV'=>'Latvia', 'LB'=>'Lebanon', 'LS'=>'Lesotho', 'LR'=>'Liberia', 'LY'=>'Libya', 'LI'=>'Liechtenstein', 'LT'=>'Lithuania', 'LU'=>'Luxembourg', 'MO'=>'Macao', 'MK'=>'Macedonia', 'MG'=>'Madagascar', 'MW'=>'Malawi', 'MY'=>'Malaysia', 'MV'=>'Maldives', 'ML'=>'Mali', 'MT'=>'Malta', 'MH'=>'Marshall Islands', 'MP'=>'Mariana Islands', 'MQ'=>'Martinique', 'MR'=>'Mauritania', 'MU'=>'Mauritius', 'YT'=>'Mayotte', 'MX'=>'Mexico', 'FM'=>'Micronesia', 'MD'=>'Moldova', 'MC'=>'Monaco', 'MN'=>'Mongolia', 'ME'=>'Montenegro', 'MS'=>'Montserrat', 'MA'=>'Morocco', 'MZ'=>'Mozambique', 'MM'=>'Myanmar', 'NA'=>'Namibia', 'NR'=>'Nauru', 'NP'=>'Nepal', 'NL'=>'Netherlands', 'NC'=>'New Caledonia', 'NZ'=>'New Zealand', 'NI'=>'Nicaragua', 'NE'=>'Niger', 'NG'=>'Nigeria', 'NU'=>'Niue', 'NF'=>'Norfolk Island', 'NO'=>'Norway', 'OM'=>'Oman', 'PK'=>'Pakistan', 'PW'=>'Palau', 'PS'=>'Palestinian Territory, Occupied', 'PA'=>'Panama', 'PG'=>'Papua New Guinea', 'PY'=>'Paraguay', 'PE'=>'Peru', 'PH'=>'Philippines', 'PN'=>'Pitcairn', 'PL'=>'Poland', 'PT'=>'Portugal', 'PR'=>'Puerto Rico', 'QA'=>'Qatar', 'RE'=>'Reunion', 'RO'=>'Romania', 'RU'=>'Russia', 'RW'=>'Rwanda', 'BL'=>'Saint Barthelemy', 'SH'=>'Saint Helena', 'KN'=>'Saint Kitts And Nevis', 'LC'=>'Saint Lucia', 'MF'=>'Saint Martin', 'PM'=>'Saint Pierre And Miquelon', 'VC'=>'Saint Vincent', 'WS'=>'Samoa', 'SM'=>'San Marino', 'ST'=>'Sao Tome And Principe', 'SA'=>'Saudi Arabia', 'SN'=>'Senegal', 'RS'=>'Serbia', 'SC'=>'Seychelles', 'SL'=>'Sierra Leone', 'SG'=>'Singapore', 'SK'=>'Slovakia', 'SI'=>'Slovenia', 'SB'=>'Solomon Islands', 'SO'=>'Somalia', 'ZA'=>'South Africa', 'GS'=>'South Georgia', 'ES'=>'Spain', 'LK'=>'Sri Lanka', 'SD'=>'Sudan', 'SR'=>'Suriname', 'SJ'=>'Svalbard', 'SZ'=>'Swaziland', 'SE'=>'Sweden', 'CH'=>'Switzerland', 'SY'=>'Syria', 'TW'=>'Taiwan', 'TJ'=>'Tajikistan', 'TZ'=>'Tanzania', 'TH'=>'Thailand', 'TL'=>'Timor-Leste', 'TG'=>'Togo', 'TK'=>'Tokelau', 'TO'=>'Tonga', 'TT'=>'Trinidad And Tobago', 'TN'=>'Tunisia', 'TR'=>'Turkey', 'TM'=>'Turkmenistan', 'TC'=>'Turks And Caicos Islands', 'TV'=>'Tuvalu', 'UG'=>'Uganda', 'UA'=>'Ukraine', 'AE'=>'United Arab Emirates', 'GB'=>'United Kingdom', 'US'=>'United States', 'UY'=>'Uruguay', 'UZ'=>'Uzbekistan', 'VU'=>'Vanuatu', 'VE'=>'Venezuela', 'VN'=>'Viet Nam', 'VG'=>'Virgin Islands, British', 'VI'=>'Virgin Islands, U.S.', 'WF'=>'Wallis And Futuna', 'EH'=>'Western Sahara', 'YE'=>'Yemen', 'ZM'=>'Zambia', 'ZW'=>'Zimbabwe' );
?>

<div class="wrap">
	<div id="icon-tools" class="icon32"></div><h2>Travel Schedule</h2>
	<h3>Add New Location</h3>
	<form method="post" action="options.php">
		<?php settings_fields( 'wpti_schedule' ); ?>
		<p>
			<label for="wpti_schedule[wpti-from-day]" style="display:inline-block;width:7em">From Date</label>
			<input size="2" maxlength="2" type="text" name="wpti_schedule[wpti-from-day]" value="01" />								
			<?php
				$month = "<select  name=\"wpti_schedule[wpti-from-month]\">\n";
				for ( $i = 1; $i < 13; $i = $i +1 ) {
					$month .= "\t\t\t" . '<option value="' . zeroise( $i, 2 ) . '"';
					if ( $i == $mm )
						$month .= ' selected="selected"';
					$month .= '>' . $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) ) . "</option>\n";
				}
				$month .= '</select>';
				
				echo $month;
			?>
			<input size="4" maxlength="4" type="text" name="wpti_schedule[wpti-from-year]" value="<?php echo date( 'Y' ); ?>" />
		</p>
		<p>
			<label for="wpti_schedule[wpti-to-day]" style="display:inline-block;width:7em">To Date</label>
			<input size="2" maxlength="2" type="text" name="wpti_schedule[wpti-to-day]" value="01" />								
			<?php
				$month = "<select  name=\"wpti_schedule[wpti-to-month]\">\n";
				for ( $i = 1; $i < 13; $i = $i +1 ) {
					$month .= "\t\t\t" . '<option value="' . zeroise( $i, 2 ) . '"';
					if ( $i == $mm )
						$month .= ' selected="selected"';
					$month .= '>' . $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) ) . "</option>\n";
				}
				$month .= '</select>';
				
				echo $month;
			?>
			<input size="4" maxlength="4" type="text" name="wpti_schedule[wpti-to-year]" value="<?php echo date( 'Y' ); ?>" />							
		</p>
		<p>
			<label for="wpti_schedule[wpti-place]" style="display:inline-block;width:7em">Place/City</label>
			<input size="33" maxlength="64" type="text" name="wpti_schedule[wpti-place]" />
		</p>
		<p>
			<label for="wpti_schedule[wpti-country]" style="display:inline-block;width:7em">Country</label>
			<select name="wpti_schedule[wpti-country]">
				<?php
				
					foreach( $countries as $key=>$value ) {
					
						echo '<option value="' . $key . '-' . $value . '">' . $value . '</option>';
					
					}
					
				?>
			</select>
		</p>		
		<p class="submit">
			<input type="submit" class="button-primary" value="Add Location" />
		</p>					
	</form>
	<h3>Manage Existing Locations</h3>	
	<table class="widefat">
		<thead>
			<tr>							
				<th width="20%">From Date</th>
				<th width="20%">To Date</th>
				<th width="25%">Place/City</th>
				<th width="20%">Country</th>
				<th width="15%">Admin</th>
			</tr>
		</thead>
		<tfoot>
			<tr>							
				<th>From Date</th>
				<th>To Date</th>
				<th>Place/City</th>
				<th>Country</th>
				<th>Admin</th>
			</tr>
		</tfoot>
		<tbody>
			<?php if( is_array( $options ) ) { ?>
				<?php array_multisort( $options, SORT_DESC ); ?>
				<?php foreach( $options as $key=>$value ) { ?>								
					<tr>
						<td>
							<?php echo date_i18n( 'j M Y', $value['wpti_from_date'] ); ?>				
						</td>
						<td>
							<?php echo date_i18n( 'j M Y', $value['wpti_to_date'] ); ?>				
						</td>
						<td><?php echo $value['wpti_place']; ?></td>
						<td><?php echo $value['wpti_country_name']; ?></td>
						<td>
							<form method="post" action="options.php">
								<?php settings_fields( 'wpti_schedule' ); ?>
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