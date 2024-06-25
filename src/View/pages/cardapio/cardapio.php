<?php

session_start();

require_once(ROOT.'/src/utils/ValidaAcesso.php');

use Utils\ValidaAcesso;

ValidaAcesso::validarAcesso();

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include_once(ROOT."/src/View/layout/head.php");  ?>

<body>

<?php include_once(ROOT."/src/View/components/navbar.php"); ?>

<div class="d-flex flex-direction-column">

    <!-- Menu lateral -->
    <?php include_once(ROOT."/src/View/components/menu-lateral.php"); ?>

    <div class="container my-4 mb-5">

        <div class="menu-cardapios container p-5 rounded-4" style="background-color: var(--primary-color);">
            
        <div class="row mb-2">

            <div class="cardapio card col">
                <a class="link-offset-2 link-underline link-underline-opacity-0"  href="#">
                    <img class="card-img-top w-100 pt-2" src="https://images.unsplash.com/photo-1523179985834-1363f5c47d84?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image cap">
                    <div class="card-body" style="max-height: 3rem;">
                        <h4 class="card-title text-center align-items-start text-white">Bebidas quentes</>
                    </div>
                </a>
            </div>

            <div class="cardapio card col">
                <a class="link-offset-2 link-underline link-underline-opacity-0" href="#">
                    <img class="card-img-top w-100 pt-2" src="https://images.unsplash.com/photo-1471691118458-a88597b4c1f5?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image cap">
                    <div class="card-body" style="max-height: 3rem;">
                        <h4 class="card-title text-center text-white">Bebidas frias</>
                    </div>
                </a>
            </div>

            <div class="cardapio card col">
                <a class="link-offset-2 link-underline link-underline-opacity-0" href="#">
                    <img class="card-img-top w-100 pt-2" src="https://images.unsplash.com/photo-1602296751035-fe8c7d0a6328?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image cap">
                    <div class="card-body" style="max-height: 3rem;">
                        <h4 class="card-title text-center text-white">Doces</>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">

        <div class="cardapio card col">
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#">
                <img class="card-img-top w-100 pt-2" src="https://images.unsplash.com/photo-1593001874117-c99c800e3eb8?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image cap">
                <div class="card-body" style="max-height: 3rem;">
                    <h4 class="card-title text-center text-white">Salgados</>
                </div>
            </a>
        </div>

        <div class="cardapio card col">
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#">
                <img class="card-img-top w-100 pt-2" src="https://images.unsplash.com/photo-1526230427044-d092040d48dc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image cap">
                <div class="card-body" style="max-height: 3rem;">
                    <h4 class="card-title text-center text-white">Porções</>
                </div>
            </a>
        </div>

        <div class="cardapio card col">
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#">
                <img class="card-img-top w-100 pt-2" src="https://images.unsplash.com/photo-1512372388054-a322888e67a6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image cap">
                <div class="card-body" style="max-height: 3rem;"   >
                    <h4 class="card-title text-center text-white">Agranel</>
                </div>
            </a>
        </div>
        </div>
    </div>
</div>

</div>
</body>
</html>