<div id="subproductModal" class="modal fade" tabindex="-1" aria-labelledby="subproductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subproductModalLabel">Add Subproduct</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="subproductForm" action="{{ route('subproducts.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="">
                    <div class="mb-3">
                        <label for="subproduct_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="subproduct_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="subproduct_detail" class="form-label">Detail</label>
                        <textarea class="form-control" id="subproduct_detail" name="detail" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="subproduct_image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="subproduct_image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="subproduct_price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="subproduct_price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="subproduct_prod_desc" class="form-label">Product Description</label>
                        <textarea class="form-control" id="subproduct_prod_desc" name="prod_desc"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="subproductForm" class="btn btn-primary">Save Subproduct</button>
            </div>
        </div>
    </div>
</div>
