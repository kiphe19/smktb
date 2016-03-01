<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Home</strong>
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
                    <h5>Custom responsive table </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">Box</th>
                                    <th colspan="3"><center>Type</center></th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Video</th>
                                    <th>Image</th>
                                    <th>Text</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($box->result() as $key): ?>
                                    <tr>
                                        <td>Box <?php echo $key->id_box ?></td>
                                        <td class="video">
                                            <div class="i-checks"><label> <input type="radio" value="1" name="box<?php echo $key->id_box ?>" <?php echo ($key->type == 1) ? "checked" : "" ?>> <i></i> <span style="display: none">Showed</span> </label></div>
                                        </td>
                                        <td class="image">
                                            <div class="i-checks"><label> <input type="radio" value="2" name="box<?php echo $key->id_box ?>" <?php echo ($key->type == 2) ? "checked" : "" ?>> <i></i> <span style="display: none">Showed</span> </label></div>
                                        </td>
                                        <td class="text">
                                            <div class="i-checks"><label> <input type="radio" value="3" name="box<?php echo $key->id_box ?>" <?php echo ($key->type == 3) ? "checked" : "" ?>> <i></i> <span style="display: none">Showed</span> </label></div>
                                        </td>
                                        <td class="action">
                                            <a href="<?php echo base_url('ctb/box/'.$key->id_box) ?>" class="btn btn-outline btn-primary">Edit</a>
                                            <span style="display: none">
                                                <a href="<?php echo base_url('ctb/saveType') ?>" class="btn btn-outline btn-success" save data-id="<?php echo $key->id_box ?>">save</a>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js') ?>"></script>
<script type="text/javascript">
    var b = Array(), a="";
    function showed(){
        $(':radio').closest('tr').children('td').children('a').hide();
        $(':radio').closest('td').children('div').children('label').children('span').hide();
        $(':radio:checked').closest('td').children('div').children('label').children('span').show();
        $(':radio:checked').closest('tr').children('td').children('a').show();
    }
    showed()
    $('.i-checks').iCheck({
        radioClass: 'iradio_square-green'
    });
    $('ins.iCheck-helper').click(function() {
        showed()
        a = $(this).parent('div');
        a = a[0].children[0].value;
        b.push(a);
        $(this).closest('tr').children('td.action').children('span').show()
    });
    $('a[save]').click(function() {
        $(this).parent('span').hide()
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
                    toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "7000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                  }
                  if (resp.success) {
                    toastr.success(resp.msg, 'Success');
                  }else{
                    toastr.error(resp.msg, 'Error');
                  }
              }
          })
        }
        return false;
    });
</script>