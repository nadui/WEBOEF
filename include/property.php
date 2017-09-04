<div class="properties">
<div class="image-holder">
  <img src="images/properties/<?php echo firstImage($property->images); ?>" class="img-responsive" alt="properties"/>
    <?php if($property->sold == 1): ?>
  <div class="status sold">Sold</div>
    <?php endif; ?>
</div>
<h4><a href="property-detail.php?id=<?php echo $property->propertyid; ?>"><?php echo $property->title; ?></a></h4>
<p class="price">Price: $<?php echo $property->price; ?></p>
<div class="listing-detail">
  <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $property->bedrooms; ?></span>
  <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?php echo $property->livingrooms; ?></span>
  <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?php echo $property->parking; ?>2</span>
  <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?php echo $property->kitchen; ?></span>
</div>
<a class="btn btn-primary" href="property-detail.php?id=<?php echo $property->propertyid; ?>">View Details</a>
</div>