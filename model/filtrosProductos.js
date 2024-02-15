document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.chk-prod');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            filtrarProductos();
        });
    });
    });
    
    function filtrarProductos() {
        const productos = document.querySelectorAll('.prod-li');
        const categoriasSeleccionadas = obtenerCategoriasSeleccionadas();
    
        productos.forEach(producto => {
            const categoriaProducto = parseInt(producto.dataset.categoria); 
            if (categoriasSeleccionadas.length === 0 || categoriasSeleccionadas.includes(categoriaProducto.toString())) {
                producto.style.display = 'block';
            } else {
                producto.style.display = 'none';
            }
        });
        
        //Si no hay ninguna categoría seleccionada, mostrar todos los productos
        if (categoriasSeleccionadas.length === 0) {
            productos.forEach(producto => {
                producto.style.display = 'block';
            });
        }
    }
    
    function obtenerCategoriasSeleccionadas() {
        const checkboxes = document.querySelectorAll('.chk-prod:checked');
        const categoriasSeleccionadas = Array.from(checkboxes).map(checkbox => checkbox.value);
        return categoriasSeleccionadas;
    }