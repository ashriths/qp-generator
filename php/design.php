<?php


class Design{

	public function getIncludeFiles($rp){


		echo '<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <!-- Bootstrap -->

    <!-- Latest compiled and minified CSS -->
    <link href="'.$rp.'css/bootstrap.css" rel="stylesheet">
    
    <style id="holderjs-style" type="text/css"></style>
    <!-- Optional theme -->
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <!-- sticky footer -->' ;

	}

	public function getNavbar($rp,$name){
    echo ' <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a href="'.$rp.'"><img style="wigth:40pt; height:40pt; float:left"; atl="bmslogo" src="'.$rp.'/img/bms-logo.png"></a>
          <a class="navbar-brand" href="'.$rp.'"></a>
        </div>
        <div class="navbar-collapse collapse">
    
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b>&nbsp;&nbsp;'.$name.'</a>
              <ul class="dropdown-menu">
                <li ><a href="'.$rp.'logout.php">&nbsp;Logout</a></li>
              </ul>
            </li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>';
		
	}

  function getJSIncludes($rp){
    echo '
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="'.$rp.'js/bootstrap.js"></script>   
    ';
  }

}
$design = new Design();
?>