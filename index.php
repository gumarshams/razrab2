<?

if (isset($_POST['data'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $obj_data = ['name' => "$name", 'email' => "$email", 'tel' => "$tel"];
    $errors = validateForm($obj_data);
}

function validateForm($obj_data)
{
    $errors_name = '';
    $errors_tel = '';
    $errors_email = '';

    if (empty($obj_data['name'])) {
        $errors_name = 'Поле "Имя" не может быть пустым';
    } else if (strlen($obj_data['name']) > 30) {
        $errors_name = 'Длина имени должна быть меньше 30 символов';
    }

    if (empty($obj_data['email'])) {
        $errors_email = 'Поле "Email" не может быть пустым';
    } else if (!filter_var($obj_data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors_email = 'Некорректный адрес электронной почты';
    }

    if (empty($obj_data['tel'])) {
        $errors_tel = 'Поле "Номер телефона" не может быть пустым';
    } else if (strlen($obj_data['tel']) != 10) {
        $errors_tel = 'Номер телефона должен содержать ровно 10 цифр';
    }
    $errors = ['name' => "$errors_name", 'email' => "$errors_email", 'tel' => "$errors_tel"];
    return $errors;
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>пр2_Шамсунов_Гумар</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <form method="post" name="form">
        <div class="text-input">
            <input class="name" type="text" name="name" placeholder="Имя" value="">
            <p class="errors"><? if (isset($_POST['data'])) {echo $errors['name'];if(!empty($errors['name'])){echo "<script>document.querySelector(`.name`).classList.add(`errorInput`);</script>";}} ?></p>
        </div>
        <div class="text-input">
            <input class="email" type="text" name="email" placeholder="E-mail" value="">
            <p class="errors"><? if (isset($_POST['data'])) {echo $errors['email'];if(!empty($errors['email'])){echo "<script>document.querySelector(`.email`).classList.add(`errorInput`);</script>";}} ?></p>
        </div>
        <div class="text-input">
            <input class="tel" type="text" name="tel" placeholder="Номер телефона" value="">
            <p class="errors"><? if (isset($_POST['data'])) {echo $errors['tel'];if(!empty($errors['tel'])){echo "<script>document.querySelector(`.tel`).classList.add(`errorInput`);</script>";}} ?></p>
        </div>
        <input type="submit" class="btn" value="Отправить" name="data">

    </form>
</body>

</html>
