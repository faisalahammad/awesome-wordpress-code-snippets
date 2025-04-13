<?php
/**
 * Use jQuery to replace product thumbnails with full-size images in admin
 *
 * @author: Faisal Ahammad
 */
function replace_admin_thumbnails_with_fullsize_js() {
	$screen = get_current_screen();
	if ( ! $screen || $screen->base !== 'edit' || $screen->post_type !== 'product' ) {
		return;
	}

	?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		// Function to replace thumbnail URLs with full-size URLs
		function replaceWithFullSizeImages() {
			$('.column-thumb img').each(function() {
				var $img = $(this);
				var src = $img.attr('src');

				// Remove size suffix from URL (e.g., -150x150.jpg → .jpg)
				var fullSizeSrc = src.replace(/-\d+x\d+(\.[^.]+)$/, '$1');

				// Set the new source and remove srcset and sizes
				$img.attr('src', fullSizeSrc)
					.removeAttr('srcset')
					.removeAttr('sizes');
			});
		}

		// Run initially and also when list is refreshed
		replaceWithFullSizeImages();

		$(document).ajaxComplete(function() {
			setTimeout(replaceWithFullSizeImages, 100);
		});
	});
	</script>
	<?php
}

add_action( 'admin_footer', 'replace_admin_thumbnails_with_fullsize_js' );