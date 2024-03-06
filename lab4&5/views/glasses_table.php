<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <table>
    <tr>
      <td>id</td>
      <td>Name</td>
    </tr>
    <?php
    foreach ($items as $item) {
      echo "<tr>";
      echo "<td>" . $item->id . "</td>";
      echo "<td>" . $item->product_name . "</td>";
      echo "</tr>";
    }
    ?>
  </table>
  <?php
  if ($currentpage >= 1) {
    echo '<a href="?page=' . ($currentpage - 1) . '">Prev</a> ';
  }
  if ($currentpage < $totalPages) {
    echo '<a href="?page=' . ($currentpage + 1) . '">Next</a>';
  }
  ?>
</body>

</html>