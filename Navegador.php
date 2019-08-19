<!DOCTYPE HTML>

<html ng-app="pdf_api">
<head>
<title>{{ title }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/angular.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/scripts.js"></script>

</head>
<body ng-controller="controller as ctrl">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="index.html"><b style="font-size: 1.1em;" >@</b>CCESSNET</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" ng-model="ctrl.Keyword" placeholder="Digite uma palavra" aria-label="Search">
	      <button class="btn btn-outline-light my-2 my-sm-0" ng-click="ctrl.Buscar()" type="submit">Buscar</button>
	    </form>
	  </div>
	</nav>
	<div class="container" style="padding-top: 5%;">
		<div ng-hide="ctrl.Achado"  style="text-align:center;">
			 <p > video não encontrado, talvez a palavra buscada não esteja no nosso Banco de Palavras<p>
		</div>
		<div ng-show="ctrl.Achado"  class="row" style="padding: 0; margin: 0; padding-top: 20px;">
			<div class="col-md-6 col-sm-12" style="text-align:justify;" > 
				{{ctrl.Texto}}
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="panel-body">
				 <!-- <video src=""></video> -->
				 <video ng-if="ctrl.Video" autoplay="true" width="100%" controls>
						<source src="{{ctrl.Video}}" type="video/webm">
						<!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
						Your browser does not support HTML5 video.
				</video>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>