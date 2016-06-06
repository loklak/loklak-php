<?php 
add_action( 'admin_init' , 'register_fields'  );


function register_fields() {

    register_setting( 'loklak-settings', 'loklak-settings' );

    add_settings_section(
        'loklak_section', 
        null, 
        'loklak_section_callback', 
        'loklak-settings'
    );

    add_settings_field( 
        'loklak_api', 
        null, 
        'loklak_api_html_render', 
        'loklak-settings', 
        'loklak_section' 
    );
}

function loklak_api_html_render(  ) { 

    $options = get_option( 'loklak-settings' );
    ?>
    <p>
        <input type="checkbox" name="loklak-settings[loklak_api]" value="loklak"> Use anonymous API of loklak.org <br />
    </p>
    <?php
}

function loklak_settings_conf(  ) {

	if( isset($_POST['loklak-settings']) ){
        update_option('loklak-settings[loklak_api]', true);
    }
    else {
        update_option('loklak-settings[loklak_api]', false);
    }
}

function loklak_section_callback(  ) { 

}