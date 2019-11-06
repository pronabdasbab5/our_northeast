@extends('website.template.emaster')
<!-- Head & Header Section -->
@section('content') 
<section class="mbr-section form1 cid-qv5ApHdm7c mbr-parallax-background" id="form1-2w" data-rv-view="9851" data-jarallax-original-styles="null" style="z-index: 0; position: relative; background-image: none; background-attachment: scroll; background-size: auto;">
    	<div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(189, 224, 235);">
    	</div>
    	<div class="container contact-div">
    		<div class="row justify-content-center">
    			<div class="title col-12 col-lg-8" style="margin-top: 50px;">
    				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2"><strong>
    				CONTACT US</strong></h2>
    				@if(session()->has('msg'))
                        {{ session()->get('msg') }}
                    @endif
    			</div>
    		</div>
    	</div>
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="media-container-column col-lg-6" data-form-type="formoid">
    				<form class="mbr-form" action="{{ route('send_email') }}" method="post"  autocomplete="off">
                        @csrf
    					<div class="row row-sm-offset">
    						<div class="col-md-12 multi-horizontal" data-for="name">
    							<div class="form-group">
    								<label class="form-control-label mbr-fonts-style display-7" for="name-form1-2w">Name</label>
    								<input type="text" class="form-control" name="name" data-form-field="Name" required="" id="name-form1-2w">
    							</div>
    						</div>
    						<div class="col-md-6 multi-horizontal" data-for="email">
    							<div class="form-group">
    								<label class="form-control-label mbr-fonts-style display-7" for="email-form1-2w">Email</label>
    								<input type="email" class="form-control" name="email" data-form-field="Email" required="" id="email-form1-2w">
    							</div>
    						</div>
    						<div class="col-md-6 multi-horizontal" data-for="phone">
    							<div class="form-group">
    								<label class="form-control-label mbr-fonts-style display-7" for="phone-form1-2w">Phone</label>
    								<input type="tel" class="form-control" name="phone" data-form-field="Phone" id="phone-form1-2w">
    							</div>
    						</div>
    					</div>
    					<div class="form-group" data-for="message">
    						<label class="form-control-label mbr-fonts-style display-7" for="message-form1-2w">Message</label>
    						<textarea type="text" class="form-control" name="message" rows="7" data-form-field="Message" id="message-form1-2w"></textarea>
    					</div>

    					<span class="group-btn">
    						<button href="" type="submit" class="btn btn-primary btn-form display-4">SEND</button>
    					</span>
    				</form>
    			</div>
    			<div class="col-md-6 contact-icons" style="margin-top: 30px;">
    				<div class="row">
    					<div class="col-md-3">
    						<i class="fa fa-home pull-right" style="font-size: 25px; padding: 15px; border: 2px solid #cacbcc;"></i>
    					</div>
    					<div class="col-md-9" style="margin-top: 20px;">Guwahati, ASSAM</div>
    				</div><br>
    				<div class="row">
    					<div class="col-md-3">
    						<i class="fa fa-phone pull-right" style="font-size: 27px; padding: 15px; border: 2px solid #cacbcc;"></i>
    					</div>
    					<div class="col-md-9" style="margin-top: 20px;">+91 98765 12345</div>
    				</div><br>
    				<div class="row">
    					<div class="col-md-3">
    						<i class="fa fa-envelope-open pull-right" style="font-size: 20px; padding: 15px; border: 2px solid #cacbcc;"></i>
    					</div>
    					<div class="col-md-9" style="margin-top: 15px;">demo@example.com</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
@endsection