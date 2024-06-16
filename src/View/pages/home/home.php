<!DOCTYPE html>
<html lang="pt-br">

<?php include_once(ROOT."/src/View/layout/head.php");  ?>

<body>

<?php include_once(ROOT."/src/View/components/navbar.php"); ?>

<div class="d-flex flex-direction-column">

    <!-- Menu de utilitários -->
    <?php include_once (ROOT . '/src/View/components/menu-lateral.php') ?>

    <div class="container my-4">

        <div class="search d-flex flex-direction-row p-4 rounded-top-4" style="background-color: var(--primary-color);">
            <h4 class="title me-4">N° Mesa:</h4>
            <input class="form-control input-primary border-0 rounded-2 w-25" type="text">
        </div>

        <!-- Containes de detalhes e informações da busca referente a mesa -->
        <?php include_once (ROOT . '/src/View/components/info-mesa.php') ?>
    </div>
</div>
</body>

<script>

async function hello(){

    const response = await fetch('<?php echo HOST ?>/home/hello');

    const data = await response.json();
    console.log(data.message);
}

hello();

</script>
</html>