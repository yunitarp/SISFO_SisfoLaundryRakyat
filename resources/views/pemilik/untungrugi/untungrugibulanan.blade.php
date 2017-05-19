@extends('pemilik.base')
    @section('css')
        <link href="{{url('sisfo')}}/css/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="{{url('sisfo')}}/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    @endsection
    @section('content')
    <section class="content-header">
        <h1>
            Laporan Untung/Rugi
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="active">Laporan Untung/Rugi</li>
        </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Laporan Untung/Rugi Bulanan</h3>                                    
                </div><!-- /.box-header -->
                <form class="form-horizontal" action="" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2">Bulan</label>
                            <div class="col-sm-2 input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control datepicker" name="tanggal" id="tanggal" onchange="isiTanggal($(this))" value="{{$tgl}}"/>
                            </div><!-- /.input group -->
                        </div>
                    </div>
                </form>
                    <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Jumlah Pemasukkan</th>
                                <th>Jumlah Pengeluaran</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <?php $totalharga = 0; ?>
                        @foreach($pemakaian as $isi)
                             <?php
                                $totalharga = $totalharga + ($isi['stock']->harga*$isi['jumlah_pemakaian']);
                            ?>
                        @endforeach
                        <?php $totalpendapatan = 0; ?>
                        @foreach($transaksi as $a)
                             <?php
                                $totalpendapatan = $totalpendapatan + ($a['total_harga']);
                            ?>
                        @endforeach
                        <tbody>
                            <tr>     
                                <td>{{$totalpendapatan}}</td>
                                <td>{{$totalharga}}</td>
                                <td>{{$totalpendapatan-$totalharga}}</td>
                                <td>
                                    <a href="{{url('/pemilik/detailuntungrugibulanan').'/'.$tgl}}"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                           <tr>
                                <th>Jumlah Pemasukkan</th>
                                <th>Jumlah Pengeluaran</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div><!-- /.box-body -->
                </form>
            </div>
        </div>
    </div>
    </section>
    @endsection
    @section('js')
        <script src="{{url('sisfo')}}/js/bootstrap-datepicker.js" type="text/javascript"></script>

        <!-- DATA TABES SCRIPT -->
        <script src="{{url('sisfo')}}/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="{{url('sisfo')}}/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript">
        var isiTanggal = function(obj){
           document.location.href = "{{url('pemilik/untungrugibulanan')}}/"+obj.val()
        }
        $(document).ready(function(){
            //Date picker

            $('.datepicker').datepicker({
              autoclose: true,
              format: 'mm'
            });
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        });
        </script>

    @endsection