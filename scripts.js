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

async function refreshContactList() {

    let contact_list = await request('api/getContacts.php');
    if (contact_list && contact_list.status && contact_list.status == 'ok' && contact_list.output) {
        
        $('.list__contact').remove();
        
        contact_list.output.forEach(contact => {
            let line = '<div class="list__contact" data-contact_id=' + contact.id + '>\
                    <div class="list__contact_field">' + contact.name + '</div>\
                    <div class="list__contact_field">' + contact.phone + '</div>\
                    <div class="list__contact_field">' + contact.timestamp + '</div>\
                    <div class="list__contact_field remove">x</div>\
                </div>';
            $('.list').append(line);
        });
    }

    return true;
}

async function submitAddForm() {

    let name = document.querySelector('.add input[name=name]').value;
    if (!name.length || name.length > 50) {
        alert('Имя должно быть заполнено и содержать не более 50 символов');
        return true;
    }

    let phone = document.querySelector('.add input[name=phone]').value;
    if (!phone.length || phone.length > 20) {
        alert('Номер телефона должен быть заполнен и содержать не более 20 символов');
        return true;
    }

    let result = await request('api/addContact.php', {name: name, phone: phone}, 'POST');
    if (result && result.status && result.status == 'ok' && result.output) {
        refreshContactList();
        document.querySelector('.add input[name=name]').value = '';
        document.querySelector('.add input[name=phone]').value = '';
    }

    return true;
};

$(document).ready(() => { 
    refreshContactList();
    
    $('.list').on('click', '.remove', (e) => {
        let contact_id = $(e.currentTarget).closest('.list__contact').attr('data-contact_id');
        request('api/removeContact.php', {contact_id: contact_id}, 'POST', res => {
            console.log(res);
            refreshContactList();
        });
    })
});