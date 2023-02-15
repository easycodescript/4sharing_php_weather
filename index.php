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
      <!-- Inject here or replace entire element -->
    </article>
  </main>
  <script src="weather.js"></script>
  <script>
    $(function() {
      console.clear();
      console.log('it works!');
      $('#search-input').on('input', function(){
        const searchInputValue = $('#search-input').val();
        $.get( './curl.php?q=' + searchInputValue , function( data ) {
           console.log(JSON.parse(data));
          
        });
      })
           
    });
  </script>
</body>
</html>