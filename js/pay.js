





const paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {

  e.preventDefault();

  let handler = PaystackPop.setup({

    key: 'pk_test_faffba574ca02bf41446ab437dfc871f4406ee32',
    
    email: document.getElementById("email").value,

    amount: document.getElementById("amount").value * 100,
   
    username: document.getElementById("uname").value,

    ref: ''+Math.floor((Math.random() * 1000000000) + 1), 
    onClose: function(){

      alert('Window closed.');

    },

    callback: function(response){

      let message = 'Payment complete! Reference: ' + response.reference;

      alert(message);

      amount= document.getElementById("amount").value;
      console.log(amount);
      
      let du = document.getElementById("type");
      let opt = du.options[du.selectedIndex].value;

      console.log(opt);
     window.location = "../process/processpay.php?pref="+response.reference+"&amount="+amount+"&type="+opt;

    }

  });

  handler.openIframe();

}