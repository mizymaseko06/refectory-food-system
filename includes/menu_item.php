<div class="card col-sm-6 col-lg-4 mt-5 ms-1 me-1" style="width: 18rem;">
    <img src="<?php echo $menu_item['image']; ?>" class="card-img-top item-display-image" alt="...">
    <div class="card-body">
        <h5 class="card-title fw-bold" style="color: #D20000;"><?php echo $menu_item['itemName']; ?></h5>
        <h6 class="fst-italic">E<?php echo $menu_item['itemPrice'] ?></h6>
        <!-- Quantity Modifier -->
        <div class="d-flex justify-content-center align-items-center mt-3">
            <button class="btn btn-outline-primary btn-sm" onclick="decreaseQty(this)">-</button>
            <input type="number" class="form-control text-center mx-2" style="width: 60px;" value="1" min="1" readonly>
            <button class="btn btn-outline-primary btn-sm" onclick="increaseQty(this)">+</button>
        </div>
        <button class="btn btn-primary w-100 mt-3">Add to cart</button>
    </div>
</div>

<script>
    
</script>
