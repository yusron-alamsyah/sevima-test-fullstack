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
    <i class="fas fa-heart mb-3 mr-2" style="font-size:35px"></i> <b>50 Likes</b>
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