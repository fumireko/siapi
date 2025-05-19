<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Cadastro</title>
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
    
    .btn{
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
                color:black;
            }

            label input{
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
                                                       <h2>Visualizaçao de Tabelas  </h2>   
 
                                                          <ul class="nav nav-tabs">
                                                            <li class="active"><a data-toggle="tab" href="#home">Controle T.I</a></li>
                                                            <li><a data-toggle="tab" href="#menu1">Pcs e afins</a></li>
                                                              <li><a data-toggle="tab" href="#menu2">Monitores</a></li>

                                                            <li><a data-toggle="tab" href="#menu3">Diversos</a></li>
                                                            </ul>

                                                      <div class="tab-content">
                                                        <div id="home" class="tab-pane fade in active">
                                                            <center> <h3>Componentes 3</h3> </center>
                                                        
                                                        </div>
                                                        <div id="menu1" class="tab-pane fade">
                                                             <center> <h3>Componentes Diversos</h3> </center>
                                                         
                                                       </div>

                                                        <div id="menu2" class="tab-pane fade">
                                                                             <center> <h3>Componentes 3</h3> </center>
                                                           </div>
     
                                                            <div id="menu3" class="tab-pane fade">
                                                                             <center> <h3>Componentes 3</h3> </center>
                                                           </div>
     
       
                                                             <div id="box1a"> </div>
                                                             <div id="box2a">
         
         
         
         
                                                              </div>
                                                             <div id="box3a"> </div>
         
                                                              <div id="pessoais2">   </div>
                                                          </div>
                                                    </div>
                                                     </div>
                                                          </div>
                                                    </div>
                                                     </div>


                                                      </form>                    

                                                    </body>
                                                    </html>
<?PHP
        