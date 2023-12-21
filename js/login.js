function login() {
  const postData = {
    name: $("#name").val(),
    lastname: $("#lastname").val(),
    password: $("#password").val(),
  };

  $.post("./php/login.php", postData, function (response) {
    console.log(response)
    if (response.status == "success") {
      $("#popup").html(`
        <div
            class="alert alert-success mt-2 text-center"
            role="alert"
        >
            Sesion iniciada con exito.
        </div>
        <button type="button" onclick="location.reload()" class="btn btn-outline-primary">
            Aceptar
        </button>
      `);
    }

    if (response.status == "error") {
      $("#error").show();
      $("#error").html("Error: " + response.message);
    }
  }).fail(function (error) {
    console.error(error);
  });
}
