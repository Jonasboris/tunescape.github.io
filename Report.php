<?php

 # Init the MySQL Connection
  $con = mysqli_connect('localhost','root','','tunescape') or die ("Not Connected");


 # Prepare the SELECT Query
  $selectSQL = 'SELECT * FROM `artist`';
 # Execute the SELECT Query
  if( !( $con = mysqli_connect( $selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
    ?>
<table border="2">
  <thead>
    <tr>
      <th>Name</th>
      <th>User Name</th>
      <th>Email</th>
      <th>Picture</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysql_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysql_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['name']}</td><td>{$row['username']}</td><td>{$row['email']}</td><td>{$row['img']}</td></tr>\n";
        }
      }
    ?>
  </tbody>
</table>
    <?php
  }

?>