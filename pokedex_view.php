<?php include 'pokedex.php'; ?>
<?php  foreach($pokedex as $pokedex) :?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style1.css">
        <title>Pokedex</title>
</head>
<body>
<center>
<div id="tablecon" style>
        <table class="table table-bordered table-hover">
        <table class="table table-bordered table-hover">
            <tr class="header">
            <th class="center_content" colspan="2">National No</th>
            <th class="center_content">Pokemon</th>
            </tr>
            <tr class="header">
                        <td class="center_content" style="width:40px"><img src="resources\poke_icon\<?php echo $pokedex['pokemon_icon']; ?>"></td>
                        <td class="center_content"><?php echo $pokedex['pokemon_no']; ?> </td>
                        <td class="center_content"> <?php echo $pokedex['pokemon_name']; ?> </td>
                    </tr>
                    <tr class="hiddenrow">
                        <th class="center_content col-lg-2 col-md-2 col-xs-2" rowspan="5" colspan="2" class="img-responsive"><img src="resources\poke_img\<?php echo $pokedex['pokemon_img']; ?>" width="40%" height="auto"></th>
                        <th class="center_content col-lg-2 col-md-2 col-xs-2" style="background-color:#F2F2F2">Type</th>
                    </tr>
                    <tr class="hiddenrow">
                        <td class="center_content col-lg-2 col-md-2 col-xs-2" ><?php echo $pokedex['type']; ?> </td>
                    </tr>
                    <tr class="hiddenrow">
                        <th class="center_content col-lg-2 col-md-2 col-xs-2" style="background-color:#F2F2F2">Description</th>
                    </tr>
                    <tr class="hiddenrow">
                    <td class="center_content col-lg-2 col-md-2 col-xs-2"><?php echo $pokedex['description']; ?> </td><br>
                    </tr>
                    <tr class="hiddenrow">
                        <td class="center_content col-lg-2 col-md-2 col-xs-2" >
                        <a class="delpoke" href="pokedex_view.php?deletepoke=<?php echo $pokedex['id'];?>">Delete</a>
                        </td>
                    </tr>
                </table>
                
        </div>
</center>
<?php endforeach ?>
<center>
<ul class="pagination center_content">
                <li><a href="pokedex_view.php?&pageno=1">First</a></li>
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="pokedex_view.php?<?php if($pageno <= 1){ echo '#'; } else { echo "&pageno=".($pageno - 1); } ?>">Prev</a>
                </li>
                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="pokedex_view.php?<?php if($pageno >= $total_pages){ echo "&pageno=".($pageno); } else { echo "&pageno=".($pageno + 1); } ?>">Next</a>
                </li>
                <li><a href="pokedex_view.php?&pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
</center>
</body>
</html>
        

