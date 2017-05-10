<?php
$page = "noten";
session_start();

require_once "controller/MarksController.php";

$markcontroller = new MarksController();
?>
<!DOCTYPE html>
<html>
<head>
  <?php require_once 'view.template/head.php'; ?>
  <title>Sierra - Noten</title>
</head>
<body>
  <?php require_once 'view.template/nav.php'; ?>
<div class="container topSpacer">
<table>
    <?php
    $counter = 1;
    $averageMark = 0;
    foreach ($markcontroller->getMarks() as $mark) {
        $modulId = $markcontroller->getModulDetails($mark->getModulId());
        if ($counter == 1) {
            ?>
            <tr>
                <td><strong><?php echo $modulId->getModuleNumber() ?></strong></td>
                <td><strong><?php echo $modulId->getModuleName() ?></strong></td>
            </tr>
            <?php
            $counter++;
        } else {
            $counter++;
        } ?>
        <tr>
            <td><?php echo $mark->getDescription(); ?></td>
            <td><?php echo $mark->getMark(); ?></td>
        </tr>
        <?php
        $averageMark+= $mark->getMark()*($mark->getPercentage()/100);
        if ($counter == 5) {
            $counter =1; ?>
            <tr>
                <td>Endmark: </td>
                <td><?php echo $averageMark; ?></td>
            </tr>
            <?php

            $averageMark = 0;
        } ?>

        <?php

    }
    ?>
</table>
</div>
<?php require_once 'view.template/footer.php'; ?>
</body>
</html>
