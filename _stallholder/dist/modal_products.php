<!-- ADD PRODUCT -->
<div class="modal fade" id="modalAddProducts">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-primary">
      <!-- HEADER -->
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="addStallProduct" method="POST" action="includes/products_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <input type="hidden" class="stallholder-id" id="stallholderId" name="stallholder_id" hidden>
          <!-- STALL ID -->
          <input type="hidden" class="stall-id" id="stallId" name="stall_id" hidden>
          <!-- SECTION ID -->
          <input type="hidden" class="section-id" id="sectionId" name="section_id" hidden>
          <!-- PRODUCTS -->
          <div class="main-form mt-3 border-bottom">
            <div class="form-group mb-2">
              <label for="">Product Name</label>
              <div class="input-group mb-2">
                <input type="text" name="product_name[]" class="form-control" placeholder="Enter Product Name" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fa fa-box"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="add-new-form mb-2"></div>
          <p class="text-primary text-bold m-0">
            <i class="fa fa-plus-square pr-1"></i>
            Proceeding with this operation will add all these products to your stall. Please double-check all product names.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button class="btn btn-success mr-auto add-more-product">
          <i class="fa fa-plus"></i>
          Add more product
        </button>
        <button type="button" class="btn btn-default " data-dismiss="modal">
          <i class="fa fa-close"></i>
          Close
        </button>
        <button type="submit" form="addStallProduct" class="btn btn-primary " name="add_stall_product">
          <i class="fa fa-check"></i>
          Save
        </button>
      </div>
    </div>
  </div>
</div>

<!-- EDIT PRODUCT -->
<div class="modal fade" id="modalEditProduct">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-success">
      <!-- HEADER -->
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white">Edit a Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formEditStallProduct" method="POST" action="includes/products_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <div class="d-flex flex-column">
            <!-- ID -->
            <input type="hidden" class="product-id" id="editProductId" name="edit_product_id" hidden>
            <input type="hidden" class="stall-id" id="stallId" name="stall_id" hidden>
            <div class="input-group mb-2">
              <input type="text" class="form-control product-name" id="editProductName" name="edit_product_name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-box"></span>
                </div>
              </div>
            </div>
            <p class="text-success text-bold m-0">
              <i class="fa fa-edit pr-1"></i>
              Proceeding with this operation will edit this product's name.
            </p>
            <!-- <div class="input-group mb-2">
              <input type="text" class="form-control product-price" id="editProductPrice" name="edit_product_price"
                placeholder="Enter a price" onkeypress="return /[0-9]/i.test(event.key)" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-tag"></span>
                </div>
              </div>
            </div> -->
          </div>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">
          <i class="fa fa-close"></i>
          Close
        </button>
        <button type="submit" form="formEditStallProduct" class="btn btn-success " name="edit_stall_product">
          <i class="fa fa-check"></i>
          Edit
        </button>
      </div>
    </div>
  </div>
</div>

<!-- DELETE PRODUCT -->
<div class="modal fade" id="modalDeleteProduct">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-danger">
      <!-- HEADER -->
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Delete a Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formDeleteStallProduct" method="POST" action="includes/products_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <div class="d-flex flex-column">
            <!-- ID -->
            <input type="hidden" class="product-id" id="deleteProductId" name="delete_product_id" hidden>
            <input type="hidden" class="stall-id" id="stallId" name="stall_id" hidden>
            <div class="text-center">
              <p class="mb-2">Are you sure you want to delete this product?</p>
              <!-- FULL NAME -->
              <h2 class="bold mb-2 product-name" id="deleteProductName"></h2>
              <p class="text-danger text-bold m-0">
                <i class="fa fa-exclamation-triangle pr-1"></i>
                Proceeding with this operation will erase this product from this stall permanently.
              </p>
            </div>
          </div>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">
          <i class="fa fa-close"></i>
          Close
        </button>
        <button type="submit" form="formDeleteStallProduct" class="btn btn-danger " name="delete_stall_product">
          <i class="fa fa-check"></i>
          Delete
        </button>
      </div>
    </div>
  </div>
</div>

<!-- DELETE ALL PRODUCT -->
<div class="modal fade" id="modalDeleteAllProducts">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-danger">
      <!-- HEADER -->
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Delete All Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body d-flex flex-column justify-content-center align-items-center">
        <i class="fa fa-exclamation-triangle fa-5x text-danger mb-3"></i>
        <h5 class="text-center">Are you sure you want to delete all this stall's products?</h5>
        <p class="text-center text-danger text-bold">
          Proceeding with this operation will erase all products of stall this permanently.
        </p>
        <!-- FORM -->
        <form class="form-horizontal" id="formDeleteStallProduct" method="POST" action="includes/products_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <input type="hidden" class="stall-id" id="stallId" name="stall_id" hidden>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">
          <i class="fa fa-close"></i>
          Close
        </button>
        <button type="submit" form="formDeleteStallProduct" class="btn btn-danger " name="delete_all_products">
          <i class="fa fa-trash"></i>
          Delete
        </button>
      </div>
    </div>
  </div>
</div>