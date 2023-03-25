<?php
/**
 * Template part for displaying expertise section `acf/expertise`
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PeaLutz
 */

?>
<?php if ( function_exists( 'have_rows' ) ) : 
	if ( have_rows( 'skills_group' ) ) : 
	?>
	<ul class="skills-section no-bullets">

		<?php
		while ( have_rows( 'skills_group' ) ) :
			the_row();
			$section = get_sub_field( 'section' );
			$skills  = get_sub_field( 'skills' );
			?>

				<li id="section-<?php echo esc_attr( sanitize_title_with_dashes( $section ) ); ?>" class="skill-group">
					<h4 class="skill-group__heading"><?php esc_attr_e( $section ); ?></h4>
					<ul class="skill-group__list">
					<?php
					foreach( $skills as $skill ) :
						?>
						<li id="item-<?php echo esc_attr( sanitize_title_with_dashes( $skill['skill'] ) ); ?>"><?php echo $skill['skill']; ?></li>
						<?php
					endforeach;
					?>
					</ul>
				</li>

			<?php
		endwhile;
		?>

		</ul><!-- .skills-section -->
	
	<?php
	endif;
endif;
