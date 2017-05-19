@extends('pemilik.base')
	@section('css')
        <link href="{{url('sisfo')}}/css/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="{{url('sisfo')}}/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    @endsection
	@section('content')
	<section class="content-header">
        <h1>
            Laporan Pemakaian
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="active">Laporan Pemakaian</li>
        </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        	<div class="box">
                <div class="box-header">
                    <h3 class="box-title">Laporan Pemakaian Tahunan</h3>                                    
                </div><!-- /.box-header -->
                <form class="form-horizontal" action="" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2" for="exampleInputEmail1">Tahun</label>
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
                                <th>Nama Item</th>
                                <th>Harga</th>
                                <th>Rata-rata Pemakaian</th>
                                <th>Stock Tersisa</th>
                                <th>Satuan</th>
                                <th>Total biaya</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $totalharga = 0; ?>
                            @foreach($pemakaian as $isi)
                            <?php
                                $totalharga = $totalharga + ($isi['stock']->harga*$isi['jml']);
                            ?>
                            <tr>
                                <td>{{$isi['stock']->nama_item}}</td>
                                <td>{{$isi['stock']->harga}}</td>
                                <td>{{number_format($isi['rata'],2)}}</td>
                                <td>{{$isi['stock']->jumlah}}/{{$isi['stock']->max_stock}}</td>
                                <td>{{$isi['stock']->satuan}}</td>
                                <td>{{"Rp " . number_format($isi['stock']->harga * $isi['jml'],2,',','.')}}</td>
                                <td>
                                    <a href="{{url('/pemilik/detailpemakaiantahunan').'/'.$tgl.'/'.$isi['stock']->id}}"><button type="button" class="btn btn-info">Lihat Detail</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th>{{"Rp " . number_format($totalharga,2,',','.')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
                </div>
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
           document.location.href = "{{url('pemilik/pemakaiantahunan')}}/"+obj.val()
        }
        $(document).ready(function(){
	        //Date picker

			$('.datepicker').datepicker({
			  autoclose: true,
              format: 'yyyy'
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