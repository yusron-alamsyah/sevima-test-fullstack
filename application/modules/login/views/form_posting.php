<div class="modal-dialog modal-lg" style="width: 100%;" role="document">
    <div class="modal-content">
        <div class="modal-header bg-danger">
            <center>
                <h4 style="color: white;" class="modal-title" id="title-tambah">Posting</h4>
            </center>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form method="post" id="form-posting" enctype="multipart/form-data">
            <input type="text" style="display: none;" id="id" name="id">
            <div class="modal-body">
                <table class="table table-borderless">
                    <tr>
                        <td style="width:50%;" >
                            <label>Gambar :</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                data-allowed-file-extensions='["jpg", "png","jpeg"]'>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>Deskripsi :</label>
                            <textarea name="deskripsi" id="editor" rows="30" cols="80" class="ckeditor"></textarea>
                        </td>

                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <a><button type="button" data-dismiss="modal" onclick="reset_form()"
                        class="btn btn-danger">Back</button></a>
                <button onclick="return ajax_action_posting();" type="button" id="btn_admin"
                    class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>