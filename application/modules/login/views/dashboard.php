<?php foreach ($list_posting as $key => $value) { ?>
<div class="au-card pl-0 pr-0 pt-1 mb-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-borderless">
                <tr>
                    <td width="70">
                        <img style="border-radius: 50%; width:100%; border:1px solid grey;"
                            src="https://joeschmoe.io/api/v1/random?user<?=$key?>" />
                    </td>
                    <td>
                        <h5><?=$value->username?></h5>
                        <p><?=$value->email?></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <img
        src="<?=base_url()."/uploads/posting/".$value->gambar?>">
    <div class="p-3">
    <i onclick="ajax_action_like(<?=$value->id?>)" class="fas fa-heart mb-3 mr-2 tampil-like-true<?=$value->id?>" style="font-size:35px; color:red; cursor:pointer;"></i> 
    <i onclick="ajax_action_like(<?=$value->id?>)" class="fas fa-heart mb-3 mr-2 tampil-like-false<?=$value->id?>" style="font-size:35px; color:#dddddd; cursor:pointer;"></i> 
    <b> <span class="count-like<?=$value->id?>"><?=$value->jumlah_like?></span> Likes</b>
        <p style="color:black">
            <b class="mr-2"><?=$value->username?></b>
            <?=$value->caption?>
        </p>
    </div>
    <div class="pl-3 pr-3 pt-1">
        <div class="mb-2" style="color:lig">Views <?=$value->jumlah_komen?> Comments</div>
        <div class="tampil-komen<?=$value->id?>">
        </div>
        <div class="input-group mb-3">
        <input style="border-top:none; border-left:none; border-right:none;" type="text" placeholder="Comment" class="form form-control text-komen<?=$value->id?>" />
        <div class="input-group-append" onclick="ajax_action_comment(<?=$value->id?>)">
            <span class="input-group-text text-primary" style="background-color: white; border:none; cursor:pointer;" >Post</span>
        </div>
        </div>
        
    </div>
</div>
<?php } ?>
<script>
    const fruits = <?php echo json_encode($list_posting); ?>;
    fruits.forEach(listLike);
    function listLike(item, index) {
        showLike(item.id,item.is_like);
    }
    function showLike(id,is_like){
        if(is_like == true){
            $('.tampil-like-true'+id).show();
            $('.tampil-like-false'+id).hide();
        }else{
            $('.tampil-like-false'+id).show();
            $('.tampil-like-true'+id).hide();
        }
    }

    function ajax_action_like(id){
        $.ajax({
            url: "<?php echo base_url(); ?>/login/ajax_action_like/",
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
                    showLike(id,data.message.body.is_like);
                    $('.count-like'+id).html(data.message.body.jumlah_like);
                    toastr["success"]("Success Like");
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
</script>