const year = document.getElementById('year');
const date = new Date();
year.innerText = date.getFullYear();

//Temp removal for working offline unable to load CDNS
// const loader = document.querySelector('.loading-screen')
// loader.remove();
// loader.className = ""
// loader.css

const delListing = document.querySelector('.del-listing')
if (delListing) {
  delListing.addEventListener('click', function () {
    const check = confirm("Are you sure you want to delete this?")
    if (!check) {
      event.preventDefault()
    } else {
      return;
    }
  })
}

// JavaScript loading screen
// $('.loading-screen').hide();

// Page loads, website hidden
if (!sessionStorage.getItem('shown')) {
  showScreen();
} else {
  $('.loading-screen').remove();
  // console.log("WTF")
}


function showScreen() {
  // console.log('showing screen');
  $('.loading-screen').show();

  $('#website').hide();
  // set timeout for loading, scale image and fade out
  setTimeout(() => {
    $('#website').show();
    $('.loading-screen').animate({
      "opacity": 0,
    }, 700);
  }, 1200);
  $('.loading-screen').hide();
  setTimeout(() => {

    $('.loading-screen').remove();
  }, 1300)

  sessionStorage.setItem('shown', true);
  $('.loading-screen').remove();

}



// Is the window at the top of the page?
