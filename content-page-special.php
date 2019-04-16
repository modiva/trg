<link rel="stylesheet" href="http://199.250.214.111/~turquoise19/wp-content/plugins/trg-specials/includes/datepicker.css">
<?php
/**
 * Template part for displaying special content in page-specials.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Turquoise_Reef_Group
 */
if (isset($_GET['special'])) {
  $special = $_GET['special'];
} else {
  //Handle the case where there is no parameter
  //redirect to previous page with message or 404 error page
}
//echo $special;
?>

<article id="post-<?php echo $special; //the_ID(); ?>" <?php post_class(); ?> style="text-align:center;">
	<header class="entry-header">
		<h1 style="margin: 40px 0 0px;">Special</h1>
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content" style="text-align:center; width:75%;margin:auto;">
		<?php
		the_content();
		
    		global $wpdb;
    		$result = $wpdb->get_results ( "SELECT * FROM wp_spectrg_specials WHERE specials_id = $special"  );
    		foreach ( $result as $print )   {
			 $image_thumb = wp_get_attachment_image_src($print->specials_image_id, 'fullsize');
			 $price_raw = $print->specials_price;
			 $price_formatted = number_format( $price_raw, 2, ".", "," );

			 echo '<h3 style="margin: 0;text-transform: capitalize;">'.$print->specials_title.'</h3>';
			 echo '<h4 style="margin: 0 0 20px;text-transform: capitalize;">'.$print->specials_location.'</h4>';
			 echo "<div><img id='image-preview' src='". $image_thumb[0] ."' width='100%'></div>";
			 echo '<div style="margin: 40px 0 20px;">'.$print->specials_description.'</div>';
			 echo '<div style="margin: 40px 0 20px;">Two people: $'.$price_formatted.' USD plus taxes.<BR>For additional people or nights please call us at 800-538-6802.</div>';
			 echo '<h4>BOOK NOW!</h4>';
    		}

		gravity_form( 1, false, false, false, '', false );
		?>

	</div><!-- .entry-content -->
		
	<div style="margin:40px;"><a href="http://199.250.214.111/~turquoise19/">Click here to see all current specials</a></div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'turquoise-reef-group' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
