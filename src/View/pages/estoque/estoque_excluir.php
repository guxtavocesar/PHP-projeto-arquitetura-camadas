<?php

session_start();

require_once (ROOT.'/src/utils/ValidaAcesso.php');
require_once (ROOT.'/src/BLL/Ingrediente.php');
require_once (ROOT.'/src/Model/Ingrediente.php');

use Utils\ValidaAcesso;

ValidaAcesso::validarAcesso();

$showBottons = true;

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $resposta = false;
    $showBottons = false;

    if ($_POST['resposta'] == 'sim') {
        echo 'exclusão concluida';
        $resposta = true;

        $bllIngrediente = new \BLL\Ingrediente();
        $bllIngrediente->deleteBy($_POST['idIngrediente']);
    }
    
    if ($_POST['resposta'] == 'nao') {
        echo 'operação cancelada';
        $resposta = false;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include_once (ROOT . "/src/View/layout/head.php"); ?>

<body>

    <?php include_once (ROOT . "/src/View/components/navbar.php"); ?>

    <form method="POST">
        <div class="d-flex flex-direction-column">

            <!-- Menu de utilitários -->
            <?php include_once (ROOT . '/src/View/components/menu-lateral.php') ?>

            <div class="container my-4">
                <div class="d-flex justify-content-center rounded-4">
                    <div class="rounded-3 p-5 mt-4 w-75" style="background-color: var(--primary-color); min-height: 40vh;">
                        <div class="d-flex flex-direction-row justify-content-center">
                            <h3 class="fs-2 mb-4 mx-2 logo-title">Deseja realmente excluir do estoque?</h3>
                        </div>

                        <?php if(isset($resposta) && $resposta){ ?>

                            <div class="alert alert-warning" role="alert">
                                <span class="fw-medium">Operação concluida com sucesso</span>
                            </div>

                        <?php } ?>

                        <?php if(isset($resposta) && !$resposta){ ?>

                            <div class="alert alert-warning" role="alert">
                                <span class="fw-medium">Operação cancelada pelo usuário</span>
                            </div>

                        <?php } ?>

                        
                        <?php if($showBottons){ ?>

                            <div class="d-flex gap-2 mx-auto my-4 justify-content-center">
                                <button type="submit" name="resposta" value="sim" class="btn btn-primary my-3 button-primary-system fw-semibold btn-lg border border-0"  style="background-color: #438932; min-width: 50%">
                                    SIM
                                </button>
                            </div>

                            <div class="d-flex gap-2 mx-auto my-4 justify-content-center">
                                <button type="submit" name="resposta" value="nao" class="btn btn-primary my-3 button-primary-system fw-semibold btn-lg border border-0" style="background-color: #F45454; min-width: 50%">
                                    NÃO
                                </button>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>



</body>
</html>

