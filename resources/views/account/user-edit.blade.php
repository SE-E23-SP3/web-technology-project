<x-layouts.login-base title="Edit User">
	<x-slot:head>
		<link rel="stylesheet" href="{{ asset('css/user-edit.css') }}">
	</x-slot:head>
	
	<section class="content">
		<h1>Edit Profile</h1>
		<article class="change-username">
			<h2>Change Username</h2>
			<section class="username-section">
				<label for="username" id="username">Username:</label>
				<input type="text" value="Current Username">
			</section>
			<button class="change-btns" id="saveUsrBtn">Save Username</button>
		</article>
		<article class="change-password">
			<h2>Change Password</h2>
				<section class="password-inputfields">
					<label for="current-password" id="currenPassword">Current Password</label>
					<input type="text" placeholder="password">

					<label for="new-password" id="newPassword">New Password</label>
					<input type="text">

					<label for="repeat-password" id="repeatPassword">Repeat Password</label>
					<input type="text">
				</section>
				<button class="change-btns" id="savePwBtn">Save password</button>
		</article>
		<button class="delete-btn" id="deleteBtn">Delete user</button>
	</section>
</x-layouts.login-base>