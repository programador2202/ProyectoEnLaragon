<?= $header; ?>

<div class="container py-3">
  <h2 class="mb-3">Buscador de Superhéroes</h2>

  <input type="search" id="search" class="form-control mb-3" placeholder="Buscar por ID o Nombre...">

  <table class="table table-striped" id="heroesTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>SuperHero Name</th>
        <th>Full Name</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($heroes as $h): ?>
        <tr>
          <td><?= $h['id'] ?></td>
          <td><?= esc($h['superhero_name']) ?></td>
          <td><?= esc($h['full_name']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script>

    //llamammos los id del buscador y table donde se rendizara la informacion filtrada.
  const searchInput = document.getElementById("search");
    //Use ("tbody")[0] porque una tabla puede tener varios tbody, pero aquí tomamos el primero nada mas.
  const table = document.getElementById("heroesTable").getElementsByTagName("tbody")[0];

    //se crea una funcion para filtro 
  searchInput.addEventListener("input", function() {
    //evaluamos lo que el usuario escribe y lo convertimos en minuscula con toLowerCase para que conincida con la info que tiene la db.
    const term = this.value.toLowerCase();

    //let row -> es toda la tabla es decir llama la informacion de toda la tabla
    //table rows ->es el recorrido que tendra en la tabla
    for (let row of table.rows) {
        //definimos la unbicacion de las celdas que tendran el valor para usare en la busqueda es decir el 0 es su id
        //2 es el nombre y el ultimo es el subnombre 
      const id = row.cells[0].textContent.toLowerCase();
      const name = row.cells[1].textContent.toLowerCase();
      const fullname = row.cells[2].textContent.toLowerCase();


    //.includes(term) → revisa si el texto de la celda contiene lo que escribió el usuario.
    //|| → basta con que alguna de las tres columnas contenga el término.
    //Si coincide → row.style.display = "" (mostrar la fila).
    //Si no coincide → row.style.display = "none" (ocultar la fila).

      if (id.includes(term) || name.includes(term) || fullname.includes(term)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  });
</script>
