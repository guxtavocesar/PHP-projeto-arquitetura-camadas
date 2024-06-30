<!DOCTYPE html>
<html lang="pt-br">

<?php include_once(ROOT."/src/View/layout/head.php");  ?>

<body>

<?php include_once(ROOT."/src/View/components/navbar.php"); ?>

<div class="d-flex flex-direction-column">

    <!-- Menu de utilitários -->
    <?php include_once (ROOT . '/src/View/components/menu-lateral.php'); ?>

    <div class="container my-4">
        <form method="POST">
            <div class="detalhes-mesa justify-content-center rounded-4" style="background-color: var(--primary-color); min-height: 85vh;">
                <div class="row px-4 py-5">
                    <div class="col-4 d-flex flex-direction-row align-items-center">
                        <h4 class="title me-4">Produto:</h4>
                        <select class="form-select input-primary border-0" name="txtProduto" id="txtProduto">

                        <?php foreach($produtos as $produto){ ?>
                            <option value="<?php echo $produto->getId(); ?>"><?php echo $produto->getDescricao(); ?></option>
                        <?php } ?>
                        </select>  
                    </div>

                    <div class="col-4 d-flex flex-direction-row align-items-center">
                        <h4 class="title me-4">Qtde:</h4>
                        <input name="txtQuantidade" id="txtQuantidade" class="form-control input-primary border-0 rounded-2" type="number" required>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary button-primary-system fw-semibold btn-lg border border-0 w-100" name="enviar">
                            Enviar
                        </button>
                    </div>
                </div>

                <?php if($message != ''){ ?>

                <div class="alert mx-4 d-flex align-items-center fw-medium" role="alert" style="background-color: var(--second-color);">
                    <?php echo $message ?>
                </div>

                <?php } ?>

                <?php if(isset($vendas)){ ?>
                    
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
                                <th class="p-2" scope="col">Qtde</th>
                                <th class="p-2" scope="col">Valor à ser pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($vendas as $venda){ ?>
                            <tr>
                                <th class="p-2" scope="row"><?php echo $venda->getIdVenda() ?></th>
                                <td class="p-2"><?php echo $venda->produto->getDescricao() ?></td>
                                <td class="p-2"><?php echo $venda->getQuantidade() ?></td>
                                <td class="p-2">R$ <?php echo $venda->getValorTotal() ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end p-4">
                    <a type="button" href="<?php echo HOST."/mesa/detalhes/$numeroMesa"; ?>" class="btn btn-primary btn-success fw-semibold btn-lg border border-0">
                        Concluir
                    </a>
                </div>

                <?php } ?> 
            </div>
        </form>
    </div>
</div>
</body>
</html> 