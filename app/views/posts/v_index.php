<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>

<center><h1>Announcements</h1></center>
<?php foreach($data['posts'] as $post): ?>
<div class="post-index-container">
    <div class="post-header">
        <div class="post-user-name"><?php echo $post->user_name;?></div>
        <div class="post-created-at"><?php echo $post->post_created_at;?></div>
    </div>
    <div class="post-body">
        <div class="post-title"><?php echo $post->title;?></div>
        <div class="post-content"><?php echo $post->body;?></div>
    </div>
    <!-- <div class="post-footer">
        <div class="Post-likes">Likes 0</div>
        <div class="post-dislikes">Dislikes 0</div>
    </div> -->
</div>
<?php endforeach;?>

<?php
require APPROOT . '/views/inc/footer.php';?>