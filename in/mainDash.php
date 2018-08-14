<?php
session_start(); include('db/config.php');
$timeStamp = date("Y-m-d H:i");
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 
<style>
.error {color: #FF0000;}

.jumbotron-fluid {
	background-color: grey;
}
</style>
<!-- To set the alert from an unsuccesful login to disappear-->
<script>
	//setTimeout("$('.feedback').slideUp()", 5000); 
</script>
</head>

<body>  
<?php echo 'hello'; ?>

</body>
</html>
