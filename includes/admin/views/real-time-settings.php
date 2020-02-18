<div class="wrap">
    <?php
        $wp_real_settings = get_option( 'wp_real_time_settings', true );
    ?>
	<form action="" method="post">
		<?php wp_nonce_field('wp_real_time_settings'); ?>
		<h2>Real Time</h2>
		<table class="form-table">
			<tr>
				<th>App ID</th>
				<td>
					<input type="text" name="pusher-app-id" class="regular-text" value="<?php echo wp_rt_get_app_id();
					?>">
					<p class="description"><?php _e('Enter pusher app id', 'wp-real-time'); ?></p>
				</td>
			</tr>
			<tr>
				<th>App key</th>
				<td>
					<input type="text" name="pusher-app-key" class="regular-text" value="<?php echo wp_rt_get_app_key
					(); ?>">
					<p class="description"><?php _e('Enter pusher app key', 'wp-real-time'); ?></p>
				</td>
			</tr>
			<tr>
				<th>App Secret</th>
				<td>
					<input type="text" name="pusher-app-secret" class="regular-text" value="<?php echo
					wp_rt_get_app_secret(); ?>">
					<p class="description"><?php _e('Enter pusher app secret', 'wp-real-time'); ?></p>
				</td>
			</tr>
			<tr>
				<th>Cluster</th>
				<td>
					<input type="text" name="pusher-app-cluster" class="regular-text" value="<?php echo
					wp_rt_get_app_cluster(); ?>">
					<p class="description"><?php _e('Enter pusher app cluster', 'wp-real-time'); ?></p>
				</td>
			</tr>
		</table>
		<p>
			<input type="submit" class="button button-primary">
		</p>
	</form>
</div>