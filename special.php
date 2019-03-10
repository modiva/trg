<?php

require_once("../../../wp-load.php");

if (isset($_GET['special'])) {
  $special = $_GET['special'];
  //echo $special;
} else {
  //Handle the case where there is no parameter
  //redirect to previous page with message or 404 error page
}

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

			get_template_part( 'template-parts/content-page-special', 'special' );

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
