<html lang="en" ng-app="dirApp">
	<head>
		<title>PCCI Batangas: Directory</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="PCCI, services">
		<meta name="description" content="">
		<meta name="author" content="Nahid Abdulmalik, Nasreen Castillo, Ronnel DeOcampo">
		<link rel="shortcut icon" href="../img/myicon.ico">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="css/directory.css">
		<link rel="stylesheet" type="text/css" href="../css/animate.min.css">
	</head>
	<body>
		<section class="dir-sec row container-fluid" ng-controller="dirCtrl">
			<div class="row well" id="dir-topbar">
				<div class="container">
					<!-- Split button -->
					<div class="btn-group" id="mycateg">
						<button type="button" class="btn btn-info" id="categ-name"><p>Select Category</p></button>
						<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="categ-cat">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu">
							<li><a ng-click="categs = {category: 'Manufacturer'}">Manufacturer</a></li>
							<li><a ng-click="categs = {category: 'Importer'}">Importer</a></li>
							<li><a ng-click="categs = {category: 'Academic'}">Academic</a></li>
							<li role="separator" class="divider"></li>
							<li><a ng-click="categs = ''">All</a></li>
						</ul>
					</div>
					<!-- Search input -->
					<div class="dir-insearch input-group">
						<input ng-model="dirSearch" type="text" class="dir-search form-control " placeholder="Search services..." aria-describedby="basic-addon2">
					</div>
				</div>
			</div>
			<div class="container" >
				<div class="dir-content row"  >
					<div class="dir-result col-sm-8" >
						<p ng-if="err">{{rsError}}</p>
						<div class="dir-member col-sm-12"  ng-repeat="x in member | filter:categs | filter:dirSearch">
							<div class="dir-logo col-sm-5 col-xs-5">
								<img src="{{x.logoimg}}">
							</div>
							<div class="dir-desc col-sm-7 col-xs-7">
								<h3>{{x.companyname}}</h3>
								<p>{{x.nature}}</p>
								<p>{{x.interest}}</p>
								<span class="dir-tags">
									<span><p>Tags: &nbsp </p></span>
								<span class="badge" ng-repeat="y in x.tags.split(',')"> {{y}}</span>
								</span>
								<a href="../p/profile/{{x.url}}" class="btn btn-danger" role="button">Visit</a>
							</div>
						</div>
					</div>
					<div class="dir-side col-sm-4">
						<div class="dir-top col-sm-12">
							<h4>Most visited</h4>
							<div class="top-item col-sm-12">
							<span class="col-sm-12" ng-repeat="y in member">{{y.companyname}}</span>
							</div>
						</div>
						<div class="dir-newest col-sm-12">
							<h4>Newest</h4>
							<div class="new-item col-sm-12">
							</div>
						</div>
						<div class="dir-near col-sm-12">
							<h4>Nearest</h4>
							<div class="near-item col-sm-12">
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include 'footer.php' ?>
		</section>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/angular.min.js"></script>
		<script src="js/directory.js"></script>
		<script src="js/dirangle.js"></script>
		<script src="../js/angular-animate.min.js"></script>

	</body>
</html>