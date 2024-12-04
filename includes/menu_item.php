<div class="card col-sm-6 col-lg-4 mt-5 ms-1 me-1" style="width: 18rem;">
    <img src="<?php echo $menu_item['image']; ?>" class="card-img-top item-display-image" alt="...">
    <div class="card-body">
        <h5 class="card-title fw-bold" style="color: #D20000;"><?php echo $menu_item['itemName']; ?></h5>
        <h6 class="fst-italic">E<?php echo $menu_item['itemPrice'] ?></h6>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        <a href="#" class="btn btn-primary">Add to cart</a>
    </div>
</div>