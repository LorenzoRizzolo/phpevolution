// Ottieni il valore del parametro "opt" dalla query string dell'URL
const urlParams = new URLSearchParams(window.location.search);
const optParam = urlParams.get('opt');

// Aggiungi la classe ".select" al link corrispondente
if (optParam) {
    const links = document.querySelectorAll('.opzioni .footer-link');
    for (let i = 0; i < links.length; i++) {
        const href = links[i].getAttribute('href');
        if (href && href.includes(optParam)) {
            links[i].classList.add('footer-select');
            break;
        }
    }
}else{
    const links = document.querySelectorAll('.opzioni .footer-link');
    if(links.length!=0){
      links[0].classList.add('footer-select');
    }
}

// input text
$(document).ready(function() {
  var inputs = $(".input-container input");
  var placeholders = $(".input-container .placeholder");

  // Posiziona i placeholder correttamente all'avvio della pagina
  inputs.each(function() {
    var placeholder = $(this).next();
    if ($(this).val() !== "") {
      placeholder.css("top", "-20px");
      placeholder.addClass("place-up");
    }
  });

  // Aggiorna i placeholder quando il campo di input ottiene il focus
  inputs.on("focus", function() {
    var placeholder = $(this).next();
    placeholder.css("top", "-20px");
    placeholder.addClass("place-up");
  });

  // Ripristina i placeholder quando il campo di input perde il focus
  inputs.on("blur", function() {
    var placeholder = $(this).next();
    if ($(this).val() === "") {
      placeholder.css("top", "8px");
      placeholder.removeClass("place-up");
    }
  });
});


// searchbar
$(document).ready(function() {
  $('#searchbar').on('input', function() {
    var searchText = $(this).val().toLowerCase();
    var count = 0;
    $('.value').each(function() {
      var value = $(this).find('.dato').text().toLowerCase();
      console.log(searchText+" - "+value)
      if (value.indexOf(searchText) !== -1) {
        $(this).show();
        count++;
      } else {
        $(this).hide();
      }
    });
    // console.log(searchText + ": " + count)
  });
});

// page load
var loadingDiv = document.getElementById('loading');
    
    function showLoadingDiv() {
      loadingDiv.style.display = 'block';
    }
    
    function hideLoadingDiv() {
      loadingDiv.style.display = 'none';
    } 
    
    document.addEventListener('DOMContentLoaded', function() {
      showLoadingDiv();
      
      var minDisplayTime = 200; // Durata minima in millisecondi (3 secondi)
      var loadStartTime = new Date().getTime();
      
      window.addEventListener('load', function() {
        var loadEndTime = new Date().getTime();
        var loadTime = loadEndTime - loadStartTime;
        
        if (loadTime < minDisplayTime) {
          var delayTime = minDisplayTime - loadTime;
          setTimeout(hideLoadingDiv, delayTime);
        } else {
          hideLoadingDiv();
        }
      });
    });




// card motions
const boxes = document.querySelectorAll('.card-motion');
let isScrolling = false;
boxes.forEach(function(box) {
  box.addEventListener('click', function() {
    this.classList.toggle('open');
    this.classList.add(".open-card")
  });
});


  
