<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';

$member_id = $_POST['member_id'];
$amount = $_POST['amount'];

// Should the payment
$sql = "INSERT INTO **YOUR DB_TABLENAME** (member_id, amount) VALUES ('$member_id', '$amount')";

if ($conn->query($sql) === TRUE) {

    // Get the member's name and phone
    $memberResult = $conn->query("SELECT name, phone FROM members WHERE id='$member_id'");
    $member = $memberResult->fetch_assoc();
    $name = $member['name'];
    $phone = $member['phone'];

    // Should  Calculate total balance
    $balanceResult = $conn->query("SELECT SUM(amount) AS total FROM YOUR DB_TABLENAME  WHERE member_id='$member_id'");
    $balanceRow = $balanceResult->fetch_assoc();
    $total_balance = $balanceRow['total'];

    // the Message to send
    $message = "Hi $name, we've received your payment of GHS $amount. "
             . "Your total balance is now GHS $total_balance. Thank you!";

    // Sending  SMS via Arkesel
    sendSmsWithArkesel([$phone], $message);

    echo "✅ Payment recorded successfully and SMS sent to $phone.";

} else {
    echo "❌ Error: " . $conn->error;
}


// This where i will insert my Arkesel API function
function sendSmsWithArkesel($recipients, $message) {
    $apiKey = "YOUR_APi";  //   Cimon you should Replace this with your actual key
    $url = "url";

    $payload = [
        "sender" => "Welfare", // You can replace with your approved sender name
        "message" => $message,
        "recipients" => $recipients
    ];

    $dataString = json_encode($payload);

    $options = [
        "http" => [
            "header" => "Content-Type: application/json\r\n" .
                        "api-key: $apiKey\r\n",
            "method" => "POST",
            "content" => $dataString
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);


    return json_decode($result, true);
}
?>
