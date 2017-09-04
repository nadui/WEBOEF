<?php 
    include 'templates/header.php';
    if(isset($_GET["type"]) || isset($_GET["price"]) || isset($_GET["propertytype"])) {
        $type = isset($_GET["type"]) ? $_GET["type"] : "";
        $price = isset($_GET["price"]) ? $_GET["price"] : "";
        $propertytype = isset($_GET["propertytype"]) ? $_GET["propertytype"] : "";
        $properties = PropertyDB::getFiltered($type, $price, $propertytype);
    } else {
        $properties = PropertyDB::getAll();
    }
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Buy, Sale & Rent</span>
    <h2>Buy, Sale & Rent</h2>
  </div>
</div>
<!-- banner -->


<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <!-- sidebar -->
      <div class="col-lg-3 col-sm-4 ">
        <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
          <div class="row">
            <div class="col-lg-5">
              <select class="form-control filter" name="type">
                <option value="0">Type</option>
                <option value="buy">Buy</option>
                <option value="rent">Rent</option>
                <option value="sale">Sale</option>
              </select>
            </div>
            <div class="col-lg-7">
              <select class="form-control filter" name="price">
                <option value="0">Price</option>
                <option value="150000">$150,000 - $200,000</option>
                <option value="200000">$200,000 - $250,000</option>
                <option value="250000">$250,000 - $300,000</option>
                <option value="300000">$300,000 - above</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <select class="form-control filter" name="propertytype">
                <option value="0">Property Type</option>
                <option value="apartment">Apartment</option>
                <option value="building">Building</option>
                <option value="officespace">Office Space</option>
              </select>
            </div>
          </div>
          
        </div>
        
        <?php include 'include/cheapest.php'; ?>
      </div>
      <!-- end sidebar -->
      
      <div class="col-lg-9 col-sm-8">
        <div class="row" id="properties">
          <?php include "include/properties.php"; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'templates/footer.php';?>