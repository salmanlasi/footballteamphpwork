<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Team Player Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin-top: 255px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        h1, h2 {
            color: #2c3e50;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
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
        }
        .btn:hover {
            background-color: #1a252f;
        }
        .image-preview {
            width: 100%;
            height: 150px;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 5px;
        }
    </style>
    <script>
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById(previewId);
                    preview.innerHTML = `<img src="${e.target.result}" alt="Uploaded Image">`;
                    preview.style.backgroundColor = "lightblue";
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Lyari National</h1>
        <h2>Managed by: Mama Dadol</h2>
        <h3>Player Registration</h3>
        <form method="post" action="register_player.php" enctype="multipart/form-data">
            <input type="text" name="player_name" placeholder="Player Name" required>
            <input type="text" name="player_father_name" placeholder="Father's Name" required>
            <input type="number" name="player_age" placeholder="Age" required>
            <input type="text" name="player_nationality" placeholder="Nationality" required>
            <input type="text" name="player_cnic" placeholder="Player CNIC No." required>
            <input type="text" name="player_city" placeholder="City" required>
            <input type="text" name="player_area" placeholder="Area" required>
            <input type="text" name="player_position" placeholder="Position" required>
            
            <label for="player_image">Upload Passport Size Image:</label>
            <div class="image-preview" id="player-image-preview">No image uploaded</div>
            <input type="file" name="player_image" id="player_image" accept="image/*" required onchange="previewImage(event, 'player-image-preview')">
            
            <label for="cnic_image">Upload CNIC Image:</label>
            <div class="image-preview" id="cnic-image-preview">No image uploaded</div>
            <input type="file" name="cnic_image" id="cnic_image" accept="image/*" required onchange="previewImage(event, 'cnic-image-preview')">
            
            <!-- <textarea name="player_bio" placeholder="Short Bio" required></textarea> -->
            <input type="hidden" name="team" value="Lyari National">
            <button type="submit" class="btn">Register Player</button>
        </form>
    </div>
</body>
</html>