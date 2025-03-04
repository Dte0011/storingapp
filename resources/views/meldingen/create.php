<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>
                    
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">

            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type="text" name="attractie" id="attractie" class="form-input">
            </div>
            <div class="form-group">
                <label for="type">Type attractie:</label>
                <select name="type" id="type" class="form-input">
                    <option value="">-- kies een type --</option>
                    <option value="achtbaan">Achtbaan</option>
                    <option value="draaiend">Draaiende attractie</option>
                    <option value="kinder">Kinderattractie</option>
                    <option value="horeca">Horeca</option>
                    <option value="show">Show</option>
                    <option value="water">Waterattractie</option>
                    <option value="overig">Overig</option>
                </select>
            </div>
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input">
            </div>
            <div class="form-group">
                <label for="prioriteit">Melding met prioriteit:</label>
                <input type="checkbox" name="prioriteit" id="prioriteit" class="form-input">
            </div>
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input">
            </div>
            <div class="form-group">
                <label for="gemeld_op">Gemeld op:</label>
                <input type="datetime-local" name="gemeld_op" id="gemeld_op" class="form-input">
            </div>
            <div class="form-group">
                <label for="overige_info">Overige informatie:</label>
                <textarea name="overige_info" id="overige_info" class="form-input" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" id="status" class="form-input">
            </div>

            <input type="submit" value="Verstuur melding">

        </form>
    </div>

</body>

</html>