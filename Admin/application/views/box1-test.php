<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Static Tables</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>">Home</a>
            </li>
            <li>
                <a>Box 1</a>
            </li>
            <li class="active">
                <strong>Static Tables</strong>
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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a></li>
                            <li><a href="#">Config option 2</a></li>
                        </ul>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Show</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Video</td>
                                    <td class="video">
                                        <div class="i-checks"><label> <input type="radio" value="" checked="" name="show"> <i></i> <span style="display: none">Showed</span> </label></div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline btn-primary" style="display:none">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" value="" name="show"> <i></i> <span style="display: none">Showed</span> </label></div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline btn-primary" style="display:none">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Text</td>
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" value="" name="show"> <i></i> <span style="display:none">Showed</span> </label></div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline btn-primary" style="display:none">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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
    });
</script>