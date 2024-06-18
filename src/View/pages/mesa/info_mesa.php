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

    <!-- Menu de utilitários -->
    <?php include_once (ROOT . '/src/View/components/menu-lateral.php'); ?>

    <div class="container my-4">

    <form method="POST" action="<?php echo HOST ?>/mesa/detalhes">
        <div class="search d-flex flex-direction-row justify-content-between p-4 rounded-top-4" style="background-color: var(--primary-color);">
            
        <div class="d-flex flex-direction-row">
            <h4 class="title me-4">N° Mesa:</h4>
            <input name="numeroMesa" id="numeroMesa" value="<?php echo isset($numeroMesa) ? $numeroMesa : '' ?>" class="form-control input-primary border-0 rounded-2 w-50" type="text">
        </div>

        <div class="d-flex flex-direction-row">
        <h4 class="title me-4">Pagamento:</h4>
        <select class="form-select input-primary border-0" id="metodoPagamento" aria-label="Default select example">
            <option selected>Selecione o método de pagamento</option>
            <option value="1">Cartão de crédito</option>
            <option value="2">Cartão de débito</option>
            <option value="3">PIX</option>
        </select>   
        </div>
        </div>

        <div class="detalhes-mesa justify-content-center rounded-bottom-4" style="background-color: var(--primary-color); min-height: 75vh">

        <div class="p-4 d-flex flex-direction-row justify-content-between">
            <table class="tabela w-100">
                <thead>
                    <tr>
                        <th class="p-2" scope="col">
                            <svg width="20" height="20" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 25H13.6787M13.6787 25H13.8213M13.6787 25C11.3705 24.9812 9.16314 24.051 7.53757 22.4121C5.91201 20.7732 4.99992 18.5584 5 16.25V11.1538C5 10.5163 5.51625 10 6.15375 10H21.3462C21.9837 10 22.5 10.5163 22.5 11.1538V11.25M13.8213 25H22.5M13.8213 25C16.1295 24.9812 18.3369 24.051 19.9624 22.4121C21.588 20.7732 22.5001 18.5584 22.5 16.25M22.5 11.25H24.375C25.2038 11.25 25.9987 11.5792 26.5847 12.1653C27.1708 12.7513 27.5 13.5462 27.5 14.375C27.5 15.2038 27.1708 15.9987 26.5847 16.5847C25.9987 17.1708 25.2038 17.5 24.375 17.5H22.5V16.25M22.5 11.25V16.25M18.75 3.75L17.5 6.25M15 3.75L13.75 6.25M11.25 3.75L10 6.25" stroke="#F2E8DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </th>
                        <th class="p-2" scope="col">Produto</th>
                        <th class="p-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="p-2" scope="row">31</th>
                        <td class="p-2">Café descafeinado</td>
                        <td class="p-2">R$ 35,50</td>
                    </tr>
                    <tr>
                        <th class="p-2" scope="row">31</th>
                        <td class="p-2">Café descafeinado</td>
                        <td class="p-2">R$ 35,50</td>
                    </tr>
                    <tr>
                        <th class="p-2" scope="row">31</th>
                        <td class="p-2">Café descafeinado</td>
                        <td class="p-2">R$ 35,50</td>
                    </tr>
                    <tr>
                        <th class="p-2" scope="row">31</th>
                        <td class="p-2">Café descafeinado</td>
                        <td class="p-2">R$ 35,50</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex flex-direction-row justify-content-end p-4">
            <h4 class="title me-4">Total:</h4>
            <input name="totalMesa" id="totalMesa" value="R$ 500,00" class="form-control input-primary border-0 rounded-2 w-25" type="text" readonly>
        </div>

        <div class="d-flex justify-content-end p-4">
            <button type="button" class="btn btn-primary btn-danger fw-semibold btn-lg border border-0 mx-4">
                Cancelar
            </button>

            <button type="button" class="btn btn-secondary btn-success fw-semibold btn-lg border border-0">
                Finalizar
            </button>
        </div>

        </div>
    </form>
    </div>
</div>
</body>
</html> 