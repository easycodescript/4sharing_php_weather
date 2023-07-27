$(function() {
  $('#home-icon').click(function(){
    showIt('' , '', '', '');
    $('#search-input').val(null);
    $('#search-input').focus();
  })
  $('#search-input').on('input', function(){
    $('#search-icon').hide();
    $('#spinner').show();
    const searchInputValue = $('#search-input').val();
    $.ajaxSetup({
        headers: {
          'Access-Control-Allow-Origin': '*'
      }
    })
    $.get( './curl.php?q=' + searchInputValue , function( data ) {
       const jsonResponse = JSON.parse(data);
       console.log(jsonResponse);
       if (jsonResponse.weather) {
          showIt(jsonResponse.name,
            jsonResponse.weather[0].main + ', ' + jsonResponse.main.temp + '°',
            jsonResponse.weather[0].description,
            jsonResponse.weather[0].icon
          )
       } else {
        showIt('Nothing found :(' , '', '', '');
       }
    });
  })
       
});

function showIt(city, main, description, icon) {
  $('#weather__city').html(city);
  $('#weather__main').html(main);
  $('#weather__description').html(description);
  const iconUrl= icon != '' ? "http://openweathermap.org/img/wn/" + icon + "@4x.png" : null;
  $('#weather__icon').attr("src", iconUrl)
  $('#weather__icon').show();
  $('#spinner').hide();
  $('#search-icon').show();
}