<?php
include 'db_connect.php';

$sql = "
  SELECT m.name, m.phone, SUM(p.amount) AS total_paid
  FROM members m
  JOIN payments p ON m.id = p.member_id
  GROUP BY m.id
  ORDER BY total_paid DESC
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Payments List</title>
  <style>
    table { width: 80%; margin: auto; border-collapse: collapse; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background: #007bff; color: white; }
  </style>
</head>
<body>
  <h2 style="text-align:center;">List of Members Who Made Payments</h2>
  <table>
    <tr><th>Name</th><th>Phone</th><th>Total Paid (GHS)</th></tr>
    <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= number_format($row['total_paid'], 2) ?></td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
