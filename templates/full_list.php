<?php
    $project_list = get_posts(array(
        'posts_per_page'   => $settings['project_number'],
        'post_type'        => 'project',
    ));
?>
<div class="bison-projects <?php echo $settings['container_class']. ' ' . $settings['orientation']; ?>" id="<?php echo $settings['id']; ?>">
    <div class="project-list">
        <?php foreach( $project_list as $project ): 
            include 'individual.php';
        endforeach; ?>
    </div>
</div>
