<?php 
    include 'templates/header.php';
?>

<div class="">
  <div id="slider" class="sl-slider-wrapper">
    <div class="sl-slider">
    <?php foreach(PropertyDB::getSlider() as $property): ?>
      <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
        <div class="sl-slide-inner">
          <div class="bg-img" style="background-image: url(images/properties/<?php echo firstImage($property->images); ?>)"></div>
          <h2><a href="property-detail.php?id=<?php echo $property->propertyid?>"><?php echo $property->title; ?></a></h2>
          <blockquote>              
            <p class="location"><span class="glyphicon glyphicon-map-marker"></span><?php echo $property->zipcode . " ". $property->city . ", " . $property->country; ?></p>
            <p><?php echo cropText($property->description); ?></p>
            <cite>$ <?php echo $property->price; ?></cite>
          </blockquote>
        </div>
      </div>
    <?php endforeach; ?>
    </div><!-- /sl-slider -->

    <nav id="nav-dots" class="nav-dots">
      <span class="nav-dot-current"></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </nav>

  </div><!-- /slider-wrapper -->
</div>

<!-- banner -->
<div class="banner-search">
  <div class="container"> 
    <h3>Buy, Sale & Rent</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <form class="row" action="buysalerent.php" method="get">
            <div class="col-lg-3 col-sm-3 ">
              <select class="form-control" name="type">
                <option value="0">Type</option>
                <option value="buy">Buy</option>
                <option value="rent">Rent</option>
                <option value="sale">Sale</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <select class="form-control" name="price">
                <option value="0">Price</option>
                <option value="150000">$150,000 - $200,000</option>
                <option value="200000">$200,000 - $250,000</option>
                <option value="250000">$250,000 - $300,000</option>
                <option value="300000">$300,000 - above</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <select class="form-control" name="propertytype">
                <option value="0">Property Type</option>
                <option value="apartment">Apartment</option>
                <option value="building">Building</option>
                <option value="officespace">Office Space</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <button class="btn btn-success">Find Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- banner -->

<div class="container">
  <div class="properties-listing spacer"> <a href="buysalerent.php" class="pull-right viewall">View All Listing</a>
    <h2>Cheapest Properties</h2>
    <div id="owl-example" class="owl-carousel">
        <?php foreach(PropertyDB::getCheapest(10) as $property): ?>
      <?php include 'property.php'; ?>
        <?php endforeach; ?>
    </div>
  </div>
</div>
<?php include'templates/footer.php';?>