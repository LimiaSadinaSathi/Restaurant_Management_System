<?php
function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
}

function validateEmail($email) {
    if (empty($email)) {
        return "Email is empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }
    return "";
}

function validateUsername($username) {
    if (empty($username)) {
        return "Username is empty";
    }
    return "";
}
function validateAmount($amount) {
    if (!is_numeric($amount) || $amount <= 0) {
        return "Invalid amount";
    }
    return "";
}


function validatePassword($password) {
    if (empty($password)) {
        return "Password is empty";
    }

    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'; 
    if (!preg_match($pattern, $password)) { 
        return "Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long.";
    }
    return "";
}

function validateForm($data) {
    $usernameError = validateUsername($data['user_name']);
    if (!empty($usernameError)) {
        return $usernameError;
    }

    $lastnameError = validateLastname($data['lastname']);
    if (!empty($lastnameError)) {
        return $lastnameError;
    }

    $phoneError = validatePhone($data['phone']);
    if (!empty($phoneError)) {
        return $phoneError;
    }

    $addressError = validateAddress($data['address']);
    if (!empty($addressError)) {
        return $addressError;
    }

    $genderError = validateGender($data['gender']);
    if (!empty($genderError)) {
        return $genderError;
    }

    $emailError = validateEmail($data['email']);
    if (!empty($emailError)) {
        return $emailError;
    }

    $passwordError = validatePassword($data['password']);
    if (!empty($passwordError)) {
        return $passwordError;
    }

    return "";
}


function validateUpdateForm($data) {
    $usernameError = validateUsername($data['user_name']);
    if (!empty($usernameError)) {
        return $usernameError;
    }

   

    $phoneError = validatePhone($data['phone']);
    if (!empty($phoneError)) {
        return $phoneError;
    }

    $addressError = validateAddress($data['address']);
    if (!empty($addressError)) {
        return $addressError;
    }

    $genderError = validateGender($data['gender']);
    if (!empty($genderError)) {
        return $genderError;
    }

    $emailError = validateEmail($data['email']);
    if (!empty($emailError)) {
        return $emailError;
    }

    

    return "";
}


function validateLastname($lastname) {
    if (empty($lastname)) {
        return "Lastname is empty";
    }
    return "";
}

function validatePhone($phone) {
    if (empty($phone)) {
        return "Phone is empty";
    }
    return "";
}

function validateAddress($address) {
    if (empty($address)) {
        return "Address is empty";
    }
    return "";
}

function validateGender($gender) {
    if (empty($gender)) {
        return "Gender is not selected";
    }
    return "";
}
?>
