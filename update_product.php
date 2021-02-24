<?php


include "product_class.php";

$update = new Products();

if (isset($_POST["edit_id"])) {
  $editId = $_POST["edit_id"];
  $product = $update->displyaRecordById($editId);
}

?>

  <div class="row g-3 mb-4">
  <div class="col-sm-6">
  <label for="name">Model</label>
    <input type="text" class="form-control" name="model" value="<?php echo $product['model']; ?>" >
  </div>
  <div class="col-sm">
  <label for="email">Title:</label>
    <input type="text" class="form-control" name="title" value="<?php echo $product['title']; ?>">
  </div>
</div>
<div class="row g-3 mb-4">
  <div class="col-sm-4">
  <label for="username">Display</label>
    <input type="text" class="form-control" name="display" value="<?php echo $product['display']; ?>">
  </div>
  <div class="col-sm">
  <label for="email">Battery</label>
    <input type="text" class="form-control" name="battery" value="<?php echo $product['battery']; ?>">
  </div>
  <div class="col-sm">
  <label for="email">Qty</label>
    <input type="text" class="form-control" name="qty" value="<?php echo $product['qty']; ?>">
  </div>
</div>
  <div class="row g-3">
  <div class="col-sm-4">
  <label for="username">Hardware</label>
    <input type="text" class="form-control"  name="hardware" value="<?php echo $product['hardware']; ?>">
  </div>
  <div class="col-sm">
  <label for="username">Price</label>
    <input type="text" class="form-control"  name="price" value="<?php echo $product['price']; ?>">
  </div>
  <div class="col-sm">
  <label for="username">Camera</label>
    <input type="text" class="form-control"  name="camera" value="<?php echo $product['camera']; ?>">
  </div>
</div>
  <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

  </div>
