<h3><?= $post->getTitle(); ?></h3>

<div class="panel panel-primary">
    <div class="panel-heading">
        <?= $post->getTitle(); ?>
        <span class="badge pull-right">
                    Published On: <?= $post->getPublicationDate()->format('Y-m-d H:i:s'); ?>
                </span>
    </div>
    <div class="panel-body">
        <?= $post->getBody(); ?>
    </div>
</div>

<?php if (count($post->getComments())): ?>
    <div class="alert alert-info">Comments</div>
    <?php foreach ($post->getComments() as $comment): ?>
        <div class="panel panel-primary">
            <div class="panel-body">
                <?= $comment->getBody(); ?>
                <span class="badge pull-right">
                    Published On: <?= $comment->getPublicationDate()->format('Y-m-d H:i:s'); ?>
                </span>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert alert-warning">No Comments!</div>
<?php endif; ?>
<div>
    <form action="<?= site_url('blog/comments/' . $post->getId());?>" method="post">
        <div class="form-group">
            <label for="post-comment">Comment:</label>
            <textarea class="form-control" name="post-comment" id="post-comment" rows="8">
            </textarea>
        </div>

        <a href="<?= site_url('blog') ?>" class="btn btn-danger">Back</a>
        <button type="submit" value="comment" name="comment" class="btn btn-primary">Comment</button>
    </form>
</div>

