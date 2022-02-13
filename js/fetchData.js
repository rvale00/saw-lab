//controlla gli errori dati dalle API
function checkInput(result){
    if(result.error!=undefined){
      $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.error+"</div>");
    }
}
function checkCart(result){
  if(result.error != undefined){
    $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.empty+"</div>");     
  }
  if(result.ind != undefined){
    $("#alert").html("<div class='alert alert-warning' role='alert'>"+result.ind+" <a href='../formASpedizione.php'> Aggiungi indirizzo </a> </div>");     
  }
}

//funzione di registrazione
function register(){
    var usermail = document.getElementsByName("email")[0].value;
    var userpsw = document.getElementsByName("pass")[0].value;
    var usercpsw = document.getElementsByName("confirm")[0].value;
    var userfname = document.getElementsByName("firstname")[0].value;
    var userlname = document.getElementsByName("lastname")[0].value;
    
  fetch('API/registration.php', {
      method: "post",
      headers: { "Content-type": "application/x-www-form-urlencoded" },
      body: "firstname="+ userfname+ "&lastname="+ userlname + "&email=" 
             + usermail + "&pass=" + userpsw + "&confirm=" + usercpsw ,
      }).then(function (response) { 
          return response.json();
      }).then(function (result) {
          checkInput(result);
          $('#regForm').html("<h1>"+result.ok+"</h1> \
                                <a class='btn btn-primary' href='index.php'> Torna alla home </a> \
                                <a class='btn btn-primary' href='formLogin.php'> Accedi </a>");
          
      });
  }

//funzione di login
function login(){
    var usermail = document.getElementsByName("email")[0].value;
    var userpsw = document.getElementsByName("pass")[0].value;
  fetch('API/login.php', {
      method: "post",
      headers: { "Content-type": "application/x-www-form-urlencoded" },
      body: "email=" + usermail + "&pass=" + userpsw,
      }).then(function (response) { 
          return response.json();
      }).then(function (result) {
          checkInput(result);
          if(result.ok !=undefined)
          $('#loginForm').html("<h1>"+result.ok+"</h1> \
                                <a class='btn btn-primary' href='index.php'> Torna alla home </a>");
          
      });
  }

//funzione di spediazione
  function aggSpedizione(){
    var reg = document.getElementsByName("reg")[0].value;
    var citta = document.getElementsByName("citta")[0].value;
    var ind = document.getElementsByName("ind")[0].value;
    var cap = document.getElementsByName("cap")[0].value;
  fetch('API/aggiungiSpedizione.php', {
      method: "post",
      headers: { "Content-type": "application/x-www-form-urlencoded" },
      body: "reg=" + reg + "&citta=" + citta + "&indirizzo=" + ind + "&cap=" + cap,
      }).then(function (response) { 
          return response.json();
      }).then(function (result) {
          checkInput(result);
          if(result.ok!=undefined){
            $('#spedForm').html("<h1>"+result.ok+"</h1><a class='btn btn-primary' href='/~S4852454/index.php'> Torna alla home </a>");
          }
      });
  }

//cambia password
function cPsw(){
    var oldPsw = document.getElementsByName("old")[0].value;
    var newPsw = document.getElementsByName("new")[0].value;
    var newCPsw = document.getElementsByName("cnew")[0].value;
  fetch('API/cambiaPassword.php', {
      method: "post",
      headers: { "Content-type": "application/x-www-form-urlencoded" },
      body: "old=" + oldPsw + "&new=" + newPsw + "&cnew=" + newCPsw,
      }).then(function (response) { 
          return response.json();
      }).then(function (result) {
          checkInput(result);
          if(result.ok!=undefined){
            document.location = "/~S4852454/show_profile.php";
          }
      });
}

//invia commento
function sendComment(){
    var valutazione = $("#input-id").val();
    if (valutazione == 0){
      $("#alert").html("<div class='alert alert-warning' role='alert'> Inserire valutazione </div>");
      return; 
    }
    var commento = document.getElementsByName("comment")[0].value;
    var idArt = document.getElementsByName("id")[0].value;
    var mod = document.getElementsByName("mod")[0].value;
    console.log(mod);
  fetch('API/commento.php', {
      method: "post",
      headers: { "Content-type": "application/x-www-form-urlencoded" },
      body: "valutazione=" + valutazione + "&commento=" + commento + "&id=" + idArt +  "&m=" + mod,
      }).then(function (response) { 
          return response.json();
      }).then(function (result) {
          checkInput(result);
          if(result.ok != undefined){
            window.location.reload();
          }          
      });
}

//cambia dati utente
function changeCred(){
    var usermail = document.getElementsByName("email")[0].value;
    var userfname = document.getElementsByName("firstname")[0].value;
    var userlname = document.getElementsByName("lastname")[0].value;
    
  fetch('API/update_profile.php', {
      method: "post",
      headers: { "Content-type": "application/x-www-form-urlencoded" },
      body: "firstname="+ userfname+ "&lastname="+ userlname + "&email=" 
             + usermail,
      }).then(function (response) { 
          return response.json();
      }).then(function (result) {
          checkInput(result);
          $('#credForm').html("<h1>"+result.ok+"</h1> \<a class='btn btn-primary' href='index.php'> Torna alla Home </a>");
      });
  }

  function buyCart(){
    fetch('buy.php', {
        method: "post", 
        }).then(function (response) { 
            return response.json();
        }).then(function (result) {
            checkCart(result);
            if(result.ok!=undefined){
              $('#regForm').html("<h1>"+result.ok+"</h1> \
                                  <a class='btn btn-primary' href='../listaArticoli.php'> Continua gli acquisti </a>");
            }
        });
    }