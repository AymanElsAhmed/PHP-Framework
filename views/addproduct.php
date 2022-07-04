<div class="container">
    <div class="d-flex my-3">
        <div class="me-auto p-3">Product List</div>
        <button type="submit" class="btn btn-primary mx-1" id="submit">
            Save
        </button>
        <button type="button" class="btn btn-danger mx-1" id="cancel">
            Cancel
        </button>
    </div>
    <hr />
    <form method="post" id="form">
        <div class="row mb-3">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sku" />
            </div>
        </div>
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" />
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-labe" for="productType"
            >Type Switcher</label
            >
            <div class="col-sm-10">
                <select class="form-select" id="productType">
                    <option selected>Type Switcher</option>
                    <option value="DVD" id="DVD">DVD</option>
                    <option value="Book" id="Book">Book</option>
                    <option value="Furniture" id="Furniture">Furniture</option>
                </select>
            </div>
        </div>
        <div id="DVD-ele" style="display: none">
            <div class="row mb-3">
                <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="size" />
                </div>
            </div>
        </div>
        <div id="Furniture-ele" style="display: none">
            <div class="row mb-3">
                <label for="height" class="col-sm-2 col-form-label"
                >height (CM)</label
                >
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="height" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="width" class="col-sm-2 col-form-label"
                >width (CM)</label
                >
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="width" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="length" class="col-sm-2 col-form-label"
                >length (CM)</label
                >
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="length" />
                </div>
            </div>
        </div>
        <div id="Book-ele" style="display: none">
            <div class="row mb-3">
                <label for="weight" class="col-sm-2 col-form-label"
                >Weight (KG)</label
                >
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="weight" />
                </div>
            </div>
        </div>
    </form>
    <hr />
</div>
<!--<script src="script.js"></script>
--><?php
/*echo __DIR__;
*/?>