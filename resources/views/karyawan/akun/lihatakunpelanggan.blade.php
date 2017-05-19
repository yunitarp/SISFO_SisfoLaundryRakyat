@extends('karyawan.base')
  @section('css')
        <link href="{{url('sisfo')}}/css/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="{{url('sisfo')}}/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  @endsection
	@section('content')
	<section class="content-header">
        <h1>
            Akun
            <small>Lihat Akun Pelanggan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="active">Akun</li>
        </ol>
    </section>
    <section class="content">
    	<div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabel Akun Pelanggan</h3>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                         @foreach($pelanggan as $isi)
                         	<tr>
                         		<td>{{$isi['id']}}</td>
                  				<td>{{$isi['username']}}</td>
                  				<td>{{$isi['password']}}</td>
                  				<td>{{$isi['nama_depan']}}</td>
                  				<td>{{$isi['nama_belakang']}}</td>
                  				<td>{{$isi['alamat']}}</td>
                  				<td>{{$isi['no_telp']}}</td>
                  				<td>
                  					<a href="{{url('/karyawan/ubahakunpelanggan').'/'.$isi['id']}}"><button type="button" class="btn btn-info">Ubah</button></a> <button type="button" class="btn btn-danger">Hapus</button>
                  				</td>
                         	</tr>
                         @endforeach
                         </tbody>
                         <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Action</th>
                            </tr>
                         </tfoot>
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