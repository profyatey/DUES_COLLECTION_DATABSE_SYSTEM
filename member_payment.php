<?php
include 'db_connect.php';
$id = $_GET['id'];
$sql = "SELECT * FROM payments WHERE member_id='$id' ORDER BY payment_date DESC";
$result = $conn->query($sql);
?>

<h2>Payment History</h2>
<table border="1" cellpadding="8">
<tr><th>Date</th><th>Amount (GHS)</th></tr>
<?php while($row = $result->fetch_assoc()) { ?>
<tr>
  <td><?= $row['payment_date'] ?></td>
  <td><?= number_format($row['amount'], 2) ?></td>
</tr>
<?php } ?>
</table>
