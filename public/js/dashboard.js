$('.dashboard-icon i.fa-heart').on('click', function () {
   philathropistsId = ($(this).attr('data-id'));
   csrfToken = $('input[name="_token"]').val();

   $.post( "donations/notify",
      {
         philathropists_id : philathropistsId,
         _token : csrfToken
      }
   )
   .done(
      function(data) {
         alert(data.message);
      }
   );
});
