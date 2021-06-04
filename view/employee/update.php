<h1>Persoon wijzigen</h1>
<form name="update" method="post" action="<?=URL?>employee/update">
    <input type="hidden" name="id" value="<?=$employee["id"]?>" />
    <label for="">Naam:</label>
    <input name="data[]" type="text" value="<?php echo $employee['name']; ?>">
    <label for="">Leeftijd:</label>
    <input name="data[]" type="number" value="<?php echo $employee['age']; ?>">
    <input type="submit" value="Toevoegen">
</form>