var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){
    $(document).on("click", "input.ypstoknotxt", function(){
        $( this ).autocomplete({
            source: function( request, response ) {
            // Fetch data
            $.ajax({
              url:"../stoknoparcagetir",
              type: 'post',
              dataType: "json",
              data: {
                 _token: CSRF_TOKEN,
                 search: request.term
              },
              success: function( data ) {
                  response( data );
              },
            });
            },
            select: function (event, ui) {
                   $(this).val(ui.item.value.stokkodu);
                   $(this).closest('div').next().find('.ypstokadi').val(ui.item.value.stokadi);
                   $(this).closest('div').nextAll(':has(.ypsatisfiyati):first').find('.ypsatisfiyati').val(ui.item.value.satisfiyati);
                   $(this).parent().parent().find('.parcaid').val(ui.item.value.id);
                   return false;
                }
            });

    });
    $(document).on("click", "input.ypstokadi", function(){
        $( this ).autocomplete({
            source: function( request, response ) {
            // Fetch data
            $.ajax({
              url:"../stokadparcagetir",
              type: 'post',
              dataType: "json",
              data: {
                 _token: CSRF_TOKEN,
                 search: request.term
              },
              success: function( data ) {
                  response( data );
              },
            });
            },
            select: function (event, ui) {
                   $(this).val(ui.item.value.stokadi);
                   $(this).closest('div').prev().find('.ypstoknotxt').val(ui.item.value.stokkodu);
                   $(this).closest('div').nextAll(':has(.ypsatisfiyati):first').find('.ypsatisfiyati').val(ui.item.value.satisfiyati);
                   $(this).parent().parent().find('.parcaid').val(ui.item.value.id);
                   return false;
                }
            });

    });



$( "#tckimlik_ac" ).autocomplete({
source: function( request, response ) {
// Fetch data
$.ajax({
  url:"../tcmusterigetir",
  type: 'post',
  dataType: "json",
  data: {
     _token: CSRF_TOKEN,
     search: request.term
  },
  success: function( data ) {
      response( data );
  },
});
},
select: function (event, ui) {
       $('#tckimlik_ac').val(ui.item.label);
       $('#adsoyad').val(ui.item.value.ad);
       $('#telefon').val(ui.item.value.telefon);
       $('#vergino').val(ui.item.value.vergino);
       $('#vergidairesi').val(ui.item.value.vergidairesi);
       $('#eposta').val(ui.item.value.email);
       $('#adres').val(ui.item.value.adres);
       if(ui.item.value.ticaridurum == 1)
           $("#ticaridurum1").prop("checked", true);
        else

             $("#ticaridurum0").prop("checked", true);
       return false;
    }
});

$( "#rastgeletc" ).on( "click", function() {
    $("#tckimlik_ac").val(Date.now())
  });

$( "#tckimlik_ac" ).autocomplete({
source: function( request, response ) {
// Fetch data
$.ajax({
  url:"../tcmusterigetir",
  type: 'post',
  dataType: "json",
  data: {
     _token: CSRF_TOKEN,
     search: request.term
  },
  success: function( data ) {
      response( data );
  },
});
},
select: function (event, ui) {
       $('#tckimlik_ac').val(ui.item.label);
       $('#adsoyad').val(ui.item.value.adsoyad);
       $('#telefon').val(ui.item.value.telefon);
       $('#vergino').val(ui.item.value.vergino);
       $('#vergidairesi').val(ui.item.value.vergidairesi);
       $('#eposta').val(ui.item.value.email);
       $('#adres').val(ui.item.value.adres);
       if(ui.item.value.ticaridurum == 1)
           $("#ticaridurum1").prop("checked", true);
        else

             $("#ticaridurum0").prop("checked", true);
       return false;
    }
});


$( "#plaka_ac" ).autocomplete({
    source: function( request, response ) {
    // Fetch data
    $.ajax({
      url:"../plakaaracgetir",
      type: 'post',
      dataType: "json",
      data: {
         _token: CSRF_TOKEN,
         search: request.term
      },
      success: function( data ) {
          response( data );
      },
    });
    },
    select: function (event, ui) {
           $('#plaka_ac').val(ui.item.label);
           $('#marka').val(ui.item.value.marka);
           $('#motorno').val(ui.item.value.motorno);
           $('#saseno').val(ui.item.value.saseno);
           $('#model').val(ui.item.value.model);
           return false;
        }
    });
});
