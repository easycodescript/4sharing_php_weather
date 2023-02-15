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
      <img id="weather__icon" src="" width="100" height="100" hidden>
      <h2 id="weather__main"></h2>
      <p id="weather__description"></p>

    </article>
  </main>
  <script src="weather.js"></script>
  <script>
    $(function() {     
      $('#search-input').on('input', function(){
        const searchInputValue = $('#search-input').val();

        $.get( './curl.php?q=' + searchInputValue , function( data ) {
           const jsonResponse = JSON.parse(data);
           console.log(jsonResponse.weather);
           if (jsonResponse.weather) {
             $('#weather__main').html(jsonResponse.weather[0].main);
             $('#weather__description').html(jsonResponse.weather[0].description);
             $('#weather__icon').attr("src", "http://openweathermap.org/img/wn/" + jsonResponse.weather[0].icon + "@4x.png");
             $('#weather__icon').show();
             
           }
          
        });
      })
           
    });
  </script>
</body>
</html>