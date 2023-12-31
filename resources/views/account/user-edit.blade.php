<x-layouts.login-base title="Account">
	<x-slot:head>
		<link rel="stylesheet" href="{{ asset('css/user-edit.css') }}">
        <script defer src="{{ asset('js/account.js') }}" type="text/javascript"></script>
	</x-slot:head>
	<div class="background">
		<section class="content">
			<h1 class="page-titel">Edit Profile</h1>
			<article class="change-username change-articles">
				<h2 class="section-headers">Change Username</h2>
				<section class="username-section">
					<div class="formElement">
						<div class="">Username<strong class="error-message"></strong></div>
						<input class="inputField" value="{{Auth::user()->username}}" id="usernameField" type="text" name="username" autocomplete="name" title="Choose a new username"  autofocus required/>
					</div>
				</section>
				<button class="change-btn-usr change-btns" id="saveUsernameButton">Save Username</button>
			</article>
			<article class="change-email change-articles">
				<h2 class="section-headers">Change Email</h2>
				<section class="email-section horizontal-container">
					<div class="formElement horizontal-element">
						<div class="">E-mail<strong class="error-message"></strong></div>
						<input class="inputField" value="{{Auth::user()->email}}" id="emailField" type="email" name="email" autocomplete="email" title="Choose a new email"  autofocus required />
					</div>
					<div class="formElement horizontal-element">
						<div class="">Password<strong class="error-message"></strong></div>
						<input class="inputField" id="emailPasswordField" type="password" name="password" autocomplete="new-password" required />
					</div>
					<button class="change-btn-email change-btns" id="saveEmailButton">Save E-mail</button>
				</section>
			</article>
			<article class="change-password change-articles">
				<h2 class="section-headers">Change Password</h2>
				<section class="password-inputfields">
					<div class="formElement">
						<div class="">Current password<strong class="error-message"></strong></div>
						<input class="inputField" id="oldPasswordField" type="password" name="password" autocomplete="new-password" required />
					</div>
					<div class="formElement">
						<div class="">New password<strong class="error-message"></strong></div>
						<input class="inputField" id="newPasswordField" type="password" name="password" autocomplete="new-password" required />
					</div>
					<div class="formElement">
						<div class="">Repeat new password<strong class="error-message"></strong></div>
						<input class="inputField" id="newPasswordRepeatField" type="password" name="passwordRepeat" autocomplete="new-password" required />
					</div>
				</section>
				<button class="change-btn-pwd change-btns" id="savePasswordButton">Save Password</button>
			</article>
			<button class="log-out-btn" id="logoutButton">Log out</button>
			<button class="delete-btn" id="deleteButton">Delete Account</button>
		</section>
	</div>
</x-layouts.login-base>
