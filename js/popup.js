function closePop() {
  $("#bgpop").hide();
  $("#popup").hide();
  $("form").html(" ");
}

function showLogin() {
  $("#bgpop").show();
  $("#popup").show();
  $("#form").html(`<h2 class="title mb-4">Inicio de Sesion</h2>
  <div class="input-group">
    <form class="form-floating my-2">
      <input type="text" class="form-control" id="name" placeholder="" />
      <label class="text-secondary" for="floatingInputValue"
        >Nombre</label
      >
    </form>
    <form class="form-floating my-2">
      <input
        type="text"
        class="form-control"
        id="lastname"
        placeholder=""
      />
      <label class="text-secondary" for="floatingInputValue"
        >Apellido</label
      >
    </form>
  </div>
  <form class="form-floating my-2">
    <input
      type="password"
      class="form-control"
      id="password"
      placeholder=""
    />
    <label class="text-secondary" for="floatingInputValue"
      >Contraseña</label
    >
  </form>
  <button
    type="button"
    onclick="login()"
    class="btn btn-outline-primary mt-4"
  >
    Iniciar
  </button>`);
}

function showSign() {
  $("#bgpop").show();
  $("#popup").show();
  $("#form").html(`<h2 class="title mb-4">Registro</h2>
    <div class="input-group">
      <form class="form-floating my-2">
        <input
          type="text"
          class="form-control"
          id="name"
          placeholder=""
        />
        <label class="text-secondary" for="floatingInputValue"
          >Nombre</label
        >
      </form>
      <form class="form-floating my-2">
        <input
          type="text"
          class="form-control"
          id="lastname"
          placeholder=""
        />
        <label class="text-secondary" for="floatingInputValue"
          >Apellido</label
        >
      </form>
    </div>

    <form class="form-floating my-2">
      <input
        type="password"
        class="form-control"
        id="password"
        placeholder=""
      />
      <label class="text-secondary" for="floatingInputValue"
        >Contraseña</label
      >
    </form>
    <form class="form-floating my-2">
      <input
        type="password"
        class="form-control"
        id="reppassword"
        placeholder=""
      />
      <label class="text-secondary" for="floatingInputValue"
        >Confirme su Contraseña</label
      >
    </form>
    <form class="form-floating my-2">
      <input
        type="email"
        class="form-control"
        id="email"
        placeholder=""
      />
      <label class="text-secondary" for="floatingInputValue">Email</label>
    </form>
    <form class="form-floating my-2">
      <input
        type="number"
        class="form-control"
        id="age"
        placeholder=""
      />
      <label class="text-secondary" for="floatingInputValue">Edad</label>
    </form>
    <select id="category" class="form-select my-2">
      <option value="Alumno">Alumno</option>
      <option value="Profesor">Profesor</option>
      <option value="Preceptor">Preceptor</option>
      <option value="Directivo">Directivo</option>
    </select>
    <button
      type="button"
      onclick="sign()"
      class="btn btn-outline-primary mt-4"
    >
      Registrar
    </button>`);
}

