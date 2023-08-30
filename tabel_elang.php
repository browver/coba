<?php

// Create connection

//CREATE USER 'new_user'@'localhost' IDENTIFIED BY 'password';
//GRANT ALL PRIVILEGES ON * . * TO 'new_user'@'localhost';
//FLUSH PRIVILEGES;



$link = mysqli_connect("localhost","10_Elang","qooq","210_Elang");

// Check connection

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
echo 
"DATABASE Connected successfully";
mysqli_close($conn);

$sql = "SELECT * FROM Persons";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>NAMA Depan</th>";
                echo "<th>NAMA Belakang</th>";
                echo "<th>Alamat</th>";
                echo "<th>Kota</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['PersonID'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['City'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>