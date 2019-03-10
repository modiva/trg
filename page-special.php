<?php
/* Template Name: Special 2 */
/**
 *
 * @package Turquoise_Reef_Group
 */

//define('WP_USE_THEMES', true);
//include('http://199.250.214.111/~turquoise19/wp-blog-header.php');
require_once('http://199.250.214.111/~turquoise19/wp-load.php');


if (isset($_GET['special'])) {
  $special = $_GET['special'];
} else {
  //Handle the case where there is no parameter
  //redirect to previous page with message or 404 error page
}

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			//echo 'from main template page - special is # '.$special;
			while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-page-special', 'special' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
