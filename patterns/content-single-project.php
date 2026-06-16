<?php
/**
 * Title: Content Single Project
 * Slug: pealutz/content-single-project
 * Description: Single project.
 * Categories: pealutz
 * Keywords: job, experience, employment
 */
$taxonomy     = 'project_type';
$term         = 'job';
$project_type = has_term( $term, $taxonomy ) ? $term : 'project';

if( $term === $project_type ) :
    ?>
        <!-- wp:pattern {"slug":"pealutz/content-project-type-job"} /-->
    <?php
else :
    ?>
        <!-- wp:pattern {"slug":"pealutz/content-project-type-project"} /-->
    <?php
endif;
