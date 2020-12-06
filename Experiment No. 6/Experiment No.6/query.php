<?php

  $connect = mysqli_connect("localhost", "root", "H@rsh@123", "exp6");


  if (isset($_POST['query'])) {

    $search_query = $_POST['query'];
    
  
    $query = "SELECT * FROM countries WHERE country_name LIKE '$search_query%' LIMIT 12";
    $result = mysqli_query($connect, $query);

  if (mysqli_num_rows($result) > 0) {
   while ($country_row = mysqli_fetch_array($result)) {
    echo $country_row['country_name']."<br/>";
  }
} else {
  echo "<p style='color:red'>Country not found...</p>";
}

}
?>