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
            'setting_section_id', // ID
            'My Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'audiotube_settings_admin' // Page
        );  

        add_settings_field(
            'classic_skin', // ID
            'Classic Skin', // Title 
            array( $this, 'classic_skin_callback' ), // Callback
            'audiotube_settings_admin', // Page
            'setting_section_id' // Section           
        );    

        add_settings_field(
            'elegant_skin', // ID
            'Elegant Skin', // Title 
            array( $this, 'elegant_skin_callback' ), // Callback
            'audiotube_settings_admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'title', 
            'Title', 
            array( $this, 'title_callback' ), 
            'audiotube_settings_admin', 
            'setting_section_id'
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
        if( isset( $input['classic_skin'] ) ) echo absint($input['classic_skin']) ;
            $new_input['audiotube_skin'] = absint($input['classic_skin']) ;

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
    public function classic_skin_callback()
    { 
        printf(
            '<input type="radio" id="classic_skin" value="classic" name="audiotube_options[classic_skin]" %s />',
            (isset( $this->options['audiotube_skin']) && esc_attr( $this->options['audiotube_skin'] == 'classic') ) ? 'checked="checked"' : ''
        );
    }
	
    public function elegant_skin_callback()
    { 
        printf(
            '<input type="radio" id="elegant_skin" value="elegant" name="audiotube_options[elegant_skin]" %s />',
            (isset( $this->options['audiotube_skin']) && esc_attr( $this->options['audiotube_skin'] == 'elegant') ) ? 'checked="checked"' : ''
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

