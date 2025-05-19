<!DOCTYPE html>

<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>

<!-- Última versão CSS compilada e minificada -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Tema opcional -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Última versão JavaScript compilada e minificada -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a onclick="openPage('principal','conteudo')" href="#" class="nav-link active">
                    <i class="nav-icon fas fa-th-large"></i>
                    <p>
                        Principal
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Cadastros
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a onclick="openPage('cadastro_centro_custos','conteudo')" href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Centro de Custos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a onclick="openPage('cadastro_clientes','conteudo')" href="#" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a onclick="openPage('cadastro_fornecedores','conteudo')" href="#" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fornecedores</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a onclick="openPage('cadastro_produtos','conteudo')" href="#" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Produtos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a onclick="openPage('cadastro_usuarios','conteudo')" href="#" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Usuários</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link  ">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Financeiro
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a onclick="openPage('contas_pagar','conteudo')" href="#" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contas a Pagar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a onclick="openPage('contas_receber','conteudo')" href="#" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contas a Receber</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a onclick="openPage('fluxo_caixa','conteudo')" href="#" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fluxo de Caixa</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Movimentação
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a onclick="openPage('mov_estoque','conteudo')" href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Estoque</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a onclick="openPage('mov_pedidos','conteudo')" href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pedidos</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a onclick="openPage('relatorio','conteudo')" href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Relatórios
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a onclick="openPage('mudar_senha','conteudo')" href="#" class="nav-link">
                    <i class="nav-icon fas fa-key"></i>
                    <p>
                        Mudar a Senha
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="?sair" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Sair do Sistema
                    </p>
                </a>
            </li>

        </ul>

        <script>
            var navItems = document.querySelectorAll(".nav-link");

            for (var i = 0; i < navItems.length; i++) {            

          navItems[i].addEventListener("click", function() {

              clearActiveMenu();

              this.classList.add("active");

              var parent = this.parentElement.parentElement;
              if (parent.classList.contains("nav-treeview")) {
                parent.previousElementSibling.classList.add("active");
              }
          });
        }


           
        </script>

    </nav>



</body>
</html>