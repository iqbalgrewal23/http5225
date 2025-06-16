<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>week3</title>
</head>
<body>
    <?php
    function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
    }
    // Get the list of users
    $users = getUsers();
 
       for($x=0;$x<count($users);$x++)
       {
        echo "<p>Name: " . $users[$x]['name'] . "</p>";
       } 
    
    ?>
    
    
 </body> 
</html>  