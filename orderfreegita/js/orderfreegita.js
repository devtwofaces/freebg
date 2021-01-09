
window.onload=function(){

    render();
  }; 
  

  var captchaToken = "";

  function render(){
  


    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
    'size': 'normal',
    'callback': function(recapchaToken) {
        
        captchaToken = recapchaToken;

    }
    });

    recaptchaVerifier.render();

  }


function changeStateInput(e) {

    document.getElementById("stateInput").value = "";
    document.getElementById("stateInput").value = e.target.value;
    

}


function submitOrder(){

    document.getElementById("verifyRecaptchaToken").value = captchaToken;
    document.getElementById("orderForm").submit();

}






