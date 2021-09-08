@extends('admin.admin_master')


 @section('admin')


 <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> All Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
							
								<th>Category Icon</th>
							    <th>Category Name</th>
								<th>Action</th>
							
							</tr>
						</thead>
						<tbody>

						{{-- 	@foreach ($brands as $item)
							<tr>					

								
								<td>  {{ $item->brand_name }} </td>

								<td>

								<img src="{{ asset($item->brand_image) }}" height="80px;" width="80px;">


								</td>

								<td>

									<a href="{{ route('edit.brand', $item->id)  }}"   > Edit </a>

									<a href="{{ route('delete.brand', $item->id ) }}">Delete</a>
								 </td>

														
							</tr>

								@endforeach	 --}}

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
				  <h3 class="box-title">Category Add</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
    
					    
             <form action= "{{  route('category.store') }}" method="POST" enctype="multipart/form-data" >
				  @csrf




				   <div class="form-group" >
                   	<label>Category Icon</label>
	                		<input type="text"  name="category_icon" class="form-control" > 

	                		@error('category_icon')
 						  <strong style="color: red">{{ $message }}</strong>	
	                		@enderror

	               </div>



		              <div class="form-group">
			               <label>Category Name</label>
		                   <input type="text"  name="category_name" class="form-control" >
		          
		                   @error('category_name')
		                     
		                       <strong style="color: red">{{ $message }}</strong>	
		                      
		                   @enderror

			           </div>

                  


                       <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info"  value="Add Category" >
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



