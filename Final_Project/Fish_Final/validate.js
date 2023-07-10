function validateUsername(field) {
  if (field == "") {
    return "";
  }
}

function validateEmail(field) {
  if (field == "") {
    return "";
  }
}

function validatePassword(field) {
  if (field == "") {
    return "";
  }
}

function validateBirthday(field) {
  if (field == "") {
    return "";
  }
}

function validateFirstname(field) {
  if (field == "") {
    return "";
  }
}

function validateLastname(field) {
  if (field == "") {
    return "";
  }
}

function compare(email, username) {
  if (email == username && username != "") {
    return "true";
  } else {
    return "Your Passwords do not match.\n";
  }
}
