<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Fitness_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-fitness' ),
				'family'      => esc_html__( 'Font Family', 'vw-fitness' ),
				'size'        => esc_html__( 'Font Size',   'vw-fitness' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-fitness' ),
				'style'       => esc_html__( 'Font Style',  'vw-fitness' ),
				'line_height' => esc_html__( 'Line Height', 'vw-fitness' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-fitness' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-fitness-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-fitness-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-fitness' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-fitness' ),
        'Acme' => __( 'Acme', 'vw-fitness' ),
        'Anton' => __( 'Anton', 'vw-fitness' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-fitness' ),
        'Arimo' => __( 'Arimo', 'vw-fitness' ),
        'Arsenal' => __( 'Arsenal', 'vw-fitness' ),
        'Arvo' => __( 'Arvo', 'vw-fitness' ),
        'Alegreya' => __( 'Alegreya', 'vw-fitness' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-fitness' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-fitness' ),
        'Bangers' => __( 'Bangers', 'vw-fitness' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-fitness' ),
        'Bad Script' => __( 'Bad Script', 'vw-fitness' ),
        'Bitter' => __( 'Bitter', 'vw-fitness' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-fitness' ),
        'BenchNine' => __( 'BenchNine', 'vw-fitness' ),
        'Cabin' => __( 'Cabin', 'vw-fitness' ),
        'Cardo' => __( 'Cardo', 'vw-fitness' ),
        'Courgette' => __( 'Courgette', 'vw-fitness' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-fitness' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-fitness' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-fitness' ),
        'Cuprum' => __( 'Cuprum', 'vw-fitness' ),
        'Cookie' => __( 'Cookie', 'vw-fitness' ),
        'Chewy' => __( 'Chewy', 'vw-fitness' ),
        'Days One' => __( 'Days One', 'vw-fitness' ),
        'Dosis' => __( 'Dosis', 'vw-fitness' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-fitness' ),
        'Economica' => __( 'Economica', 'vw-fitness' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-fitness' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-fitness' ),
        'Francois One' => __( 'Francois One', 'vw-fitness' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-fitness' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-fitness' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-fitness' ),
        'Handlee' => __( 'Handlee', 'vw-fitness' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-fitness' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-fitness' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-fitness' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-fitness' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-fitness' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-fitness' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-fitness' ),
        'Kanit' => __( 'Kanit', 'vw-fitness' ),
        'Lobster' => __( 'Lobster', 'vw-fitness' ),
        'Lato' => __( 'Lato', 'vw-fitness' ),
        'Lora' => __( 'Lora', 'vw-fitness' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-fitness' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-fitness' ),
        'Merriweather' => __( 'Merriweather', 'vw-fitness' ),
        'Monda' => __( 'Monda', 'vw-fitness' ),
        'Montserrat' => __( 'Montserrat', 'vw-fitness' ),
        'Muli' => __( 'Muli', 'vw-fitness' ),
        'Marck Script' => __( 'Marck Script', 'vw-fitness' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-fitness' ),
        'Open Sans' => __( 'Open Sans', 'vw-fitness' ),
        'Overpass' => __( 'Overpass', 'vw-fitness' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-fitness' ),
        'Oxygen' => __( 'Oxygen', 'vw-fitness' ),
        'Orbitron' => __( 'Orbitron', 'vw-fitness' ),
        'Patua One' => __( 'Patua One', 'vw-fitness' ),
        'Pacifico' => __( 'Pacifico', 'vw-fitness' ),
        'Padauk' => __( 'Padauk', 'vw-fitness' ),
        'Playball' => __( 'Playball', 'vw-fitness' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-fitness' ),
        'PT Sans' => __( 'PT Sans', 'vw-fitness' ),
        'Philosopher' => __( 'Philosopher', 'vw-fitness' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-fitness' ),
        'Poiret One' => __( 'Poiret One', 'vw-fitness' ),
        'Quicksand' => __( 'Quicksand', 'vw-fitness' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-fitness' ),
        'Raleway' => __( 'Raleway', 'vw-fitness' ),
        'Rubik' => __( 'Rubik', 'vw-fitness' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-fitness' ),
        'Russo One' => __( 'Russo One', 'vw-fitness' ),
        'Righteous' => __( 'Righteous', 'vw-fitness' ),
        'Slabo' => __( 'Slabo', 'vw-fitness' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-fitness' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-fitness'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-fitness' ),
        'Sacramento' => __( 'Sacramento', 'vw-fitness' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-fitness' ),
        'Tangerine' => __( 'Tangerine', 'vw-fitness' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-fitness' ),
        'VT323' => __( 'VT323', 'vw-fitness' ),
        'Varela Round' => __( 'Varela Round', 'vw-fitness' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-fitness' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-fitness' ),
        'Volkhov' => __( 'Volkhov', 'vw-fitness' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-fitness' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-fitness' ),
			'100' => esc_html__( 'Thin',       'vw-fitness' ),
			'300' => esc_html__( 'Light',      'vw-fitness' ),
			'400' => esc_html__( 'Normal',     'vw-fitness' ),
			'500' => esc_html__( 'Medium',     'vw-fitness' ),
			'700' => esc_html__( 'Bold',       'vw-fitness' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-fitness' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-fitness' ),
			'italic'  => esc_html__( 'Italic', 'vw-fitness' ),
			'oblique' => esc_html__( 'Oblique', 'vw-fitness' )
		);
	}
}