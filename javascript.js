    let btnPosalji = document.getElementByID("btnForm");

  
  btnPosalji.addEventListener("click", e =>){
      e.preventDefault();
  
      let form = document.getElementById("cartForm");
      // uraditi bilo šta sa formom ovde, kao što je slanje AJAX zahteva
      form.submit(); // ručno slanje forme na server nakon obrade u JavaScript-u
  
  }