<?php
session_start();
if (!isset($_SESSION)) {
    session_start();
}
include_once("connections/connections.php");
$con = connection();

$token_duration = 1800; // 1800 seconds = 30 minutes

if (isset($_SESSION['token_issue_time']) && time() - $_SESSION['token_issue_time'] > 1800) { // 1800 seconds = 30 minutes
    unset($_SESSION['current_token']);
    unset($_SESSION['token_issue_time']);
}

if (isset($_POST['generate']) || !isset($_SESSION['current_token'])) {
    // Fetch a random token from the database
    $sql = "SELECT `authcode` FROM `tokens` ORDER BY RAND() LIMIT 1";
    $result = $con->query($sql) or die($con->error);
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['current_token'] = $row['authcode']; // Save token in session
        $_SESSION['token_issue_time'] = time();       // Save issue timestamp
    } else {
        $_SESSION['current_token'] = "No tokens available";
    }
}

$current_token = isset($_SESSION['current_token']) ? $_SESSION['current_token'] : "No tokens available";

if (isset($_SESSION['token_issue_time'])) {
    $time_left = ($token_duration - (time() - $_SESSION['token_issue_time'])) > 0
        ? $token_duration - (time() - $_SESSION['token_issue_time'])
        : 0;
} else {
    $time_left = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Token Generator</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        let timeLeft = <?php echo $time_left; ?>; // Remaining seconds from PHP

        // Countdown Timer
        function startTimer() {
            const timerElement = document.getElementById('timer');
            const interval = setInterval(() => {
                if (timeLeft <= 0) {
                    clearInterval(interval);
                    timerElement.innerHTML = "Token Expired";
                } else {
                    const minutes = Math.floor(timeLeft / 60);
                    const seconds = timeLeft % 60;
                    timerElement.innerHTML = `${minutes}:${seconds < 10 ? '0' : ''}${seconds} remaining`;
                    timeLeft--;
                }
            }, 1000);
        }

        window.onload = startTimer;
    </script>
</head>

<body>
    <a href='register.php'><-Back</a>
            <div class="auth-container">
                <form method="post" id="auth">
                    <h1>Admin Token Generator</h1>
                    <br>
                    <div class="auth-element">
                        <label for="token" class="auth-label">Generated Token (Expires in 30 Minutes):</label>

                        <textarea id="token" name="token" rows="1" cols="40"
                            readonly><?php echo $current_token; ?></textarea>
                        <p id="timer">
                            <?php echo $time_left > 0 ? gmdate("i:s", $time_left) . " remaining" : "Token Expired"; ?>
                        </p>
                    </div>
                    <button type="submit" name="generate">Generate New Token</button>
                </form>
            </div>
</body>

</html>