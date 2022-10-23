<?php include 'loginsession.php'; ?>
<?php
$connection = mysqli_connect("localhost","root","parag0n","local_db");
$query = "SELECT * FROM pokemon ";
$run_query = mysqli_query($connection, $query) or die(mysqli_error($connection));
$pokemon = mysqli_fetch_all($run_query, MYSQLI_ASSOC);

// pagiation to
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(id) FROM pokedex";
$result = mysqli_query($connection,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);


$query =  "SELECT * FROM pokemon inner join pokedex 
                ON   pokemon.pokemon_no = pokedex.pokemon_no_id 
                    WHERE user_id = '".$_SESSION['id']."' ORDER BY pokemon_no_id ASC limit $offset, $no_of_records_per_page";

$run_query = mysqli_query($connection, $query) or die(mysqli_error($connection));
$pokedex = mysqli_fetch_all($run_query, MYSQLI_ASSOC);



if(isset($_GET['pokemonid'])){
    $query = "SELECT * FROM pokedex where pokemon_no_id ='".$_GET['pokemonid']."' and user_id='".$_SESSION['id']."' ";
    $run_query = mysqli_query($connection, $query) or die(mysqli_error($connection));   
 
    if(mysqli_num_rows($run_query)>0){
        echo '<script>alert("Item Already Added")</script>'; 
    }else{ 
    $query = "INSERT INTO pokedex ( pokemon_no_id, user_id )
                    VALUES ( '".$_GET['pokemonid']."','". $_SESSION["id"]."' ) "  ;
        $run_query = mysqli_query($connection, $query);
        header("Location: main.php");
    }
}

    if (isset($_GET['deletepoke'])) { 
        $delete = "DELETE FROM pokedex WHERE id =".$_GET['deletepoke'];
        $result = mysqli_query($connection, $delete);
        header("Location: pokedex_view.php");
    }
?>