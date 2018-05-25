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
            'audio_tube_skin_option', // ID
            'Customize the AudioTube player skin and styles', // Title
            array( $this, 'empty_info' ), // Callback
            'audiotube_settings_admin' // Page
        );
		
		//preview

        add_settings_field(
            'classic_skin', // ID
            'Classic Skin', // Title 
            array( $this, 'classic_skin_callback' ), // Callback
            'audiotube_settings_admin', // Page
            'audio_tube_skin_option' // Section           
        );  
        add_settings_field(
            'elegant_skin', // ID
            'Elegant Skin', // Title 
            array( $this, 'elegant_skin_callback' ), // Callback
            'audiotube_settings_admin', // Page
            'audio_tube_skin_option' // Section           
        );  
        add_settings_field(
            'chromic_skin', // ID
            'Chromic Skin', // Title 
            array( $this, 'elegant_skin_callback' ), // Callback
            'audiotube_settings_admin', // Page
            'audio_tube_skin_option' // Section           
        );      

        /**add_settings_field(
            'title', 
            'Title', 
            array( $this, 'title_callback' ), 
            'audiotube_settings_admin', 
            'audio_tube_skin_option'
        ); **/     
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }
	
	public function empty_info()
    {
        
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback()
    {
        printf(
            '<input type="text" id="id_number" name="audiotube_options[id_number]" value="%s" />',
            isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
        );
    }
	
	public function classic_skin_callback()
    {
        printf( 
            '<input type="radio" id="is_classic_skin" name="audiotube_options[is_classic_skin]" %s />',
            (isset( $this->options['is_classic_skin']) && esc_attr( $this->options['is_classic_skin']) == 'true' ) ? 'checked="checked"' : 'checked="false"'
        );
    }
	
	public function elegant_skin_callback()
    {
        printf( 
            '<input type="radio" id="is_elegant_skin" name="audiotube_options[is_elegant_skin]" %s />',
            (isset( $this->options['is_elegant_skin']) && esc_attr( $this->options['is_elegant_skin']) == 'true' ) ? 'checked="checked"' : 'checked="false"'
        );
    }
	
	public function chromic_skin_callback()
    {
        printf( 
            '<input type="radio" id="is_chromic_skin" name="audiotube_options[is_chromic_skin]" %s />',
            (isset( $this->options['is_chromic_skin']) && esc_attr( $this->options['is_chromic_skin']) == 'true' ) ? 'checked="checked"' : 'checked="false"'
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="title" name="audiotube_options[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }
}

