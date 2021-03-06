<?php

class Profile_Magic_Basic_Functions 
{
	
    private $profile_magic;
		
    private $version;
		

    public function __construct( $profile_magic, $version ) 
    {
        $this->profile_magic = $profile_magic;
        $this->version = $version;
    }

    public function null_field_notice() 
    {
       //echo $this->profile_magic;
         _e( 'Some of the options below require selecting fields from your form. Since you are creating new form from scratch, there are no fields in this form yet. You can come back later and modify these field specific options. You can safely ignore them for now and save the settings.','profile-grid' );
    }
    
    public function get_all_users_for_combo_box($arg=array())
    {
        $wp_users = get_users($arg);
        // Array of WP_User objects.
        if(!empty($wp_users))
        {
        foreach ( $wp_users as $user ) {
                $pm_users[] =  '"'.esc_html( $user->user_login).'"';
        }
        $all_users = implode(",",$pm_users);
        }
        else
        {
            return false;
        }
        return $all_users;
    }
	
    public function get_error_frontend_message()
    {
        $error = array();
		$error['pass_length'] = __('Your password should be at least 7 characters long.','profile-grid');
		$error['confirm_pass_not_match'] = __('Password and confirm password do not match.','profile-grid');
		$error['email_not_valid'] = __('Please enter a valid e-mail address.','profile-grid');
		$error['number_not_valid'] = __('Please enter a valid number.','profile-grid');
		$error['date_not_valid'] = __('Please enter a valid date (yyyy-mm-dd format)','profile-grid');
		$error['required_field'] = __('This is a required field','profile-grid');
		$error['file_type_not_valid'] = __('This file type is not allowed.','profile-grid');
		$error['number_not_valid'] = __('Please enter a valid number.','profile-grid');
		$error['number_not_valid'] = __('Please enter a valid number.','profile-grid');
		$error['number_not_valid'] = __('Please enter a valid number.','profile-grid');
		$error['number_not_valid'] = __('Please enter a valid number.','profile-grid');
		
		return $error;
    }
    
    public function get_pg_extension_activate_url($path)
    {
        $plugin = $path;
        if (strpos($path, '/')) {
            $path = str_replace('/', '%2F', $path);
        }
        $activateUrl = sprintf(admin_url('plugins.php?action=activate&plugin=%s'), $path);    
        $activateUrl = wp_nonce_url($activateUrl, 'activate-plugin_' . $plugin);
        return $activateUrl;
    }
    
    public function pg_extension_install_button($plugin)
    {
        $data = new stdClass;
        $data->pg_extsion_install_url = $this->pg_get_extension_install_url($plugin);
        $data->pg_extsion_activate_url = '';
        $data->is_pg_extension_activate = $this->pg_is_extension_activated($plugin);
        $data->pg_extsion_page_url = '';
        if($data->is_pg_extension_activate) 
        {
            $data->is_pg_extension_installed = true;
        } 
        else 
        {
            $plugins = get_plugins();
            $path = $this->pg_extention_plugin_path($plugin);
            $data->is_pg_extension_installed = array_key_exists($path, $plugins);
            if($data->is_pg_extension_installed)
            {
                $data->pg_extsion_activate_url = $this->get_pg_extension_activate_url($path);
            }
            else
            {
                $data->pg_get_extension_install_url = $this->pg_get_extension_install_url($plugin);
            }
        }  
        return $data;
    }
    
    public function pg_extention_plugin_path($plugin)
    {
        switch($plugin)
        {
            case 'STRIPE':
                $path = 'profilegrid-user-profiles-groups-and-communities-stripe-payment-gateway/profilegrid-stripe-payment.php';
                break;
            case 'GROUPWALL':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-group-wall/profilegrid-group-wall.php';
                break;
            case 'DISPLAY_NAME':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-display-name/profilegrid-display-name.php';
                break; 
            case 'GROUP_PHOTOS':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-group-photos/profilegrid-group-photos.php';
                break; 
            case 'CUSTOM_PROFILE_SLUG':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-userid-slug-changer/profilegrid-userid-slug-changer.php';
                break; 
                
        }
        return $path;
    }
    
    public function pg_is_extension_activated($plugin)
    {
        switch($plugin)
        {
            case 'STRIPE':
                $is_activate = class_exists("Profilegrid_Stripe_Payment");
                break;
            case 'GROUPWALL':
                $is_activate = class_exists("Profilegrid_Group_Wall");
                break;
            case 'DISPLAY_NAME':
                $is_activate = class_exists("Profilegrid_Display_Name");
                break;
            case 'GROUP_PHOTOS':
                $is_activate = class_exists("Profilegrid_Group_photos");
                break;
            case 'CUSTOM_PROFILE_SLUG':
                $is_activate = class_exists("Profilegrid_Userid_Slug_Changer");
                break;
                
            
        }
        return $is_activate;
    }
    
    public function pg_get_extension_install_url($plugin)
    {
        switch($plugin)
        {
            case 'STRIPE':
                $url = "http://profilegrid.co/checkout/?download_id=24581&edd_action=add_to_cart";
                break;
            case 'GROUPWALL':
                $url = "http://profilegrid.co/checkout?download_id=24579&edd_action=add_to_cart";
                break;
            case 'DISPLAY_NAME':
                $url = "http://profilegrid.co/checkout?download_id=24802&edd_action=add_to_cart";
                break;
            case 'GROUP_PHOTOS':
                $url = "http://profilegrid.co/checkout?download_id=24825&edd_action=add_to_cart";
                break;
            case 'CUSTOM_PROFILE_SLUG':
                $url = "http://profilegrid.co/checkout?download_id=24861&edd_action=add_to_cart";
                break;
            default:
                $url = "http://profilegrid.co/extensions/";
                break;  
        }
        return $url;
    }
    
    public function pg_get_extension_options_url($plugin)
    {
        switch($plugin)
        {
            case 'STRIPE':
                $url = admin_url('admin.php?page=pm_payment_settings');
                break;
            case 'GROUPWALL':
                $url = admin_url('admin.php?page=pm_group_wall_settings');
                break;
            case 'DISPLAY_NAME':
                $url = admin_url('admin.php?page=pm_display_name_settings');
                break;
            case 'GROUP_PHOTOS':
                $url = admin_url('admin.php?page=pm_group_photos_settings');
                break;
            case 'CUSTOM_PROFILE_SLUG':
                $url = admin_url('admin.php?page=pm_uid_changer_settings');
                break;
            default:
                 $url = admin_url('admin.php?page=pm_settings');
                break;  
        }
        return $url;
    }
    
    public function pg_get_extension_button($plugin)
    {
        $data = $this->pg_extension_install_button($plugin);
        $optionurl = $this->pg_get_extension_options_url($plugin);
        if($data->is_pg_extension_activate)
        {
        ?>
            <li>
            <a class="install-now button pg-install-now-btn" href="<?php echo $optionurl;?>">OPTIONS</a>
            </li>
        <?php
        }
        elseif($data->is_pg_extension_installed)
        {
            ?>
            <li>
            <a class="install-now button pg-install-now-btn" href="<?php echo $data->pg_extsion_activate_url;?>">Activate Now</a>
            </li>
        <?php
        }
        else
        {
            ?>
            <li>
            <a class="install-now button pg-install-now-btn" target="_blank" href="<?php echo $data->pg_get_extension_install_url;?>">Install Now</a>
            </li>
        <?php
        }
            
    }
	
}