<!-- register -->
{!! Form::open(array('method' => 'post','url'=>'addUser') ) !!}

<div class="sign-up-form">
	<h3>Register Here</h3>
	<p>Having hands on experience in creating innovative designs,I do offer design 
		solutions which harness</p>
		<div class="sign-up">
			<h5>Personal Information</h5>
			<div class="sign-u">
				<div class="sign-up1">
					<h4 class="a">First Name* :</h4>
				</div>
				<div class="sign-up2">
					<input type="text" placeholder=" " required=" " name="fname" />
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="sign-u">
				<div class="sign-up1">
					<h4 class="b">Last Name* :</h4>
				</div>
				<div class="sign-up2">
					<input type="text" placeholder=" " required=" " name="lname"/>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="sign-u">
				<div class="sign-up1">
					<h4 class="b">User Name* :</h4>
				</div>
				<div class="sign-up2">
					<input type="text" placeholder=" " required=" " name="username"/>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="sign-u">
				<div class="sign-up1">
					<h4 class="c">Email Address* :</h4>
				</div>
				<div class="sign-up2">
					<input type="text" placeholder=" " required=" " name="email"/>
				</div>
				<div class="clearfix"> </div>
			</div>
			<h6>Login Information</h6>
			<div class="sign-u">
				<div class="sign-up1">
					<h4 class="d">Password* :</h4>
				</div>
				<div class="sign-up2">
					<input type="password" placeholder=" " required=" " name="password"/>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="sign-u">
				<div class="sign-up1">
					<h4>Confirm Password* :</h4>
				</div>
				<div class="sign-up2">
					<input type="password" placeholder=" " required=" "/>

				</div>
				<div class="clearfix"> </div>
			</div>
			<input type="submit" value="Register">
		</div>
	</div>
	<!-- //register -->

	{!! Form::close() !!}
