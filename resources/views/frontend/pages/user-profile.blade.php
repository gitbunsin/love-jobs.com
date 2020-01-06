@extends('frontend.layouts.template')
@section('content')
	<div class="tr-profile section-padding">
	    <div class="container">
	        <div class="row">
	        	<div class="col-md-4 col-lg-3">
	        		<div class="tr-sidebar">
						<ul class="nav nav-tabs profile-tabs section" role="tablist">
							<li role="presentation"><a class="active" href="#account-info" aria-controls="account-info" role="tab" data-toggle="tab"><i class="fa fa-life-ring" aria-hidden="true"></i> Account Info</a></li>
							<li role="presentation"><a href="#resume" aria-controls="resume" role="tab" data-toggle="tab"><span><i class="fa fa-user-o" aria-hidden="true"></i></span> My Resume</a></li>
							<li role="presentation"><a href="#edit-resume" aria-controls="edit-resume" role="tab" data-toggle="tab"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Edit Resume</a></li>
							<li role="presentation"><a href="#bookmark" aria-controls="bookmark" role="tab" data-toggle="tab"><span><i class="fa fa-bookmark-o" aria-hidden="true"></i></span> Bookmark</a></li>
							<li role="presentation"><a href="#archived" aria-controls="archived" role="tab" data-toggle="tab"><span><i class="fa fa-clone" aria-hidden="true"></i></span>Change Password</a></li>
							<li role="presentation"><a href="#close-account" aria-controls="close-account" role="tab" data-toggle="tab"><span><i class="fa fa-scissors" aria-hidden="true"></i></span> Close Account</a></li>
						</ul>	
						<a href="#" class="btn btn-primary"><i class="fa fa-cloud-download" aria-hidden="true"></i> <span>Download Resume as doc</span></a>		        			
	        		</div><!-- /.tr-sidebar -->        		
				</div>
				@php
					// dd($user->id);
				@endphp
	            <div class="col-md-8 col-lg-9">
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in show active account-info" id="account-info">	
							<div class="tr-fun-fact">
								<div class="row">
									<div class="col-sm-4">
										<div class="fun-fact">
											<div class="fun-fact-icon">
												<img src="{{asset('images/icons/fun-fact4.png')}}" alt="images" class="img-fluid">
											</div>
											<div class="media-body">
												<h1 class="counter">329</h1>
												<span>Viewed my resume</span>
											</div>
										</div><!-- /.fun-fact -->
									</div>
									<div class="col-sm-4">
										<div class="fun-fact">
											<div class="fun-fact-icon">
												<img src="{{asset('images/icons/fun-fact5.png')}}" alt="images" class="img-fluid">
											</div>
											<div class="media-body">
												<h1 class="counter">32</h1>
												<span>Application submit</span>
											</div>
										</div><!-- /.fun-fact -->									
									</div>
									<div class="col-sm-4">
										<div class="fun-fact">
											<div class="fun-fact-icon">
												<img src="{{asset('images/icons/fun-fact6.png')}}" alt="images" class="img-fluid">
											</div>
											<div class="media-body">
												<h1 class="counter">27</h1>
												<span>Call for interview</span>
											</div>
										</div><!-- /.fun-fact -->
									</div>
								</div><!-- ./row -->							
							</div><!-- /.tr-fun-fact -->
							<div class="section display-information">
								<form id="frmUpdateUserProfile">
											<input type="hidden" name="_token" value="{{ csrf_token()}}">
								<div class="title title-after">
									<div class="icon"><img src="{{asset('images/icons/2.png')}}" alt="Icon" class="img-fluid"></div> 
									<span>Your display Information</span>
								</div>
								<div class="change-photo">
									<div class="user-image">
										@if($user->profile)
											<img id="preview" src="{{url('uploads/UserCv/'.$user->profile)}}" width="350px" height="320px"/><br/>
										@else
											<img id="preview" src="{{asset('images/noimage.jpg')}}" width="350px" height="320px"/><br/>
										@endif
										<input type="file"id="image" style="display: none;"/>
									</div>
									<div class="upload-photo">
										<label class="btn btn-primary" for="upload-photo">
												<a style="color:white;" id="upload-photo" href="javascript:changeProfile()">Change</a>
				
										</label>
										<label class="btn btn-danger" for="upload-photo">
												<a style="color: white" href="javascript:removeImage()">Remove</a>
											</label>
										<span class="max-size">Max 20 MB</span>
									</div>
								</div>
								<ul class="tr-list account-details">
							<input type="hidden" value="{{$user->id}}" name="user_login_id" id="user_login_id">
							<div class="row">
				
									<div class="col-lg-6">
											<label>Name</label>
											<input value="{{$user->name}}" class="form-control" type="text" name="user_name" id="user_name"/>
									</div>
									<div class="col-lg-6">
											<label>Email</label>
											<input value="{{$user->email}}" class="form-control" type="email" name="user_email" id="user_email"/>
									</div>
									<div class="col-lg-6">
										<label>First Name</label>
										<input value="{{$user->first_name}}" class="form-control" type="text" name="user_first_name" id="user_first_name"/>
									</div>
									<div class="col-lg-6">
										<label>Last Name</label>
										<input value="{{$user->last_name}}" class="form-control" type="text" name="user_last_name" id="user_last_name"/>
									</div>
									<div class="col-lg-6">
											<label>Phone Number</label>
											<input value="{{$user->phone}}" class="form-control" type="number" name="user_phone" id="user_phone"/>
									</div>
									<div class="col-lg-6">
											<label>Zip Code</label>
											<input value="{{$user->zip}}" class="form-control" type="text" name="user_zip" id="user_zip"/>
									</div>
									<div class="col-lg-6">
											<label>Birth Date</label>
											<input class="form-control" type="date" name="user_date" id="user_date"/>
									</div>
									<div class="col-lg-6">
											<label>Nationality</label>
											<input class="form-control" type="text" name="user_nationality" id="user_nationality"/>
									</div>
									<div class="col-lg-6">
										<label>Sex</label>
										@php
											$sex = array('Male','Female');
										@endphp
										<select name="user_sex" id="user_sex" class="form-control">
											@foreach( $sex as $sexs)
												<option value="{{$sexs}}">{{$sexs}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-lg-6">
											<label>Address</label>
											<input value="{{$user->address}}" class="form-control" type="text" name="user_address" id="user_address"/>
									</div>
							</div>
							<div class="buttons pull-right">
									<button type="button" class="btn btn-primary" id="btn_save_profile" value="">Update Your Profile</button>
									<button type="submit" id="save_profile"  class="btn btn-primary" value="">Save</button>
							</div>
								</ul>	
							</form>							
							</div><!-- /.display-information -->
						</div><!-- /.tab-pane -->

						<div role="tabpanel" class="tab-pane section" id="resume">
								
							<ul class="tr-list resume-info">
								<li class="career-objective media">
									<div class="icon">
								        <i class="fa fa-black-tie" aria-hidden="true"></i>
								    </div>  
								    <div class="media-body">
								    	<span class="tr-title">Career Objective</span>
								        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> <br>
								        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni।</p>
								    </div>
								</li><!-- /.career-objective -->
								<li class="work-history media">
								    <div class="icon">
								    	<i class="fa fa-briefcase" aria-hidden="true"></i>
								    </div>
								    <div class="media-body">
								    	<span class="tr-title">Work History</span>
								    	<ul class="tr-list">
								    		<li>
								    			<span>Senior Graphic Designer @ Buildomo</span>
								    			<span class="present">2016 - Present</span>
								    			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								    		</li>
								    		<li>
								    			<span>Former Graphic Designer @ Ideame</span>
								    			<span class="present">2015 - 2016</span>
								    			<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								    		</li>
								    		<li>
								    			<span>Head of Design @ Titan Compnay</span>
								    			<span class="present">2007 - 2015</span>
								    			<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
								    		</li>
								    		<li>
								    			<span>Graphic Designer @ Precision</span>
								    			<span class="present">2005 - 2007</span>
								    			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								    		</li>
								    		<li>
								    			<span>Graphic Designer (Intern) @ Costa Rica Fruit Compnay</span>
								    			<span class="present">2003 - 2005</span>
								    			<p>Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								    		</li>
								    	</ul>
								    </div>
								</li><!-- /.work-history -->	
								<li class="education-background media">
								    <div class="icon">
								    	<i class="fa fa-briefcase" aria-hidden="true"></i>
								    </div>
								    <div class="media-body">
								    	<span class="tr-title">Education Background</span>
								    	<ul class="tr-list">
								    		<li>
								    			<span>Senior Graphic Designer @ Buildomo</span>
								    			<ul class="tr-list">
								    				<li>Year: 1999 - 2001</li>
								    				<li>Major: Major in Accounting</li>
								    				<li>Course Duration: 2 Years</li>
								    				<li>Result: 4.00</li>
								    			</ul>
								    			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								    		</li>
								    		<li>
								    			<span>Bachalor of Arts @ Universty of Bristol</span>
								    			<ul class="tr-list">
								    				<li>Year: 1999 - 2001</li>
								    				<li>Major: Major in Accounting</li>
								    				<li>Course Duration: 2 Years</li>
								    				<li>Result: 4.00</li>
								    			</ul>
								    			<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								    		</li>
								    		<li>
								    			<span>Diploma in Graphics Design @ Cincinnati Christian University</span>
								    			<ul class="tr-list">
								    				<li>Year: 1999 - 2001</li>
								    				<li>Major: Major in Accounting</li>
								    				<li>Course Duration: 2 Years</li>
								    				<li>Result: 4.00</li>
								    			</ul>
								    			<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
								    		</li>
								    	</ul>
								    </div>
								</li><!-- /.education-background -->
								<li class="qualification media">
								    <div class="icon">
								    	<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
								    </div>
								    <div class="media-body">
								    	<span class="tr-title">Special Qualification:</span>
								    	<ol>
											<li>5 years+ experience designing and building products In the Design & IT industry.</li>
											<li>Passion for people-centered design, solid intuition.</li>
											<li>Skilled at any Kind Design Tools. </li>
											<li>Hard Worker & Quick Lerner.</li>
								    	</ol>
								    </div>
								</li><!-- /.qualification -->
								<li class="language-proficiency media">
								    <div class="icon">
								    	<i class="fa fa-language" aria-hidden="true"></i>
								    </div>
								    <div class="media-body">
								    	<span class="tr-title">Language Proficiency:</span>
										<ul class="tr-list">
										    <li>
										        <span>English</span>
										        <ul class="tr-list rating">
										            <li><i class="fa fa-star" aria-hidden="true"></i></li>
										            <li><i class="fa fa-star" aria-hidden="true"></i></li>
										            <li><i class="fa fa-star" aria-hidden="true"></i></li>
										            <li><i class="fa fa-star" aria-hidden="true"></i></li>
										            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
										        </ul>
										    </li>
										    <li>
										        <span>German</span>
										        <ul class="tr-list rating">
										            <li><i class="fa fa-star" aria-hidden="true"></i></li>
										            <li><i class="fa fa-star" aria-hidden="true"></i></li>
										            <li><i class="fa fa-star" aria-hidden="true"></i></li>
										            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
										            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
										        </ul>
										    </li>
										</ul>							    	
								    </div>
								</li><!-- /.language-proficiency -->	
								<li class="personal-deatils media">
								    <div class="icon">
								    	<i class="fa fa-user-secret" aria-hidden="true"></i>
								    </div>
								    <div class="media-body">
										<span class="tr-title">Personal Deatils1</span>
									
										<ul class="tr-list">
											<li><span class="left">Full Name</span><span class="middle">:</span> <span class="right">Jhon Doe</span></li>
											<li><span class="left">Father's Name </span><span class="middle">:</span> <span class="right">Robert Doe</span></li>
											<li><span class="left">Mother's Name</span><span class="middle">:</span> <span class="right">Ismatic Roderos Doe</span></li>
											<li><span class="left">Date of Birth</span><span class="middle">:</span> <span class="right">26/01/1982</span></li>
											<li><span class="left">Birth Place</span><span class="middle">:</span> <span class="right">United State of America</span></li>
											<li><span class="left">Nationality</span><span class="middle">:</span> <span class="right">Canadian</span></li>
											<li><span class="left">Sex</span><span class="middle">:</span> <span class="right">Male</span> </li>
											<li><span class="left">Address</span><span class="middle">:</span> <span class="right">121 King Street, Melbourne Victoria, 1200 USA</span></li>
										</ul>							    	
								    </div>
								</li><!-- /.personal-deatils -->
								<li class="personal-deatils media">
								    <div class="icon">
								    	<i class="fa fa-hand-peace-o" aria-hidden="true"></i>
								    </div>
								    <div class="media-body">
								    	<span class="tr-title">Declaration</span>
								    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> <br>
								    	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni। dolores eos qui ratione voluptatem sequi nesciunt. </p>
								    </div>
								</li><!-- /.personal-deatils -->							
							</ul>
							<div class="buttons pull-right">
								<a href="#" class="btn button-cancle">Cancle</a>
								<a href="#" class="btn btn-primary">Update Your Resume</a>
							</div>								
						</div><!-- /.tab-pane -->

						<div role="tabpanel" class="tab-pane edit-resume section" id="edit-resume">
								<h5>POST Your Resume Here's :  </h5>
								<a href="#" onclick="UploadResume();" class="btn btn-primary pull-right">Upload Resume</a>
								<div class="buttons">
									<br/><br/>	<br/>
									<table class="table" id="tbl_resume">
											<thead class="thead-dark">
											  <tr class="tr_resume">
												<th scope="col">Name</th>
												<th scope="col">Size</th>
												<th scope="col">Type</th>
												<th>Action</th>
											  </tr>
											</thead>
											<tbody> 
										
											@if($user_cv)
												<tr id="tr_userCv{{$user_cv->id}}">
													<td>{{$user_cv->file_name}}</td>
													<td>{{$user_cv->file_size}}</td>
													<td>{{$user_cv->attachment_type}}</td>
													<th>
														<a onclick="EditUserCv({{$user_cv->id}});" class="btn btn-primary">Edit</a>
														<a onclick="DeleteUserCv({{$user_cv->id}});"  class="btn btn-danger">Delete</a>
													</th>
												</tr>
											@else

											@endif
											</tbody>
										  </table>	  
								</div>
								<hr/>
								<br/>
							<ul class="tr-list resume-info">
								<li class="career-objective">
									<div class="icon">
								        <i class="fa fa-black-tie" aria-hidden="true"></i>
								    </div>  
								    <div class="media-body">
								    	<span class="tr-title">Career Objective</span>
										<div class="code-edit">
									        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> <br>
									        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni।</p>		
										</div>
								    </div>
								</li><!-- /.career-objective -->
								<li class="work-history">
								    <div class="icon">
								    	<i class="fa fa-briefcase" aria-hidden="true"></i>
								    </div>
								    <div class="media-body additem-work">
								    	<span class="tr-title">Work History</span>
								    	<div id="addhistory" class="additem">
								    		<span id="clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
								    		<span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
									    	<div class="code-edit-small">
									    		<label>Job Title</label>
									    		 <input type="text" class="form-control" value="2015-01-15"/>
									    		<label>Compnay Name</label>
									    		<input type="text" class="form-control" value="2015-01-15"/>
												<div class="row">
													<div class="col-sm-6 col-md-4">
														<label>From</label>
					                                    <div class="calendar">
					                                         <input type="date" class="form-control" value="2015-01-15"/>
					                                    </div><!-- calendar -->
													</div>
													<div class="col-sm-6 col-md-4">
														<label>To</label>
														<div class="calendar">
					                                        <input type="date" class="form-control" value="2016-01-13">
					                                    </div><!-- calendar -->
													</div>
													<div class="col-md-4">
														<div class="checkbox">
															<label for="logged-1"><input type="checkbox" name="logged-1" id="logged-1">I currently work here</label>
														</div>
													</div>
												</div>
									    	</div>
								    	</div>						    	
								    </div>
								</li><!-- /.work-history -->
								<li class="education-background">
								    <div class="icon">
								    	<i class="fa fa-briefcase" aria-hidden="true"></i>
								    </div>
								    <div class="media-body additem-edu">
								    	<span class="tr-title">Education Background</span>
								    	<div id="add-edu" class="additem">
								    		<span id="edu-clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
								    		<span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
								    		
								    		<div class="code-edit-small">
								    			<label>Degree</label>
								    			<input type="text" class="form-control" value="2015-01-15"/>
								    			<label>Institute Name</label>
								    			<input type="date" class="form-control" value="2016-01-13">
												<div class="row">
													<div class="col-sm-6 col-md-4">
														<label>From Year</label>
														<div class="calendar">
					                                        <input type="date" class="form-control" value="2012-01-01">
					                                    </div><!-- calendar -->
													</div>
													<div class="col-sm-6 col-md-4">
														<label>To Year (or expected)</label>
														<div class="calendar">
					                                        <input type="date" class="form-control" value="2017-01-13">
					                                    </div><!-- calendar -->
													</div>
													<div class="col-sm-6 col-md-4">
														<label>Result (GPA)</label>
														<div class="code-edit"><span>4.00/5.00</span></div>
													</div>
												</div>
								    		</div>
											<div class="code-edit">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
											</div>		
								    	</div><!-- /.additem -->
								    </div>
								</li><!-- /.education-background -->	
								<li class="qualification">
								    <div class="icon">
								    	<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
								    </div>
								    <div class="media-body">
								    	<span class="tr-title">Special Qualification:</span>
								    	<div class="code-edit">
									    	<ol>
												<li>5 years+ experience designing and building products In the Design &amp; IT industry.</li>
												<li>Passion for people-centered design, solid intuition.</li>
												<li>Skilled at any Kind Design Tools. </li>
												<li>Hard Worker &amp; Quick Lerner.</li>
									    	</ol>								    		
								    	</div>
								    </div>
								</li><!-- /.qualification -->	
								<li class="language-proficiency code-edit-small">
								    <div class="icon">
								    	<i class="fa fa-language" aria-hidden="true"></i>
								    </div>
								    <div class="media-body">
								    	<span class="tr-title">Language Proficiency:</span>
									
										<input type="text" class="form-control" value="username"/>    		    	
								    </div>
								</li><!-- /.language-proficiency -->
								
								<li class="personal-deatils">
								    <div class="icon">
								    	<i class="fa fa-hand-peace-o" aria-hidden="true"></i>
								    </div>
								    <div class="media-body">
								    	<span class="tr-title">Declaration</span>
								    	<div class="code-edit">
								    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> <br>
								    		<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni। dolores eos qui ratione voluptatem sequi nesciunt. </p>
								    	</div>
								    </div>
								</li><!-- /.personal-deatils -->				
							</ul>
							<div class="buttons pull-right">
								<a href="#" class="btn button-cancle">Cancle</a>
								<a href="#" class="btn btn-primary">Update Your Resume</a>
							</div>								
						</div><!-- /.tab-pane -->

						<div role="tabpanel" class="tab-pane bookmark" id="bookmark">
							<div class="row">
								<div class="col-md-4 remove-item">
									<div class="job-item">
										<span class="remove-icon"><i class="fa fa-times" aria-hidden="true"></i></span>
										<div class="item-overlay">
											<div class="job-info">
												<a href="#" class="btn btn-primary">Full Time</a>
												<span class="tr-title">
													<a href="job-details.html">Project Manager</a>
													<span><a href="#">Dig File</a></span>
												</span>
												<ul class="tr-list job-meta">
													<li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
													<li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
													<li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
												</ul>
												<ul class="job-social tr-list">
													<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
													<li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
												</ul>
											</div>										
										</div>
										<div class="job-info">
											<div class="company-logo">
												<img src="images/job/1.png" alt="images" class="img-fluid">
											</div>
											<span class="tr-title">
												<a href="#">Project Manager</a>
												<span><a href="#">Dig File</a></span>
											</span>
											<ul class="tr-list job-meta">
												<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
												<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
												<li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
											</ul>
											<div class="time">
												<a href="#"><span>Full Time</span></a>
												<span class="pull-right">Posted 23 hours ago</span>
											</div>							
										</div>
									</div>
								</div>
								<div class="col-md-4 remove-item">
									<div class="job-item">
										<span class="remove-icon"><i class="fa fa-times" aria-hidden="true"></i></span>
										<div class="item-overlay">
											<div class="job-info">
												<a href="job-details.html" class="btn btn-primary">Part Time</a>
												<span class="tr-title">
													<a href="job-details.html">Design Associate</a>
													<span><a href="#">Loop</a></span>
												</span>
												<ul class="tr-list job-meta">
													<li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
													<li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
													<li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
												</ul>
												<ul class="job-social tr-list">
													<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
													<li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
												</ul>
											</div>										
										</div>								
										<div class="job-info">
											<div class="company-logo">
												<img src="images/job/1.png" alt="images" class="img-fluid">
											</div>
											<span class="tr-title">
												<a href="#">Design Associate</a>
												<span><a href="#">Loop</a></span>
											</span>
											<ul class="tr-list job-meta">
												<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
												<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
												<li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
											</ul>
											<div class="time">
												<a href="#"><span class="part-time">Part Time</span></a>
												<span class="pull-right">Posted 1 day ago</span>
											</div>			
										</div>
									</div>
								</div>
								<div class="col-md-4 remove-item">
									<div class="job-item">
										<span class="remove-icon"><i class="fa fa-times" aria-hidden="true"></i></span>
										<div class="item-overlay">
											<div class="job-info">
												<a href="#" class="btn btn-primary">Freelance</a>
												<span class="tr-title">
													<a href="job-details.html">Graphic Designer</a>
													<span><a href="#">Humanity Creative</a></span>
												</span>
												<ul class="tr-list job-meta">
													<li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
													<li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
													<li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
												</ul>
												<ul class="job-social tr-list">
													<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
													<li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
												</ul>
											</div>										
										</div>								
										<div class="job-info">
											<div class="company-logo">
												<img src="images/job/1.png" alt="images" class="img-fluid">
											</div>
											<span class="tr-title">
												<a href="#">Graphic Designer</a>
												<span><a href="#">Humanity Creative</a></span>
											</span>
											<ul class="tr-list job-meta">
												<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
												<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
												<li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
											</ul>
											<div class="time">
												<a href="#"><span class="freelance">Freelance</span></a>
												<span class="pull-right">Posted 10 day ago</span>
											</div>			
										</div>
									</div>
								</div>
								<div class="col-md-4 remove-item">
									<div class="job-item">
										<span class="remove-icon"><i class="fa fa-times" aria-hidden="true"></i></span>
										<div class="item-overlay">
											<div class="job-info">
												<a href="#" class="btn btn-primary">Full Time</a>
												<span class="tr-title">
													<a href="job-details.html">Design Consultant</a>
													<span><a href="#">Families</a></span>
												</span>
												<ul class="tr-list job-meta">
													<li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
													<li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
													<li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
												</ul>
												<ul class="job-social tr-list">
													<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
													<li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
												</ul>
											</div>										
										</div>								
										<div class="job-info">
											<div class="company-logo">
												<img src="images/job/1.png" alt="images" class="img-fluid">
											</div>
											<span class="tr-title">
												<a href="#">Design Consultant</a>
												<span><a href="#">Families</a></span>
											</span>
											<ul class="tr-list job-meta">
												<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
												<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
												<li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
											</ul>
											<div class="time">
												<a href="#"><span>Full Time</span></a>
												<span class="pull-right">Posted Oct 09, 2017</span>
											</div>				
										</div>
									</div>
								</div>
								<div class="col-md-4 remove-item">
									<div class="job-item">
										<span class="remove-icon"><i class="fa fa-times" aria-hidden="true"></i></span>
										<div class="item-overlay">
											<div class="job-info">
												<a href="#" class="btn btn-primary">Part Time</a>
												<span class="tr-title">
													<a href="job-details.html">Project Manager</a>
													<span><a href="#">Sky Creative</a></span>
												</span>
												<ul class="tr-list job-meta">
													<li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
													<li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
													<li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
												</ul>
												<ul class="job-social tr-list">
													<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
													<li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
												</ul>
											</div>										
										</div>								
										<div class="job-info">
											<div class="company-logo">
												<img src="images/job/1.png" alt="images" class="img-fluid">
											</div>
											<span class="tr-title">
												<a href="#">Project Manager</a>
												<span><a href="#">Sky Creative</a></span>
											</span>
											<ul class="tr-list job-meta">
												<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
												<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
												<li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
											</ul>	
											<div class="time">
												<a href="#"><span class="part-time">Part Time</span></a>
												<span class="pull-right">Posted 1 day ago</span>
											</div>			
										</div>
									</div>
								</div>
								<div class="col-md-4 remove-item">
									<div class="job-item">
										<span class="remove-icon"><i class="fa fa-times" aria-hidden="true"></i></span>
										<div class="item-overlay">
											<div class="job-info">
												<a href="#" class="btn btn-primary">Freelance</a>
												<span class="tr-title">
													<a href="job-details.html">Design Associate</a>
													<span><a href="#">Pencil</a></span>
												</span>
												<ul class="tr-list job-meta">
													<li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
													<li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
													<li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
												</ul>
												<ul class="job-social tr-list">
													<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
													<li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
												</ul>
											</div>										
										</div>								
										<div class="job-info">
											<div class="company-logo">
												<img src="images/job/1.png" alt="images" class="img-fluid">
											</div>
											<span class="tr-title">
												<a href="#">Design Associate</a>
												<span><a href="#">Pencil</a></span>
											</span>
											<ul class="tr-list job-meta">
												<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
												<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
												<li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
											</ul>
											<div class="time">
												<a href="#"><span class="freelance">Freelance</span></a>
												<span class="pull-right">Posted 23 hours ago</span>
											</div>				
										</div>
									</div>
								</div>
								<div class="col-md-4 remove-item">
									<div class="job-item">
										<span class="remove-icon"><i class="fa fa-times" aria-hidden="true"></i></span>
										<div class="item-overlay">
											<div class="job-info">
												<a href="#" class="btn btn-primary">Full Time</a>
												<span class="tr-title">
													<a href="job-details.html">Graphic Designer</a>
													<span><a href="#">Fox</a></span>
												</span>
												<ul class="tr-list job-meta">
													<li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
													<li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
													<li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
												</ul>
												<ul class="job-social tr-list">
													<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
													<li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
												</ul>
											</div>										
										</div>								
										<div class="job-info">
											<div class="company-logo">
												<img src="images/job/1.png" alt="images" class="img-fluid">
											</div>
											<span class="tr-title">
												<a href="#">Graphic Designer</a>
												<span><a href="#">Fox</a></span>
											</span>
											<ul class="tr-list job-meta">
												<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
												<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
												<li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
											</ul>
											<div class="time">
												<a href="#"><span>Full Time</span></a>
												<span class="pull-right">Posted Oct 09, 2017</span>
											</div>				
										</div>
									</div>
								</div>
								<div class="col-md-4 remove-item">
									<div class="job-item">
										<span class="remove-icon"><i class="fa fa-times" aria-hidden="true"></i></span>
										<div class="item-overlay">
											<div class="job-info">
												<a href="#"><span class="btn btn-primary">Part Time</span></a>
												<span class="tr-title">
													<a href="job-details.html">Design Consultant</a>
													<span><a href="#">Owl</a></span>
												</span>
												<ul class="tr-list job-meta">
													<li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
													<li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
													<li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
												</ul>
												<ul class="job-social tr-list">
													<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
													<li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
												</ul>
											</div>										
										</div>								
										<div class="job-info">
											<div class="company-logo">
												<img src="images/job/1.png" alt="images" class="img-fluid">
											</div>
											<span class="tr-title">
												<a href="#">Design Consultant</a>
												<span><a href="#">Owl</a></span>
											</span>
											<ul class="tr-list job-meta">
												<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
												<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
												<li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
											</ul>
											<div class="time">
												<a href="#"><span class="part-time">Part Time</span></a>
												<span class="pull-right">Posted 10 day ago</span>
											</div>			
										</div>
									</div>
								</div>
							</div><!-- /.row -->							
						</div><!-- /.tab-pane -->

						<div role="tabpanel" class="tab-pane section close-account" id="archived">
							<h1>Change Your Password Account</h1>
							<span>Are you sure, you want to change your account?</span>
							<form action="#" id="frmUserChangePassword">
								<input type="hidden" id="user_password" value="{{$user->id}}">
								<input type="hidden" name="_token" value="{{ csrf_token()}}">
								
								<div class="col-lg-12">
										<div class="form-group">
												<input type="password" placeholder="new password" class="form-control" id="new_password" name="new_password"/>
										</div>
								</div>
								<div class="col-lg-12">
										<div class="form-group">
												<input type="password" placeholder="confirm password" class="form-control" id="confirm_password" name="confirm_password"/>
										</div>
								</div>
								<div class="buttons">
										<a href="#" class="btn btn-primary">Cancel</a>
										<input type="submit" class="btn btn-primary" value="Yes">
									</div>
							</form>
							
						</div>
							

						<div role="tabpanel" class="tab-pane section close-account" id="close-account">
							<h1>Delete Your Account</h1>
							<span>Are you sure, you want to delete your account?</span>
							<div class="buttons">
								<a href="#" class="btn btn-primary">Delete Account</a>
								<a href="#" class="btn button-cancle">Cancle</a>
							</div>
						</div><!-- /.tab-pane -->
					</div>
	            </div>
	        </div><!-- /.row -->
	    </div><!-- /.container -->
	</div><!-- /.tr-profile -->	

	<!-- /.tr-login-apply-job not login -->
<div id="UserUploadResume" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmUploadResume" enctype="multipart/form-data" action="#" method="POST">
                    <input type="hidden" id="user_resume_id" value="{{$user->id}}">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <div  class="modal-header theme-bg" style="background-color:#008def" >
                            <h4 class="modal-title" style="color:white;"> Upload Resume</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" class="form-control" id="file_name" name="file_name" accept="application/pdf,application/msword,
									application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input  type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                    </form>
            </div>
        </div>
	</div>




	{{-- ///Delete --}}
	<div id="ModalDeleteUserCv" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmDeleteResume" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" id="user_resume_id" value="">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Upload Resume</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">
									<span>Do you want to Delete this Resume ? </span>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
									<input type="submit" class="btn btn-primary" value="Yes">
								</div>
						</form>
				</div>
			</div>
		</div>

		{{-- //Edit  --}}
		<div id="ModalEditUserCv" class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<form id="frmEditResume" enctype="multipart/form-data" action="#">
							<input type="hidden" id="user_resume_id_edit" value="">
							<input type="hidden" name="_token" value="{{ csrf_token()}}">
							<div  class="modal-header theme-bg" style="background-color:#008def" >
									<h4 class="modal-title" style="color:white;"> Upload Resume</h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
									<div class="form-group">
											<input type="file" class="form-control" id="file_name_edit" name="file_name_edit"/>
										</div>
										<input disabled class="form-control" type="text" name="resume_edit" value="" id="resume_edit">
									</div>
									<div class="modal-footer">
										<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
										<input type="submit" class="btn btn-primary" value="Yes">
									</div>
							</form>
					</div>
				</div>
			</div>
	
	@endsection
	@section('scripts')
		<script src="{{asset('js/backend/apply_job.js')}}"></script>
		<script src="{{asset('js/backend/user_profile.js')}}"></script>
	@endsection
	
	
