<?php
session_start();

require_once (ROOT.'/src/utils/ValidaAcesso.php');
require_once (ROOT.'/src/BLL/Ingrediente.php');

use Utils\ValidaAcesso;

ValidaAcesso::validarAcesso();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if ($_POST['logout'] == "true") {
        session_destroy();

        header('location: ' .HOST);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include_once (ROOT . "/src/View/layout/head.php"); ?>

<body>

    <?php include_once (ROOT . "/src/View/components/navbar.php"); ?>

    <form method="POST">
        <div class="d-flex flex-direction-row">

            <!-- Menu de utilitários -->
            <?php include_once (ROOT . '/src/View/components/menu-lateral.php') ?>

            <div class="flex-row container my-4">
                <div class="d-flex justify-content-center rounded-4">
                    <div class="rounded-3 p-5 mt-4 w-75" style="background-color: var(--primary-color); min-height: 60vh;">
                        
                        <div class="d-flex flex-direction-row justify-content-between align-items-center">
                            <h3 class="fs-2 mb-4 mx-2 logo-title">Informações do Funcionário</h3>
                            <svg width="135" height="135" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M44 26.6667H52.75M44 35.4167H52.75M44 44.1667H52.75M35.25 47.0833C34.3575 45.2954 32.5288 44.1667 30.5308 44.1667H22.4692C20.4713 44.1667 18.6425 45.2954 17.75 47.0833M11.9167 15H58.5833C59.3569 15 60.0988 15.3073 60.6457 15.8543C61.1927 16.4013 61.5 17.1431 61.5 17.9167V52.9167C61.5 53.6902 61.1927 54.4321 60.6457 54.9791C60.0988 55.526 59.3569 55.8333 58.5833 55.8333H11.9167C11.1431 55.8333 10.4013 55.526 9.85427 54.9791C9.30729 54.4321 9 53.6902 9 52.9167V17.9167C9 17.1431 9.30729 16.4013 9.85427 15.8543C10.4013 15.3073 11.1431 15 11.9167 15ZM32.3333 29.5833C32.3333 31.1304 31.7188 32.6142 30.6248 33.7081C29.5308 34.8021 28.0471 35.4167 26.5 35.4167C24.9529 35.4167 23.4692 34.8021 22.3752 33.7081C21.2812 32.6142 20.6667 31.1304 20.6667 29.5833C20.6667 28.0362 21.2812 26.5525 22.3752 25.4585C23.4692 24.3646 24.9529 23.75 26.5 23.75C28.0471 23.75 29.5308 24.3646 30.6248 25.4585C31.7188 26.5525 32.3333 28.0362 32.3333 29.5833Z" stroke="#F2E8DF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>

                        <div class="mb-3">
                            <p class="title fw-semibold" style="font-size: 2rem">ID: <small><?php echo $_SESSION['user']['IdFuncionario'] ?></small> </f>
                        </div>
                        <div class="mb-3">
                            <p class="title fw-semibold" style="font-size: 2rem">Nome: <small><?php echo $_SESSION['user']['Nome'] ?></small> </>
                        </div>
                        <div class="mb-3">
                            <p class="title fw-semibold" style="font-size: 2rem">Nascimento: <small><?php echo $_SESSION['user']['Nascimento'] ?></small> </>
                        </div>
                        <div class="mb-3">
                            <p class="title fw-semibold" style="font-size: 2rem">CPF: <small><?php echo $_SESSION['user']['CPF'] ?></small> </>
                        </div>
                        <div class="mb-3">
                            <p class="title fw-semibold" style="font-size: 2rem">Tipo: <small><?php echo $_SESSION['user']['IdTipoFuncionario'] ?></small> </>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <button type="submit" name="logout" value="true" class="btn btn-primary my-3 button-primary-system fw-semibold btn-lg border border-0">
                                <a>Sair
                                    <svg width="20" height="20" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.1146 6.11466C22.6147 5.61473 23.2928 5.33389 23.9999 5.33389C24.707 5.33389 25.3852 5.61473 25.8853 6.11466L37.8853 18.1147C38.3852 18.6147 38.666 19.2929 38.666 20C38.666 20.7071 38.3852 21.3853 37.8853 21.8853L25.8853 33.8853C25.3823 34.3711 24.7087 34.6399 24.0095 34.6338C23.3103 34.6277 22.6415 34.3473 22.1471 33.8528C21.6526 33.3584 21.3722 32.6896 21.3661 31.9904C21.36 31.2912 21.6288 30.6176 22.1146 30.1147L29.3333 22.6667H3.99992C3.29267 22.6667 2.6144 22.3857 2.1143 21.8856C1.6142 21.3855 1.33325 20.7072 1.33325 20C1.33325 19.2927 1.6142 18.6145 2.1143 18.1144C2.6144 17.6143 3.29267 17.3333 3.99992 17.3333H29.3333L22.1146 9.88532C21.6147 9.38525 21.3338 8.70709 21.3338 7.99999C21.3338 7.29289 21.6147 6.61473 22.1146 6.11466Z" fill="#F2E8DF" />
                                    </svg>
                                </a>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>