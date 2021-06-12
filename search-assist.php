<?php require_once('php/connexion.php')?>

<?php
    $searchTerm = $_GET['term'];
    $connexion = OpenConnexion();
    $query = "SELECT
                   p.pId,
                   p.pName
              FROM product AS p 
              Where p.pName LIKE '%".$searchTerm."%' LIMIT 5";
    $result = mysqli_query($connexion, $query);
    CloseConnexion($connexion);

    $Data = array();
    if(mysqli_num_rows($result) > 0){
        while($product = mysqli_fetch_array($result)){
            $data['id'] = $product[0];
            $data['value'] = $product[1];
            array_push($Data, $data);
        }
    }
    //return json res
    echo json_encode($Data);
?>
