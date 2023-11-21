setTimeout(function() {
    var fadeElements = document.querySelectorAll(".success, .error");
  
    fadeElements.forEach(function(element) {
        var opacity = 1;
        var interval = setInterval(function() {
            opacity -= 0.05; // Modifica il valore di decremento per regolare la velocità dell'animazione
            element.style.opacity = opacity;
  
            if (opacity <= 0) {
                clearInterval(interval);
                element.style.display = "none";
            }
        }, 50); // Modifica il valore di interval per regolare la fluidità dell'animazione
    });
  }, 10000);

// menu mobile
$('#menu-open').on('click', function () {
    $('.menu-mobile').toggleClass('active');
});

// carica rotella
$('button:not(.no-load), a:not(.no-load)').click(function(){
    console.log("caricamento...")
    var nuovoDiv = $('<div/>', {
        id: 'load',
        html: '<div class="loader"></div>'
    });
    $('body').append(nuovoDiv);
  });

// popup
  if ($('.popup').length) {
    $('body').css('overflow', 'hidden'); // Impedisce lo scorrimento del corpo
    $('body *').css('pointer-events', 'none');
    // $('body').css('user-select', 'none');
    $('.popup *').css('pointer-events', 'auto');
  } else {
    $('body').css('overflow', 'auto'); // Abilita lo scorrimento del corpo
    $('body *').css('pointer-events', 'auto');
    // $('body').css('user-select', 'auto');
    $('.popup *').css('pointer-events', 'auto');
  }


  function filterValues() {
    var searchText1 = $('#searchbar1').val().toLowerCase();
    var searchText2 = $('#searchbar2').val().toLowerCase();
    $('.value').each(function() {
      var value1 = $(this).find('.dato1').text().toLowerCase();
      var value2 = $(this).find('.dato2').text().toLowerCase();
      if ((value1.indexOf(searchText1) !== -1 || searchText1 === "") &&
          (value2.indexOf(searchText2) !== -1 || searchText2 === "")) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
    var count = $('.value:visible').length;
  
    if (searchText1 === "" && searchText2 === "") {
      $(".nff").hide();
    } else if (count === 0) {
      $(".nff").show();
      $(".nff").html("Nessun risultato trovato.");
    } else {
      $(".nff").hide();
    }
  }
  $('#searchbar1, #searchbar2').on('input', filterValues);

  $('.eye').on('click', function() {
    var input = $(this).siblings('input[name="pas"], input[name="password"], input[name="new"], input[name="repnew"], input[name="old"]');
    var type = input.attr('type');
    console.log(type)
    if (type == 'password') {
        $(this).html("<i class='fa-solid fa-eye-slash'></i>")
        input.attr('type', 'text');
    } else {
      $(this).html("<i class='fa-solid fa-eye'></i>")
        input.attr('type', 'password');
    }
  });



  // verifica password
function checkInput() {
  const inputVal = $('#new').val();
  const regexNumber = /\d/g; // Modificato per trovare tutte le corrispondenze
  const regexUpperCase = /[A-Z]/g; // Modificato per trovare tutte le corrispondenze
  const regexSpecialChar = /[£$%&/)(=.?^!]/g; // Modificato per trovare tutte le corrispondenze

  const matchesNumber = inputVal.match(regexNumber);
  const matchesUpperCase = inputVal.match(regexUpperCase);
  const matchesSpecialChar = inputVal.match(regexSpecialChar);

  const hasNumber = matchesNumber ? matchesNumber.length >= 2 : false;
  const hasUpperCase = matchesUpperCase ? matchesUpperCase.length >= 1 : false;
  const hasSpecialChar = matchesSpecialChar ? matchesSpecialChar.length >= 2 : false;

  return [hasNumber, hasUpperCase, hasSpecialChar];
}

async function checkAndDisplayResult() {
  const isValid = checkInput();
  const resultDiv110 = $('#result10');
  const resultDiv11 = $('#result11');
  const resultDiv12 = $('#result12');
  if(isValid[0]){
    resultDiv110.html(' <i class="tgreen fa-regular fa-circle-check"></i> contiene numeri');
  }else{
    resultDiv110.html(' <i class="tred fa-regular fa-circle-xmark"></i> contiene numeri');
  }
  if(isValid[1]){
    resultDiv11.html(' <i class="tgreen fa-regular fa-circle-check"></i> contiene maiuscole');
  }else{
    resultDiv11.html(' <i class="tred fa-regular fa-circle-xmark"></i> contiene maiuscole');
  }
  if(isValid[2]){
    resultDiv12.html(' <i class="tgreen fa-regular fa-circle-check"></i> contiene caratteri speciali');
  }else{
    resultDiv12.html(' <i class="tred fa-regular fa-circle-xmark"></i> contiene caratteri speciali');
  }
}
$('#new').on('keyup', () => {
  checkAndDisplayResult();  
}); 