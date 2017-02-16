<?php
// Create a new search widget for the directory search form
/**
 * Search widget class
 *
 * @since 2.8.0
 */
class WP_Widget_Directory_Search extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_search', 'description' => __( "A search form which will search the WY homes Directory site.") );
		parent::__construct( 'directory-search', 'Directory Search', $widget_ops );
	}

	public function create_form_html( $id ) {
		ob_start(); ?>
		<form role="search" method="get" id="<?php echo $id; ?>" class="searchform directory-searchform" action="http://directory.wyhomesearch.com/" target="_blank">
			<label class="screen-reader-text" for="ls">Search for local plumbers, electricians, contractors, and more.</label>
			<select name="ls" id="ls">
				<option value="" disabled selected>Search Category</option>
					<option value="Affiliates">Affiliates
					<option value="Appraisers">Appraisers
					<option value="Cable/Satallite &amp; Internet Providers">Cable/Satallite &amp; Internet Providers</option>
					<option value="Carpet Cleaning/Stretching">Carpet Cleaning/Stretching</option>
					<option value="Decorators &amp; Staging">Decorators &amp; Staging</option>
					<option value="Draperies, Blinds &amp; Curtains">Draperies, Blinds &amp; Curtains</option>
					<option value="Flooring, Carpet &amp; Tile">Flooring, Carpet &amp; Tile</option>
					<option value="Furniture Dealers">Furniture Dealers</option>
					<option value="Garden &amp; Landscaping">Garden &amp; Landscaping</option>
					<option value="Hardware &amp; Lumber">Hardware &amp; Lumber</option>
					<option value="Heating &amp; Cooling">Heating &amp; Cooling</option>
					<option value="Home Appliance">Home Appliance</option>
					<option value="Home Builders &amp; Contractors">Home Builders &amp; Contractors</option>
					<option value="Home Inspection">Home Inspection</option>
					<option value="Home Security">Home Security</option>
					<option value="Insurance">Insurance</option>
					<option value="Interior Designers &amp; Decorators">Interior Designers &amp; Decorators</option>
					<option value="Internet Providers">Internet Providers</option>
					<option value="Kitchen &amp; Bath">Kitchen &amp; Bath</option>
					<option value="Lawn">Lawn</option>
					<option value="Mortgages">Mortgages</option>
					<option value="Patio &amp; Deck">Patio &amp; Deck</option>
					<option value="Paving &amp; Concrete Contractors">Paving &amp; Concrete Contractors</option>
					<option value="Pest Control">Pest Control</option>
					<option value="Plumbing &amp; Electric">Plumbing &amp; Electric</option>
					<option value="Property Management">Property Management</option>
					<option value="Radon Testing">Radon Testing</option>
					<option value="Rain Gutters">Rain Gutters</option>
					<option value="Roofing &amp; Siding">Roofing &amp; Siding</option>
					<option value="Septic Tanks &amp; Systems">Septic Tanks &amp; Systems</option>
					<option value="Sewer">Sewer</option>
					<option value="Storage">Storage</option>
					<option value="Title Companies">Title Companies</option>
					<option value="Utilities">Utilities</option>
					<option value="Water Well Drilling">Water Well Drilling</option>
					<option value="Windows &amp; Doors">Windows &amp; Doors</option>
			</select>
			<label class="screen-reader-text" for="location">Near City, County, or Zip</label>
			<input type="text" value="" name="location" id="location" placeholder="Enter city, county, or zip" />
			<input type="submit" id="directorysearchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
		</form>
		<?php
		$formoutput = ob_get_contents();
		ob_get_clean();

		return $formoutput;
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// Use our custom searchform
		echo $this->create_form_html( 'directory-searchform' );

		echo $args['after_widget'];
	}

	/**
	 * @param array $instance
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}

	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

}

// Calls that new search function

function wyhomes_directory_search_widget() {
	register_widget( 'WP_Widget_Directory_Search' );
}

add_action( 'widgets_init', 'wyhomes_directory_search_widget' );