console.log("hola");

Promise.all([
  fetch("/brunet/views/admin/functions/getCarta.php").then(res => res.json()),
  fetch("/brunet/views/admin/functions/getCategorias.php").then(res => res.json())
])
  .then(([platos, categorias]) => {
    const contenedor = document.getElementById("modern-menu");

    categorias.forEach(cat => {
      // Crear título de categoría
      const h2 = document.createElement("h2");
      h2.textContent = cat.nombre;
      contenedor.appendChild(h2);

      // Filtrar platos de esta categoría
      const platosDeCategoria = platos.filter(plato => plato.categoria_id == cat.id);

      // Crear lista de platos
      const ul = document.createElement("ul");

      platosDeCategoria.forEach(plato => {
        const li = document.createElement("li");
        li.textContent = plato.nombre;
        ul.appendChild(li);
      });

      contenedor.appendChild(ul);
    });
  })
  .catch(err => console.error("Error:", err));
