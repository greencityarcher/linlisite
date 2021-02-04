<?php function check_mobile_device() {
    $mobile_agent_array = array('ipad', 'iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    foreach ($mobile_agent_array as $value) {
        if (strpos($agent, $value) !== false) return true;
    };
    return false;
};?>
<?php
	global $userpro_social;
	$background_pic = userpro_profile_data('custom_profile_bg', $user_id);
	if( empty($background_pic) ){
		$background_pic = userpro_url.'profile-layouts/layout'.$layout.'/images/cover.png';
	}

?>
<div class="profile">
	<div class="profile__header">
		<div class="profile__background-container" style="background-image: url(<?php echo $background_pic;?>);">
		</div>
		<div class="profile__avatar" style="background-image: url(<?php echo $userpro->profile_photo_url($user_id); ?>);">
		</div>
	</div>
	<div class="profile__main">
		<div>
			<p class="profile__linli-name">
				<?php echo userpro_profile_data('nickname', $user_id); ?>
			</p>
			<h1 class="profile__header-text">
				<?php echo userpro_profile_data('display_name', $user_id); ?>
			</h1>
			<div class="profile__about">
				<?php echo userpro_profile_data('description', $user_id); ?>
			</div>
			<div class="contacts">
				<?php if(userpro_profile_data('whatsapp', $user_id)) :?>
					<a href="https://wa.me/<?php echo userpro_profile_data('whatsapp', $user_id); ?>" class="std-button">
						<?php
							if (userpro_profile_data('whatsapp_buttonname', $user_id)){
								echo userpro_profile_data('whatsapp_buttonname', $user_id);
								}
							else{
								echo "Whatsapp";
							}
							?>
					</a>
				<?php endif; ?>
				<?php if(userpro_profile_data('viber', $user_id)) :?>
					<?php if(check_mobile_device()) :?>
						<a href="viber://add?number=<?php echo userpro_profile_data('viber', $user_id); ?>" class="std-button">
							<?php
								if (userpro_profile_data('viber_buttonname', $user_id)){
									echo userpro_profile_data('viber_buttonname', $user_id);
									}
								else{
									echo "Viber";
								}
							?>
						</a>
					<?php else : ?>
						<a href="viber://chat?number=+<?php echo userpro_profile_data('viber', $user_id); ?>" class="std-button">
							<?php
								if (userpro_profile_data('viber_buttonname', $user_id)){
									echo userpro_profile_data('viber_buttonname', $user_id);
									}
								else{
									echo "Viber";
								}
							?>
						</a>
					<?php endif; ?>
				<?php endif; ?>

				<?php if(userpro_profile_data('user_url', $user_id)) :?>
					<a href="<?php echo userpro_profile_data('user_url', $user_id); ?>" class="std-button">
						<?php
							if (userpro_profile_data('vk_buttonname', $user_id)){
								echo userpro_profile_data('vk_buttonname', $user_id);
								}
							else{
								echo "VK";
							}
						?>
					</a>
				<?php endif; ?>

				<?php if(userpro_profile_data('telegram', $user_id)) :?>
					<a href="https://t.me/@<?php echo userpro_profile_data('telegram', $user_id); ?>" class="std-button">
						<?php
							if (userpro_profile_data('telegram_buttonname', $user_id)){
								echo userpro_profile_data('telegram_buttonname', $user_id);
								}
							else{
								echo "Telegram";
							}
						?>
					</a>
				<?php endif; ?>
			</div>
			<?php if(userpro_profile_data('email_clients', $user_id)) :?>
				<div class="feedback">
					<a href="mailto:<?php echo userpro_profile_data('email_clients', $user_id); ?>" class="std-button">
						<?php
							if (userpro_profile_data('email_buttonname', $user_id)){
								echo userpro_profile_data('telegram_buttonname', $user_id);
								}
							else{
								echo "Написать на почту";
							}
						?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="powered">
		Сделано на Linli
	</div>
	<div>
		<div>
			РЕДАКТИРОВАТЬ ПРОФИЛЬ
		</div>
		<div class="up-right-button">
		<?php if ( userpro_can_edit_user( $user_id ) || userpro_get_edit_userrole() ) {?>
			<a href="<?php echo $userpro->permalink($user_id,'edit')?>" class="up-edit userpro-tip" original-title="<?php _e('Edit','userpro');?>"><i class="userpro-icon-edit"></i></a>
		<?php }?>
		<?php if ( $user_id == get_current_user_id() ) {?>
			<a href="<?php echo wp_logout_url();?>" class="up-logout userpro-tip" original-title="<?php _e('Logout','userpro');?>"><i class="userpro-icon-user-signout"></i></a>
		<?php }?>
		</div>

	</div>
</div>


	<div id="profile-header" class="container" style="background-image:url(<?php echo $background_pic;?>);" >
 <div class="edit-profile-button" style="right:187px; top:40%">
			<button id="edit-image"><img src="images/icons/edit-image.png" width="16px" height="16px"><span>Edit Image<span></button>
		</div>
		<div class="row">
		<div class="profile-section col-md-8 col-md-offset-2 col-sm-offset-1">
			<div class="col-xs-12 col-sm-4  col-md-3" id="profile-picture">
				<?php if ( userpro_get_option('lightbox') && userpro_get_option('profile_lightbox') ) { ?>
		<div class="userpro-profile-img" data-key="profilepicture"><a href="<?php echo $userpro->profile_photo_url($user_id); ?>" class="userpro-tip-fade lightview" data-lightview-caption="<?php echo $userpro->profile_photo_title( $user_id ); ?>" title="<?php _e('View member photo','userpro'); ?>"><?php echo get_avatar( $user_id, $profile_thumb_size ); ?></a></div>
		<?php } else { ?>
		<div class="userpro-profile-img" data-key="profilepicture"><a href="<?php echo $userpro->permalink($user_id); ?>" title="<?php _e('View Profile','userpro'); ?>"><?php echo get_avatar( $user_id, $profile_thumb_size ); ?></a></div>
		<?php } ?>
			</div>
			<div class="user-details col-xs-12 col-sm-5 col-md-7">
			  <div class="up-display-name">
				<a href="<?php echo $userpro->permalink($user_id); ?>"><?php echo userpro_profile_data('display_name', $user_id); ?></a>
			 </div>
		   <?php 	if(userpro_get_option('show_badges_profile')=='1')
			echo userpro_show_badges( $user_id );
			else
			{?>
			<?php
		  if(userpro_show_badges( $user_id )!='<div class="userpro-badges"></div>')	{?>

			<span class="badges"></span>
			<i  onclick="userpro_show_user_badges(<?php echo $user_id;?>);" class="fa fa-arrow-circle-right display_badges"></i>
			 <?php }} ?>
                        <?php do_action('userpro_after_profile_img' , $user_id); ?>
			<?php echo $userpro->show_social_bar( $args, $user_id, 'userpro-centered-icons' ); ?>

		<div class="userpro-clear"></div>
		<div class="connection-info" >
				<?php echo $userpro_social->follow_text($user_id, get_current_user_id()); ?>
			</div>
			</div>

			<div class="up-right-button">
			<?php if ( userpro_can_edit_user( $user_id ) || userpro_get_edit_userrole() ) {?>
				<a href="<?php echo $userpro->permalink($user_id,'edit')?>" class="up-edit userpro-tip" original-title="<?php _e('Edit','userpro');?>"><i class="userpro-icon-edit"></i></a>
			<?php }?>
			<?php if ( $user_id == get_current_user_id() ) {?>
				<a href="<?php echo wp_logout_url();?>" class="up-logout userpro-tip" original-title="<?php _e('Logout','userpro');?>"><i class="userpro-icon-user-signout"></i></a>
			<?php }?>
			</div>

			<!--  -->
		</div>
		</div>
	</div>
	<div class="main-content">
		<div class="row">

		<div class="profile" id="up_profile_details">
			<?php // Hook into fields $args, $user_id
			if (!isset($user_id)) $user_id = 0;
			$hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
			?>

			<?php foreach( userpro_fields_group_by_template( $template, $args["{$template}_group"] ) as $key => $array ) { ?>

				<?php  if ($array) echo userpro_show_field( $key, $array, $i, $args, $layout, $user_id ) ?>

			<?php }
				do_action('userpro_after_fields', $hook_args);
			?>

		</div>
		<div class="option-content col-xs-10 col-md-9 up_content" id="up_followers">
		  <?php
		  		$i=0;
		  		$followers = $userpro_social->followers( $user_id );
		  		if( !empty($followers) && is_array( $followers )){
		  			$followers = array_reverse($followers, true);

		  		foreach($followers as $user=>$arr) : $userdata = get_userdata($user); if ($userdata) { $i++; ?>

		<div class="userpro-sc">
			<!-- 1111111111111111111111111111111111--!-->
			<!-- 1111111111111111111111111111111111--!-->
			<!-- 1111111111111111111111111111111111--!-->

			<div class="userpro-sc-img" data-key="profilepicture">
				<a href="<?php echo $userpro->permalink( $user ); ?>"><?php echo get_avatar( $user, 40 ); ?></a>
			</div>

			<div class="userpro-sc-i">
				<div class="userpro-sc-i-name"><a href="<?php echo $userpro->permalink( $user ); ?>" title="<?php _e('View Profile','userpro'); ?>"><?php echo userpro_profile_data('display_name', $user); ?></a><?php echo userpro_show_badges( $user ); ?></div>
				<?php if ($userpro->shortbio($user)) : ?><div class="userpro-sc-i-bio"><?php echo $userpro->shortbio( $user ); ?></div><?php endif; ?>
				<div class="userpro-sc-i-icons"><?php echo userpro_profile_icons( $args, $user ); ?></div>
			</div>

			<div class="userpro-sc-btn">
				<?php echo $userpro_social->follow_text($user, get_current_user_id()); ?>
			</div>

			<div class="userpro-clear"></div>

		</div>

		<?php } else { /* user not found */ $userpro_social->unset_follower($user_id, $user); } endforeach; } ?>


		<?php if ($i == 0) { // no members ?>
		<div class="userpro-sc userpro-sc-noborder">
			<?php if ($userpro->is_user_logged_user($user_id)) { ?>
			<?php _e('You do not have anyone who started following you yet.','userpro'); ?>
			<?php } else { ?>
			<?php _e('This user does not have anyone who started following him/her yet.','userpro'); ?>
			<?php } ?>
		</div>
		<?php } ?>
		</div>
		<div class="option-content col-xs-10 col-md-9 up_content" id="up_following">
			<?php
				$i=0;
				$following = $userpro_social->following( $user_id );
				if( is_array( $following )){
					$following = array_reverse($following, true);

				foreach($following as $user=>$arr) : $userdata = get_userdata($user); if ($userdata) { $i++; ?>

		<div class="userpro-sc">

			<div class="userpro-sc-img" data-key="profilepicture">
				<a href="<?php echo $userpro->permalink( $user ); ?>"><?php echo get_avatar( $user, 40 ); ?></a>
			</div>

			<div class="userpro-sc-i">
				<div class="userpro-sc-i-name"><a href="<?php echo $userpro->permalink( $user ); ?>" title="<?php _e('View Profile','userpro'); ?>"><?php echo userpro_profile_data('display_name', $user); ?></a><?php echo userpro_show_badges( $user ); ?></div>
				<?php if ($userpro->shortbio($user)) : ?><div class="userpro-sc-i-bio"><?php echo $userpro->shortbio( $user ); ?></div><?php endif; ?>
				<div class="userpro-sc-i-icons"><?php echo userpro_profile_icons( $args, $user ); ?></div>
			</div>

			<div class="userpro-sc-btn">
				<?php echo $userpro_social->follow_text($user, get_current_user_id()); ?>
			</div>

			<div class="userpro-clear"></div>

		</div>

		<?php } else { /* user not found */ $userpro_social->unset_following($user_id, $user); } endforeach; }?>
		<?php if ($i == 0) { // no members ?>
		<div class="userpro-sc userpro-sc-noborder">
			<?php if ($userpro->is_user_logged_user($user_id)) { ?>
			<?php _e('You have not started following anyone yet.','userpro'); ?>
			<?php } else { ?>
			<?php _e('This user have not started following anyone yet.','userpro'); ?>
			<?php } ?>
		</div>
		<?php }
			?>
		</div>
		<div class="option-content col-xs-10 col-md-9 up_content" id="up_connections">
			<?php
				$i = 0;
				$approve_userlist = get_user_meta($user_id,'_userpro_connected_userlist', true);
				if( !empty($approve_userlist) && is_array( $approve_userlist ) ){
					$approve_userlist = array_reverse($approve_userlist, true);

				foreach($approve_userlist as $user=>$arr) : $userdata = get_userdata($user); if ($userdata) { $i++; ?>
		<div class="userpro-sc" id="<?php echo $user; ?>">
			<div class="userpro-sc-img" data-key="profilepicture">
				<a href="<?php echo $userpro->permalink( $user ); ?>"><?php echo get_avatar( $user, 40 ); ?></a>
			</div>

			<div class="userpro-sc-i">
				<div class="userpro-sc-i-name"><a href="<?php echo $userpro->permalink( $user ); ?>" title="<?php _e('View Profile','userpro'); ?>"><?php echo userpro_profile_data('display_name', $user); ?></a><?php echo userpro_show_badges( $user ); ?></div>
				<?php if ($userpro->shortbio($user)) : ?><div class="userpro-sc-i-bio"><?php echo $userpro->shortbio( $user ); ?></div><?php endif; ?>
				<div class="userpro-sc-i-icons"><?php echo userpro_profile_icons( $args, $user ); ?>
					<?php if($user_id == get_current_user_id()){?><a href="#" class="userpro-sc-action-remove userpro-tip" title="<?php _e('Remove Connection','userpro'); ?>" onclick="userpro_remove_connection(<?php echo $user;?>);"><i class="userpro-icon-remove-connection"></i></a><?php }?>
				</div>
			</div>


			<div class="userpro-sc-btn">
				<?php // echo $userpro_social->follow_text($user, get_current_user_id()); ?>


			</div>

			<div class="userpro-clear"></div>

		</div>

		<?php } endforeach; }?>
		<?php if ($i == 0) { // no members ?>
		<div class="userpro-sc userpro-sc-noborder">
			<?php if ($userpro->is_user_logged_user($user_id)) { ?>
			<?php _e('You do not have anyone who started connection with you yet.','userpro'); ?>
			<?php } else { ?>
			<?php _e('This user does not have anyone who started connection him/her yet.','userpro'); ?>
			<?php } ?>
		</div>
		<?php }
			?>
		</div>
		</div>
	</div>
</div>
