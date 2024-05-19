function validateForm() {
    var userName = document.getElementById("user_name").value.trim();
    var lastName = document.getElementById("lastname").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var address = document.getElementById("address").value.trim();
    var gender = document.getElementById("gender").value.trim();
    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value.trim();

    var error = "";

    if (userName === "") {
        error += "User Name is empty.\n";
    }

    if (lastName === "") {
        error += "Last Name is empty.\n";
    }

    if (phone === "") {
        error += "Phone Number is empty.\n";
    }

    if (address === "") {
        error += "Address is empty.\n";
    }

    if (gender === "") {
        error += "Please select a Gender.\n";
    }

    if (email === "") {
        error += "Email is empty.\n";
    } else if (!validateEmail(email)) {
        error += "Invalid email format.\n";
    }

    if (password === "") {
        error += "Password is empty.\n";
    }

    if (error !== "") {
        alert(error);
        return false; 
    }
    
    return true; 
}

function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
