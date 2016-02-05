<h3><?= $title; ?></h3>
<a class="btn btn-success pull-right" href="<?= site_url('blog/insert'); ?>">Create a new post</a>
<br><br>
<div>
    <?php foreach ($posts as $post): ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= $post->getTitle(); ?>
                <span class="badge pull-right">
                    Published On: <?= $post->getPublicationDate()->format('Y-m-d H:i:s'); ?>
                </span>
            </div>
            <div class="panel-body">
                <?= $post->getBody(); ?>
                <br>
                <a class="btn btn-danger pull-right" href="<?= site_url('blog/delete/' . $post->getId()); ?>">Delete</a>
                <a class="btn btn-warning pull-right" href="<?= site_url('blog/edit/' . $post->getId()); ?>"
                   style="margin-right: 3px">Edit</a>
                <a class="btn btn-success pull-right" href="<?= site_url('blog/comments/' . $post->getId()); ?>"
                   style="margin-right: 3px">View</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>