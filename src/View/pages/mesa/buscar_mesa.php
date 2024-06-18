<?php

session_start();

require_once(ROOT.'/src/utils/ValidaAcesso.php');

use Utils\ValidaAcesso;

ValidaAcesso::validarAcesso();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once(ROOT."/src/View/layout/head.php"); ?>
</head>
<body>

<?php include_once(ROOT."/src/View/components/navbar.php"); ?>

<div class="d-flex flex-direction-column">

    <!-- Menu de utilitários -->
    <?php include_once (ROOT . '/src/View/components/menu-lateral.php') ?>

    <div class="container my-4">

        <form id="mesaForm" onsubmit="buscaMesa(event)">
            <div class="search d-flex flex-direction-row p-4 rounded-top-4" style="background-color: var(--primary-color);">
                <h4 class="title me-4">N° Mesa:</h4>
                <input name="numeroMesa" id="numeroMesa" class="form-control input-primary border-0 rounded-2" style="width: 12vw;" type="text">
            </div>

            <div class="detalhes-mesa d-flex flex-column justify-content-center align-items-center justify-content-center rounded-bottom-4"
                 style="background-color: var(--primary-color); min-height: 69vh">

                <svg class="mb-5" width="200" height="200" viewBox="0 0 276 276" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M34.6072 252.771C82.2 292.779 164.207 279.986 222.107 222.107C274.5 169.714 289.929 97.5857 262.757 49.0714C261.646 53.0525 260.432 57.0039 259.114 60.9214C252.086 82.05 239.957 109.179 219.75 129.407C208.179 140.979 194.036 146.336 179.914 148.907C166.307 151.393 151.736 151.393 138.6 151.393H138C124.179 151.393 111.879 151.436 100.864 153.429C90.1286 155.379 81.6857 159.043 75.1929 165.536C59.2714 181.457 48.7929 204.021 42.2786 223.543C39.1025 233.113 36.5402 242.875 34.6072 252.771ZM13.2429 226.929C-13.9286 178.414 1.50001 106.286 53.8929 53.8929C111.793 -4.00714 193.8 -16.7572 241.393 23.2286C239.453 33.1253 236.884 42.888 233.7 52.4571C227.207 71.9571 216.729 94.5429 200.807 110.464C194.314 116.957 185.871 120.621 175.136 122.571C164.121 124.564 151.821 124.607 138 124.607H137.4C124.264 124.607 109.693 124.607 96.0857 127.071C81.9643 129.643 67.8214 135.021 56.25 146.593C36.0429 166.821 23.9143 193.95 16.8857 215.079C15.4929 219.236 14.2929 223.221 13.2429 226.929Z" fill="#8C5042" />
                </svg>
            </div>
        </form>
    </div>
</div>

<script>
function buscaMesa(event) {

    event.preventDefault();
    let numeroMesa = document.getElementById('numeroMesa').value;

    window.location.href = `<?php echo HOST ?>/mesa/detalhes/${numeroMesa}`;
}

async function hello() {

    const response = await fetch('<?php echo HOST ?>/mesa/hello');
    const data = await response.json();

    console.log(data.message);
}

</script>
</body>
</html>
