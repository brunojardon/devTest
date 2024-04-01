$.get("./php/sessionStatus.php", function (response) {
  localStorage.setItem("name", response.name);
  localStorage.setItem("lastname", response.lastname);
  localStorage.setItem("email", response.email);
  localStorage.setItem("category", response.category);

  if (response.name == '') {
    $("#sessionbtn").html(`<button
              type="button"
              onclick="showSign()"
              class="btn btn-outline-primary"
            >
              Registrarse
            </button>
            <span class="mx-2">O</span>
            <button
              type="button"
              onclick="showLogin()"
              class="btn btn-outline-primary"
            >
              Inicia sesion
            </button>`);
  } else {
    $("#bodys").html("Hola mundo!");
    $("#sessionbtn").html(`
    <button
      type="button"
      onclick="signoff()"
      class="btn btn-outline-danger"
    >
      Cerrar sesion
    </button>
    `);
  }
});

function signoff() {
  $.get("./php/closeSession.php", function (response) {
    localStorage.removeItem("name");
    localStorage.removeItem("lastname");
    localStorage.removeItem("email");
    localStorage.removeItem("category");
    location.reload();
  });
}
