<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact List</title>
    <style>
        .add {margin: 10px 0 20px;}
        .list__contact, .list__contact_header {display: grid; grid-template-columns: 300px 180px 150px 115px;}
        .list__contact:nth-child(2n) {background: #0001;}
        .list__contact_header {font-weight: 700;}
        .list__contact_field {padding: 3px 10px; border-right: 1px solid #0003; text-align: center;}
        .list__contact_field:last-child {border-right: none;}
        .list__contact_field:first-child {text-align: left;}
        .list__contact_field.remove {cursor: pointer;}
        .list__contact_field.remove:hover {color: red;}
    </style>
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
        <div class="list__contact">
            <div class="list__contact_field">Елизаров Владимир Андреевич</div>
            <div class="list__contact_field">+7 (989) 123-12-32</div>
            <div class="list__contact_field">12.12.2021</div>
            <div class="list__contact_field remove">х</div>
        </div>
        <div class="list__contact">
            <div class="list__contact_field">Владимир</div>
            <div class="list__contact_field">+7 (989) 123-12-32</div>
            <div class="list__contact_field">12.12.2021</div>
            <div class="list__contact_field remove">х</div>
        </div>
        <div class="list__contact">
            <div class="list__contact_field">Владимир</div>
            <div class="list__contact_field">+7 (989) 123-12-32</div>
            <div class="list__contact_field">12.12.2021</div>
            <div class="list__contact_field remove">х</div>
        </div>
        <div class="list__contact">
            <div class="list__contact_field">Владимир</div>
            <div class="list__contact_field">+7 (989) 123-12-32</div>
            <div class="list__contact_field">12.12.2021</div>
            <div class="list__contact_field remove">х</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function request(url, params = {}, method = "GET", callback = null) {
            return new Promise((resolve) => {
                $.ajax({
                    type: method,
                    dataType: 'json',
                    url: url,
                    data: params,
                    success: function(res) {
                        if (typeof callback == 'function') {
                            callback(res);
                        }
                        resolve(res);
                    },
                    fail: function() {
                        resolve(null);
                    }
                });
            });
        };

        async function submitAddForm() {
            let name = document.querySelector('.add input[name=name]').value;
            //проверка имени на кол-во символов и ещё че-нибудь
            let phone = document.querySelector('.add input[name=phone]').value;
            //проверка телефона на кол-во символов
            console.log(await request('test.php', {name: name, phone: phone}));
        };

        
    </script>
</body>
</html>