$(function() {
  $("#owl-example").owlCarousel();
  $('.listing-detail span').tooltip('hide');
    
  var Page = (function() {
    var $nav = $( '#nav-dots > span' ),
        slitslider = $( '#slider' ).slitslider({
          onBeforeChange : function( slide, pos ) {
            $nav.removeClass( 'nav-dot-current' );
            $nav.eq(pos).addClass( 'nav-dot-current' );
          }
        }),

    init = function() {
      initEvents();
    },
    initEvents = function() {
      $nav.each(function(i) {
        $(this).on('click', function( event ) {
          var $dot = $( this );
          if( !slitslider.isActive() ) {
            $nav.removeClass( 'nav-dot-current' );
            $dot.addClass( 'nav-dot-current' );
          }
          slitslider.jump( i + 1 );
          return false;
        });
      });
    };
    
    return { init : init };

  })();

  Page.init();
    
    $('.filter').on('change', function() {
        
        type = $("select[name=type]").val();
        price = $("select[name=price]").val();
        propertytype = $("select[name=propertytype]").val();
        
        
        $.ajax({
          url: 'filter.php',
          data: {type: type, price: price, propertytype: propertytype},
          success: onSuccess,
          error: function (err) {
              console.error('Fout: ', err);
          }
        });
    });
    
    function onSuccess(data) {
        $("#properties").html(data);
    }
    
    $('#newsletter').on('click', function(e){
        var field =  $('input[name=email]');
        var value = field.val();
        
        if(value == "" || !validateEmail(value)) {
            field.css('border-color', "red");
            console.log("error");
        } else {
            $.ajax({
              url: 'mail.php',
              method: "post",
              data: {email: value},
              success: function(data){
                  data = JSON.parse(data);
                  var message = "";
                  var color = "green";
                  if(data.success != "") {
                      message = data.success;
                  }
                  
                  if(data.error != "") {
                      message = data.error;
                      color = "red";
                  }
                  var html = $("<div/>").text(message).css({'background-color': color, 'color':'white'});
                  field.before(html);
              },
              error: function (err) {
                  console.error('Fout: ', err);
              }
            });
        } 
    });
    
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
});