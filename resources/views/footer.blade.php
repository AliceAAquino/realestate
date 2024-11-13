<!--contact start-->
		<footer id="contact"  class="contact">
			<div class="container">
				<div class="footer-dreams">
					<div class="row">
						<div class="col-lg-8 col-sm-6">
							<h2>
								Make your dreams a <i>reality</i>
							</h2><!--/p-->
						</div>
						<div class="col-lg-4 col-sm-4 centered">
							<button class="footer-btn new-footer-btn" onclick="window.location.href='#dark_section'">
								Learn more &nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div><!--/.footer-copyright-->
				<div class="footer-top">
					<div class="row">
						<div class="col-md-2 col-xs-6">
							<div class="single-footer-widget">
								<div class="footer-logo">
									<a href="index.html">
										<img src = "assets/img/logoipsum.svg"/>
									</a>
									<div class="footer-social">
										<a href="#"><i class="fa fa-facebook"></i></a>	
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-instagram"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-xs-6">
							<div class="single-footer-widget">
								<h2>Column Heading</h2>
								<ul>
									<li><a href="#home">home</a></li>
									<li><a href="#about">About</a></li>
									<li><a href="#featured-place">Featured Place</a></li>
									<li><a href="#dark_section">Brands</a></li>
									<li><a href="#clients-say">Testimonials</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-xs-6">
							<div class="single-footer-widget">
								<h2>Column Heading</h2>
								<ul>
									<li><a href="#home">home</a></li>
									<li><a href="#about">About</a></li>
									<li><a href="#featured-place">Featured Place</a></li>
									<li><a href="#dark_section">Brands</a></li>
									<li><a href="#clients-say">Testimonials</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-sm-4">
							<div class="single-footer-widget">
								<h2>Column Heading</h2>
								<ul>
									<li><a href="#home">home</a></li>
									<li><a href="#about">About</a></li>
									<li><a href="#featured-place">Featured Place</a></li>
									<li><a href="#dark_section">Brands</a></li>
									<li><a href="#clients-say">Testimonials</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.contact-->
		<!--contact end-->

		
        <style>
            
            .welcome-hero {
                position: relative;
                background:url(assets/img/banner/home-banner.jpg)no-repeat;
                background-position: center;
                background-size: cover;
                z-index: 1;
            }
        </style>
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->
		
		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        


		<script type="text/javascript">
			$(document).on('change', '#cat_id', function (e) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url : '/search',
                        data : {cat_id : $('#cat_id').val()},
                        success:function(data){

                        $('.housecontainer').empty(); 
                        for (var i = 0; i < data.property.length; i++){
                           $('.housecontainer').append('<div class="single-featured-cars">\
									<div class="featured-img-box">\
										<div class="featured-cars-img">\
										<img src="'+data.property[i].image+'" alt="'+data.property[i].property_name+'">\
										</div>\
										<div class="featured-cars-title">\
											<h2>'+data.property[i].property_name+'</h2>\
										</div>\
										<div class="featured-model-info">\
											<div class="row">\
												<div class="col-md-4 col-sm-6 featured-details">\
													<i class="fa fa-car" aria-hidden="true"></i> 4\
												</div>\
												<div class="col-md-4 col-sm-6 featured-details">\
													<i class="fa fa-bath" aria-hidden="true"></i> 2\
												</div>\
												<div class="col-md-4 col-sm-6 featured-details-last">\
													<i class="fa fa-th" aria-hidden="true"></i> 2\
												</div>\
											</div>\
										</div>');
                           //<tr><td>'+data.property[i].lb_equipe+'</td></‌​tr>

                          }

                        },
                        timeout:10000
                    });

            });
		</script>
    </body>
	
</html>