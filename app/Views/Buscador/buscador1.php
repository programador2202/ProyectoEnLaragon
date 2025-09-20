<?= $header; ?>

<div class="container py-3">
  <h2 class="mb-3">Buscador de Superhéroes</h2>  

  <a id="exportPdfBtn" class="btn btn-primary" href="#">Exportar PDF</a>
  <br><br>

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
  const searchInput = document.getElementById("search");
  const table = document.getElementById("heroesTable").getElementsByTagName("tbody")[0];

  searchInput.addEventListener("input", function() {
    const term = this.value.toLowerCase();

    for (let row of table.rows) {
      const id = row.cells[0].textContent.toLowerCase();
      const name = row.cells[1].textContent.toLowerCase();
      const fullname = row.cells[2].textContent.toLowerCase();

      if (id.includes(term) || name.includes(term) || fullname.includes(term)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  });

  // Botón Exportar PDF
  const exportBtn = document.getElementById("exportPdfBtn");

  exportBtn.addEventListener("click", function(e) {
    e.preventDefault();

    const term = searchInput.value.trim(); // valor del buscador
    let url = "<?= base_url('superheroes/exportPdf') ?>";

    if (term) {
      url += "?q=" + encodeURIComponent(term);
    }

    window.open(url, "_blank"); // abre PDF en nueva pestaña
  });
</script>
