@extends('karyawan.base')
  @section('css')
        <link href="{{url('sisfo')}}/css/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="{{url('sisfo')}}/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  @endsection
	@section('content')
	<section class="content-header">
        <h1>
            Order
            <small>Lihat Order</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="active">Order</li>
        </ol>
    </section>
    <section class="content">
    	 <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Order</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pelanggan ID</th>
                                <th>Berat</th>
                                <th>Total Harga</th>
                                <th>Jumlah Baju</th>
                                <th>List Laundry</th>
                                <th>Jenis Laundry</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Selesai</th>
                                <th>Antar Jemput</th>
                                <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                         @foreach($transaksi as $isi)
                         	<tr>
                         		<td>{{$isi['id']}}</td>
                  				<td>{{$isi['pelanggan']->nama_depan}}</td>
                  				<td>{{$isi['berat']}}</td>
                  				<td>{{$isi['total_harga']}}</td>
                  				<td>{{$isi['jumlah_baju']}}</td>
                  				<td>{{$isi['list_laundry']}}</td>
                  				<td>{{$isi['jenis_laundry']}}</td>
                  				<td>{{$isi['tanngal_masuk']}}</td>
                  				<td>{{$isi['tanggal_selesai']}}</td>
                          <td>{{$isi['antarjemput']}}</td>
                  				<td>
                  					<a href="{{url('/karyawan/ubahorder').'/'.$isi['id']}}"><button type="button" class="btn btn-info">Ubah Order</button></a>
                  				</td>
                         	</tr>
                         @endforeach
                         <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Pelanggan ID</th>
                                <th>Berat</th>
                                <th>Total Harga</th>
                                <th>Jumlah Baju</th>
                                <th>List Laundry</th>
                                <th>Jenis Laundry</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Selesai</th>
                                <th>Antar Jemput</th>
                                <th>Action</th>
                            </tr>
                         </tfoot>
                         </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
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