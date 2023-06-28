<center><h2>Checkout</h2></center>

<form id="checkoutForm" action="<?= base_url('VentaSouvenirsController/confirmarCompra'); ?>" method="post" class="checkout-form" onsubmit="submitForm(event)">
    <label for="nombre">Nombre completo:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="telefono">Telefono:</label>
    <input type="text" id="telefono" name="telefono" required>

    <label for="entrega">Opción de entrega:</label>
    <select id="entrega" name="entrega" onchange="mostrarInputDireccion(this.value)" required>
        <option value="">Seleccione una opción...</option>
        <option value="retiro">Retiro en club</option>
        <option value="despacho">Despacho a domicilio</option>
    </select>

    <div id="direccionInput" style="display: none;">
        <label for="direccion">Dirección de envío:</label>
        <input type="text" id="direccion" name="direccion">
    </div>

    <div id="retiroInfo" style="display: none;">
        <p>Cuenta con 30 dias a partir de la compra para retirar sus productos.</p>
    </div>

    <div id="despachoInfo" style="display: none;">
        <p>El despacho tiene un valor total de $10.000 a todo Chile.</p>
    </div>

    <button href="<?= base_url('TiendaOficial'); ?>" type="submit" id="myBtn" class="btn-registrar-datos">Confirmar compra</button>
</form>

<style>
    body {
        background-color: #333;
        color: #fff;
        font-family: Arial, sans-serif;
    }

    .checkout-form {
        display: flex;
        flex-direction: column;
        width: 300px;
        margin: 0 auto;
    }

    .checkout-form label {
        margin: 10px 0 5px 0;
    }

    .checkout-form input, .checkout-form select {
        padding: 10px;
        margin-bottom: 10px;
        border: none;
        background-color: #555;
        color: #fff;
    }

    .checkout-form button {
        padding: 10px;
        border: none;
        background-color: #4CAF50;
        color: #fff;
        cursor: pointer;
        margin-top: 10px;
    }

    .checkout-form button:hover {
        background-color: #45a049;
    }
</style>

<script>
function submitForm(event) {
    // Detiene el envío del formulario
    event.preventDefault();

    // Realiza la petición AJAX para enviar el formulario y descargar el PDF
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "<?= base_url('VentaSouvenirsController/confirmarCompra'); ?>", true);
    xhr.responseType = "blob";

    xhr.onload = function () {
        if (xhr.status === 200) {
            // Crea un enlace para descargar el PDF
            var blob = new Blob([xhr.response], { type: "application/pdf" });
            var url = URL.createObjectURL(blob);
            var link = document.createElement("a");
            link.href = url;
            link.download = "boleta_compra_" + (new Date()).toISOString().slice(0, 19).replace(/[-:]/g, "") + ".pdf";

            // Simula el clic en el enlace para iniciar la descarga del PDF
            link.click();

            // Redirige a TiendaOficial después de descargar el PDF
            window.location.href = "<?= base_url('TiendaOficial'); ?>";
        }
    };

    // Envía el formulario
    var formData = new FormData(document.getElementById("checkoutForm"));
    xhr.send(formData);
}
function mostrarInputDireccion(value) {
    if (value === 'despacho') {
        document.getElementById('direccionInput').style.display = 'block';
        document.getElementById('retiroInfo').style.display = 'none';
        document.getElementById('despachoInfo').style.display = 'block';
    } else if (value === 'retiro') {
        document.getElementById('direccionInput').style.display = 'none';
        document.getElementById('retiroInfo').style.display = 'block';
        document.getElementById('despachoInfo').style.display = 'none';
    } else {
        document.getElementById('direccionInput').style.display = 'none';
        document.getElementById('retiroInfo').style.display = 'none';
    }
}
</script>

