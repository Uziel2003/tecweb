// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

$(document).ready(function () {
    // Cargar el JSON en el textarea al iniciar la página
    init();

    // Cargar la lista de productos al abrir la página
    listarProductos();

    // Buscar productos conforme se teclea en el campo de búsqueda
    $('#search').on('input', function () {
        buscarProducto($(this).val());
    });

    // Agregar producto
    $('#product-form').submit(function (e) {
        e.preventDefault();
        agregarProducto();
    });

    // Eliminar producto
    $(document).on('click', '.product-delete', function () {
        var productId = $(this).closest('tr').attr('productId');
        eliminarProducto(productId);
    });
});

function init() {
    var JsonString = JSON.stringify(baseJSON, null, 2);
    $('#description').val(JsonString);
}

// Listar productos
function listarProductos() {
    $.ajax({
        url: './backend/product-list.php',
        type: 'GET',
        success: function (response) {
            let productos = JSON.parse(response);
            let template = '';
            let template_bar = '';

            productos.forEach(producto => {
                let descripcion = `
                    <li>precio: ${producto.precio}</li>
                    <li>unidades: ${producto.unidades}</li>
                    <li>modelo: ${producto.modelo}</li>
                    <li>marca: ${producto.marca}</li>
                    <li>detalles: ${producto.detalles}</li>
                `;

                template += `
                    <tr productId="${producto.id}">
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                        <td><button class="product-delete btn btn-danger">Eliminar</button></td>
                    </tr>
                `;

                template_bar += `<li>${producto.nombre}</li>`;
            });

            $('#products').html(template);
            $('#container').html(template_bar);
            $('#product-result').removeClass('d-none').addClass('d-block');
        }
    });
}

// Buscar producto
function buscarProducto(query) {
    $.ajax({
        url: './backend/product-search.php',
        type: 'GET',
        data: { search: query },
        success: function (response) {
            let productos = JSON.parse(response);
            let template = '';
            let template_bar = '';

            productos.forEach(producto => {
                let descripcion = `
                    <li>precio: ${producto.precio}</li>
                    <li>unidades: ${producto.unidades}</li>
                    <li>modelo: ${producto.modelo}</li>
                    <li>marca: ${producto.marca}</li>
                    <li>detalles: ${producto.detalles}</li>
                `;

                template += `
                    <tr productId="${producto.id}">
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                        <td><button class="product-delete btn btn-danger">Eliminar</button></td>
                    </tr>
                `;

                template_bar += `<li>${producto.nombre}</li>`;
            });

            $('#products').html(template);
            $('#container').html(template_bar);
            $('#product-result').removeClass('d-none').addClass('d-block');
        }
    });
}

// Agregar producto
function agregarProducto() {
    var productoJsonString = $('#description').val();
    var finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = $('#name').val();
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    $.ajax({
        url: './backend/product-add.php',
        type: 'POST',
        contentType: 'application/json;charset=UTF-8',
        data: productoJsonString,
        success: function (response) {
            let respuesta = JSON.parse(response);
            let template_bar = `
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>
            `;

            $('#container').html(template_bar);
            $('#product-result').removeClass('d-none').addClass('d-block');

            // Refrescar lista de productos
            listarProductos();
        }
    });
}

// Eliminar producto
function eliminarProducto(productId) {
    if (confirm("De verdad deseas eliminar el Producto")) {
        $.ajax({
            url: './backend/product-delete.php',
            type: 'GET',
            data: { id: productId },
            success: function (response) {
                let respuesta = JSON.parse(response);
                let template_bar = `
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>
                `;

                $('#container').html(template_bar);
                $('#product-result').removeClass('d-none').addClass('d-block');

                // Refrescar lista de productos
                listarProductos();
            }
        });
    }
}

$(document).ready(function() {
    // Cargar productos al iniciar la página
    cargarProductos();

    // Función para mostrar productos en la tabla
    function cargarProductos() {
        $.ajax({
            url: './backend/product-list.php', // Archivo donde se cargan los productos
            method: 'GET',
            success: function(response) {
                let productos = JSON.parse(response);
                let template = '';
                
                productos.forEach(producto => {
                    let descripcion = `
                        <li>precio: <input type="text" class="edit-input" data-field="precio" data-id="${producto.id}" value="${producto.precio}" disabled></li>
                        <li>unidades: <input type="text" class="edit-input" data-field="unidades" data-id="${producto.id}" value="${producto.unidades}" disabled></li>
                        <li>modelo: <input type="text" class="edit-input" data-field="modelo" data-id="${producto.id}" value="${producto.modelo}" disabled></li>
                        <li>marca: <input type="text" class="edit-input" data-field="marca" data-id="${producto.id}" value="${producto.marca}" disabled></li>
                        <li>detalles: <input type="text" class="edit-input" data-field="detalles" data-id="${producto.id}" value="${producto.detalles}" disabled></li>
                    `;

                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="edit-product btn btn-primary">Editar</button>
                                <button class="save-product btn btn-success d-none">Guardar</button>
                            </td>
                        </tr>
                    `;
                });

                $('#products').html(template); // Insertar en el DOM
            }
        });
    }

    // Evento para habilitar los campos de edición
    $(document).on('click', '.edit-product', function() {
        $(this).siblings('.save-product').removeClass('d-none'); // Mostrar el botón de "Guardar"
        $(this).closest('tr').find('input').prop('disabled', false); // Habilitar los inputs
    });

    // Evento para guardar los cambios de edición
    $(document).on('click', '.save-product', function() {
        let tr = $(this).closest('tr');
        let productId = tr.attr('productId');
        let updatedData = {};

        // Recorrer todos los inputs del producto para recolectar los nuevos datos
        tr.find('input').each(function() {
            let field = $(this).data('field');
            let value = $(this).val();
            updatedData[field] = value;
        });

        // Realizar la petición AJAX para actualizar el producto
        $.ajax({
            url: './backend/product-update.php',
            method: 'POST',
            data: {
                id: productId,
                datos: updatedData
            },
            success: function(response) {
                let result = JSON.parse(response);
                if (result.status === 'success') {
                    alert('Producto actualizado correctamente');
                    cargarProductos(); // Recargar los productos
                } else {
                    alert('Error al actualizar el producto');
                }
            }
        });
    });
});


