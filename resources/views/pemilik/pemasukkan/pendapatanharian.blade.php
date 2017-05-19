@extends('pemilik.base')
	@section('css')
        <link href="{{url('sisfo')}}/css/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="{{url('sisfo')}}/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    @endsection
	@section('content')
	<section class="content-header">
        <h1>
            Laporan Pendapatan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="active">Laporan Pendapatan</li>
        </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        	<div class="box">
                <div class="box-header">
                    <h3 class="box-title">Laporan Pendapatan Harian</h3>                                    
                </div><!-- /.box-header -->
                <form class="form-horizontal" action="" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2">Tanggal</label>
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
                            	<th>Tanggal</th>
                                <th>Jenis Luandry</th>
                                <th>Berat</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $totalpendapatan = 0; $totalharga = 0; ?>
                            @foreach($transaksi as $isi)
                            <?php
                                $totalpendapatan = $totalpendapatan + $isi['total_harga'];
                            ?>
                            <tr>
                            	<td>{{$isi['tanggal_selesai']}}</td>
                                <td>{{$isi['jenis_laundry']}}</td>
                                <td>{{$isi['berat']}}</td>
                                <td>{{$isi['total_harga']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th>{{$totalpendapatan}}</th>
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
           document.location.href = "{{url('pemilik/pendapatanharian')}}/"+obj.val()
        }
        $(document).ready(function(){
	        //Date picker

			$('.datepicker').datepicker({
			  autoclose: true,
              format: 'yyyy-mm-dd'
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