<?php

session_start();

require_once (ROOT.'/src/utils/ValidaAcesso.php');
require_once (ROOT.'/src/BLL/Ingrediente.php');
require_once (ROOT.'/src/MODEL/Ingrediente.php');

use Utils\ValidaAcesso;

ValidaAcesso::validarAcesso();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $ingrediente = new \MODEL\Ingrediente();

    $ingrediente->setDescricao($_POST['descricao']);
    $ingrediente->setEstoqueAtual($_POST['quantidadeAtual']);
    $ingrediente->setEstoqueMaximo($_POST['quantidadeMaxima']);
    $ingrediente->setValorCusto($_POST['valorCusto']);
    $ingrediente->setValorVenda($_POST['valorVenda']);
    $ingrediente->setIdFornecedor($_POST['fornecedor']);
    $ingrediente->setMarca($_POST['marca']);

    $bllIngrediente = new \BLL\Ingrediente();
    $bllIngrediente->insert($ingrediente);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include_once (ROOT . "/src/View/layout/head.php"); ?>

<body>

    <?php include_once (ROOT . "/src/View/components/navbar.php"); ?>

    <form method="POST" name="formIncluirEstoque">
        <div class="d-flex flex-direction-column">

            <!-- Menu de utilitários -->
            <?php include_once (ROOT . '/src/View/components/menu-lateral.php') ?>

            <div class="container my-4">
                <div class="d-flex justify-content-center rounded-4">
                    <div class="rounded-3 p-5 mt-4 w-75" style="background-color: var(--primary-color); min-height: 60vh;">
                        <div class="d-flex flex-direction-row justify-content-center">
                            <h3 class="fs-2 mb-4 mx-2 logo-title">Adicionar estoque de ingrediente</h3>
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label title fw-semibold">Descrição</label>
                            <input type="text" class="form-control input-primary border-0" id="descricao" name="descricao">
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="quantidadeAtual" class="form-label title fw-semibold">Quantidade Atual</label>
                                <input type="number" class="form-control input-primary border-0" id="quantidadeAtual" name="quantidadeAtual">
                            </div>

                            <div class="col-6">
                                <label for="quantidadeMaxima" class="form-label title fw-semibold">Quantidade Máxima</label>
                                <input type="number" class="form-control input-primary border-0" id="quantidadeMaxima" name="quantidadeMaxima">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="valorCusto" class="form-label title fw-semibold">Valor de custo</label>
                                <input type="text" class="form-control input-primary border-0" id="valorCusto" name="valorCusto">
                            </div>

                            <div class="col-6">
                                <label for="valorVenda" class="form-label title fw-semibold">Valor de venda</label>
                                <input type="text" class="form-control input-primary border-0" id="valorVenda" name="valorVenda">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="marca" class="form-label title fw-semibold">Marca</label>
                            <input type="text" class="form-control   input-primary border-0" id="marca" name="marca">
                        </div>

                        <div class="mb-3">
                            <label for="fornecedor" class="form-label title fw-semibold">Fornecedor</label>
                            <select class="form-select input-primary border-0" id="fornecedor" name="fornecedor">

                                <?php foreach($fornecedores as $fornecedor){ ?>
                                    <option value="<?php echo $fornecedor->getId(); ?>"><?php echo $fornecedor->getNome(); ?></option>
                                <?php } ?>
                            </select> 
                        </div>

                        <div class="d-grid gap-4 mx-auto my-4">
                            <button type="submit" class="btn btn-primary my-3 button-primary-system fw-semibold btn-lg border border-0">
                                Cadastrar
                                <svg width="20" height="20" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.1146 6.11466C22.6147 5.61473 23.2928 5.33389 23.9999 5.33389C24.707 5.33389 25.3852 5.61473 25.8853 6.11466L37.8853 18.1147C38.3852 18.6147 38.666 19.2929 38.666 20C38.666 20.7071 38.3852 21.3853 37.8853 21.8853L25.8853 33.8853C25.3823 34.3711 24.7087 34.6399 24.0095 34.6338C23.3103 34.6277 22.6415 34.3473 22.1471 33.8528C21.6526 33.3584 21.3722 32.6896 21.3661 31.9904C21.36 31.2912 21.6288 30.6176 22.1146 30.1147L29.3333 22.6667H3.99992C3.29267 22.6667 2.6144 22.3857 2.1143 21.8856C1.6142 21.3855 1.33325 20.7072 1.33325 20C1.33325 19.2927 1.6142 18.6145 2.1143 18.1144C2.6144 17.6143 3.29267 17.3333 3.99992 17.3333H29.3333L22.1146 9.88532C21.6147 9.38525 21.3338 8.70709 21.3338 7.99999C21.3338 7.29289 21.6147 6.61473 22.1146 6.11466Z" fill="#F2E8DF" />
                                </svg>
                            </>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>