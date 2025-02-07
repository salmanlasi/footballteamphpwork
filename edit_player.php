<?php
// Load existing player data from POST request or database
$player_name = $_POST['player_name'] ?? "";
$player_father_name = $_POST['player_father_name'] ?? "";
$player_age = $_POST['player_age'] ?? "";
$player_nationality = $_POST['player_nationality'] ?? "";
$player_cnic = $_POST['player_cnic'] ?? "";
$player_city = $_POST['player_city'] ?? "";
$player_area = $_POST['player_area'] ?? "";
$player_position = $_POST['player_position'] ?? "";
$team = $_POST['team'] ?? "";
$player_image = $_POST['player_image'] ?? "";
$cnic_image = $_POST['cnic_image'] ?? "";

// If form is submitted, update details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $player_name = $_POST['player_name'];
    $player_father_name = $_POST['player_father_name'];
    $player_age = $_POST['player_age'];
    $player_nationality = $_POST['player_nationality'];
    $player_cnic = $_POST['player_cnic'];
    $player_city = $_POST['player_city'];
    $player_area = $_POST['player_area'];
    $player_position = $_POST['player_position'];
    $team = $_POST['team'];

    // Handle new image uploads
    $target_dir = "uploads/";
    if (!empty($_FILES["player_image"]["name"])) {
        $player_image = $target_dir . basename($_FILES["player_image"]["name"]);
        move_uploaded_file($_FILES["player_image"]["tmp_name"], $player_image);
    }
    if (!empty($_FILES["cnic_image"]["name"])) {
        $cnic_image = $target_dir . basename($_FILES["cnic_image"]["name"]);
        move_uploaded_file($_FILES["cnic_image"]["tmp_name"], $cnic_image);
    }

    // Redirect to ID card page with updated details
    header("Location: player_id_card.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ecf0f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .edit-form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        label {
            font-weight: bold;
            color: #2c3e50;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
        }

        .btn {
            background-color: #2c3e50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #1a252f;
        }
    </style>
</head>
<body>

<div class="edit-form">
    <h2>Edit Player Details</h2>
    <form action="register_player.php" method="POST" enctype="multipart/form-data">
        <label>Player Name:</label>
        <input type="text" name="player_name" value="<?php echo htmlspecialchars($player_name); ?>" required>

        <label>Father's Name:</label>
        <input type="text" name="player_father_name" value="<?php echo htmlspecialchars($player_father_name); ?>" required>

        <label>Age:</label>
        <input type="number" name="player_age" value="<?php echo htmlspecialchars($player_age); ?>" required>

        <label>Nationality:</label>
        <input type="text" name="player_nationality" value="<?php echo htmlspecialchars($player_nationality); ?>" required>

        <label>CNIC No:</label>
        <input type="text" name="player_cnic" value="<?php echo htmlspecialchars($player_cnic); ?>" required>

        <label>City:</label>
        <input type="text" name="player_city" value="<?php echo htmlspecialchars($player_city); ?>" required>

        <label>Area:</label>
        <input type="text" name="player_area" value="<?php echo htmlspecialchars($player_area); ?>" required>

        <label>Position:</label>
        <input type="text" name="player_position" value="<?php echo htmlspecialchars($player_position); ?>" required>

        <label>Team:</label>
        <input type="text" name="team" value="<?php echo htmlspecialchars($team); ?>" required>

        <label>Player Image:</label>
        <input type="file" name="player_image">
        
        <label>CNIC Image:</label>
        <input type="file" name="cnic_image">

        <button type="submit" class="btn">Save Changes</button>
    </form>
</div>

</body>
</html>
