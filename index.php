<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="libs/bootstrap/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="libs/bootstrap/docs/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="libs/bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="libs/bootstrap/docs/examples/dashboard/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="libs/bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $.ajax({url: "action.php", 
        data: {action: "accueil"},
        type: 'get',
        success: function(result){
            $("#content").html(result);
        }});
        active('1');
    });
function callAction(loadaction){
    $.ajax({url: "action.php", 
    data: {action: loadaction},
    type: 'get',
    success: function(result){
        $("#content").html(result);
    }});
}

function addgirl(){
    $(document).ready(function(){
        // $("#valider").click(function(){
        $.ajax({url: "action.php", 
        data: {action:"newGirl",
                name: '"'+$("#nom").val()+'"',
                firstname: '"'+$("#prenom").val()+'"',
                adresse: '"'+$("#img").val()+'"'},
        type: 'get',
        success: function(result){
            $("#reponse").html(result);
        }});
        // });
    });
}

          

function addvideo(){
    $(document).ready(function(){
        var isView = $("#isView").is(":checked");
        alert($("#actricesVideo").val());
        $.ajax({url: "action.php", 
          data: {action:"newVideo",
                  actrices: '"'+$("#actricesVideo").val()+'"',
                  nbMec: '"'+$("#nbMec").val()+'"',
                  nbFilles: '"'+$("#nbFilles").val()+'"',
                  adresse: '"'+$("#url").val()+'"',
                  isView:  '"'+isView+'"'
                },
          type: 'get',
          success: function(data){
            alert(data);
          }
        
        });
    });
}

function active(id){
  for (var i=1;i<6;i++){
    $("#"+i).removeClass("active");
  }
  $("#"+id).addClass("active");
  
}


</script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Super soir&eacute;e ;)</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Accueil</a></li>
            <li><a href="#" data-toggle="modal" data-target="#bs-example-modal-lg2">Ajouter un nouvelle vid&eacute;o</a></li>
            <li><a href="#" data-toggle="modal" data-target="#bs-example-modal-lg">Ajouter une actrice</li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li id ='1' class ='active'><a href="#" id="acueil" onclick="callAction('accueil');active('1');">Accueil <span class="sr-only">(current)</span></a></li>
                    <li id ='2'><a href="#" id="vues" onclick="callAction('accueil');active('2');">Vid&eacute;os vues</a></li>
                    <li id ='3'><a href="#" id="avoir" onclick="callAction('accueil');active('3');">Vid&eacute;os &agrave; voir</a></li>
                    <li id ='4'><a href="#" id="revoir" onclick="callAction('accueil');active('4');">Vid&eacute;os &agrave revoir ;)</a></li>
                    <li id ='5'><a href="#" id="actrices" onclick="callAction('girlList');active('5');">Actrices</a></li>
                </ul>
            </div>
            <div id="content">
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  test
                </div>
            </div>
            <div id="reponse">

            </div> 
            <br/>
        </div>


  <div class="modal fade" tabindex="-1" role="dialog" id="bs-example-modal-lg2" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="titre2">Nouvelle actrices</h4>
                        </div>
                        <br/>
                        <table>
                            <tr>
                                <td></td><td>actrices </td><td> <input type="text" id = "actricesVideo"></td>
                            </tr>
                            <tr>
                                <td></td><td>nb garçons </td><td> <input type="text" id = "nbMec"></td><td>nb filles </td><td> <input type="text" id = "nbFilles"></td>
                            </tr>
                            <tr>
                                <td></td><td>url </td><td> <input type="text" id = "url"></td>
                            </tr>
                              <tr>
                                <td></td><td>Déjà vue ? </td><td> <input type="checkbox" id = "isView"></td>
                            </tr>
                        </table>
                        <br/>
                        <button id="validerVideo" onclick="addvideo();">Valider</button>
                  </div>
              </div>
      </div> 


       <div class="modal fade" tabindex="-1" role="dialog" id="bs-example-modal-lg" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="titre">Nouvelle actrices</h4>
                    </div>
                    <br/>
                    <table>
                        <tr>
                          <td>
                          </td>
                          <td>nom </td><td><input type="text" id = "nom"><br/></td>
                        </tr>
                        <tr>
                            <td></td><td>prenom </td><td> <input type="text" id = "prenom"><br/></td>
                        </tr>
                        <tr>
                            <td></td><td>image </td><td> <input type="text" id = "img"></td>
                        </tr>
                    </table>
                    <br/>
                    <button id="validerActrice" onclick="addgirl();">Valider</button>
                    <br/>
              </div>
          </div>
      </div>    
    </div>   


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="libs/bootstrap/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="libs/bootstrap/docs/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="libs/bootstrap/docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="libs/bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
