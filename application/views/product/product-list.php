<div>
    <h3><?= $title; ?></h3>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Actions</th>
        </tr>
        <?php $i=0; foreach($products as $product):  $i++; ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $product->getName(); ?></td>
                <td>
                    <a class="btn btn-success" href="<?= site_url('products/edit/' . $product->getId());?>">Edit</a>
                    <a class="btn btn-danger" href="<?= site_url('products/delete/' . $product->getId());?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a class="btn btn-primary pull-right" href="<?= site_url('products/insert'); ?>">Insert New Product</a>
    <br>
</div>