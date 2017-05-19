@extends('karyawan.base')
	@section('content')
		<section class="content-header">
        <h1>
            Akun
            <small>Input Akun Pelanggan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="active">Akun</li>
        </ol>
    </section>
     <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input Akun Pelanggan</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/karyawan/inputakunpelanggan')}}" method="POST">
		            <div class="box-body">
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Username</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="username" placeholder="Masukkan Username Pelanggan">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Password</label>
		          			<div class="col-xs-3">
		          			<input type="password" class="form-control" name="password" placeholder="Masukkan Password">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Nama Depan</label>
		          			<div class="col-xs-3">
		          			<input type="text" class="form-control" name="nama_depan" placeholder="Masukkan Nama Depan">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Nama Belakang</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="nama_belakang" placeholder="Masukkan Nama Belakang">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Alamat</label>
		          			<div class="col-sm-3">
		          			<textarea type="email" class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">No telepon</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="no_telp" placeholder="Masukkan Nomor Telepon">
		          			</div>
		                </div>
		            </div><!-- /.box-body -->

		            <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </div>
		        </form>
        </div><!-- /.box -->
    	</div>
    	</div>
    </section>
	@endsection