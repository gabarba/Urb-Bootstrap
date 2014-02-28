<div id="filter_navigation" class="col-md-3">

	<?php 
	var_dump(Request::query());
	$eyepiece_filter_values = ProductAttributes::returnAttributeValues(Eyepieces::getEyepieceAttributesForFilter());

	$filter_navigation = array();
		
	foreach($eyepiece_filter_values as $filter => $values)
	{
		$filter_navigation[] = array(
				'label'=>$filter,
				'code' => $filter,
				'filters' => $values
			);
	};
	
	$parameters = Request::query();

	?>
		@if(isset($filter_navigation))
			@foreach($filter_navigation as $section)

				@if(count($section['filters']) > 0)
					<p><strong>{{$section['label']}}</strong></p>
					<ul>
						@foreach($section['filters'] as $filter)
							<?php 
								$newParameters = $parameters;
								$newParameters[$section['code']] = $filter;
								$count = Product::FilterByAttributes($newParameters)->remember(10)->count();
								if($count):
								$newParameters = $parameters;
								if(isset($newParameters[$section['code']]) AND !is_array($newParameters[$section['code']]))
								{
									$newParameters[$section['code']] = array($newParameters[$section['code']],$filter);
								}elseif(isset($newParameters[$section['code']]) AND is_array($newParameters[$section['code']]))
								{
									$newParameters[$section['code']][] = $filter;
								}else 
								{
									$newParameters[$section['code']] = $filter;
								}
							?>
							<li><a href="{{route((
									Route::getCurrentRoute()->getName())?Route::getCurrentRoute()->getName():'products',
									http_build_query($newParameters))}}">{{ $filter}}</a>
							({{$count}})</li>
						@endif
						@endforeach
					</ul>
				@endif
			@endforeach
		@else
			<p>No Filters Available</p>
		@endif
	
	</div>