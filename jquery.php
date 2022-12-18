<script>
$(document).ready(function() {
    displaydata();
});

$('#main-form').submit(function(e) {
    e.preventDefault();

    var array = $('#main-form').serializeArray();
    var obj = {};
    for (var a = 0; a < array.length; a++) {
        obj[array[a].name] = array[a].value;
    }
    var jsondata = JSON.stringify(obj);

    $.ajax({
        url: "http://localhost:8080/php/API/api-insert.php",
        type: "post",
        data: jsondata,
        success: function(data) {
            $('#load_table').html("");
            displaydata();
            var datas = JSON.parse(data); // json data is converted into object data 
            if (datas.status == 'true') {
                $('#sucess_message').show(function() {
                    $('#sucess_message').html("");
                    $('#sucess_message').append(datas.message);
                    $('#sucess_message').fadeOut(5000);
                });

            } else if (datas.status == 'false') {
                $('#error_message').show();
                $('#error_message').html("");
                $('#error_message').append(datas.message);
                $('#error_message').fadeOut(5000);
            }
        }
    });
    $('#main-form').trigger("reset");

});


// display data
function displaydata() {
    $.ajax({
        url: "http://localhost:8080/php/API/api-fecth-all.php",
        type: "post",
        success: function(data) {
            if (data.status == false) {
                $('#load_table').append('<tr><td colspan=5> <h3>' + data.message + '</h3><td> </tr>');
            } else {
                var num = 1;
                $.each(data, function(key, value) {
                    $('#load_table').append('<tr><td>' + num + '</td><td>' + value
                        .stu_name + '</td><td>' + value.email + '</td><td>' + value.password +
                        '</td><td><input type="button" onclick="edit(' + value.stu_id +
                        ')" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Edit"></td><td><input type="button"  onclick="del(' +
                        value.stu_id + ')" class="btn" value="Delete"></td></tr>'
                    );
                    num++;
                });
            }
        }
    });
}


// fetch single data
function edit(eid) {
    var sid = {
        sid: eid
    };
    var jsonstr = JSON.stringify(sid);
    $.ajax({
        url: "http://localhost:8080/php/API/api-fetch-single.php",
        type: "post",
        data: jsonstr,
        success: function(data) {
            // console.log(data);
            var id = $('#hidden_id').val(data[0].stu_id);
            $('#up-name').val(data[0].stu_name);
            $('#up-email').val(data[0].email);
            $('#up-password').val(data[0].password);
        }
    });
}

// update data
$('#update_btn').click(function() {
    var upd_name = $('#up-name').val();
    var upd_email = $('#up-email').val();
    var upd_password = $('#up-password').val();
    var upd_id = $('#hidden_id').val();

    var obj = {
        sid: upd_id,
        sname: upd_name,
        semail: upd_email,
        spassword: upd_password
    };
    var jsonstr = JSON.stringify(obj);

    $.ajax({
        url: "http://localhost:8080/php/API/api-update.php",
        type: "post",
        data: jsonstr,
        success: function(data) {
            // var datas = JSON.parse(data);
            console.log("data updated");
            $("#exampleModal").modal('hide');
            $('#load_table').html("");
            displaydata();
            $('#sucess_message').append(datas.message);
            $('#sucess_message').fadeOut(5000);
            $('#load_table').html("");
        }

    });
});

// Delete data
function del(did) {
    var obj = {
        sid: did
    };
    var jsonstr = JSON.stringify(obj);
    var conf = confirm("are you sure to delete data");
    if (conf == true) {
        $.ajax({
            url: "http://localhost:8080/php/API/api-delete.php",
            type: "post",
            data: jsonstr,
            success: function(data) {
                $('#load_table').html("");
                displaydata();
                var datas = JSON.parse(data);
                $('#sucess_message').append(datas.message);
                $('#sucess_message').fadeOut(5000);
                $('#load_table').html("");
            }

        });
    }

}





// search name

$('#search').keyup(function(){
    var search = $('#search').val();
    // var obj = {search : search};
    // var jsondata = JSON.stringify(obj);
    // console.log(search);
    $('#load_table').html("");
    $.ajax({
        url: "http://localhost:8080/php/API/api-search.php/"+ search,
        type: "post",
        // data: {search : jsondata},
        success: function(data){
            console.log(data);
            if (data.status == false) {
                $('#load_table').append('<tr><td colspan=5> <h3>' + data.message + '</h3><td> </tr>');
            } else {
                var num = 1;
                $.each(data, function(key, value) {
                    $('#load_table').append('<tr><td>' + num + '</td><td>' + value
                        .stu_name + '</td><td>' + value.email + '</td><td>' + value.password +
                        '</td><td><input type="button" onclick="edit(' + value.stu_id +
                        ')" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Edit"></td><td><input type="button"  onclick="del(' +
                        value.stu_id + ')" class="btn" value="Delete"></td></tr>'
                    );
                    num++;
                });
                
            }

        }
    });

});

</script>