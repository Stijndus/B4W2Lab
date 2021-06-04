<h1>Overzicht van personen</h1>
<ul>

    <?php foreach ($employees as $employee) {?>
    <li>
        <span><?php echo $employee['name'] ?> is <?php echo $employee['age'] ?> jaar</span>
        <a href="<?php echo URL ?>employee/edit/<?php echo $employee['id'] ?>">Wijzigen</a> 
		<a href="<?php echo URL ?>employee/delete/<?php echo $employee['id'] ?>">Verwijderen</a>
    </li>
    <?php }?>
</ul>