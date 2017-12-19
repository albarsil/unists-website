<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Bootstrap Admin Theme</title>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $search_text = test_input($_POST["search_text"]);

    $postData = array(
    'from' => $search_text,
    'relation' => 'be_in_state',
    'target' => ''
    );

    $ch = curl_init('http://localhost:8080/nlp/wordnet/pt/GetTargets');
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            //'Authorization: '.$authToken,
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));

    // Send the request
    $response = curl_exec($ch);

    $responseData = json_decode($response, TRUE);

    var_dump($responseData);
}

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="index.html">SB Admin v2.0</a>-->
            </div>
            <!-- /.navbar-header -->
            <!-- Top Menu Items -->
            <div class="container topnav">
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- Menu Interno -->
                <!--<div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>-->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <a class="navbar-brand topnav" href="#">Unisinos</a>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#Home">Home</a>
                        </li>
                        <li>
                            <a href="#about">Sobre</a>
                        </li>
                        <li>
                            <a href="buttons.html">Serviços</a>
                        </li>
                        <li>
                            <a href="grid.html">Ferramentas</a>
                        </li>
                        <li>
                            <a href="#contact">Contato</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.html"><i class="fa fa-home fa-fw"></i> Bem-Vindo</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Dados<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Exemplo 1</a>
                                </li>
                                <li>
                                    <a href="morris.html">Exemplo 2</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Estatísticas</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lexical Semantics</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Flot Charts Usage
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <p>Flot is a pure JavaScript plotting library for jQuery, with a focus on simple usage, attractive looks, and interactive features. In SB Admin, we are using the most recent version of Flot along with a few plugins to enhance the user experience. The Flot plugins being used are the tooltip plugin for hoverable tooltips, and the resize plugin for fully responsive charts. The documentation for Flot Charts is available on their website.</p>
                                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                  <!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">-->
                                    <div class="form-group">
                                      <label for="email">Email:</label>
                                      <input type="text" class="form-control" id="search_text" placeholder="Escreva uma palavra" name="search_text">
                                    </div>
                                    <!--<div class="form-group">
                                      <label for="pwd">Password:</label>
                                      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                    </div>
                                    <div class="checkbox">
                                      <label><input type="checkbox" name="remember"> Remember me</label>
                                    </div>-->
                                    <button type="submit" class="btn btn-default">Submit</button>
                                    </br>
                                    <?php var_dump($responseData); ?>
                                  </form>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Flot Charts JavaScript -->
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot/jquery.flot.time.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>

</html>
