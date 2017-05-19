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
                    <h3 class="box-title">Laporan Untung/Rugi Tahunan</h3>                                    
                </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <table id="" class="example2 table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Detail Pemasukkan</th>
                            </tr>
                        </thead>
                        <?php $totalpendapatan = 0; ?>
                         @foreach($transaksi as $isi)
                             <?php
                                $totalpendapatan = $totalpendapatan + ($isi['pendapatan']);
                            ?>
                        @endforeach
                        <tbody>
                            @foreach($transaksi as $isi)
                            <tr>  
                                <td>{{$bulan[$isi['tgl']-1]}}</td>
                                <td>{{$isi['pendapatan']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                                <th>Total</th>
                                <th>{{$totalpendapatan}}</th>
                            </tr>
                            <tr>
                                <?php
                                    $rata = $totalpendapatan/12;
                                ?>
                                <th>Rata-rata Pendapatan Bulanan</th>
                                <th>{{"Rp " . number_format($rata,2,',','.')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div><!-- /.box-body -->
                    <div class="box-body table-responsive">
                    <table id="" class="example2 table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Item</th>
                                <th>Jumlah Pemakaian</th>
                                <th>Harga</th>
                                <th>Detail Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemakaian as $isi)
                            <?php
                                $total = ($isi['stock']->harga) * $isi['jml'];
                            ?>
                            <tr>
                                <td>{{$bulan[$isi['tgl']-1]}}</td>
                                <td>{{$isi['stock']->nama_item}}
                                <td>{{$isi['jml']}}</td>
                                <td>{{$isi['stock']->harga}}</td>
                                <td>{{$total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                                <th colspan="4">Total</th>
                                <?php $totalharga = 0; ?>
                                @foreach($pemakaian as $isi)
                                     <?php
                                        $totalharga = $totalharga + ($isi['stock']->harga*$isi['jml']);
                                    ?>
                                @endforeach
                                <th>{{$totalharga}}</th>
                            </tr>
                            <tr>
                                <?php
                                    $rata = $totalharga/30;
                                ?>
                                <th colspan="4">Rata-rata Pengeluaran Bulanan</th>
                                <th>{{"Rp " . number_format($rata,2,',','.')}}</th>
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
                $(".example1").dataTable();
                $('.example2').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": false,
                    "bInfo": false,
                    "bAutoWidth": false
                });
            });
        });
        </script>

    @endsection