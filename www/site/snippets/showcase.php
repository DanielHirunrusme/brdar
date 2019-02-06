<?php
$projects = page('projects')->children()->visible();
$project_index = -1;
?>

<div class="projects">
<?php foreach($projects as $project): ?>
    <div class="project">
    <div class="project-meta in-view mobile">
        <h2><?php echo $project->title(); ?></h2>
        <h3><?php echo $project->subtitle(); ?></h3>
        <p><?php echo $project->caption(); ?></p>
    </div>
    <?php foreach($project->images()->sortBy('sort', 'asc') as $image): $project_index++; ?>
        <?php if($image->clear()->bool()): ?><br><?php endif; ?>
        <div 
        data-index="<?php echo $project_index; ?>" 
        class="project-image in-view caption-<?php echo $image->caption_placement()->val() ?> offset-<?php echo $image->offset()->val() ?> span-<?php echo $image->span()->val() ?> <?php if($image->clear()->bool()): ?>clear<?php endif; ?>">
        <img 
        alt="<?php echo $project->title(); ?>"
        data-sizes="auto"
        src="<?php echo thumb($image, array('width' => 100, 'blur' => 5))->url(); ?>"
        data-srcset="<?php echo thumb($image, array('width' => 600))->url(); ?> 500w,
            <?php echo thumb($image, array('width' => 1200))->url(); ?> 1024w,
            <?php echo thumb($image, array('width' => 1600))->url(); ?> 1600w"

        class="lazyload" />
        <?php if($image->hide_caption()->bool() != true ): ?>
            <div class="project-meta desktop">
                <h2><?php echo $project->title(); ?></h2>
                <?php if($image->custom_caption() == '' ): ?>
                    <h3><?php echo $project->subtitle()->kt(); ?></h3>
                    <p><?php echo $project->caption(); ?></p>
                <?php else:  ?>
                    <h3><?php echo $image->custom_caption()->kt(); ?></h3>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>
    <!-- /project -->
<?php endforeach; ?>
</div>