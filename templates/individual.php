<?php 
    $term = get_the_category( $project->ID );
?>
<div class="project <?php echo project_categories_string( $project->ID ); ?> project-<?php echo $project->post_name; ?>" id="project-<?php echo $project->ID; ?>">
    <?php echo get_the_post_thumbnail( $project->ID ); ?>
    <?php echo apply_filters( "the_title",$project->post_title ); ?>
    <?php echo apply_filters( "the_content",$project->post_content ); ?>
</div>