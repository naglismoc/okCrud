<?php

include "./controllers/ShoeController.php";

$edit = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['save'])) {
        ShoeController::store();
        header("Location: ./index.php");
        die;
    }

    if (isset($_POST['edit'])) {
        $shoe = ShoeController::show();
        $edit = true;
    }
    
    if (isset($_POST['update'])) {
        echo "bandau atnaujinti irasa";
        $shoe = ShoeController::update();
        header("Location: ./index.php");
        die;
    }

    if (isset($_POST['destroy'])) {
        ShoeController::destroy();
        header("Location: ./index.php");
        die;
    }
}

$shoes = ShoeController::index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>


<form action="" method="post">
    <input type="text" name="manufacturer" value="<?=$edit ? $shoe->manufacturer : ""?>">manufacturer<br>
    <input type="text" name="color" value="<?=$edit ? $shoe->color : ""?>">color<br>
    <input type="text" name="size" value="<?=$edit ? $shoe->size : ""?>">size<br>
    <input type="text" name="material" value="<?=$edit ? $shoe->material : ""?>">material<br>
    <input type="hidden" name="id" value="<?=$edit ? $shoe->id : ""?>">

<?php
if ($edit) {?>
    <button type="submit" name="update" class="btn btn-success">update</button>
    <?php } else {?>
        <button type="submit" name="save" class="btn btn-primary">save</button>
<?php }?>


<!-- <?php
if ($edit) {?>
   <input type="text" name="material" value="<?=$shoe->manufacturer?>">material<br>
   <input type="text" name="material" value="<?=$shoe->color?>">material<br>
   <input type="text" name="material" value="<?=$shoe->size?>">material<br>
   <input type="text" name="material" value="<?=$shoe->material?>">material<br>

<?php } else {?>
   <input type="text" name="material">material<br>
   <input type="text" name="material">material<br>
   <input type="text" name="material">material<br>
   <input type="text" name="material">material<br>

<?php }?> -->
</form>

<table class="table">
    <tr>
        <th>id</th>
        <th>manufacturer</th>
        <th>color</th>
        <th>size</th>
        <th>material</th>
        <th>edit</th>
        <th>delete</th>
    </tr>
    <?php foreach ($shoes as $shoe) {?>
        <tr>
        <?php foreach ($shoe as $prop) {?>
            <td> <?=$prop?> </td>
        <?php }?>
        <td>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?=$shoe->id?>">
                <button type="submit" name="edit" class="btn btn-primary">edit</button>
            </form>
        </td>
        <td>
            <form action="" method="post">
            <input type="hidden" name="id" value="<?=$shoe->id?>">
                <button type="submit" name="destroy"  class="btn btn-danger">delete</button>
            </form>
        </td>
        </tr>
    <?php }?>
</table>
</body>
</html>