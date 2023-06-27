<!DOCTYPE html>
<html>
<head>
    <title>Registro de datos para generar entrada</title>
    <style>
        body {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
            padding: 0;
            margin: 0;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
            background: #555;
            color: white;
        }
        .input-field::placeholder {
            color: white;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        button.btn-registrar-datos {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Datos del comprador</h2>
    <form id="compraForm" action="<?= base_url('VentaSouvenirsController/confirmarCompraEntrada'); ?>" method="post" onsubmit="submitForm(event)">
        <input type="hidden" id="partidoId" name="partidoId" value="<?= $id; ?>">
        <label for="nombre_comprador">Nombre completo:</label>
        <input class="input-field" type="text" id="nombre_comprador" name="nombre_comprador" placeholder="Nombre Completo" required>

        <label for="rut_comprador">Rut con guíon:</label>
        <input class="input-field" type="text" id="rut_comprador" name="rut_comprador" placeholder="Rut con guión" required>

        <button href="<?= base_url('VentaEntradas'); ?>" type="submit" id="myBtn" class="btn-registrar-datos">Confirmar compra</button>
    </form>
</div>

<script>
function submitForm(event) {
    event.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "<?= base_url('VentaSouvenirsController/confirmarCompraEntrada'); ?>", true);
    xhr.responseType = "blob";
    xhr.onload = function () {
        if (xhr.status === 200) {
            var blob = new Blob([xhr.response], { type: "application/pdf" });
            var url = URL.createObjectURL(blob);
            var link = document.createElement("a");
            link.href = url;
            link.download = "boleta_compra_" + (new Date()).toISOString().slice(0, 19).replace(/[-:]/g, "") + ".pdf";
            link.click();
            window.location.href = "<?= base_url('VentaEntradas'); ?>";
        }
    };
    var formData = new FormData(document.getElementById("compraForm"));
    xhr.send(formData);
}
</script>
</body>
</html>
