<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="search">
        <input name="search" placeholder="Поиск">
    </div>
    <div class="add">
        <input name="name" placeholder="Имя">
        <input name="phone" placeholder="Номер">
        <button onclick="submitAddForm();">Добавить</button>
    </div>
    <div class="list">
        <div class="list__contact_header">
            <div class="list__contact_field">Имя</div>
            <div class="list__contact_field">Номер</div>
            <div class="list__contact_field">Дата создания</div>
            <div class="list__contact_field remove">Удалить</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>