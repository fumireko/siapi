<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Tabelas</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
 <script src="js/checkbox.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .gg {
        width: 100px;
    }

    .ggg {
        width: 200px;
    }

    .btn {
        margin-top: 100px;
    }

    .wrapper {
        display: grid;
        grid-template-columns: 200px 200px 200px;
    }

    input[type=text] {
        width: 100%;
        padding: 12px 10px;
        margin: 8px 0;
        box-sizing: border-box;
        /*border: 1px solid #555;*/
        outline: none;
    }

        input[type=text]:focus {
            background-color: lightblue;
            color: black;
        }

    label input {
        float: left;
    }

    div.divEsq {
        width: 49%;
        display: inline-block;
    }

    div.divDir {
        width: 50%;
        display: inline-block;
    }


    /* Popup container */
    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

        /* The actual popup (appears on top) */
        .popup .popuptext {
            visibility: hidden;
            width: 160px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }

            /* Popup arrow */
            .popup .popuptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s
        }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

   
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .content {
        display: flex;
        margin: auto;
    }

    .rTable {
        width: 100%;
        text-align: center;
    }

        .rTable thead {
            text-align: center;
            background: black;
            font-weight: bold;
            color: #fff;
        }

        .rTable tbody tr:nth-child(2n) {
            background: #ccc;
        }

        .rTable th, .rTable td {
            text-align: center;
            padding: 7px 0;
        }

    @media screen and (max-width: 480px) {
        .content {
            width: 94%;
        }

        .rTable thead {
            text-align: center;
            display: none;
        }

        .rTable tbody td {
            display: flex;
            flex-direction: column;
        }
    }

    @media only screen and (min-width: 1200px) {
        .content {
            width: 100%;
        }

        .rTable tbody tr td:nth-child(1) {
            width: 5%;
        }

        .rTable tbody tr td:nth-child(2) {
            width: 15%;
        }

        .rTable tbody tr td:nth-child(3) {
            width: 10%;
        }

        .rTable tbody tr td:nth-child(4) {
            width: 10%;
        }

        .rTable tbody tr td:nth-child(5) {
            width: 20%;
        }

        .rTable tbody tr td:nth-child(6) {
            width: 20%;
        }

        .rTable tbody tr td:nth-child(7) {
            width: 20%;
        }

        .text-center {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }

</style>

<body>
<?php
include 'index.php';
                   ?>
    
    <!--     <select name="sec_id" required>    -->
                  <form method="post" enctype="multipart/form-data" action="salvaequip2.php">    
                                    </BR> </BR> </BR> 
                                    <center>  
                                    <div class="container">
                                                       <h2>Visualizaçao   </h2>   
 
                                                          <ul class="nav nav-tabs">
                                                            <li class="active"><a data-toggle="tab" href="#home">Resumo </a></li>
                                                              <li><a data-toggle="tab" href="#menu1">Pcs e afins</a></li>
                                                              <li><a data-toggle="tab" href="#menu2">Monitores</a></li>
                                                              <li><a data-toggle="tab" href="#menu3">Diversos</a></li>
                                                            
                                                            </ul>

                                            <div class="tab-content">
                                                        <div id="home" class="tab-pane fade in active">
                                                    
                                                       
                                                                   
                                                        </div>
                                                        <div id="menu1" class="tab-pane fade">
                                                                             <center> <h3>Componentes Pcs</h3> </center>
                                                          
                                                        </div>
                                                      <div id="menu2" class="tab-pane fade">
                                                                           <center> <h3>Componentes Monitores</h3> </center>
                                                                    
                                                       </div>
                                                        <div id="menu3" class="tab-pane fade">
                                                               <center> <h3>Diversos</h3> </center>
                                                                     

                                                         </div>
                                            </div>
                                     </div>
                                                  
                          </form>                    
                       </body>
                </html>
<?PHP
        