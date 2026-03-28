$(document).ready(function (){
    $("#table-information").DataTable();
});


// ================= EDIT BUTTON =================
$(document).on('click','#btnEdit', function(e){
    e.preventDefault();

    var data_id = $(this).val();

    $.ajax({
        type: "POST",
        url: "action.php",
        data: {
            'get_data': true,
            'data_id': data_id
        },
        success: function(response){
            var res = JSON.parse(response);

            if(res.status == 404){
                alert(res.message);
            } else {
                $('#date').val(res.data.id);
                $('input[name="editfullname"]').val(res.data.name);
                $('input[name="editemail"]').val(res.data.email);
                $('input[name="editphone"]').val(res.data.phone);
                $('input[name="editaddress"]').val(res.data.address);

                // SHOW EXISTING IMAGE
                if(res.data.image){
                    $('#editPreview').attr('src', 'uploads/' + res.data.image);
                } else {
                    $('#editPreview').attr('src', '');
                }

                $('#editModal').modal('show');
            }
        }
    });
});


// ================= DELETE =================
$(document).on('click', '#btnDelete', function(e){
    e.preventDefault();
    var data_id = $(this).val();

    if(confirm("Are you sure to remove this item"))
    {
        $.ajax({
            type: "POST",
            url: "action.php",
            data:{
                'delete_data': true,
                'data_id' : data_id
            },
            success: function(response) {
                var res = JSON.parse(response);

                if(res.status == 500){
                    alert(res.message);
                }
                else{
                    Swal.fire({
                        title: "Data Deleted",
                        text: res.message,
                        icon: "success"
                    });

                    $('#table-information').load(location.href + " #table-information");
                }
            }
        });
    }    
});


// ================= INSERT IMAGE PREVIEW =================
$(document).on('change','#insertImage', function(){
    var reader = new FileReader();
    reader.onload = function(e){
        $('#insertPreview').attr('src', e.target.result).show();
    }
    reader.readAsDataURL(this.files[0]);
});


// ================= EDIT IMAGE PREVIEW =================
$(document).on('change','#editImage', function(){
    var reader = new FileReader();
    reader.onload = function(e){
        $('#editPreview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
});


// ================= INSERT =================
$(document).on('submit','#insert_data', function(e){
    e.preventDefault();

    var formdata = new FormData(this);
    formdata.append("save_data", true);

    $.ajax({
        type: "POST",
        url: "action.php",
        data: formdata,
        processData:false,
        contentType:false,

        success: function(response){
            var res = JSON.parse(response);

            if(res.status == 500){
                alert(res.message);
            }
            else{
                $('#insertModal').modal('hide');
                $('#insert_data')[0].reset();
                $('#insertPreview').hide();

                $('#table-information').load(location.href + " #table-information");

                Swal.fire({
                    title: "Inserted",
                    text: res.message,
                    icon: "success"
                });
            }
        }
    });
});


// ================= UPDATE =================
$(document).on('submit','#edit_data', function(e){
    e.preventDefault();

    var formdata = new FormData(this);
    formdata.append("update_data", true);

    $.ajax({
        type: "POST",
        url: "action.php",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response){
            var res = JSON.parse(response);

            if(res.status == 500){
                alert(res.message);
            } else {
                $('#editModal').modal('hide');

                $('#table-information').load(location.href + " #table-information");

                Swal.fire({
                    title: "Updated",
                    text: res.message,
                    icon: "success"
                });
            }
        }
    });
});