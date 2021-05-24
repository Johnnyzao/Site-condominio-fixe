$(document).ready(function() {
  $(document).on('click', '.read-categories-button', function() {
    showCategory2();
  });
  showCategory2();
});

function showCategory2() {
  read_cat2 = "";
  read_cat2 += "<form class='login-box' id='form-login' method='post'>";
  read_cat2 += "<h1>CondoFixe</h1>";
  read_cat2 += "<hr>";
  read_cat2 += "<div class='textbox'>";
  read_cat2 += "<i class='fas fa-user'></i>";
  read_cat2 += "<input type='text' id='username' name='username' placeholder='Username' required='true'>";
  read_cat2 += "</div>";
  read_cat2 += "<div class='textbox'>";
  read_cat2 += "<i class='fas fa-lock'></i>";
  read_cat2 += "<input type='password' id='password' name='password' placeholder='Password' required='true'>";
  read_cat2 += "</div>";
  read_cat2 += "<div class='btn'>";
  read_cat2 += "<input type='submit' id='login' name='login' value='LOGIN'>";
  read_cat2 += "</div>";
  read_cat2 += "</form>";

  changePageTitle('Login');
  $('#page-content').html(read_cat2);
}

$(document).on('submit', '#form-login', function() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var veriftyEmpty = false;
  var verifyLogin_Correct = false;
  var verifyLogin_Incorrect = false;
  var nome, id;

  $.getJSON("http://localhost:8080/apicondofixe/condominio/readUsers.php", function(data) {
    $.each(data.records, function(key, val) {
      if (val.username == username && val.password == password) {
        verifyLogin_Correct = true;
        nome = val.username;
        id = val.id;
      } else {
        verifyLogin_Incorrect = true;
      }
    });

    if (verifyLogin_Correct) {
      alert("Sessão iniciada com sucesso!");
        location.href = "index2.html";
    } else {
      document.getElementById("form-login").reset();
      alert("Dados incorrectos!");
      document.getElementById("username").focus();
    }
  });
  return false;
});
