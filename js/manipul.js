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
}( jQuery ));


/*---------------------------------------------------
  Reload page after select option click asigned with a value
  ---------------------------------------------------*/
function update_product(passValue){window.location="gestion-produits.php?id="+passValue+"#update";}
function delete_product(passValue){window.location="gestion-produits.php?id="+passValue+"#delete";}
