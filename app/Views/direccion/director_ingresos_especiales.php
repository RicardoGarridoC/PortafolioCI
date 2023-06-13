<?= $this->extend('layout/direccion_template') ?>
<?= $this->section('direccion_contenido') ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    
    <link rel="stylesheet" type="text/css" href="styles.css">

    <style>
        html,
        body {
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .container {
            height: 100%;
            align-content: center;
        }

        .card {
            height: 300px;
            margin-top: 300px;
            margin-bottom: auto;
            width: 300px;
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .social_icon span {
            font-size: 60px;
            margin-left: 10px;
            color: #000000;
        }

        .social_icon span:hover {
            color: white;
            cursor: pointer;
        }

        .card-header h3 {
            color: rgb(255, 255, 255);
        }

        .social_icon {
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #FFC312;
            color: black;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;

        }

        .remember {
            color: white;
        }

        .remember input {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn {
            color: black;
            background-color: #FFC312;
            width: 265px;
        }

        .login_btn:hover {
            color: black;
            background-color: white;
        }

        .links {
            color: white;
        }

        .links a {
            margin-left: 4px;
        }
        .input-group-text {
        padding: 1.2rem;
        }
    </style>

    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h5>Ingresar ingreso especial</h5>

                </div>
                <div class="card-body">
                    <form action="<?php echo base_url(); ?>IngresosEspeciales" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                            <input type="number" name="monto" id="monto" class="form-control" placeholder="Ingresar monto" required>

                        </div>
                        <br>
                        <input type="submit" value="Ingresar" class="btn login_btn">
                </div>
                <br>



                </form>
                <div class="row">


                </div>

            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<?= $this->endSection() ?>