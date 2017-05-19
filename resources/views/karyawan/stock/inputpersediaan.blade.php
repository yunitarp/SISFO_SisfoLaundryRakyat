@extends('karyawan.base')
	@section('content')
	<section class="content-header">
        <h1>
            Order
            <small>Input Persediaan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-shopping-cart"></i> Home</a></li>
            <li class="active">Stock</li>
        </ol>
    </section>
    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input Persediaan</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/karyawan/inputpersediaan')}}" method="post">
		            <div class="box-body">
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Nama Item</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="nama_item" placeholder="Masukkan Item">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Jumlah</label>
		          			<div class="col-sm-2">
			          			<input type="number" class="form-control" name="jumlah" placeholder="Jumlah">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Maximum Stock</label>
		          			<div class="col-sm-2">
			          			<input type="number" class="form-control" name="max_stock" placeholder="Maksimum Stock">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Satuan</label>
		          			<div class="col-sm-2">
		          			<input type="text" class="form-control" name="satuan" placeholder="Masukkan Satuan">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Harga</label>
		                    <div class="col-sm-2">
		          			<input type="text" class="form-control" name="harga" placeholder="Harga">
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