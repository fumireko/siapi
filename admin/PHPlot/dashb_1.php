
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
<style>

    *,
    *:before,
    *:after {
        margin: 0;
        padding: 0;
    }

    html,
    body {
        height: 90%;
    }

    .bl-ui,
    .bl-wrap {
        position: relative;
        height: inherit;
    }

    .bl-ui {
        border: solid 7px rgb(128, 128, 128);
        background: rgba(128,128,128,0);
    }

    .bl-header {
        position: relative;
        height: 13.33333333333333%;
        text-align: center;
        border-bottom: solid 7px rgba(0,0,0,1);
        border: solid 7px rgb(128, 128, 128);
        background: rgb(52, 59, 52, 0);
    }

    .bl-content {
        position: relative;
        height: 100%;
    }

    .bc-header__title {
        position: relative;
        top: 50%;
        background: rgba(255,255,0,0)
    }

    .bc-featured {
        position: relative;
        height: 50%;
        text-align: center;
    }

        .bc-featured:nth-of-type(1):after {
            content: ".";
            position: absolute;
            display: inherit;
            top: 100%;
            width: 95%;
            height: 7px;
            background: rgb(128, 128, 128);
        }

    .bc-header__title,
    .bc-featured__title {
        font-size: 1.1875rem;
        font-family: Helvetica, "sans-serif"
    }

    .bc-featured__title {
        position: relative;
        top: 50%;
    }

    @media(min-width:719px) {
        .bc-featured {
            display: inline-block;
            width: 49.5%;
            height: 99%;
        }

            .bc-featured:nth-of-type(1):after {
                top: 0;
                right: -7px;
                width: 7px;
                height: 99%;
            }
    }
    
    

</style>


</head>
<body>

<div class="bl-ui">
  <div class="bl-wrap">
    <header class="bl-header"><h2 class="bc-header__title">Visualização Analitica e Grafica dos dados dos Dispositivos</h2></header>
    <main class="bl-content">
      <article class="bc-featured">
          <br />

           <br />

          <a href="grafico_2cb.php" title="Visualiza grafico de todos os dispositivos"  >Todos os Dispositivos</a>   
            &nbsp &nbsp <a href="tab_grafico_2cb.php?tab=1" title="Visualiza Tabela com os dados "  >Tabela  </a><br /> <br />

          <a href="grafico_1b.php" title="Visualiza grafico de todos os Computadores por secretarias" >Computadores por Secretaria</a> 
          &nbsp &nbsp <a href="tab_grafico_2cb.php?tab=2" title="Visualiza Tabela com os dados "  >Tabela  </a><br /> <br />
          <a href="grafico_1c.php" title="Visualiza grafico de todos os Monitores por secretarias">Monitores por Secretaria</a>
           &nbsp &nbsp <a href="tab_grafico_2cb.php?tab=3" title="Visualiza Tabela com os dados "  >Tabela  </a><br /> <br />
          <a href="grafico_1d.php" title="Visualiza grafico de todos os dispositivos Diversos por secretarias" >Dispositivos Diversos por Secretaria</a>
          &nbsp &nbsp <a href="tab_grafico_2cb.php?tab=4" title="Visualiza Tabela com os dados "  >Tabela  </a><br /> <br />
          <a href="grafico_1e.php"title="Visualiza grafico de todos os dispositivos">Gerais Dispositivos por Secretaria</a>
          &nbsp &nbsp <a href="tab_grafico_2cb.php?tab=5" title="Visualiza Tabela com os dados Gerais de Dispositivos e Secretarias "  >   Tabela *   </a><br /> <br />
                   
          <a href="grafico_1j.php"title="Visualiza grafico de todos os Monitores" >Informativo geral de Monitores  </a>
          &nbsp &nbsp <a href="tab_grafico_2cb.php?tab=6" title="Visualiza Tabela com os dados "  >Tabela  </a><br /> <br />

          <a href="grafico_1k.php" title="Visualiza grafico de Monitores e Computadores" >Informativo geral de Computadores  </a>
          &nbsp &nbsp <a href="tab_grafico_2cb.php?tab=8" title="Visualiza Tabela com os dados "  >Tabela  </a><br /> <br />

         
            
            <a href="grafico_1e2.php" title="Visualiza grafico de todos os dispositivos" >Informativo geral de Computadores barra </a>
          <br /> <br />
       
             <a href="grafico_1h.php"title="Visualiza grafico de todos os Monitores sem vinculos com Equipamentos" >Monitores sem Pcs   cadastrado </a>
          <br /> <br />
       
          <a href="grafico_1ia.php" title="Visualiza grafico de todos os dispositivos sem monitor " >Equipamentos com 0  Monitor cadastrado </a>
          <br /> <br />
          <a href="grafico_1f.php" title="Visualiza grafico de todos os dispositivos com 1 monitor " >Equipamentos com 1  Monitor cadastrado</a>
          <br /> <br />
          <a href="grafico_1g.php" title="Visualiza grafico de todos os dispositivos com 2 monitores " >Equipamentos com 2  Monitores cadastrado(s)</a>
          <br /> <br />
           <a href="grafico_2ba.php">Centro de Custos por Secretaria </a> 
           &nbsp &nbsp <a href="tab_grafico_2cb.php?tab=14" title="Visualiza Tabela com os dados "  > Tabela  </a><br /> <br />
           <a href="../newsfeed.php">Inicio</a><br />
    </article>
      
        <article class="bc-featured">
         <h2 class="bc-featured__title"></h2>
      
       
          <a href="#"></a> <br />
          <a href="#"></a><br />
            <a href="#"></a><br />

            <a href="#"></a><br />

           


      
      
      
      
      </article>
    </main>
  </div>
</div>




    
    




</body>
</html>