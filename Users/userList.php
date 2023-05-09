<html>
	<head>
		<link rel="stylesheet" href="style1.css">
	</head>
	<body>
		<div class="m">
			<div id="infohead">
				<ul>
					<li>Name</li>
					<li>Job Title</li>
					<li>Applied In</li>
					<li>View</li>
				</ul>
			</div>

			<?php
            $filed =  file_get_contents("data.json");
            $data = json_decode($filed,true);
            ?>

			<div id="userlist">
<?php
for($i = 0; $i < count($data['user']); $i++)
{
	echo '<div class="user">';			
	echo "<ul>";
					echo "<li>".$data['user'][$i]['name']."</li>";
					echo "<li>".$data['user'][$i]['jobt']."</li>";
					echo "<li>".$data['user'][$i]['joba']."</li>";
                    echo '<li><div class="view">View</div>';
					echo '<div class="view"><a src='.$data['user'][$i]['cv'] .'><img src="#" alt="imgv"></a></div></li></div>';

}

?>

		</div>
	</body>
</html>
