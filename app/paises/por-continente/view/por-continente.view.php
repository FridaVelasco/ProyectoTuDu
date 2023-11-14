<h1 class="text-center">App Paises</h1>
<hr>
<main class="row">
    <!-- Menu -->
    <section class="col-12 col-sm-6 col-md-4 col-lg-3">
        <?php
            require_once("./app/paises/common/menu/menu.php");
        ?>
    </section>

    <!-- Container -->
    <section class="col">
        <div class="col-12">
            <h3>Paises</h3>
            <hr>
        </div>
        <div id="button-container" class="col-12 text-center"></div>
        <div id="paises-container" class="col-12 row"></div>
    </section>

    <section class="col">
        <div class="container">
            <div class="card border-primary p-1" style="width: 18rem;">
                <!-- <img src="data:image/png;base64,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" class="card-img-top" alt="Bandera del país"> -->
                <div class="card-body">
                    <h5 class="card-title text-center">
                    <img src="https://flagcdn.com/uz.svg" alt="banderaPais" style="max-width: 30px; max-height: 30px;"></span>
                    <p>México</p>
                    <hr>
                    </h5>
                    <p class="card-text mb-1">Región: América</p>
                    <p class="card-text mb-1">Capital: CDMX</p>
                    <p class="card-text">Población: 7,065,548</p>
                </div>
                <div class="card-footer text-center">
                    <a class="btn btn-primary w-100" href="#">ver más</a>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="/app/paises/por-continente/controller/por-continente.controller.js"></script>