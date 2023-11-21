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

var selects = $("select");
selects.each( function(){
  if($(this).val() !== ""){
    $(this).addClass("border-blue");
  }
});
$('select').on('change', function() {
  console.log($(this).val())
  if($(this).val() !== ""){
    $(this).addClass("border-blue");
  }else{
    $(this).removeClass("border-blue");
  }
});


// input text
var inputs = $(".input-container input");
var placeholders = $(".input-container .placeholder");
inputs.each(function() {
    var placeholder = $(this).next();
    
    if ($(this).val() !== "") {
      placeholder.css("top", "-25px");
      placeholder.addClass("place-up");
      var inputContainer = this.closest(".input-container");
      inputContainer.classList.add("border-blue");
    }
    inputs.on("focus", function() {
      var placeholder = $(this).next();
      placeholder.css("top", "-25px");
      placeholder.addClass("place-up");
      var inputContainer = this.closest(".input-container");
      inputContainer.classList.add("border-blue");
    });
    placeholders.on("click", function() {
      var input = $(this).prev("input"); // Trova l'input associato al placeholder
      input.focus(); // Imposta il focus sull'input
    });
    inputs.on("blur", function() {
      var placeholder = $(this).next();
      if ($(this).val() === "") {
        placeholder.css("top", "10px");
        placeholder.removeClass("place-up");
        var inputContainer = this.closest(".input-container");
        inputContainer.classList.remove("border-blue");
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
      if(searchText==""){ 
        $(".value").show()
        $(".nff").hide();
      }else if(count==0){
        $(".nff").show();
        $(".nff").html("Nessun risultato <b>"+searchText+"</b> trovato.");
      }else{
        $(".nff").hide();
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


  
