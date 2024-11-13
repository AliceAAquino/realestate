<!--featured-cars start -->
		<section id="featured-place" class="featured-cars">
			<div class="container">
				<div class="section-nextplace">
					<div class="line_break_nextplace">
						<span></span>
					</div>
					<h2>Find your next place to live</h2>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="house-search-content">
								<div class="row">
									<div class="col-md-3 col-sm-12">
										<div class="single-model-search">
											<div class="house-select-icon">
												<select name="cat_id" id="cat_id" class="form-control" style="width: 100%;">
					                                <option value=""> Looking For </option>
					                                @foreach ($category as $data)
					                                    <option value="{{$data->id}}">
					                                        {{$data->category}}
					                                    </option>
					                                @endforeach
					                            </select>

											</div><!-- /.house-select-icon -->
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="single-model-search">
											<div class="house-select-icon">
												<select name="loc_id" id="loc_id" class="form-control dropdown select2" style="width: 100%;">
					                                <option value=""> Location </option>
					                                @foreach ($location as $data1)
					                                    <option value="{{$data1->id}}">
					                                        {{$data1->location}}
					                                    </option>
					                                @endforeach
					                            </select>
											</div><!-- /.house-select-icon -->
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="single-model-search">
											<div class="house-select-icon">
												<select name="type_id" id="type_id" class="form-control dropdown select2" style="width: 100%;">
					                                <option value=""> Property Type </option>
					                                @foreach ($type as $data2)
					                                    <option value="{{$data2->id}}">
					                                        {{$data2->type}}
					                                    </option>
					                                @endforeach
					                            </select>
											</div><!-- /.house-select-icon -->
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="single-model-search">
											<div class="house-select-icon">
												<select class="form-control">

												  	<option value="default">Price</option><!-- /.option-->

												  	<option value="1000000">1000000-2000000</option><!-- /.option-->

												  	<option value="2000001">2000001-3000000</option><!-- /.option-->
													<option value="3000001">3000001-4000000</option><!--/.option-->


												</select><!-- /.select-->
											</div><!-- /.house-select-icon -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="featured-cars-content layers">
					<div class="row">
						@foreach ($property as $p)
							<div class="col-lg-4 col-md-4 col-sm-6 housecontainer">
								<div class="single-featured-cars">
									<div class="featured-img-box">
										<div class="featured-cars-img">
											<!-- <img src="assets/img/featured/pexels-heyho-6782346.jpg" alt="cars"> -->
											<img src="{{$p->image }}" alt="{{ $p->property_name }}">
										</div>
										<div class="featured-cars-title">
											<h2>{{$p->property_name}}</h2>
										</div>
										<div class="featured-model-info">
											<div class="row">
												<div class="col-md-4 col-sm-6 featured-details">
													<i class="fa fa-car" aria-hidden="true"></i> 4
												</div>
												<div class="col-md-4 col-sm-6 featured-details">
													<i class="fa fa-bath" aria-hidden="true"></i> 2
												</div>
												<div class="col-md-4 col-sm-6 featured-details-last">
													<i class="fa fa-th" aria-hidden="true"></i> 2
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                        @endforeach

					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.featured-cars-->
		<!--featured-cars end -->