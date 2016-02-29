<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>">Home</a>
            </li>
            <li class="active">
                <strong><a><?php echo $title ?></a></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit <?php echo $title ?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form>
                        <?php foreach ($news as $row) {?>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content_news" class="form-control" rows="10" id="textNews">
                            <?php echo $row['content'];?>
                            </textarea>
                        </div>
                        <div class="form-group form-preview">
                            <label>Preview</label>
                            <marquee id="preview"></marquee>
                        </div>
                        <a href="<?php echo base_url('ctb/news_update'); ?>" class="btn btn-flat btn-info" save data-id="<?php echo $row['id'];?>"><i class="fa fa-send"></i> Publish</a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#preview').text($('#textNews').val())
    $('#textNews').keyup(function() {
        var text = $(this).val();
        $('#preview').remove();
        $('.form-preview').append('<marquee id="preview">'+text+'</marquee>')
    });
});
$('a[save]').click(function() {
    var link = $(this).attr('href');
    id = $(this).attr('data-id');
    if (a == "") {
        alert("Tidak ada yang Anda rubah")
    }
    else{
        $.ajax({
            url: link,
            type: 'POST',
            data: {id: id, type: a},
            success: function(resp){
                alert(resp);
            }
        })
    }
    return false;
});
</script>