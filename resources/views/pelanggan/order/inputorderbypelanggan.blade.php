@extends('pelanggan.base')

	@section('css')
        <link href="{{url('sisfo')}}/css/datepicker3.css" rel="stylesheet" type="text/css" />
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
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input Order Baru</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/pelanggan/inputorderpelanggan')}}" method="POST">
		            <div class="box-body">
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Nama Pelanggan</label>
		          			<div class="col-sm-3">
		          			<input type="text" value="{{$pelanggan['nama_depan']}}" class="form-control" disabled="true">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Berat</label>
		          			<div class="col-xs-3">
		          			<input type="text" class="form-control" name="berat" id="berat" placeholder="">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Jenis Laundry</label>
		                    <div class="col-sm-3">
			          			<select class="form-control" name="jenis_laundry" id="jenis" onchange="isiHarga($(this))">
			          				<option selected="selected" value="none">--PILIH JENIS LAUNDRY--</option>
			                    	<option value="biasa">Biasa</option>
			                    	<option value="express">Express</option>	
			                  	</select>
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Total Harga</label>
		          			<div class="col-sm-3">
		          			<input type="number" class="form-control" name="total_harga" id="total_harga" placeholder="">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Jumlah Baju</label>
		          			<div class="col-sm-3">
		          			<input type="number" class="form-control" name="jumlah_baju" placeholder="">
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">List Baju</label>
		          			<div class="col-sm-3">
		          			<textarea class="form-control" rows="3" placeholder="Masukkan List Baju" name="list_laundry"></textarea>
		          			</div>
		                </div>
		                <div class="form-group">
                            <label class="col-sm-2">Tanggal Masuk</label>
                            <div class="col-sm-3 input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanngal_masuk" class="form-control datepicker"/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Tanggal Selesai</label>
		          			<div class="col-sm-3 input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanggal_selesai"class="form-control datepicker"/>
                            </div><!-- /.input group -->
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Status</label>
		          			<div class="col-sm-3">
		          				<div class="radio">
                                     <label>
                                     		<input type="radio" name="status" value="Order baru" checked>order baru
                                      </label>
                                 </div>
                                 <div class="radio">
                                     <label>
                                     		<input type="radio" name="status" value="Dalam pencucian">Dalam Pencucian
                                      </label>
                                 </div>
                                 <div class="radio">
                                     <label>
                                     		<input type="radio" name="status" value="Dalam penyetrikaan">Dalam Penyetrikaan
                                      </label>
                                 </div>
                                 <div class="radio">
                                     <label>
                                     		<input type="radio" name"status" value="Selesai">Selesai
                                      </label>
                                 </div>
		          			</div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Antar Jemput</label>
		                    <div class="col-sm-3">
			          			<select class="form-control" name="antarjemput">
			                    	<option selected="selected" value="Ya">Ya</option>
			                    	<option value="Tidak">Tidak</option>	
			                  	</select>
		          			</div>
		                </div>
		            </div><!-- /.box-body -->

		            <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Simpan</button>
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
        var isiHarga = function(obj){
			if(obj.val() == 'biasa'){
				$('#total_harga').val(5000 * $('#berat').val());
			}
			else{
				$('#total_harga').val(6000 * $('#berat').val())
			}
		}
        $(document).ready(function(){
	        //Date picker
			$('.datepicker').datepicker({
			  autoclose: true
			});
		});
		</script>
	@endsection