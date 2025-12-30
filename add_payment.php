<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Payment | Member SMS System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <h2>Member SMS</h2>
    <a href="index.html" class="nav-link">🏠 Dashboard</a>
    <a href="add_payment.php" class="nav-link" style="background-color:#00a8ff;">💰 Add Payment</a>
    <a href="payment_list.php" class="nav-link">📋 View Payments</a>
  </div>

  <!-- Main content -->
  <div class="main-content">
    <div class="header">
      <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
      <span>Welcome Admin</span>
    </div>

    <div class="card">
      <h3>Record a Member Payment</h3>
      <form action="add_payment_process.php" method="POST">
        <label for="member">Select Member</label>
        <select name="member_id" id="member" required>
          <option value="">-- Select Member --</option>
          <?php
          $result = $conn->query("SELECT * FROM members ORDER BY name ASC");
          while($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['name']} ({$row['phone']})</option>";
          }
          ?>
        </select>

        <label for="amount">Enter Amount (GHS)</label>
        <input type="number" step="0.01" name="amount" id="amount" placeholder="Enter Amount" required>

        <button type="submit">Add Payment</button>
      </form>
    </div>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("active");
    }
  </script>
</body>
</html>
