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
var inputs = document.querySelectorAll(".input-container input");
var placeholders = document.querySelectorAll(".input-container .placeholder");
for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener("focus", function() {
    var placeholder = this.nextElementSibling;
    placeholder.style.top = "-20px";
    placeholder.style.color = "white";  // color of end transition
  });
  inputs[i].addEventListener("blur", function() {
    var placeholder = this.nextElementSibling;
    if (this.value === "") {
      placeholder.style.top = "8px";
      placeholder.style.fontSize = "";
      placeholder.style.fontSize = "";
      placeholder.style.color = "#999";
    }
  });
}


// searchbar
$(document).ready(function() {
    $('#searchbar').on('input', function() {
      var searchText = $(this).val().toLowerCase();
	  var count = 0
      $('.value').each(function() {
        var value = $(this).text().toLowerCase();
        if (value.indexOf(searchText) !== -1) {
          $(this).show();
		  count++
        } else {
          $(this).hide();
        }
      });
	//   console.log(searchText+": "+count)
    });
  });
  var inputs = document.querySelectorAll(".input-container input");
var placeholders = document.querySelectorAll(".input-container .placeholder");
for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener("focus", function() {
    var placeholder = this.nextElementSibling;
    placeholder.style.top = "-20px";
    placeholder.style.color = "white";
  });
  inputs[i].addEventListener("blur", function() {
    var placeholder = this.nextElementSibling;
    if (this.value === "") {
      placeholder.style.top = "8px";
      placeholder.style.fontSize = "";
      placeholder.style.fontSize = "";
      placeholder.style.color = "#999";
    }
  });
}

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
      
      var minDisplayTime = 300; // Durata minima in millisecondi (3 secondi)
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


  
