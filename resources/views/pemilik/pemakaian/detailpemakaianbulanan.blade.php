@extends('pemilik.base')
	@section('css')
		<link href="{{url('sisfo')}}/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	@endsection
	@section('content')
	<section class="content-header">
        <h1>
            Laporan Pemakaian
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="">Laporan Pemakaian Bulanan</li>
            <li class="active">Detail Pemakaian Bulanan</li>
        </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        	<div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detail Pemakaian Bulanan</h3>                                    
                </div><!-- /.box-header -->
                  	<div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Item</th>
                                <th>Penginput</th>
                                <th>Jumlah Pemakaian</th>
                                <th>Total Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $totalharga = 0; ?>
                            @foreach($pemakaian as $isi)
                            <?php
                                $totalharga = $totalharga + ($isi['stock']->harga*$isi['jumlah_pemakaian']);
                            ?>
                            <tr>
                                <td>{{$isi['tanggal']}}</td>
                                <td>{{$isi['stock']->nama_item}}</td>
                                <td>{{$isi['karyawan']->nama_depan}}</td>
                              	<td>{{$isi['jumlah_pemakaian']}}</td>
                                <td>{{"Rp " . number_format($isi['stock']->harga * $isi['jumlah_pemakaian'],2,',','.')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total</th>
                                <th>{{"Rp " . number_format($totalharga,2,',','.')}}</th>
                            </tr>
                        </tfoot>
                </div><!-- /.box-body -->
                </div>
                </form>
            </div>
        </div>
    </div>
    </section>

	@endsection
	@section('js')
		<!-- DATA TABES SCRIPT -->
        <script src="{{url('sisfo')}}/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="{{url('sisfo')}}/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript">
         $(document).ready(function(){
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