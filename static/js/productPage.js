$(function () {
   setImageAndPrice(0);

   $('#productColors').change(function () {
       let selectedColor = $('select option:selected').attr('value');
       setImageAndPrice(selectedColor);
   });

   function setImageAndPrice(number) {
       let productImages = $('#productImages');
       let image = productImages.find(`i[data-image-number='${number}']`).text();
       let price = productImages.find(`i[data-price-number='${number}']`).text();
       $('#productImg').attr('src', image);
       $('#productPrice').text(price);
   }

});