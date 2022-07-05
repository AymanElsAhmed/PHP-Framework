<div class="container">
    <div class="d-flex my-3">
        <div class="me-auto p-3">Product List</div>
        <a type="button" href="/addproduct" class="btn btn-primary mx-1 text-center">
            Add
        </a>
        <button type="button" class="btn btn-danger mx-1">Mass Delete</button>
    </div>
    <hr />
    <?php
    foreach ($model as $row) {
    ?>

        <div class="row mb-3 mt-3">

            <div class="card text-center col-lg-3">
                <div class="card-body">
                    <input class="form-check-input card-title d-start text-start" type="checkbox" value="" id="flexCheckDefault" />
                    <h6 class="card-text">SKU:<?= $row['sku'] ?></h6>
                    <h6 class="card-text">Name <?= $row['name'] ?></h6>
                    <h6 class="card-text">Price <?= $row['price'] ?></h6>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <hr />
</div>