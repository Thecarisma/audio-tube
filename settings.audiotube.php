<?php
class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Audiotube', 
            'manage_options', 
            'audiotube-settings', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'audiotube_options' );
        ?>
        <div class="wrap">
            <h1>AudioTube Settings</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'audiotube_option_group' );
                do_settings_sections( 'audiotube_settings_admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'audiotube_option_group', // Option group
            'audiotube_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', 
            'My Custom Settings', 
            array( $this, 'print_section_info' ), 
            'audiotube_settings_admin' 
        );  

        add_settings_field(
            'select_skin', // ID
            'Select Skin', // Title 
            array( $this, 'skin_callback' ), // Callback
            'audiotube_settings_admin', // Page
            'setting_section_id' // Section           
        ); 

        add_settings_field(
            'select_style', // ID
            'Select Style', // Title 
            array( $this, 'style_callback' ), // Callback
            'audiotube_settings_admin', // Page
            'setting_section_id' // Section           
        );   

        add_settings_field(
            'support_plugin', // ID
            'Support The Plugin', // Title 
            array( $this, 'support_callback' ), // Callback
            'audiotube_settings_admin', // Page
            'setting_section_id' // Section           
        );    
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['audiotube_skin'] ) )
            $new_input['audiotube_skin'] = esc_attr($input['audiotube_skin']) ;

        if( isset( $input['audiotube_skin_style'] ) )
            $new_input['audiotube_skin_style'] = esc_attr($input['audiotube_skin_style']) ;

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        #print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function skin_callback()
    { 
        printf(
            '<labe> <input type="radio" id="audiotube_skin" value="classic" name="audiotube_options[audiotube_skin]" %s />&emsp; Classic &emsp; &emsp;</label>
			<label> <input type="radio" id="audiotube_skin" value="elegant" name="audiotube_options[audiotube_skin]" %s />&emsp;Elegant &emsp; &emsp;</label>
			<label> <input type="radio" id="audiotube_skin" value="chromic" name="audiotube_options[audiotube_skin]" %s />&emsp; Chromic &emsp; &emsp;</label>',
            (isset( $this->options['audiotube_skin']) && esc_attr( $this->options['audiotube_skin'] == 'classic') ) ? 'checked="checked"' : '',
			(isset( $this->options['audiotube_skin']) && esc_attr( $this->options['audiotube_skin'] == 'elegant') ) ? 'checked="checked"' : '',
			(isset( $this->options['audiotube_skin']) && esc_attr( $this->options['audiotube_skin'] == 'chromic') ) ? 'checked="checked"' : ''
        );
    }
	
    public function style_callback()
    { 
		if (isset( $this->options['audiotube_skin']) && esc_attr( $this->options['audiotube_skin'] != 'chromic') ) 
			printf(
				'<labe> <input type="radio" id="audiotube_skin_style" value="style_1" name="audiotube_options[audiotube_skin_style]" %s />&emsp; Style 1 &emsp; &emsp;</label>
				<label> <input type="radio" id="audiotube_skin_style" value="style_2" name="audiotube_options[audiotube_skin_style]" %s />&emsp; Style 2 &emsp; &emsp;</label>',
				(isset( $this->options['audiotube_skin_style']) && esc_attr( $this->options['audiotube_skin_style'] == 'style_1') ) ? 'checked="checked"' : '',
				(isset( $this->options['audiotube_skin_style']) && esc_attr( $this->options['audiotube_skin_style'] == 'style_2') ) ? 'checked="checked"' : ''
			);
		else 
			print 'Chromic has only a single style' ;
    }
	
    public function support_callback()
    { 
		printf(/
				'<input type="button" value="Follow Author" target="_blank" onClick="openUrl('.'\'https://twitter.com/iamthecarisma\''.')" />%s',
				'<script>
					function openUrl(url) {
						var win = window.open(url, "_blank");
						win.focus();
					}
				</script>'
			);
    }
}

