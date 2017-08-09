<?php

class PM_Custom_Fields {

    public function pm_get_custom_form_fields($row, $value = '', $textdomain = '') {
        if ($textdomain == '')
            $textdomain = 'profile-magic';
        $function = 'pm_get_custom_form_field_' . $row->field_type;
        $this->$function($row, $value, $textdomain);
    }

    public function pm_get_custom_form_field_mailchimp($row, $value = '', $textdomain = '') {
        if ($textdomain == '')
            $textdomain = 'profile-magic';
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        $function = 'pm_get_custom_form_field_mailchimp_' . $field_options['mailchimp_field_type'];
        $this->$function($row, $value, $textdomain);
    }

    public function pm_get_custom_login_fields($type, $textdomain = '') {
        if ($textdomain == '')
            $textdomain = 'profile-magic';
        $function = 'pm_get_custom_login_field_' . $type;
        $this->$function($textdomain);
    }

    public function pm_get_custom_login_field_username($textdomain = '') {
        ?>        
        <div class="pm-col">

            <div class="pm-field-lable">
                <label for="user_login"><?php _e('Username or Email', 'profile-grid'); ?></label>
            </div>
            <div class="pm-field-input pm_required">
                <input type="text" name="<?php echo esc_attr('user_login'); ?>" id="<?php echo esc_attr('user_login'); ?>" required="required">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_login_field_password($textdomain = '') {
        ?>        
        <div class="pm-col">
            <div class="pm-field-lable">
                <label for="user_pass"><?php _e('Password', 'profile-grid'); ?></label>
            </div>
            <div class="pm-field-input pm_required">
                <input type="password" name="<?php echo esc_attr('user_pass'); ?>" id="<?php echo esc_attr('user_pass'); ?>" required="required">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_login_field_remember_me($textdomain = '') {
        ?>        
        <div class="pm-col">
            <div class="pm-field-lable">

            </div>
            <div class="pm-field-input">
                <input type="checkbox" name="<?php echo esc_attr('remember_me'); ?>" id="<?php echo esc_attr('remember_me'); ?>">
                <label for="remember_me"><?php _e('Remember Me', 'profile-grid'); ?></label>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_first_name($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="text" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>

        <?php
    }

    public function pm_get_custom_form_field_pagebreak($row, $value = '', $textdomain = '') {
        
    }

    public function pm_get_custom_form_field_last_name($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="text" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>

        <?php
    }

    public function pm_get_custom_form_field_user_name($row, $value) {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><sup class="pm_estric">*</sup></label>
            </div>
            <div class="pm-field-input pm_user_name pm_required">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="text" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>" onkeyup="pm_frontend_check_username()" onblur="pm_frontend_check_username()">
                <div class="errortext" style="display:none;"></div>
                <div class="usernameerror" style="display:none;"></div>
            </div>
        </div>

        <?php
    }

    public function pm_get_custom_form_field_user_email($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><sup class="pm_estric">*</sup></label>
            </div>
            <div class="pm-field-input pm_email pm_user_email pm_required">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="email" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>" onkeyup="pm_frontend_check_useremail()" onblur="pm_frontend_check_useremail()">
                <div class="errortext" style="display:none;"></div>
                <div class="useremailerror" style="display:none;"></div>
            </div>
        </div>

        <?php
    }

    public function pm_get_custom_form_field_user_url($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_user_url <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="url" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>

        <?php
    }

    public function pm_get_custom_form_field_user_pass($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><sup class="pm_estric">*</sup></label>
            </div>
            <div class="pm-field-input pm_user_pass pm_required">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="password" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($field_options['default_value']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>

        <?php
    }

    public function pm_get_custom_form_field_confirm_pass($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><sup class="pm_estric">*</sup></label>
            </div>
            <div class="pm-field-input pm_confirm_pass pm_required">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="password" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($field_options['default_value']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_heading($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">

            </div>
            <div class="pm-field-input">
                <<?php if (!empty($field_options)) echo esc_attr($field_options['heading_tag']); ?> class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>"><?php if (!empty($field_options)) echo esc_attr($field_options['heading_text']); ?></<?php if (!empty($field_options)) echo esc_attr($field_options['heading_tag']); ?>>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_paragraph($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">

            </div>
            <div class="pm-field-input">
                <p class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>"><?php if (!empty($field_options)) echo esc_attr($field_options['paragraph_text']); ?></p>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_description($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_textarearequired'; ?>">
                <textarea title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" cols="<?php if (!empty($field_options)) echo esc_attr($field_options['columns']); ?>" rows="<?php if (!empty($field_options)) echo esc_attr($field_options['rows']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>"><?php echo $value; ?></textarea>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_text($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="text" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>

        <?php
    }

    public function pm_get_custom_form_field_select($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_select_required'; ?>">
                <select title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>">
                    <?php
                    if (!empty($field_options)) {
                        if ($field_options['first_option'] != '') {
                            echo '<option value="">' . $field_options['first_option'] . '</option>';
                        }
                        $arr = explode(',', $field_options['dropdown_option_value']);
                        foreach ($arr as $ar) {
                            ?>
                            <option value="<?php echo $ar; ?>" <?php if ($ar == $value) echo 'selected'; ?>><?php echo $ar; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_radio($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_radiorequired'; ?>">
                <div class="pmradio">
                    <?php
                    if (!empty($field_options) && !empty($field_options['radio_option_value'])) {

                        foreach ($field_options['radio_option_value'] as $radio) {
                            ?>
                            <div class="pm-radio-option"><input title="<?php echo esc_attr($row->field_desc); ?>" type="radio" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" value="<?php echo $radio; ?>" <?php if ($radio == $value) echo 'checked'; ?>> <?php echo esc_attr($radio); ?></div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_checkbox($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if (empty($value) && !empty($field_options))
            $value = $field_options['default_value'];
        if (is_array($value)) {
            $array_value = $value;
        } else {
            $array_value = explode(',', $value);
        }
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_checkboxrequired'; ?>">
                <div class="pmradio">
        <?php
        if (!empty($field_options) && !empty($field_options['radio_option_value'])) {
            foreach ($field_options['radio_option_value'] as $radio) {
                $checked = '';
                if (!empty($array_value) && is_array($array_value)) {
                    if (in_array($radio, $array_value) == true) {
                        $checked = 'checked';
                    }
                }
                if ($radio == 'chl_other') {
                    //print_r($array_value);
                    if (is_array($array_value) && in_array('chl_other', $array_value))
                        $chl_other = array_diff($array_value, $field_options['radio_option_value']);
                    //print_r($chl_other);die;
                    ?>
                                <div class="pm-radio-option"><input title="<?php echo esc_attr($row->field_desc); ?>" type="checkbox" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" name="<?php echo esc_attr($row->field_key) . '[]'; ?>" value="<?php echo $radio; ?>"  onClick="pm_show_hide(this, 'pm_otherbox')" <?php echo $checked; ?>> <?php echo 'Other'; ?></div>
                                <?php
                                if (isset($chl_other) && !empty($chl_other)) :
                                    $other = implode(',', $chl_other);
                                    ?>
                                    <div class="pm-radio-option pm_otherbox">
                                        <input type="text" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" name="<?php echo esc_attr($row->field_key) . '[]'; ?>" value="<?php echo $other; ?>">
                                    </div>
                                <?php else: ?>


                                    <div id="pm_otherbox" class="pm-radio-option pm_otherbox" style="display:none;">
                                        <input type="text" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" name="<?php echo esc_attr($row->field_key) . '[]'; ?>" value="">
                                    </div>
                    <?php endif; ?>



                    <?php
                    continue;
                }
                ?>
                            <div class="pm-radio-option"><input title="<?php echo esc_attr($row->field_desc); ?>" type="checkbox" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" name="<?php echo esc_attr($row->field_key) . '[]'; ?>" value="<?php echo $radio; ?>" <?php echo $checked; ?>> <?php echo esc_attr($radio); ?></div>
                <?php
            }
        }
        ?>
                </div>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
                    <?php
                }

                public function pm_get_custom_form_field_textarea($row, $value = '', $textdomain = '') {
                    if ($row->field_options != "")
                        $field_options = maybe_unserialize($row->field_options);
                    if ($value == '' && !empty($field_options))
                        $value = $field_options['default_value'];
                    ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_textarearequired'; ?>">
                <textarea title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" cols="<?php if (!empty($field_options)) echo esc_attr($field_options['columns']); ?>" rows="<?php if (!empty($field_options)) echo esc_attr($field_options['rows']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>"><?php echo $value; ?></textarea>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_DatePicker($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_datepicker <?php if ($row->is_required == 1) echo 'pm_required'; ?>">              
                <input type="text" title="<?php echo esc_attr($row->field_desc); ?>" class="pm_calendar <?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_email($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_email <?php if ($row->is_required == 1) echo 'pm_required'; ?>">              
                <input type="email" title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_number($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_number <?php if ($row->is_required == 1) echo 'pm_required'; ?>">              
                <input type="text" title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_country($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_select_required'; ?>">
                <select title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>">
        <?php include 'country_option_list.php'; ?>
                </select>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_timezone($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_select_required'; ?>">
                <select title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>">
                    <?php include 'time_zone_option_list.php'; ?>
                </select>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_term_checkbox($row, $value = '', $textdomain = '') {
        $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_checkboxrequired'; ?>">
                <div class="pmradio">
                    <div class="pm-radio-option"><input type="checkbox" title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" value="yes" <?php checked($value, 'yes') ?> /> <?php echo esc_attr($row->field_name); ?></div>
                </div>
                <textarea disabled rows="4" class="termandcondition"><?php echo $field_options['term_and_condition']; ?></textarea>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_file($row, $value = '', $textdomain = '') {
        $dbhandler = new PM_DBhandler;
        if ($value != '')
            $row->is_required = 0;
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_fileinput <?php if ($row->is_required == 1) echo 'pm_repeat_required'; ?>">
                <div class="pm_repeat">
                    <input title="<?php echo esc_attr($row->field_desc); ?>" type="file" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key) . '[]'; ?>" data-filter-placeholder="<?php if (!empty($field_options)) echo trim(esc_attr($field_options['allowed_file_types'])); ?>" />
                    <?php if ($dbhandler->get_global_option_value('pm_allow_multiple_attachments') == 1): ?>
                        <a class="add"><span onClick="pm_add_repeat(this)"><?php _e('Add', 'profile-grid'); ?></span></a>
                        <a class="removebutton"><span class="remove" onClick="pm_remove_repeat(this)"><?php _e('Remove', 'profile-grid'); ?></span></a>
                    <?php endif; ?>
                    <div class="errortext" style="display:none;"></div>
                </div>

            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_user_avatar($row, $value = '', $textdomain = '') {
        if ($value != '')
            $row->is_required = 0;
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_fileinput <?php if ($row->is_required == 1) echo 'pm_repeat_required'; ?>">
                <div class="pm_repeat">
                    <input title="<?php echo esc_attr($row->field_desc); ?>" type="file" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key) . '[]'; ?>" data-filter-placeholder="<?php if (!empty($field_options)) echo trim(esc_attr($field_options['allowed_file_types'])); ?>" />
                    <div class="errortext" style="display:none;"></div>
                </div>

            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_repeatable_text($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        if (empty($value))
            $value = '';
        if (is_array($value))
            $values = $value;
        else
            $values = explode(',', $value);
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_repeat_required'; ?>">
                <?php foreach ($values as $val): ?>
                    <div class="pm_repeat">
                        <input type="text" title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($val); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key) . '[]'; ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                        <a class="add"><span onClick="pm_add_repeat(this)"><?php _e('Add', 'profile-grid'); ?></span></a><a class="removebutton"><span class="remove" onClick="pm_remove_repeat(this)"><?php _e('Remove', 'profile-grid'); ?></span></a>
                        <div class="errortext" style="display:none;"></div>
                    </div>
        <?php endforeach; ?>

            </div>
        </div>

        <?php
    }

    public function pm_get_custom_form_field_pricing($row, $value = '', $textdomain = '') {
        $dbhandler = new PM_DBhandler;
        $pmrequests = new PM_request;
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['price'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <?php if ($dbhandler->get_global_option_value('pm_currency_position', 'before') == 'before'): ?>
            <?php echo $pmrequests->pm_get_currency_symbol(); ?>
        <?php endif; ?>
        <?php echo $value; ?>
        <?php if ($dbhandler->get_global_option_value('pm_currency_position', 'before') == 'after'): ?>
            <?php echo $pmrequests->pm_get_currency_symbol(); ?>
        <?php endif; ?>
                <input type="hidden" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($row->field_key); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>

        <?php
    }

    //new custom fields sarthak
    public function pm_get_custom_form_field_mobile_number($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_mobile_number <?php if ($row->is_required == 1) echo 'pm_required'; ?>">              
                <input type="text" title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_phone_number($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_phone_number <?php if ($row->is_required == 1) echo 'pm_required'; ?>">              
                <input type="text" title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    public function pm_get_custom_form_field_gender($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        


        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_radiorequired'; ?>">
                <div class="pmradio pm_gender">
                    <div class="pm-radio-option"><input title="<?php echo esc_attr($row->field_desc); ?>" type="radio" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" value="<?php _e('male', $textdomain) ?>" <?php if ($value == 'male') echo 'checked'; ?>> <?php _e('Male', $textdomain) ?></div>
                    <div class="pm-radio-option"><input title="<?php echo esc_attr($row->field_desc); ?>" type="radio" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" value="<?php _e('female', $textdomain) ?>" <?php if ($value == 'female') echo 'checked'; ?>> <?php _e('Female', $textdomain) ?></div>
                    <div class="pm-radio-option"><input title="<?php echo esc_attr($row->field_desc); ?>" type="radio" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" value="<?php _e('others', $textdomain) ?>" <?php if ($value == 'others') echo 'checked'; ?>> <?php _e('Others', $textdomain) ?></div>
                </div>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }

    
    public function pm_get_custom_form_field_language($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        


        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
           <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_select_required'; ?>">
                <select title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>">
                  <?php include 'language_option_list.php'; ?>
                </select>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }
    
    
      public function pm_get_custom_form_field_birth_date($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_datepicker <?php if ($row->is_required == 1) echo 'pm_required'; ?>">              
                <input type="text" title="<?php echo esc_attr($row->field_desc); ?>" class="pm_calendar <?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }
    
      public function pm_get_custom_form_field_divider($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
        <div class="pm-col pm-col-divider">
            <hr title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>">
        </div>
        <?php
    }
    
    public function pm_get_custom_form_field_spacing($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
            <div class="pm-col pm-col-spacer">
            </div>
        <?php
    }
    
    public function pm_get_custom_form_field_multi_dropdown($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
           if (is_array($value)) {
            $array_value = $value;
        } else {
            $array_value = explode(',', $value);
        }
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input <?php if ($row->is_required == 1) echo 'pm_select_required'; ?>">
                <select multiple title="<?php echo esc_attr($row->field_desc); ?>" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>[]">
                    <?php
                    if (!empty($field_options)) {
                        if ($field_options['first_option'] != '') {
                            echo '<option value="">' . $field_options['first_option'] . '</option>';
                        }
                        $arr = explode(',', $field_options['dropdown_option_value']);
                        foreach ($arr as $ar) {
                             $selected = '';
                            if (!empty($array_value) && is_array($array_value))
                            {
                         if (in_array($ar, $array_value) == true) {
                            $selected = 'selected';
                        }
                        }
                            
                            ?>
                            <option value="<?php echo $ar; ?>" <?php echo $selected; ?>><?php echo $ar; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
                    
                    
    }
    
   
      public function pm_get_custom_form_field_facebook($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
      <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_facebook_url  <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="url" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>


   
        <?php
    }
    
     public function pm_get_custom_form_field_twitter($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
      <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_twitter_url  <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="url" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }
    
     public function pm_get_custom_form_field_google($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
      <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_google_url  <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="url" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }
    
         public function pm_get_custom_form_field_linked_in($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
      <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_linked_in_url  <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="url" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }
    
         public function pm_get_custom_form_field_youtube($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
      <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_youtube_url  <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="url" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }
    
        
         public function pm_get_custom_form_field_instagram($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
      <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_instagram_url  <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="url" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
        <?php
    }
    
    
      public function pm_get_custom_form_field_map($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
        ?>        
      <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_instagram_url  <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <input title="<?php echo esc_attr($row->field_desc); ?>" type="url" class="<?php if (!empty($field_options)) echo esc_attr($field_options['css_class_attribute']); ?>" maxlength="<?php if (!empty($field_options)) echo esc_attr($field_options['maximum_length']); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($row->field_key); ?>" name="<?php echo esc_attr($row->field_key); ?>" placeholder="<?php if (!empty($field_options)) echo esc_attr($field_options['place_holder_text']); ?>">
                <div class="errortext" style="display:none;"></div>
            </div>
        </div>


 <div id="locationField">
      <input id="autocomplete" placeholder="Enter your address"
             onFocus="" type="text"></input>
    </div>
<div>
     <input id="autocomplete" placeholder="Enter your address" onFocus="" type="text"></input>
     <div>
         <input class="field" id="street_number" placeholder="street" disabled="true"></input>
         <input class="field" id="route" placeholder="route" disabled="true"></input>
         <input class="field" id="locality" placeholder="city" disabled="true"></input>
         <input class="field" id="administrative_area_level_1" placeholder="state" disabled="true"></input>
          <input class="field" id="postal_code" placeholder="zip code" disabled="true"></input>
          <input class="field" id="country" placeholder="Country" disabled="true"></input>     
     </div>
</div>


        <?php
    }
    
    
      public function pm_get_custom_form_field_address($row, $value = '', $textdomain = '') {
        if ($row->field_options != "")
            $field_options = maybe_unserialize($row->field_options);
        if ($value == '' && !empty($field_options))
            $value = $field_options['default_value'];
       $arr= explode(',', $value);
        ?>        
        <div class="pm-col">
            <div class="pm-form-field-icon"><?php echo wp_get_attachment_image($row->field_icon, array(16, 16), false, false); ?></div>
            <div class="pm-field-lable">
                <label for="<?php echo esc_attr($row->field_key); ?>"><?php echo esc_attr($row->field_name); ?><?php if ($row->is_required == 1): ?><sup class="pm_estric">*</sup><?php endif; ?></label>
            </div>
            <div class="pm-field-input pm_address  <?php if ($row->is_required == 1) echo 'pm_required'; ?>">
                <div>
                        <div>
                            
                             <?php if(isset($field_options['address_line_1']))
                                {
                                echo '<input type="text"   class="field"    name="'.esc_attr($row->field_key).'[address_line_1]" placeholder = "Address line 1" value="'. esc_attr($arr['address_line_1']).'" ></input>';
                                }
                                ?>
                            
                             <?php if(isset($field_options['address_line_2']))
                                {
                                echo '<input type="text"   class="field"    name="'.esc_attr($row->field_key).'[address_line_2]" placeholder = "Address line 2" value="'. esc_attr($arr['address_line_2']).'" ></input>';
                                }
                                ?>
                            
                             <?php if(isset($field_options['zip_code']))
                                {
                                echo '<input type="text"   class="field"    name="'.esc_attr($row->field_key).'[zip_code]" placeholder = "Zip Code" value="'. esc_attr($arr['zip_code']).'" ></input>';
                                }
                                ?>
                            
                             <?php if(isset($field_options['country']))
                                {
                                echo '<input type="text"   class="field"    name="'.esc_attr($row->field_key).'[country]" placeholder = "Country" value="'. esc_attr($arr['country']).'" ></input>';
                                }
                                ?>
                            
                             <?php if(isset($field_options['state']))
                                {
                                echo '<input type="text"   class="field"    name="'.esc_attr($row->field_key).'[state]" placeholder = "City" value="'. esc_attr($arr['state']).'" ></input>';
                                }
                                ?>
                             <?php if(isset($field_options['city']))
                                {
                                echo '<input type="text"   class="field"    name="'.esc_attr($row->field_key).'[city]" placeholder = "State" value="'. esc_attr($arr['city']).'" ></input>';
                                }
                                ?>
                              </div>
                </div>
                           <div>
                               <input type="<?php if(isset($field_options['address_line_1'])){echo 'text';}else echo 'hidden';?>"   class="field"    name="<?php echo esc_attr($row->field_key); ?>[]" placeholder = "Address line 1" value="<?php echo $arr[0];?>"></input>
                        <input type="<?php if(isset($field_options['address_line_2'])){echo 'text';}else echo 'hidden';?>"   class="field"    name="<?php echo esc_attr($row->field_key); ?>[]" placeholder = "Address line 2" ></input>
                        <input type="<?php if(isset($field_options['zip_code'])){echo 'number';}else echo 'hidden';?>" class="field"    name="<?php echo esc_attr($row->field_key); ?>[]" placeholder = "Zip Code" ></input>
                        <input type="<?php if(isset($field_options['country'])){echo 'text';}else echo 'hidden';?>"   class="field"    name="<?php echo esc_attr($row->field_key); ?>[]" placeholder = "Country" ></input>
                        <input type="<?php if(isset($field_options['state'])){echo 'text';}else echo 'hidden';?>"   class="field"    name="<?php echo esc_attr($row->field_key); ?>[]" placeholder = "City" ></input>
                        <input type="<?php if(isset($field_options['city'])){echo 'text';}else echo 'hidden';?>"   class="field"    name="<?php echo esc_attr($row->field_key); ?>[]" placeholder = "State" ></input>     
                    </div>


                <div class="errortext" style="display:none;"></div>
            </div>
        </div>
 


        <?php
    }
    
     
    
    
     }