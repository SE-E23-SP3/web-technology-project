<x-layouts.base title="Edit User">
	<x-slot:head>
		<link rel="stylesheet" href="{{ asset('css/user-edit.css') }}">
	</x-slot:head>
	<div class="background">
	<section class="content">
	<h1>Edit Profile</h1>
		<article class="change-username">
			<h2>Change Username</h2>
			<section class="username-section">
				<label for="username" id="username">Username:</label>
				<input type="text" value="Current Username" id="usrInput">
			</section>
			<button class="change-btn-usr" id="saveUsrBtn">Save Username</button>
		</article>
		<article class="change-password">
			<h2>Change Password</h2>
				<section class="password-inputfields">
					<label for="current-password" id="currenPassword">Current Password:</label>
					<input type="text" id="cPwdInput">

					<label for="new-password" id="newPassword">New Password:</label>
					<input type="text" id="nPwdInput">

					<label for="repeat-password" id="repeatPassword">Repeat Password:</label>
					<input type="text" id="rPwdInput">
				</section>
				<button class="change-btn-pwd" id="savePwBtn">Save Password</button>
		</article>
		<button class="log-out-btn" id="logOutBtn">Log out</button>
		<button class="delete-btn" id="deleteBtn">Delete Account</button>
	</section>
	</div>
</x-layouts.base>