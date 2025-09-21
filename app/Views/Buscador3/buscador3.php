<?= $header; ?>

<div class="container py-3">
  <h2 class="mb-3">Buscador de Poderes de Héroes</h2>  

  <a id="exportPdfBtn" class="btn btn-primary" href="#">Exportar PDF</a>
  <br><br>

  <!-- Buscador -->
  <input type="search" id="search" class="form-control mb-3" placeholder="Buscar por Héroe o Poder...">

  <table class="table table-striped" id="heroesTable">
    <thead>
      <tr>
        <th>ID Héroe</th>
        <th>SuperHero Name</th>
        <th>Poder</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($heroes as $h): ?>
        <tr>
          <td><?= esc($h['hero_id']) ?></td>
          <td><?= esc($h['hero_name']) ?></td>
          <td><?= esc($h['power_name']) ?></td>
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
      const heroId   = row.cells[0].textContent.toLowerCase();
      const heroName = row.cells[1].textContent.toLowerCase();
      const power    = row.cells[2].textContent.toLowerCase();

      if (
        heroId.includes(term) ||
        heroName.includes(term) ||
        power.includes(term)
      ) {
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

    const term = searchInput.value.trim(); 
    let url = "<?= base_url('power/exportPdf') ?>"; 

    if (term) {
      url += "?q=" + encodeURIComponent(term);
    }

    window.open(url, "_blank"); 
  });
</script>
