var category = localStorage.getItem("category");

if (category == "Preceptor" || category == "Directivo") {
  $.get("./php/getUsers.php", function (response) {
    let usersData = JSON.parse(response);
    let template = "";
    // Crea el template de la tabla de datos
    usersData.forEach((usersData) => {
      template += `
        <tr>
          <th scope="row">${usersData.userID}</th>
          <td>${usersData.name}</td>
          <td>${usersData.lastname}</td>
          <!-- <td>${usersData.password}</td> -->
          <td>${usersData.email}</td>
          <td>${usersData.age}</td>
          <td>${usersData.category}</td>
          <td><button type="button" onclick="editUser(${usersData.userID})" class="btn btn-outline-primary">Editar</button>
          <button type="button" onclick="deleteUser(${usersData.userID})" class="btn btn-outline-danger">Eliminar</button></td>
        </tr>
        `;
    });

    $("#users").html(template);
  });
} else {
  $("body").html("Permisos insuficientes.");
}

function closePop() {
  $("#bgpop").hide();
  $("#popup").hide();
}

function editUser(userID) {
  $.post("./php/getUser.php", { userID: userID }, function (response) {
    const userData = JSON.parse(response);
    $("#name").val(userData.name);
    $("#lastname").val(userData.lastname);
    $("#email").val(userData.email);
    $("#age").val(userData.age);
    $("#category").val(userData.category);
    $("#sendbtn").html(`
        <button
            type="button"
            onclick="sendEdit(${userData.userID})"
            class="btn btn-outline-primary mt-4"
        >
            Editar
        </button>
    `);
    $("#bgpop").show();
    $("#popup").show();
  });
}

function sendEdit(userID) {
  const postData = {
    userID: userID,
    name: $("#name").val(),
    lastname: $("#lastname").val(),
    password: $("#password").val(),
    reppassword: $("#reppassword").val(),
    email: $("#email").val(),
    age: $("#age").val(),
    category: $("#category").val(),
  };
  $.post("./php/sendEdit.php", postData, function (response) {
    if (response.status == "error") {
      $("#error").show();
      $("#error").html("Error: " + response.message);
    }

    if (response.status == "success") {
      $("#popup").html(`
          <div
              class="alert alert-success mt-2 text-center"
              role="alert"
          >
              Usuario editado con exito.
          </div>
          <button type="button" onclick="location.reload()" class="btn btn-outline-primary">
              Aceptar
          </button>
        `);
    }
  });
}

function deleteUser(userID) {
  $.post("./php/deleteUser.php", { userID: userID }, function () {
    location.reload();
  });
}
