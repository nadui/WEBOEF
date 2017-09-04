<div class="hot-properties hidden-xs">
    <h4>Cheapest Properties</h4>
    <?php foreach(PropertyDB::getCheapest(5) as $propertyCheap): ?>
    <div class="row">
      <div class="col-lg-4 col-sm-5">
        <img src="images/properties/<?php echo firstImage($propertyCheap->images); ?>" class="img-responsive img-circle" alt="properties"/>
      </div>
      <div class="col-lg-8 col-sm-7">
        <h5><a href="property-detail.php?id=<?php echo $propertyCheap->propertyid; ?>"><?php echo $propertyCheap->title; ?></a></h5>
        <p class="price">$<?php echo $propertyCheap->price; ?></p>
      </div>
    </div>
    <?php endforeach; ?>
</div>