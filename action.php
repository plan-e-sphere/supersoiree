<?php
if(isset($_GET['action']) && $_GET['action']=='accueil'){
    echo '<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Accueil</h1>

            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="http://i.ebayimg.com/images/i/311596157953-0-1/s-l1000.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Romi Rain</h4>
                    <span class="text-muted">The best of the best</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="http://cdn-i30.definebabe.com/_idb/g/17/85/07/1de536828f/01.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Katie Kox</h4>
                    <span class="text-muted">La gourmande</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="https://pbs.twimg.com/media/Cyhr3HrWEAAFc0B.jpg" width="200" height="400" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Sophie Dee</h4>
                    <span class="text-muted">serial croqueuse</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="http://www.nexxx.com/media/misc/model742.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Peta Jensen</h4>
                    <span class="text-muted">sage ... en apparence </span>';
}
else if(isset($_GET['action']) && $_GET['action']=='girlList'){
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supersoiree";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM actrices";
    $result = $conn->query($sql);
    $retval = '<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">List des actrices</h1>

            <div class="row placeholders">';
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $retval .= ' <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="'.$row["url_photo"].'" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>'.$row["prenom"].' '.$row["nom"].'</h4>
                    <span class="text-muted">The best of the best</span>
                </div>';
        }
    } else {
        $retval .= "0 results";
    }
    $conn->close();
    echo $retval;

}
else if(isset($_GET['action']) && $_GET['action']=='newGirl'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supersoiree";

    $nom = $_GET['name'];
    $prenom = $_GET['firstname'];
    $url = $_GET['adresse'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO actrices (nom, prenom, url_photo)
    VALUES ($nom, $prenom, $url)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


else if(isset($_GET['action']) && $_GET['action']=='newVideo'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supersoiree";

    $actrices = $_GET['actrices']; 
    $nbM = $_GET['nbMec'];
    $nbF = $_GET['nbFilles'];
    $url = $_GET['adresse'];
    $isView =$_GET['isView'];
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO videos (url, nbMecs, nbFilles, actrices,vu_a_revoir)
    VALUES ($url,$nbM,$nbF,$actrices,$isView)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
   
}

?>