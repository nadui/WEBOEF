<?php 
    include 'templates/header.php';
    if(!isset($_GET["id"]) || !$property = PropertyDB::getById($_GET["id"])) {
        header("location: index.php");
    }
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / <?php echo $property->type; ?></span>
    <h2><?php echo $property->type; ?></h2>
  </div>
</div>
<!-- banner -->


<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-lg-3 col-sm-4 hidden-xs">
        <?php include 'include/cheapest.php'; ?>
      </div>

      <div class="col-lg-9 col-sm-8 ">

        <h2><?php echo $property->title; ?></h2>
        <div class="row">
          <div class="col-lg-8">
            <div class="property-images">
              <!-- Slider Starts -->
                <?php $images = getImages($property->images);?>
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators hidden-xs">
                    <?php for($i = 0; $i < count($images); $i++): ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php echo $i == 0 ? 'class="active"' : ''; ?>></li>
                    <?php endfor; ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach($images as $index => $image): ?>
                  <div class="item <?php echo $index == 0 ? "active" : "" ?>">
                    <img src="images/properties/<?php echo $image; ?>" class="properties" alt="properties" />
                  </div>
                <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
              </div>
              <!-- #Slider Ends -->
            </div>

            <div class="spacer">
              <h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
              <?php echo $property->description; ?>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="col-lg-12  col-sm-6">
              <div class="property-info">
                <p class="price">$ <?php echo $property->price; ?></p>
                <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $property->street . " ".  $property->number . " ".  $property->zipcode . " ". $property->city . ", " . $property->country; ?></p>
              </div>

              <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
              <div class="listing-detail">
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $property->bedrooms; ?></span>
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?php echo $property->livingrooms; ?></span>
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?php echo $property->parking; ?></span>
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?php echo $property->kitchen; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include'templates/footer.php'; /**/?>