<h3><?= $title; ?></h3>

<div>
    <form action="<?= site_url('blog/edit/'.$post->getId());?>" method="post">
        <div class="form-group">
            <label for="post-title">Title:</label>
            <input type="text" class="form-control" name="post-title" id="post-title" value="<?= $post->getTitle(); ?>">
        </div>
        <div class="form-group">
            <label for="post-body">Body:</label>
            <textarea class="form-control" name="post-body" id="post-body" rows="8">
                <?= htmlspecialchars($post->getBody()); ?>
            </textarea>
        </div>
        <a class="btn btn-danger" href="<?= site_url('blog'); ?>">Back</a>
        <button type="submit" value="update" name="update" class="btn btn-primary">Update</button>
    </form>
</div>