<div class="row posts-wrapper <?php if(!$cat) echo 'active'; ?>" data-cat-posts="<?php echo !$cat ? '0' : $cat ?>" >
    <?php foreach($items as $item): ?>
        <?php include get_template_directory().DIRECTORY_SEPARATOR.'template-parts'.DIRECTORY_SEPARATOR.'news'.DIRECTORY_SEPARATOR.'post-item.php'; ?>
    <?php endforeach; ?>
</div>