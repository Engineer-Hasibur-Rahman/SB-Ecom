@extends('admin.admin_master')


 @section('admin')


 <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> All Brands</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand Id</th>
								<th>Brand Name</th>
								<th>Brand Img</th>
								<th>Action</th>
							
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>01</td>
								<td>Easy Brand</td>
								<td>Pic</td>
								<td>Edit | Delete </td>
							
							</tr>
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			 
			  <!-- /.box -->          
			</div>
			<!-- /.col -->



			<div class="col-4">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brand Add</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
    
					    
             <form action= "{{ route('brand.add')}}" method="POST" enctype="multipart/form-data" >
				  @csrf

              <div class="form-group">
	               <label>Brand Name</label>
                   <input type="text" id="brand_name" name="brand_name" class="form-control" >
          
	           </div>

                   <div class="form-group" >
                   	<label>Brand Img</label>
	                <input type="file" id="image" name="brand_image" class="form-control" > 
	               </div>


                       <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info"  value="Add Brand" >
                        </div>

				</form> 

				</div>
			</div>


			</div>
		



		 </div>
        </div>
    </section>
</div>

@endsection



