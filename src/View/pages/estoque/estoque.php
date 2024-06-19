<?php

session_start();

require_once (ROOT . '/src/utils/ValidaAcesso.php');

use Utils\ValidaAcesso;

ValidaAcesso::validarAcesso();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once (ROOT . "/src/View/layout/head.php"); ?>
</head>

<body>

    <?php include_once (ROOT . "/src/View/components/navbar.php"); ?>

    <div class="d-flex flex-direction-column">

        <!-- Menu de utilitários -->
        <?php include_once (ROOT . '/src/View/components/menu-lateral.php') ?>

        <div class="container my-4">

            <div class="detalhes-mesa justify-content-center rounded-4"
                style="background-color: var(--primary-color); min-height: 85vh">

                <div class="p-4 d-flex flex-column justify-content-between">

                <div class="d-flex flex-direction-row justify-content-between align-items-center">
                    <h3 class="title ms-2 my-4 fw-bold text-center">Estoque de ingredientes</h3>
                    <a class="btn btn-primary button-primary-system border-0" href="<?php echo HOST ?>/estoque/incluir" role="button">Adicionar ingrediente</a>
                </div>
                    
                    <table class="tabela w-100">
                        <thead>
                            <tr>
                                <th class="p-3" scope="col">Código</th>
                                <th class="p-3" scope="col">Descrição</th>
                                <th class="p-3" scope="col">Marca</th>
                                <th class="p-3" scope="col">Fornecedor</th>
                                <th class="p-3" scope="col">Custo</th>
                                <th class="p-3" scope="col">Estoque Atual</th>
                                <th class="p-3" scope="col">Estoque Max</th>
                                <th class="p-3" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach($ingredientes as $ingrediente) { ?>
                            <tr>
                                <th class="p-3" scope="row"><?php echo $ingrediente->getId(); ?></th>
                                <td class="p-3"><?php echo $ingrediente->getDescricao(); ?></td>
                                <td class="p-3"><?php echo $ingrediente->getMarca(); ?></td>
                                <td class="p-3"><?php echo $ingrediente->getFornecedor(); ?></td>
                                <td class="p-3"><?php echo $ingrediente->getValorCusto(); ?></td>
                                <td class="p-3"><?php echo $ingrediente->getEstoqueAtual(); ?></td>
                                <td class="p-3"><?php echo $ingrediente->getEstoqueMaximo(); ?></td>
                                
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="<?php echo HOST ?>/estoque/editar/<?php echo $ingrediente->getId() ?>" class="btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                        </svg>
                                    </a>

                                    <a type="button" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg>
                                    </a>
                                </div>
                                </td>
                            </tr> 
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>