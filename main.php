<?php include 'loginsession.php'; ?>
<?php
$connection = mysqli_connect("localhost","root","parag0n","local_db");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style1.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>PokedExplore</title>
    
</head>
<body>

    <center>
    <div class="container-fluid">
        <div>
            <a id="top" href="main.php"><img src="resources\images\PokedExplore.png" width="40%" height="auto"></a>
        </div>
        <form action="" method="GET">

            <!-- Di mag search pag empty ang input Note: required -->
            <br><a class="logoutbutton"href="logout.php">Logout</a><br>
            <br><input type="text" name="query_db" class="input1" autocomplete="on" required>
            <input type="submit" name="search" class="searchbutton" value="    ">
            <div class="dropdown">
                <div class="dropbtn">Pokémon List</div>
                    <div class="dropdown-content">
                    <?php
                    if($r_set = $connection->query("SELECT pokemon_no, pokemon_name FROM pokemon")){

                    while ($row = $r_set->fetch_assoc()) {
                    echo "<a href=main.php?query_db=$row[pokemon_name]&search=Search'>#$row[pokemon_no] $row[pokemon_name]</a>";
                    }
                }
                    ?>
                    </div>
            </div>
            <a class="pokebutton" href="pokedex_view.php"><img src="resources\images\pokedex.png" alt="pokedex" width="35" height="35"></a>
            <div class="searchinfo">Search for a Pokémon by name or using its National Pokédex number.
            </div>
            <a href="main.php?query_db=Fire&search=Search">Fire</a>
            <a href="main.php?query_db=Grass&search=Search">Grass</a>
            <a href="main.php?query_db=Water&search=Search">Water</a>
            <a href="main.php?query_db=Poison&search=Search">Poison</a>


        </form>
    </div>
<!-- Eto ang table -->
    <div id="tablecon" style="border-color: #d13737 url(resources/images/container_bgs.png);">
        <table class="table table-bordered table-hover">
            <tr class="header">
            <th class="center_content" colspan="2">National No</th>
            <th class="center_content">Pokemon</th>
            </tr> <br>
            <?php
             if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 10;
            $offset = ($pageno-1) * $no_of_records_per_page;
            // Eto mag connect sa db
            // phpMyadmin localhost, user, pass, and db name 
            $connection = mysqli_connect("localhost","root","parag0n","local_db");      
            
            if(isset($_GET['search']))
            {
                $query_db = $_GET['query_db'];
                
                $total_pages_sql = "SELECT COUNT(*) FROM pokemon WHERE pokemon_no LIKE'%$query_db%' OR pokemon_name LIKE'%$query_db%' OR type LIKE'%$query_db%'";
                $result = mysqli_query($connection,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);

                
                // query sa column ng serialno at timestamp 
                $query = "SELECT * FROM pokemon WHERE pokemon_no LIKE'%$query_db%' OR pokemon_name LIKE'%$query_db%' OR type LIKE'%$query_db%' LIMIT $offset, $no_of_records_per_page";
                $query_run = mysqli_query($connection,$query);  
                while($row = mysqli_fetch_array($query_run))
                {

                    ?>
                    <tr class="header">
                        <td class="center_content" style="width:40px"><img src="resources\poke_icon\<?php echo $row['pokemon_icon']; ?>"></td>
                        <td class="center_content"><?php echo $row['pokemon_no']; ?> </td>
                        <td class="center_content"> <?php echo $row['pokemon_name']; ?> </td>
                    </tr>
                    <tr class="hiddenrow">
                        <th class="center_content col-lg-2 col-md-2 col-xs-2" rowspan="5" colspan="2" class="img-responsive"><img src="resources\poke_img\<?php echo $row['pokemon_img']; ?>" width="40%" height="auto"></th>
                        <th class="center_content col-lg-2 col-md-2 col-xs-2" style="background-color:#F2F2F2">Type</th>
                    </tr>
                    <tr class="hiddenrow">
                        <td class="center_content col-lg-2 col-md-2 col-xs-2" ><?php echo $row['type']; ?> </td>
                    </tr>
                    <tr class="hiddenrow">
                        <th class="center_content col-lg-2 col-md-2 col-xs-2" style="background-color:#F2F2F2">Description</th>
                    </tr>
                    <tr class="hiddenrow">
                    <td class="center_content col-lg-2 col-md-2 col-xs-2"><?php echo $row['description']; ?> </td><br>
                    </tr>
                    <tr class="hiddenrow">
                        <td class="center_content col-lg-2 col-md-2 col-xs-2" >
                        <a class="addpoke" href="pokedex_view.php?pokemonid=<?php echo $row['pokemon_no'];?>">Add to Pokédex</a>
                        </td>
                    </tr>
                    <?php

                }
            }
                mysqli_close($connection);
            ?>
            <ul class="pagination">
                <li><a href="main.php?query_db=<?php echo $query_db;?>&search=Search&pageno=1">First</a></li>
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="main.php?query_db=<?php echo $query_db;?>&search=Search<?php if($pageno <= 1){ echo '#'; } else { echo "&pageno=".($pageno - 1); } ?>">Prev</a>
                </li>
                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="main.php?query_db=<?php echo $query_db;?>&search=Search<?php if($pageno >= $total_pages){ echo "&pageno=".($pageno); } else { echo "&pageno=".($pageno + 1); } ?>">Next</a>
                </li>
                <li><a href="main.php?query_db=<?php echo $query_db;?>&search=Search&pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
        </table>

    </div>

    </center>
<!-- Jquery framework -->
<script src="configs/js/jquery.js"></script>
<!--Expand/Collapse jquery  -->
<script>
var $headers = $('.header').click(function () {
    $(this).nextUntil('tr.header').slideToggle(100, function () {});
});
$('table tr:not(.header)').hide()
</script>
<!-- When reload o refresh di na maresubmit yung form -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>
