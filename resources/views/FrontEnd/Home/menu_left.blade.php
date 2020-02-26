				<br/>
				<div class="list-group">
					<h4 class="text-center btn btn-success"><b>Category</b></h4>
					@foreach($category as $category)
					<a href="{{ route('productcategory',$category->id) }}" class="list-group-item list-group-item-action">● {{ $category->name }}</a>
					@endforeach
				</div>
				<br/>
				<div style="padding: 8px; border: 2px dashed #FF4500; word-wrap: break-word">
					<h4 class="text-center"><span class="badge badge-info">Connect with us on social media</span></h4>

					<div class="text-center social-media">
						<a class="text-primary" href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						<a class="text-primary" href=""><i class="fa fa-twitter-square " aria-hidden="true"></i></a>
						<a class="text-success" href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
						<a class="text-danger" href=""><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
					</div>
				</div>
				<br/>
				<div class="list-group">
					<h4 class="text-center btn btn-success"><b>Brand</b></h4>
					@foreach($brand as $brand)
					<a href="{{ route('productbrand',$brand->id) }}" class="list-group-item list-group-item-action">● {{ $brand->name }}</a>
					@endforeach
				</div><br/>

