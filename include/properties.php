<!-- properties -->
<?php 
    if(count($properties) > 0):
    foreach($properties as $property):
?>
  <div class="col-lg-4 col-sm-6">
      <?php include 'property.php'; ?>
  </div>
    <?php 
        endforeach;
        else:
    ?>
    <p>Er zijn geen resultaten met deze filter criteria</p>
    <?php endif; ?>
  <!-- properties -->