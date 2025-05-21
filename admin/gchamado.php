<?php
include "../validar_session.php";
require_once "./Classes/dao/ChamadoDAO.php";
include "../Config/config_sistema.php";

if (!isset($_SESSION)) {
    session_start();
}

$dao = new ChamadoDAO($conn);

if (isset($_POST["detalhar"])) {
    $id_dados = $_POST["id_dados"];
    $tipo_solucao = $_POST["tipo_solucao"];
    $solucao = $_POST["solucao"];
    $hora = date("H:i:s");
    $tecnico = $_SESSION["email_usuario"];

    if ($dao->atualizarSolucao($id_dados, $solucao, $tipo_solucao, $tecnico, $hora)) {
        echo "<script>alert('Atualizado com sucesso.');</script>";
        echo "<script>window.location.href = './frmporstatus.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar a solução!');</script>";
        echo "<script>window.location.href = './frmporstatus.php';</script>";
    }
} elseif (isset($_GET["finalizar"])) {

    $id_dados = $_GET["finalizar"];

    if (!$dao->podeFinalizar($id_dados)) {
        echo "<script>alert('Chamado sem solução, não pode ser finalizado!');</script>";
        echo "<script>window.location.href = './frmporstatus.php';</script>";
        exit();
    }
    ?>
    <script>
        if (confirm("Deseja finalizar o chamado Nº <?= $id_dados ?>?")) {
            window.location.href = "gchamado.php?action=confirmar_finalizacao&id_dados=<?= $id_dados ?>";
        } else {
            window.location.href = "frmporstatus.php";
        }
    </script>
    <?php
} elseif (
    isset($_GET["action"]) &&
    $_GET["action"] == "confirmar_finalizacao"
) {
    // Finaliza o chamado
    $id_dados = $_GET["id_dados"];
    $hora = date("H:i:s");
    $tecnico = $_SESSION["email_usuario"];

    if ($dao->finalizarChamado($id_dados, $tecnico, $hora)) {
        echo "<script>alert('Finalizado com sucesso.');</script>";
        echo "<script>window.location.href = './frmporstatus.php';</script>";
    } else {
        echo "<script>alert('Erro ao finalizar o chamado!');</script>";
        echo "<script>window.location.href = './frmporstatus.php';</script>";
    }
} elseif (isset($_GET["devolver"])) {

    $id_dados = $_GET["devolver"];

    if (!$dao->podeDevolver($id_dados)) {
        echo "<script>alert('Chamado pendente, não pode ser devolvido!');</script>";
        echo "<script>window.location.href = './frmporstatus.php';</script>";
        exit();
    }
    ?>
    <script>
        if (confirm("Deseja devolver o chamado Nº <?= $id_dados ?>?")) {
            window.location.href = "gchamado.php?action=confirmar_devolve&id_dados=<?= $id_dados ?>";
        } else {
            window.location.href = "frmporstatus.php";
        }
    </script>
    <?php
} elseif (isset($_GET["action"]) && $_GET["action"] == "confirmar_devolve") {
    // Devolve o chamado
    $id_dados = $_GET["id_dados"];
    $hora = date("H:i:s");
    $tecnico = $_SESSION["email_usuario"];

    if ($dao->devolverChamado($id_dados, $tecnico, $hora)) {
        echo "<script>alert('Devolvido com sucesso.');</script>";
        echo "<script>window.location.href = './frmporstatus.php';</script>";
    } else {
        echo "<script>alert('Erro ao finalizar o chamado!');</script>";
        echo "<script>window.location.href = './frmporstatus.php';</script>";
    }
} elseif (isset($_GET["detalhar"])) {

    // Exibe os detalhes do chamado
    $id_dados = $_GET["detalhar"];
    $chamado = $dao->getChamadoById($id_dados);
    $tipo_solucao = $chamado->getTipoSolucao();

    if (!$chamado) {
        echo "<script>alert('Chamado não encontrado!');</script>";
        echo "<script>window.location.href = './frmporstatus.php';</script>";
        exit();
    }

    // Formata a data de abertura
    $dataAbertura = implode(
        "/",
        array_reverse(explode("-", $chamado->getDataAbertura()))
    );
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Detalhar Chamado #<?= $chamado->getId() ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link rel="stylesheet" href="./css/index.css">
    </head>
    <body>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center my-3">
                <h2 class="fw-bold">CHAMADO #<?= $chamado->getId() ?></h2>
                <?php if($chamado->getStatus() == 'Atendendo'): ?>
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
            </div>

            <hr>

            <form method="POST" action="gchamado.php">
                <input type="hidden" name="detalhar" value="true">
                <input type="hidden" name="id_dados" value="<?= $chamado->getId() ?>">
                <div class="mb-3">
                    <label for="nsolicitante" class="form-label">Nome do Solicitante:</label>
                    <input type="text" class="form-control" id="nsolicitante" value="<?= $chamado->getNomeSolicitante() ?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" value="<?= $chamado->getEmail() ?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" value="<?= $chamado->getTelefone() ?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="data" class="form-label">Data de Abertura:</label>
                    <input type="text" class="form-control" id="data" value="<?= $dataAbertura ?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="prob" class="form-label">Problema:</label>
                    <textarea class="form-control" id="prob" rows="3" disabled><?= $chamado->getProblema() ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="tipo_solucao" class="form-label fw-bold">Tipo solução:</label>
                    <select name="tipo_solucao" id="tipo" class="form-select">
                        <option value="Helpdesk" <?= ($tipo_solucao == 'Helpdesk') ? 'selected' : ''; ?>>Helpdesk</option>
                        <option value="Campo" <?= ($tipo_solucao == 'Campo') ? 'selected' : ''; ?>>Atendimento em campo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="solucao" class="form-label fw-bold">Solução:</label>
                    <textarea class="form-control" id="solucao" name="solucao" rows="3"><?= $chamado->getSolucao() ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar Solução</button>
                <a href="frmporstatus.php" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </body>
    </html>

    <?php
}
elseif (isset($_GET['imprimir'])) {
    $id_dados = $_GET['imprimir'];
    $chamado = $dao->getChamadoById($id_dados);

    if (!$chamado) {
        echo "<script>alert('Chamado não encontrado!'); window.location.href='./frmporstatus.php';</script>";
        exit();
    }

    // Format dates
    $dataAbertura = implode("/", array_reverse(explode("-", $chamado->getDataAbertura())));
    $dataSolucao = $chamado->getDataFinalizado() 
        ? date('d/m/Y H:i:s', strtotime($chamado->getDataFinalizado())) 
        : 'Não disponível';

    // HTML/CSS for print layout
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chamado #<?= htmlspecialchars($chamado->getId()) ?></title>
    <style>
        body { 
            font-family: Courier New, monospace;
            margin: 20px;
            padding: 0;
        }
        .receipt {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #000;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-number {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .section {
            margin-bottom: 15px;
            padding: 10px;
            border-left: 2px solid #000;
        }
        .detail {
            margin-left: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #000;
        }
        .print-btn {
            display: none;
        }
        @page { 
            size: A4;
            margin: 15mm; 
        }
    </style>
</head>
<body>
<div class="receipt">
    <div class="header">
        <h2 class="text-center">Chamado #<?= htmlspecialchars($chamado->getId()) ?></h2>
    </div>

    <div class="receipt-number">
        <strong>Chamado Nº:</strong> <?= htmlspecialchars($chamado->getId()) ?><br>
        <strong>Data:</strong> <?= date('d/m/Y H:i:s') ?>
    </div>

    <div class="section">
        <h3>Dados do Solicitante</h3>
        <div class="detail">
            <p><strong>Nome:</strong> <?= htmlspecialchars($chamado->getNomeSolicitante()) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($chamado->getEmail()) ?></p>
            <p><strong>Telefone:</strong> <?= htmlspecialchars($chamado->getTelefone()) ?></p>
            <p><strong>Local:</strong> <?= htmlspecialchars($chamado->getDepartamento()->getNome()) ?></p>
            <p><strong>Secretaria:</strong> <?= htmlspecialchars($chamado->getSecretaria()->getNome()) ?></p>
        </div>
    </div>

    <div class="section">
        <h3>Descrição do Serviço</h3>
        <div class="detail">
            <p><strong>Data de Abertura:</strong> <?= htmlspecialchars($dataAbertura) ?></p>
            <p><strong>Status:</strong> <?= htmlspecialchars($chamado->getStatus()) ?></p>
            <p><strong>Problema:</strong> <?= nl2br(htmlspecialchars($chamado->getProblema())) ?></p>
            <p><strong>Solução:</strong> <?= nl2br(htmlspecialchars($chamado->getSolucao() ?: 'Não disponível')) ?></p>
        </div>
    </div>

    <div class="section">
        <h3>Informações Técnicas</h3>
        <div class="detail">
            <p><strong>Técnico Responsável:</strong> <?= htmlspecialchars($chamado->getAtendente()) ?></p>
            <p><strong>Data da Solução:</strong> <?= $dataSolucao ?></p>
        </div>
    </div>
</div>

<div class="print-footer">
    <a href="./frmporstatus.php" class="btn btn-secondary">Voltar</a>
    <script>window.print()</script>
</div>

</body>
</html>
<?php
exit();
} else {
    echo "<script>window.location.href = './frmporstatus.php';</script>";
}
?>
