<?php 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.zoom.us/v2/users/{userId}/meetings",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\r\n  \"agenda\": \"My Meeting\",\r\n  \"default_password\": false,\r\n  \"duration\": 60,\r\n  \"password\": \"123456\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer  {YOUR TOKEN HERE}",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/Views/Public/style.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.js'></script>
    <script src='/docs/dist/demo-to-codepen.js'></script>
    <script src="../src/Views/Public/script.js" defer></script>
</head>
<body>
    <?php require_once "../src/Views/public/header.html" ?>
    <a href="#Create"><button class="btn btn-edit">Add new event/task + </button></a>
    <div id='calendar'></div>
    <div id="Create">
        <div class="form-card">
            <div class="success-message" id="successMessage">
                Tâche créée avec succès! 
            </div>

            <form id="taskForm">
                <div class="form-group">
                    <label for="title">Titre de la tâche</label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        placeholder="Entrez le titre de la tâche"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Dates</label>
                    <div class="date-group">
                        <div>
                            <label style="font-size: 0.85rem; margin-bottom: 8px;">Date de début</label>
                            <input 
                                type="date" 
                                id="start" 
                                name="start"
                                required
                            >
                        </div>
                        <div>
                            <label style="font-size: 0.85rem; margin-bottom: 8px;">Date de fin</label>
                            <input 
                                type="date" 
                                id="end" 
                                name="end"
                                required
                            >
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn-submit">Créer la Tâche</button>
                    <button type="reset" class="btn-reset">Réinitialiser</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>