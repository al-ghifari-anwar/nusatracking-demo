<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0">Starter Page</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol> -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <form method="GET" action="" id="formBatch">
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="">Batch Number: </label>
                                                <input type="text" class="form-control" name="batch_no" onchange="document.getElementById('formBatch').submit()">
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-12">
                                    <?php if(isset($_GET['batch_no'])) :?>
                                        <?php
                                        $dossweigh = $this->db->get_where('tb_dossweigh', ['batch_no' => $_GET['batch_no']])->row_array();
                                             ?>
                                        <table>
                                            <tr>
                                                <th>Batch Number</th>
                                                <th>:</th>
                                                <td><?= $dossweigh['batch_no'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Product</th>
                                                <th>:</th>
                                                <td><?= $dossweigh['product_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <th>:</th>
                                                <td><?= date("d M, Y H:i", strtotime($dossweigh['date_dossweigh'])) ?></td>
                                            </tr>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(isset($_GET['batch_no'])) :?>
                    <?php 
                    $dossweighs = $this->db->get_where('tb_dossweigh', ['batch_no' => $_GET['batch_no']])->result_array();
                    ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Efficiency Dossing System</th>
                                            <th>Speed</th>
                                            <th>Target</th>
                                            <th>Actual</th>
                                            <th>Difference</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalSpeed = 0;
                                        $totalTarget = 0;
                                        $totalActual = 0;
                                        foreach($dossweighs as $dataDoss): 
                                        $totalSpeed += $dataDoss['speed'];
                                        $totalTarget += $dataDoss['target'];
                                        $totalActual += $dataDoss['actual'];
                                         ?>
                                            <tr>
                                                <td><?= $dataDoss['system'] ?></td>
                                                <td><?= $dataDoss['speed'] ?> Detik</td>
                                                <td><?= $dataDoss['target'] ?></td>
                                                <td><?= $dataDoss['actual'] ?></td>
                                                <td><?= $dataDoss['actual'] - $dataDoss['target']  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>MIXING TIME</th>
                                            <td>120 Detik</td>
                                            <td></td>
                                            <td>120 Detik</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td></td>
                                            <td><?= $totalTarget ?></td>
                                            <td><?= $totalActual ?></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

