const cardsShown = 4;

function moveLeft(movieContainer) {
    let firstMovie = movieContainer.firstElementChild;
    let currentMovie = firstMovie.getElementsByTagName('h3')[0].innerText;
    let currentPosition = moviesArr.findIndex(elem => elem.title === currentMovie); /* найти индекс по названию*/
    let newCard = (currentPosition + cardsShown) % moviesArr.length;
    let lastMovie = movieContainer.lastElementChild;
    movieContainer.removeChild(firstMovie);
    let newMovie = lastMovie.cloneNode(true);
    let image = newMovie.getElementsByTagName('img');
    image[0].src = moviesArr[newCard].image;
    image[0].alt = 'Кадр из фильма ' + moviesArr[newCard].title;
    let header = newMovie.getElementsByTagName('h3');
    header[0].textContent = moviesArr[newCard].title;
    let description = newMovie.getElementsByTagName('p');
    description[0].textContent = moviesArr[newCard].descr;
    movieContainer.appendChild(newMovie);
}

function moveRight(movieContainer) {
    let firstMovie = movieContainer.firstElementChild;
    let currentMovie = firstMovie.getElementsByTagName('h3')[0].innerText;
    let currentPosition = moviesArr.findIndex(elem => elem.title === currentMovie); /* найти индекс по названию*/
    let newCard = (moviesArr.length + (currentPosition - 1)) % moviesArr.length;
    let lastMovie = movieContainer.lastElementChild;
    movieContainer.removeChild(lastMovie);
    let newMovie = firstMovie.cloneNode(true);
    let image = newMovie.getElementsByTagName('img');
    image[0].src = moviesArr[newCard].image;
    image[0].alt = 'Кадр из фильма ' + moviesArr[newCard].title;
    let header = newMovie.getElementsByTagName('h3');
    header[0].textContent = moviesArr[newCard].title;
    let description = newMovie.getElementsByTagName('p');
    description[0].textContent = moviesArr[newCard].descr;
    movieContainer.prepend(newMovie);
}

function run() {
    const movieContainer = document.getElementById('cards_container');
    const leftButton = document.getElementById('move_left');
    leftButton.addEventListener("click", () => moveLeft(movieContainer));
    const rightButton = document.getElementById('move_right');
    rightButton.addEventListener("click", () => moveRight(movieContainer));
}

window.onload = run;

