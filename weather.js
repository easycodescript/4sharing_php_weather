const searchInput$ = document.getElementById('search-input');

const fetchForecast = (location) => {
  // @TODO fetch entered location and inject into DOM
};

let delayTimer;
const onSearchInputChange = (event) => {
  if (event && event.currentTarget && event.currentTarget.value) {
    const enteredLocation = event.currentTarget.value;
    clearTimeout(delayTimer);
    delayTimer = setTimeout(() => {
      fetchForecast(enteredLocation);
    }, 400);
  }
};

searchInput$.addEventListener('input', onSearchInputChange);