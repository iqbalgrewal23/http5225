<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .color{
            height:50px;
            width: 1600px;
        }
    </style>
</head>
<body>
    <?php
    $connect = mysqli_connect('localhost','root','','colors');
    if(!$connect){
        die( "connection failed" . mysqli_connect_error());
    }
    $query='SELECT *FROM colors';
    $colors=mysqli_query($connect,$query);
    
    if ($colors){
        foreach($colors as $color){
            $colorName=$color['Name'];
            $colorcode=$color['Hex'];
             echo"<div class ='color' style='background:$colorcode '>$colorName</div>";
            // echo"$colorName ";    
        }
    }

   
    ?>
    

    </div>
</body>
</html>