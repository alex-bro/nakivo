<div class="row posts-wrapper <?php if($post_type == 'all') echo 'active'; ?>" data-cat-posts="<?php echo $post_type ?>" >
    <?php foreach($items as $item): ?>
        <?php include get_template_directory().DIRECTORY_SEPARATOR.'template-parts'.DIRECTORY_SEPARATOR.'news'.DIRECTORY_SEPARATOR.'post-item.php'; ?>
    <?php endforeach; ?>
</div>