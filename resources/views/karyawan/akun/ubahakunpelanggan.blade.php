@extends('karyawan.base')
	@section('content')
	<section class="content-header">
        <h1>
            Akun
            <small>Ubah Akun Pelanggan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="active">Akun</li>
        </ol>
    </section>
    </section>
     <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Ubah Akun Pelanggan</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/karyawan/ubahakunpelanggan')}}" method="POST">
		            <div class="box-body">
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Username</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="username" value="{{$pelanggan->username}}" placeholder="Masukkan Username Pelanggan">
		          			<input type="hidden" name="id" value="{{$pelanggan->id}}"/>
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Password</label>
		          			<div class="col-xs-3">
		          			<input type="password" class="form-control" name="password" placeholder="Masukkan Password">
		          			</div>
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