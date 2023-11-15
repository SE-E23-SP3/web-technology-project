const usernameField = new InputValidator(InputValidator.patterns.name, document.getElementById("usernameField"));
const emailField = new InputValidator(InputValidator.patterns.email, document.getElementById("emailField"));
const passwordField = new InputValidator(InputValidator.patterns.password, document.getElementById("passwordField"));
const passwordRepeatField = new InputValidator(InputValidator.patterns.password, document.getElementById("passwordRepeatField"), (self) => {
    if (self.value === passwordField.value) {
        return true
    }
    self.insertError("Must match password");
    return false;
});


const signUpForm = document.getElementById("signUp")
