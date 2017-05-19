@extends('karyawan.base')
	@section('css')
        <link href="{{url('sisfo')}}/css/datepicker3.css" rel="stylesheet" type="text/css" />
	@endsection

	@section('content')
	<section class="content-header">
        <h1>
            Stock
            <small>Input Pemakaian</small>
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
                <h3 class="box-title">Form Input Pemakaian</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/karyawan/inputpemakaian')}}" method="post">
		            <div class="box-body">
		            	 @if(Session::has('pesan'))
		            	 <div class="alert alert-info alert-dismissable">
                            <i class="fa fa-info"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             {{Session::get('pesan')}}
                          </div>
		            	@endif
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Nama Item</label>
		                	<div class="col-sm-3">
			                    <select class="form-control" name="stock_id">
			                    @foreach($stock as $isi)
			                    	<option value="{{$isi['id']}}">{{$isi['nama_item']}}</option>
			                    @endforeach
		                    	</select>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Jumlah Pemakaian</label>
		          			<div class="col-sm-3">
			          			<input type="number" class="form-control" name="jumlah_pemakaian" placeholder="Jumlah">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Tanggal</label>
		                    <div class="col-sm-3 input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control datepicker" name="tanggal"/>
                            </div><!-- /.input group -->
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

	@section('js')
        <script src="{{url('sisfo')}}/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function(){
	        //Date picker
			$('.datepicker').datepicker({
			  autoclose: true
			});
		});
		</script>
	@endsection