<?php require APPROOT . '/views/inc/header.php';?>

<div class="navbar">
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>
</div>

<main class="main-content">

    <div class="post-container">
        <center><h2>Publish Announcement</h2></center>
        <form action="<?php echo URLROOT;?>/Posts/create" method="POST">
            <label for="title">Announcement Title</label>
            <input type="text" name="title" id="title" placeholder="Enter announcement title" value="<?php $data['title'];?>">
            <span class="form-invalid"><?php echo $data['title_err'];?>  </span>
            <br>
            <label for="content">Announcement Content</label>
            <textarea name="body" id="body" placeholder="Enter announcement content" rows="10" cols="10" value="<?php $data['body'];?>"></textarea>
            <span class="form-invalid"><?php echo $data['body_err'];?>  </span>
            <br>
            <div class="btn-wrapper">
                <button class="post-btn">Submit</button>
                <button class="cancel-btn">Cancel</button>
            </div>    
        </form>
    </div>

</main>

<?php
require APPROOT . '/views/inc/footer.php';?>