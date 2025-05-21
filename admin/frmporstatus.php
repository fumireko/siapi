<?php
    require_once("./Classes/dao/ChamadoDAO.php");
    include "../validar_session.php";  
    include "../Config/config_sistema.php";
    include "../validar_session2.php";

    if($_SESSION['nome_usuario'] == ''){
        header("Location: /");
    }

    $email_usuario = $_SESSION['email_usuario'];
    $nome_usuario = $_SESSION['nome_usuario'];
    $nivel_usuario = $_SESSION['nivel_usuario'];
    $funcao_usuario = $_SESSION['funcao_usuario'];
    $tbcmei_nome= $_SESSION['tbcmei_nome'];
    $consulta = mysqli_query($conn,"SELECT * FROM usuarios where email = '".$email_usuario."'");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>SISTEMA DE GESTÃO T.I</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<?php
    $regiao = $_REQUEST['regiao'] ?? '';
    $status = $_REQUEST['status'] ?? array('Pendente', 'Atendendo');
    $pagina = $_REQUEST['pagina'] ?? 1;  
    $itensPorPagina = $_REQUEST['itensPorPagina'] ?? 25;  
    $busca = $_POST['busca'] ?? '';

    $chamadoDAO = new ChamadoDAO($conn);
    $totalPaginas = ceil($chamadoDAO->contarChamados($regiao, $status, $busca) / $itensPorPagina);
    $chamados = $chamadoDAO->buscarChamados($regiao, $status, $itensPorPagina, $pagina, $busca);
?>

<!-- BEGIN BODY -->
<body>

<div class="container">
    
    <div class="d-flex justify-content-between mt-2">
        <a href="newsfeed.php" class="link-offset-2 link-underline link-underline-opacity-0">
            <span class="fw-semibold">
                <i class="fa fa-chevron-left"></i> Voltar
            </span>
        </a>
        <div class="text-break">
            <p class="d-flex justify-content-between fs-5 fw-semibold my-0">
                <span>
                    Bem-Vindo,
                    <?php echo $nome_usuario;?>  
                </span>
                <a href="../logout.php" class="link-offset-2 link-underline link-underline-opacity-0">
                    <i class="fa-solid fa-right-from-bracket"></i> Sair
                </a>
            </p>
            <p class="text-muted">
                <?php echo $tbcmei_nome;?>  
            </p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">LISTA DE CHAMADOS</h2>
        <form action="https://portal.colombo.pr.gov.br/siap/admin/achamado.php">
            <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Novo</button>
        </form>
    </div>

    <div class="d-flex-justify-content-between align-items-center mb-3">
        <span class="badge text-bg-primary">
            <i class="fa fa-clock fa-sm me-1"></i>
            <?= $chamadoDAO->contarChamados($regiao, 'atendendo', '') ?> chamados em atendimento
        </span>
        <span class="badge text-bg-secondary">
            <i class="fa fa-clock fa-sm me-1"></i>
            <?= $chamadoDAO->contarChamados($regiao, 'Pendente', '') ?> chamados pendentes
        </span>
    </div>

    <hr>

<form method="POST" action="./frmporstatus.php">
    <div class="input-group my-2">
        <div class="form-floating">
            <select class="form-select" name="regiao" id="regiao">
                <option value="" <?= $regiao == 'Todos' ? 'selected' : ''; ?>>Todos</option>
                <option value="Sede" <?= $regiao == 'Sede' ? 'selected' : ''; ?>>Sede</option>
                <option value="Regional Maracanã" <?= $regiao == 'Regional Maracanã' ? 'selected' : ''; ?>>Regional Maracanã</option>
                <option value="Osasco" <?= $regiao == 'Osasco' ? 'selected' : ''; ?>>Regional Osasco</option>
            </select>
            <label for="regiao">Região:</label>
        </div>
        
        <div class="form-floating">
            <select class="form-select" name="itensPorPagina" id="itensPorPagina">
                <option value="25" <?= $itensPorPagina == '25' ? 'selected' : ''; ?>>25 por página</option>
                <option value="50" <?= $itensPorPagina == '50' ? 'selected' : ''; ?>>50 por página</option>
                <option value="100" <?= $itensPorPagina == '100' ? 'selected' : ''; ?>>100 por página</option>
            </select>
            <label for="itensPorPagina">Itens por página:</label>
        </div>

        <div class="btn-group" role="group" aria-label="Status">
            <input class="btn-check" type="checkbox" id="statusPendente" value="Pendente" name="status[]" <?= in_array('Pendente', $status) ? 'checked' : '' ?>>
            <label class="btn btn-outline-primary" for="statusPendente">Pendente</label>

            <input class="btn-check" type="checkbox" id="statusAtendendo" value="Atendendo" name="status[]" <?= in_array('Atendendo', $status) ? 'checked' : '' ?>>
            <label class="btn btn-outline-primary" for="statusAtendendo">Atendendo</label>

            <input class="btn-check" type="checkbox" id="statusFinalizado" value="Finalizado" name="status[]" <?= in_array('Finalizado', $status) ? 'checked' : '' ?>>
            <label class="btn btn-outline-primary" for="statusFinalizado">Finalizado</label>
        
            <button type="submit" class="btn btn-dark">
                <i class="fa fa-filter"></i>
            </button>
            <button class="btn btn-secondary" value="Limpar Filtros" onclick="location.href='./frmporstatus.php'">
                <i class="fa fa-circle-xmark"></i>
            </button>
        </div>
    </div>

    <nav class="d-flex flex-column flex-md-row justify-content-between">
        <ul class="pagination align-items-center">
            <?php if ($totalPaginas > 1) : ?>
            <li class="page-item<?= $pagina == 1 ? 'disabled' : '' ?>">
                <button class="page-link" name="pagina" value="<?= $pagina-1 ?>">
                    <i class="fa fa-chevron-left"></i>
                </button>
            </li>

            <?php if ($pagina > 3) : ?>
                <li class="page-item">
                    <button class="page-link" name="pagina" value="1">1</button>
                </li>
            <?php endif ?>
            
            <?php 
                $start = max(1, $pagina - 2);
                $end = min($start + 3, $totalPaginas);
            ?>

            <?php for ($i = $start; $i <= $end; $i++) : ?>
                <li class="page-item<?= $i == $pagina ?  ' active' : '' ?>">
                    <button class="page-link" name="pagina" value="<?= $i ?>"><?= $i ?></button>
                </li>
            <?php endfor; ?>

            <?php if ($totalPaginas > 4) : ?>
                <li class="page-item disabled"><span class="page-link">...</span></li>
                <li class="page-item">
                    <button class="page-link" name="pagina" value="<?= $totalPaginas ?>"><?= $totalPaginas ?></button>
                </li>
            <?php endif ?>

            <li class="page-item<?= $pagina === $totalPaginas ? 'disabled' : '' ?>">
                <button class="page-link" name="pagina" value="<?= $pagina+1 ?>">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </li>
            <?php endif ?>
        </ul>

        <p class="btn-group">
            <input type="text" name="busca" class="form-control" value="<?= htmlspecialchars($busca ?? '') ?>">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i>
            </button>
        </p>
    </nav>
</form>

    <div id="no-more-tables">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Cod</th>
                    <th>Data/Hora</th>
                    <th>Região</th>
                    <th>Solicitante</th>
                    <th>Depto</th>
                    <th>Serviço</th>
                    <th>Problema</th>
                    <th>Solução</th>
                    <th>Atendente</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($chamados as $chamado) { ?>
                <tr>
                    <td data-title="Cod" class="text-center">
                        <h4 class="fw-bold align-self-start"><?= $chamado->getId(); ?></h4>
                        <?php if($chamado->getStatus() == 'atendendo'): ?>
                            <p class="badge text-bg-primary align-self-end">
                                <i class="fa fa-sm fa-clock"></i>
                                Atendendo
                            </p>
                        <?php endif; ?>
                        <?php if($chamado->getStatus() == 'Pendente'): ?>
                            <p class="badge text-bg-secondary align-self-end">
                                <i class="fa fa-sm fa-clock"></i>
                                Pendente
                            </p>
                        <?php endif; ?>
                        <?php if($chamado->getStatus() == 'finalizado'): ?>
                            <p class="badge text-bg-success align-self-end">
                                <i class="fa fa-sm fa-check"></i>
                                Finalizado
                            </p>
                        <?php endif; ?>
                    </td>
                    <td data-title="Data/Hora Abertura">
                        <?= $chamado->getDataAbertura(); ?>
                        <br>
                        <?= $chamado->getHoraAbertura(); ?>
                    </td>
                    <td data-title="Região"><?= $chamado->getRegiao(); ?></td>
                    <td data-title="Solicitante">
                        <?= $chamado->getNomeSolicitante(); ?>
                        <br>
                        <?= $chamado->getTelefone(); ?>
                    </td>
                    <td data-title="Depto"><?= $chamado->getDepartamento()->getNome(); ?></td>
                    <td data-title="Tipo Serviço"><?= $chamado->getTipoServico(); ?></td>
                    <td data-title="Problema"><?= $chamado->getProblema(); ?></td>
                    <td data-title="Solução">
                        <?php if($chamado->getTipoSolucao() == 'Campo'): ?>
                            <p class="badge text-bg-success align-self-end mb-1">
                                <i class="fa fa-sm fa-car"></i>
                                Campo
                            </p>
                        <?php endif; ?>
                        <?php if($chamado->getTipoSolucao() == 'Helpdesk'): ?>
                            <p class="badge text-bg-info text-white align-self-end mb-1">
                                <i class="fa fa-sm fa-desktop"></i>
                                Helpdesk
                            </p>
                        <?php endif; ?>
                        <br>
                        <?= $chamado->getSolucao() ?: '--'; ?>
                    </td>
                    <td data-title="Atendente">
                        <?= $chamado->getAtendente() ?: '--'; ?>
                        <br>
                        <div class="btn-group mt-3 w-100">
                            <form action="gchamado.php" method="GET">
                                <button class="btn btn-sm btn-light" name="imprimir" value="<?= $chamado->getId() ?>">
                                    <i class="fa fa-print"></i> &nbsp;
                                </button>
                            </form>
                            
                            <form action="gchamado.php" method="GET">
                                <button class="btn btn-sm btn-primary" name="detalhar" value="<?= $chamado->getId() ?>">
                                    <i class="fa fa-sm fa-pen-to-square"></i> Detalhar
                                </button>
                            </form>

                            <?php if($chamado->getStatus() == 'Pendente' || $chamado->getStatus() == 'atendendo'): ?>
                            <form action="gchamado.php" method="GET">
                                <button class="btn btn-sm btn-danger" name="finalizar" value="<?= $chamado->getId() ?>">
                                    <i class="fa fa-sm fa-list-check"></i> Finalizar
                                </button>
                            </form>
                            <?php endif; ?>

                            <?php if($chamado->getStatus() == 'finalizado'): ?>
                            <form action="gchamado.php" method="GET">
                                <button class="btn btn-sm btn-secondary" name="devolver" value="<?= $chamado->getId() ?>">
                                    <i class="fa fa-sm fa-rotate-left"></i> Devolver
                                </button>
                            </form>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>

</body>

</html>
