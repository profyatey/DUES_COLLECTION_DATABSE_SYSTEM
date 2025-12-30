<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Member SMS Management System</title>
  <link rel="stylesheet" href="style.css">
  <link rel="manifest" href="manifest.json">
 <meta name="theme-color" content="#227a38">

<script>
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register('/service-worker.js');
    });
  }
</script>

</head>
<body>
  
  <img src="logo1.png" alt="TYCITC Logo" class="logo"
  width="40%" height="40%" style="display: block; margin-left: auto; margin-right: auto;"/>
  <h1>TYCITC Welfare System</h1>



    <div class="card">
      <h3>Add New Member</h3>
      <form action="add_member.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="text" name="phone" placeholder="Phone Number (e.g. 23354XXXXXXX)" required>
        <button type="submit">Add Member</button>
      </form>
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
   <div class="bottom-button">
  <a href="payment_list.php" class="dashboard-card orange">
    <div class="icon">📋</div>
    <h3>View Payments</h3>
  </a>
</div>
</div>


  
</div>
  </div>

</body>
</html>
