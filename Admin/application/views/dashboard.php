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
                                    <th rowspan="2" align="middle">Box</th>
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
                                <tr>
                                    <td>Box 1</td>
                                    <form method="post" id="box1">
                                        <td class="video">
                                            <div class="i-checks"><label> <input type="radio" value="video" name="box1" checked> <i></i> <span style="display: none">Showed</span> </label></div>
                                        </td>
                                        <td class="video">
                                            <div class="i-checks"><label> <input type="radio" value="image" name="box1"> <i></i> <span style="display: none">Showed</span> </label></div>
                                        </td>
                                        <td class="video">
                                            <div class="i-checks"><label> <input type="radio" value="text" name="box1"> <i></i> <span style="display: none">Showed</span> </label></div>
                                        </td>
                                    </form>
                                    <td>
                                        <a href="<?php echo base_url('ctb/box1') ?>" class="btn btn-outline btn-primary" style="display:none">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Box 2</td>
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" class="box1" value="video" name="box2"> <i></i> <span style="display: none">Showed</span> </label></div>
                                    </td>
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" class="box1" value="image" name="box2" checked> <i></i> <span style="display: none">Showed</span> </label></div>
                                    </td>
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" class="box1" value="text" name="box2"> <i></i> <span style="display: none">Showed</span> </label></div>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('ctb/box2') ?>" class="btn btn-outline btn-primary" style="display:none">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>box 3</td>
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" value="video" name="box3"> <i></i> <span style="display:none">Showed</span> </label></div>
                                    </td> 
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" value="image" name="box3" checked> <i></i> <span style="display:none">Showed</span> </label></div>
                                    </td> 
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" value="text" name="box3"> <i></i> <span style="display:none">Showed</span> </label></div>
                                    </td> 
                                    <td>
                                        <a href="#" class="btn btn-outline btn-primary" style="display:none">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>box 4</td>
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" value="video" name="box4"> <i></i> <span style="display:none">Showed</span> </label></div>
                                    </td> 
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" value="image" name="box4"> <i></i> <span style="display:none">Showed</span> </label></div>
                                    </td> 
                                    <td>
                                        <div class="i-checks"><label> <input type="radio" value="text" name="box4" checked> <i></i> <span style="display:none">Showed</span> </label></div>
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
        // alert($('input:radio[name=box1]').val());
        var as = $('form#box1').serialize();
        $.ajax({
            url: '/path/to/file',
            type: 'post',
            data: {asd:"as"},
        })
    });
</script>