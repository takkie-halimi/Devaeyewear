/*********************************************************************************

	Template Name: DEVA-EYE-WEAR - DEVA-EYE-WEAR Bootstrap 4 Template
	Version: 1.0
	Developer: TAKKIE EDDINE HALIMI © Copyright, ALL Rights Are Reserved.
	Email: takkie8halimi@gmail.com.
	Corporation: HALIMI INDUSTRIES. 

**********************************************************************************/

/**************************************************************
	
	|_STYLESHEET INDEXING
	|
	|___ Image Preview
	|___ Prevent the reload of page
	|___ Validate input values before Submit
	|___ Keep Selected Tab
	|___ Range Slider
	|___ Quick View For Products
	|___ Auto Complete
	|___ Reload Page After Select Option Click Asigned With a Value
	|___ Search Fonctions For DEVA SHOP
	|
	|
	|___ END STYLESHEET INDEXING

***************************************************************/


(function ( $ ) {
 
 
 /*---------------------------------------------------
  Image preview before upload 4 images
  ---------------------------------------------------*/
 $(function() {
     // Multiple images preview in browser
     var imagesPreview = function(input, placeToInsertImagePreview) {
	 if (input.files.length <=4) {
	     var filesAmount = input.files.length;
	     for (i = 0; i < filesAmount; i++) {
	         var reader = new FileReader();
	         reader.onload = function(event) {
	             $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
	         }
	         reader.readAsDataURL(input.files[i]);
	     }
	 }
     };
     $('#images').on('change', function() {
	 imagesPreview(this, 'div.gallery');
     });
 });

/*---------------------------------------------------
  Prevent the reload of page fro submitting the form
  ---------------------------------------------------*/
 if (window.history.replaceState) window.history.replaceState( null, null, window.location.href );

/*---------------------------------------------------
  Validate input values before submit 
  ---------------------------------------------------*/
 $("#myForm").submit(function (e) {
    if ($("input[Name='product_name']").val() == '' || $("input[Name='p_price']").val() == '' || $("input[Name='a_price']").val() == '') {
          $('#e_Modal').modal('show');
          e.preventDefault();
          return;
    }
    $('#s_Modal').modal('show');
 });


/*---------------------------------------------------
  Keep Selected tab after page reload
  ---------------------------------------------------*/
 $(document).ready(function() {
      if (location.hash) {
	 $("a[href='" + location.hash + "']").tab("show");
      }
      $(document.body).on("click", "a[data-toggle='tab']", function(event) {
	 location.hash = this.getAttribute("href");
      });
 });
		 
 $(window).on("popstate", function() {
      var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
      $("a[href='" + anchor + "']").tab("show");
 });

/*---------------------------------------------------
  Quick View fro products
  ---------------------------------------------------*/
    $('.quickview').mouseover( function(){
        $.ajax({
            method: "GET",
            url: "quick-view.php?id="+this.id,
            success: function(result){
                $('#view').html(result);
            }
        });
    });
    $('.quickview').click( function() {
       $('.quick-view-modal').toggleClass('is-visible');
    });
}( jQuery ));


/*---------------------------------------------------
  Reload page after select option click asigned with a value
  ---------------------------------------------------*/
function update_product(passValue){window.location="gestion-produits.php?id="+passValue+"#update";}
function delete_product(passValue){window.location="gestion-produits.php?id="+passValue+"#delete";}



/*---------------------------------------------------
  Search fonctions for DEVA SHOP
  ---------------------------------------------------*/
function page_restrict(name, value) {
        var href = window.location.href;
        if(href.indexOf("?") > -1)
            window.location.href = href + "&" + name + "=" + value;
        if(href.indexOf("&") > -1)
            var  base_href = href.split("&");
        window.location.href = base_href[0] + "&" + name + "=" + value;
}
        
function search_value() {
   var href = window.location.href;
   var searchValue = document.getElementById("searchBar").value;
   if(searchValue != ''){
       if(href.indexOf("?") > -1)
           window.location.href = href + "&" + 'rechercher' + "=" + searchValue;
       if(href.indexOf("&") > -1)
           var  base_href = href.split("&");
       window.location.href = base_href[0] + "&" + 'rechercher' + "=" + searchValue;
   }
}
        
  function range_value() {
        var href = window.location.href;
        var slider = $(".js-range-slider").data("ionRangeSlider");
        var from = slider.result.from;
        var to = slider.result.to;

        if(href.indexOf("?") > -1)
            window.location.href = href + "&" + 'gamme' + "=" + from + "," + to;
        if(href.indexOf("&") > -1)
            var  base_href = href.split("&");
        window.location.href = base_href[0] + "&" + 'gamme' + "=" + from + "," + to;
 }
