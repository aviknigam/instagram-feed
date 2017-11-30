<?php 


?> 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Instagram API</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<link rel="stylesheet" href="/assets/css/main.css">
	</head>
	<body>
		<div class="container-fluid wrapper d-flex justify-content-center align-items-center">
			<form action="/" method="GET">
				<div class="input-group">
					<span class="input-group-addon">@</span>
					<input type="text" name="username" class="form-control" placeholder="Username">
					<span class="input-group-btn">
						<button class="btn btn-secondary" type="submit">Go!</button>
					</span>
				</div>
			</form>
		</div>

		<!-- Main Pictures -->
			<div class="container-fluid mt-5">
				<div class="row d-flex justify-content-center">
					<?php 
						// Username from URL => append a static string if not using form input
						$username = $_GET['username'];

						// Get the JSON
						try {
							$json = file_get_contents("https://www.instagram.com/" .$username. "/?__a=1");
						} catch ( Exception $e ) {
							// echo 
							// '<h2>This profile does not exist :(</h2>';
							// echo $e->getMessage();
							die();
						}
						
						$json = json_decode($json, true);

						// Verify public profile
						if ( $json['user']['is_private'] == true ) {
							echo 
								'<h2>This profile is private :(</h2>';
							die();
						}

						// Display pictures
						foreach ( $json['user']['media']['nodes'] as $node) {
							$url = $node['thumbnail_src'];
							
							// Remove unnecessary information from url
							// $url = str_replace('/s640x640', '', $url);
							echo '<img src="'. $url .'" class="igimg">';
						}
						// Sample URL
						// https://scontent-syd2-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/23498198_202436726957413_6414376486542770176_n.jpg 
						
						// Aim URL
						// https://scontent.cdninstagram.com/t51.2885-15/e35/23967411_502012043513677_2057498804633993216_n.jpg
						

					?>
				</div>
			</div>
	</body>
</html>