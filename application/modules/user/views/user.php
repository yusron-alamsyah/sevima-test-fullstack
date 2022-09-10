
<button onclick="reset_form()" data-toggle="modal" data-target="#modal_add"  class="pull-right btn btn-primary btn-sm">
    <i class="fas fa-plus"></i>
        New User
</button>
<div class="mb-1"><h4 class="text-title">User</h4></div>
<br><br>
<table class="table table-borderless table-striped " id="list_data">
    <thead style="background: #000; color: #FFF;">
        <tr>
            <th>
                <center>No</center>
            </th>
            <th>
                <center>Username</center>
            </th>
            <th>
                <center>Role</center>
            </th>
            <th>
                <center>Last Login</center>
            </th>
            <th>
                <center>Action</center>
            </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>



<script type="text/javascript">
function ajax_list() {

        $('#list_data').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "pageLength": 10,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>user/ajax_list/",
                "type": "POST",
                "data": {
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                }

            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });
}
ajax_list();

function reload_list(){
    $('#list_data').DataTable().ajax.reload();
}

function reset_form(){
    $(".info-password").addClass("d-none");

    document.getElementById("form-add").reset();
}

function ajax_get_edit(id){
    $.ajax({
            url: "<?php echo base_url(); ?>user/ajax_get_edit/",
            type: 'GET',
            dataType: "json",
            data: {
                id: id
            },
            beforeSend: function() {
                $('#page-load').show();
            },
            success: function(data) {
                $('#page-load').hide();
                if (data.result) {
                    var list = data.message.body;
                    $(".info-password").removeClass("d-none");
                    $('#modal_add').modal("toggle");
                    $("#password").val("");
                    $("#username").val(list.username);
                    $("#role").val(list.role);
                    $("#email").val(list.email);
                    $("#id").val(list.id);
                    if(list.akses != undefined){
                        document.getElementById("comment").checked = list.akses.comment;
                        document.getElementById("like").checked = list.akses.like;
                        document.getElementById("posting").checked = list.akses.posting;
                    }else{
                        document.getElementById("comment").checked = false;
                        document.getElementById("like").checked = false;
                        document.getElementById("posting").checked = false;
                    }


                } else {
                    toastr["error"](data.message.body);
                }

            },
            error: function(request, status, error) {
                $('#page-load').hide();
                toastr["error"]("Error, Please try again later");
            }
        });
}

function ajax_action_add() {

    $.ajax({
        url: "<?php echo base_url() ?>user/ajax_action_add/",
        type: 'POST',
        dataType: "json",
        data: $( "#form-add" ).serialize()+ "&<?php echo $this->security->get_csrf_token_name(); ?>="+"<?php echo $this->security->get_csrf_hash(); ?>",
        beforeSend: function() {
            $('#page-load').show();
        },
        success: function(data) {
            $('#page-load').hide();
            if (data.result) {
                
                toastr["success"](data.message.body);
                $('#modal_add').modal("toggle");
                reload_list();

            } else {
                toastr["error"](data.message.body);
            }

        },
        error: function(request, status, error) {
            $('#page-load').hide();
            toastr["error"]("Error, Please try again later");
        }
    });

    return false;
}

function ajax_action_delete(id) {
    if (confirm('Are You sure delete this data?')) {
        $.ajax({
            url: "<?php echo base_url(); ?>user/ajax_action_delete/",
            type: 'POST',
            dataType: "json",
            data: {
                id: id,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            beforeSend: function() {
                $('#page-load').show();
            },
            success: function(data) {
                $('#page-load').hide();
                if (data.result) {
                    toastr["success"](data.message.body);
                    reload_list();
                } else {
                    toastr["error"](data.message.body);
                }

            },
            error: function(request, status, error) {
                $('#page-load').hide();
                toastr["error"]("Error, Please try again later");
            }
        });
    }
}
</script>