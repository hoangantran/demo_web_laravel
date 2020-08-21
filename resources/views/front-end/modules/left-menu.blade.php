<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						@foreach($cat as $row)
							@if($row->parent_id == 0)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{!! $row->slug !!}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{!! $row->name !!}
										</a>
									</h4>
								</div>
								<div id="{!! $row->slug !!}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											@foreach($cat as $row2)
												@if($row2->parent_id == $row->id)
													<li><a href="{!! url($row2->id.'-'.$row->slug)!!}">{!! $row2->name !!} </a></li>
												@endif
											@endforeach
										</ul>
									</div>
								</div>
							</div>
							@endif
						@endforeach
						</div><!--/category-products-->
					
					</div>
				</div>