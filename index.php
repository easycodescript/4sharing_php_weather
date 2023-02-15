<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="utf-8" />
  <title>Coding Test Weather Client</title>
  <link href="style.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
  <main class="app">
    <header class="app__search">
      <input id="search-input" class="search-input" type="text" autocomplete="off" />
    </header>
    <article id="weather" class="weather">
      <div class="icon-container">
        <img id="weather__icon" src="" hidden>
      </div>
      <div>
        <h2 id="weather__main"></h2>
      </div>
      <div>
        <p id="weather__description"></p>
      </div>

    </article>
  </main>
  <script src="weather.js"></script>
  <script>
    $(function() {     
      $('#search-input').on('input', function(){
        const searchInputValue = $('#search-input').val();

        $.get( './curl.php?q=' + searchInputValue , function( data ) {
           const jsonResponse = JSON.parse(data);
           console.log(jsonResponse);
           if (jsonResponse.weather) {
             showIt(jsonResponse.weather[0].main, jsonResponse.weather[0].description, jsonResponse.weather[0].icon)
           } else {
            showIt('Nothing found :(' , '', '');
           }
          
        });
      })
           
    });

    function showIt(main, description, icon) {
      $('#weather__main').html(main);
      $('#weather__description').html(description);
      const iconUrl= icon != '' ? "http://openweathermap.org/img/wn/" + icon + "@4x.png" : null;
      $('#weather__icon').attr("src", iconUrl)
      $('#weather__icon').show();
    }
  </script>
</body>
</html>