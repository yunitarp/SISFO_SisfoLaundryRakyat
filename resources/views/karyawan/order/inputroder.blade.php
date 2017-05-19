@extends('karyawan.base')
  @section('css')
        <link href="{{url('sisfo')}}/css/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="{{url('sisfo')}}/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  @endsection
	@section('content')
		<section class="content-header">
        <h1>
            Order
            <small>Input Order Baru</small>
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
                        <h3 class="box-title">Tabel Pelanggan</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                         @foreach($pelanggan as $isi)
                         	<tr>
                         		<td>{{$isi['id']}}</td>
                    				<td>{{$isi['username']}}</td>
                    				<td>{{$isi['nama_depan']}} {{$isi['nama_belakang']}}</td>
                            <td>{{$isi['alamat']}}</td>
                    				<td>
                  					   <a href="{{url('/karyawan/inputorderbarukaryawan').'/'.$isi['id']}}"><button type="button" class="btn btn-info">Input Order</button></a>
                  				  </td>
                         	</tr>
                         @endforeach
                          <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Nama</th>
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