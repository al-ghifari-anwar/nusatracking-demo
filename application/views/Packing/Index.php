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
                                <div class="col-12">
                                    <label for="">Batch Number: </label>
                                    <form method="GET" action="" id="formBatch">
                                        <div class="row">
                                            <label for="">From: &nbsp;</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="batch_no1">
                                            </div>
                                            <label for="">&nbsp;To: &nbsp;</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="batch_no2">
                                            </div>
                                            <div class="form-group ml-3">
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-12">
                                    <?php if(isset($_GET['batch_no1']) && isset($_GET['batch_no2'])) :?>
                                        <?php
                                        $dossweigh = $this->db->get_where('tb_packer', ['batch_no >=' => $_GET['batch_no1'], 'batch_no <=' => $_GET['batch_no2']])->row_array();
                                             ?>
                                        <!-- <table>
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
                                        </table> -->
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(isset($_GET['batch_no1']) && isset($_GET['batch_no2'])) :?>
                    <?php 
                    $packings = $this->db->get_where('tb_packer', ['batch_no >=' => $_GET['batch_no1'], 'batch_no <=' => $_GET['batch_no2']])->result_array();
                    ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Batch No.</th>
                                            <th>Product Name</th>
                                            <th>Date</th>
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
                                        foreach($packings as $dataPacking): 
                                        $totalTarget += $dataPacking['target'];
                                        $totalActual += $dataPacking['actual'];
                                         ?>
                                            <tr>
                                                <td><?= $dataPacking['batch_no'] ?></td>
                                                <td><?= $dataPacking['product_name'] ?></td>
                                                <td><?= date('H:i:s d M , Y', strtotime($dataPacking['date_packer'])) ?></td>
                                                <td><?= $dataPacking['target'] ?></td>
                                                <td><?= $dataPacking['actual'] ?></td>
                                                <td><?= number_format($dataPacking['actual'] - $dataPacking['target'], 2, '.', ',')  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <!-- <tfoot>
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
                                    </tfoot> -->
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

