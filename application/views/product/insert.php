<div>
    <form action="<?= site_url('products/insert');?>" method="post">
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Product">
        </div>
        <a class="btn btn-danger">Back</a>
        <button type="submit" class="btn btn-primary" name="insertProduct" value="insert">Add Product</button>
    </form>
</div>