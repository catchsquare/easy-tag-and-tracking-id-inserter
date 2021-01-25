<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Easy_Tag_And_Tracking_Id_Inserter
 * @subpackage Easy_Tag_And_Tracking_Id_Inserter/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Easy_Tag_And_Tracking_Id_Inserter
 * @subpackage Easy_Tag_And_Tracking_Id_Inserter/public
 * @author     catchsquare <wearecatchsquare@gmail.com>
 */
class Easy_Tag_And_Tracking_Id_Inserter_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;


	private $easy_tag_and_tracking_id_inserter_setting_google_webmaster;
	private $easy_tag_and_tracking_id_inserter_setting_google_analytical;
	private $easy_tag_and_tracking_id_inserter_setting_google_tag_manager;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->easy_tag_and_tracking_id_inserter_setting_google_webmaster = get_option('easy_tag_and_tracking_id_inserter_google_webmaster');
		$this->easy_tag_and_tracking_id_inserter_setting_google_analytical = get_option('easy_tag_and_tracking_id_inserter_google_analytical');
		$this->easy_tag_and_tracking_id_inserter_setting_google_tag_manager = get_option('easy_tag_and_tracking_id_inserter_google_tag_manager');

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Tag_And_Tracking_Id_Inserter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Tag_And_Tracking_Id_Inserter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/easy-tag-and-tracking-id-inserter-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Tag_And_Tracking_Id_Inserter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Tag_And_Tracking_Id_Inserter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-tag-and-tracking-id-inserter-public.js', array( 'jquery' ), $this->version, false );

		wp_localize_script(  
			$this->plugin_name,
			'EASY_TAG_AND_TRACKING_ID_INSERTER_GOOGLE_ANALYTICAL',
			array(
				'google_tag_manager' => $this->easy_tag_and_tracking_id_inserter_setting_google_tag_manager,
			)
		);
	}

	public function add_google_webmaster(){
		$google_webmaster_enable = !empty($this->easy_tag_and_tracking_id_inserter_setting_google_webmaster['google-webmaster']) ? $this->easy_tag_and_tracking_id_inserter_setting_google_webmaster['google-webmaster'] : false;

		$google_webmaster_code = !empty($this->easy_tag_and_tracking_id_inserter_setting_google_webmaster['google-webmaster-code']) ? $this->easy_tag_and_tracking_id_inserter_setting_google_webmaster['google-webmaster-code'] : false;
		
		if ($google_webmaster_enable && "yes" == $google_webmaster_enable && $google_webmaster_code ) {
			printf(
				'<!--  Added by Easy Tag and Tracking id inserter plugin -->
			<meta name="google-site-verification" content="%s" />',
				$google_webmaster_code
			);
		}
	}


	public function add_google_analytical(){
		$google_analytics_enable = !empty($this->easy_tag_and_tracking_id_inserter_setting_google_analytical['google-analytics-enable']) ? $this->easy_tag_and_tracking_id_inserter_setting_google_analytical['google-analytics-enable'] : false;

		$google_analytics_id = !empty ($this->easy_tag_and_tracking_id_inserter_setting_google_analytical['google-analytics']) ? $this->easy_tag_and_tracking_id_inserter_setting_google_analytical['google-analytics'] : false ;
		if( $google_analytics_enable && "yes" == $google_analytics_enable && $google_analytics_id ){
			printf(
				'%2$s<!-- Global site tag (gtag.js) - Google Analytics  Added by Easy Tag and Tracking id inserter plugin -->
				<script async src="//www.googletagmanager.com/gtag/js?id=%1$s"></script>
				<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag("js", new Date());
				gtag("config", "%1$s");
				</script>%2$s',
				$google_analytics_id,
				" \r\n "
			);
		}
	}

	
	public function add_google_tag_manager(){
		$google_tag_manager_enable = !empty($this->easy_tag_and_tracking_id_inserter_setting_google_tag_manager['google-tag-manager-enable']) ? $this->easy_tag_and_tracking_id_inserter_setting_google_tag_manager['google-tag-manager-enable'] : false;
		
		$google_tag_manager_id = !empty($this->easy_tag_and_tracking_id_inserter_setting_google_tag_manager['google-tag-manager']) ? $this->easy_tag_and_tracking_id_inserter_setting_google_tag_manager['google-tag-manager'] : false;
		if ($google_tag_manager_enable && "yes" == $google_tag_manager_enable && $google_tag_manager_id ) {
			printf(
				"\r\n<!-- Google Tag Manager Added by Easy Tag and Tracking id inserter plugin -->
				<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				})(window,document,'script','dataLayer','%s');</script>
				 \r\n<!-- End Google Tag Manager  Added by Easy Tag and Tracking id inserter plugin --> \r\n",
				$google_tag_manager_id
			);
		}
	}

}
