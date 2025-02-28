<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php 
        $id = $_GET['id'];
        require_once '../../../config/conn.php'; 
        $query = "SELECT * FROM meldingen WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);
        $melding = $statement->fetch(PDO::FETCH_ASSOC);
    ?>
    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Melding Aanpassen</h1>
                    
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $melding['id']; ?>">
            
            <p>Naam attractie: <?php echo htmlspecialchars($melding['attractie']); ?></p>
            <p>Type attractie: <?php echo htmlspecialchars($melding['type']); ?></p>
            <p>Capaciteit p/uur: <?php echo htmlspecialchars($melding['capaciteit']); ?></p>
            
            <div class="form-group">
                <label for="prioriteit">Melding met prioriteit:</label>
                <input type="checkbox" name="prioriteit" id="prioriteit" class="form-input" <?php if($melding['prioriteit'] == 1) echo 'checked'; ?>>
            </div>
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input" value="<?php echo $melding['melder']; ?>">
            </div>
            <div class="form-group">
                <label for="gemeld_op">Gemeld op:</label>
                <input type="datetime-local" name="gemeld_op" id="gemeld_op" class="form-input" value="<?php echo date('Y-m-d\TH:i', strtotime($melding['gemeld_op'])); ?>">
            </div>
            <div class="form-group">
                <label for="overige_info">Overige informatie:</label>
                <textarea name="overige_info" id="overige_info" class="form-input" rows="4"><?php echo $melding['overige_info']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" id="status" class="form-input" value="<?php echo $melding['status']; ?>">
            </div>

            <input type="submit" value="Melding aanpassen ">

        </form>
    </div>

</body>

</html>
