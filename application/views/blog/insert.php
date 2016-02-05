<h3><?= $title; ?></h3>

<div>
    <form action="<?= site_url('blog/insert');?>" method="post">
        <div class="form-group">
            <label for="post-title">Title:</label>
            <input type="text" class="form-control" name="post-title" id="post-title">
        </div>
        <div class="form-group">
            <label for="post-body">Body:</label>
            <textarea class="form-control" name="post-body" id="post-body" rows="8">
            </textarea>
        </div>
        <a class="btn btn-danger" href="<?= site_url('blog'); ?>">Back</a>
        <button type="submit" value="insert" name="insert" class="btn btn-primary">Add</button>
    </form>
</div>