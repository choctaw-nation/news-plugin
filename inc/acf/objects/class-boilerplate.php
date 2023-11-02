<?php
/**
 * The News Object
 * Used to create a consistent API with the ACF Fields
 *
 * @since 1.0
 * @package ChoctawNation
 * @subpackage News
 */

namespace ChoctawNation\News;

/**
 * A simple API for interacting with the ACF Fields
 */
class Boilerplate {
	private string $title;
	private ?string $about;
	private ?string $inquiry;

	/** Builds a Boilerplate object
	 *
	 * @param \WP_Post $post The selected boilerplate
	 */
	public function __construct( $post ) {
		$about         = get_field( 'about_company', $post->ID );
		$inquiry       = get_field( 'media_inquiry', $post->ID );
		$this->title   = get_the_title( $post );
		$this->about   = acf_esc_html( $about );
		$this->inquiry = acf_esc_html( $inquiry );
	}


	/**
	 * Returns the boilerplate inside a `<div>` with the `news-boilerplate` class
	 *
	 * @return string the markup
	 */
	public function get_the_boilerplate(): string {
		$markup  = "<hr class='my-4' />";
		$markup .= "<div class='news-boilerplate row my-3'>";
		$markup .= "<h2 class='news-boilerplate__headline'>About {$this->title}</h2>";
		$markup .= "<div class='news-boilerplate__about'>{$this->about}</div>";
		$markup .= "<div class='news-boilerplate__inquiry'><h3 class='news-boilerplate__inquiry-headline mt-5'>Media Inquiries</h3>{$this->inquiry}</div>";
		$markup .= '</div>';
		return $markup;
	}

	/** Echoes `get_the_boilerplate()` */
	public function the_boilerplate() {
		echo $this->get_the_boilerplate();
	}
}
