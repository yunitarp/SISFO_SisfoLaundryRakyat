@extends('pelanggan.base')
	@section('css')
        <link href="{{url('sisfo')}}/css/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="{{url('sisfo')}}/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	@endsection
	@section('content')
	<section class="content-header">
        <h1>
            Tracking Laundry
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="active">Tracking Laundry</li>
        </ol>
    </section>
    <section class="content">
    	<div class="row">
        <div class="col-xs-12">
        	<div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Pemesanan Laundry</h3>                                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Selesai</th>
                                <th>Berat</th>
                                <th>Jenis Laundry</th>
                                <th>Total Harga</th>
                                <th>Jumlah Baju</th>
                                <th>List Laundry</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($transaksi as $isi)
                            <tr>
                                <td>{{$isi['tanngal_masuk']}}</td>
                                <td>{{$isi['tanggal_selesai']}}</td>
                                <td>{{$isi['berat']}}</td>
                                <td>{{$isi['jenis_laundry']}}</td>
                                <td>{{$isi['total_harga']}}</td>
                                <td>{{$isi['jumlah_baju']}}</td>
                                <td>{{$isi['list_laundry']}}</td>
                                <td>{{$isi['status']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                 <th>Tanggal Masuk</th>
                                <th>Tanggal Selesai</th>
                                <th>Berat</th>
                                <th>Jenis Laundry</th>
                                <th>Total Harga</th>
                                <th>Jumlah Baju</th>
                                <th>List Laundry</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
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
        </script>
	@endsection