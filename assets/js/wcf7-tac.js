 var submitButton = document.getElementsByClassName('wpcf7-submit');
 var termsconditions = document.getElementById('wcf7_termsconditions');

 submitButton[0].setAttribute('disabled', '');

 function exefunction(e){
    if (e.checked == true){
        submitButton[0].removeAttribute('disabled');
      } else {
        submitButton[0].setAttribute('disabled', '');
      }
    
 }

 