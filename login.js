function clientValid(){
    var username = document.forms["loginform"]["username"];
    var password = document.forms["loginform"]["password"];

    var reg_username = /^([A-Za-z0-9\._-])+([A-Za-z0-9])?@([A-Za-z0-9])+[\.]([A-Za-z]){2,4}$/;
    
    if(!(reg_username.test(username.value)))
    {
        alert("Username field can't be empty, and it must be a valid username/email");
        username.focus();
        return false;
    }
    if(password.value.length < 8 || password.value === "")
    {
        alert("Password field can't be empty, and it must be at least 8 characters long");
        password.focus();
        return false;
    }
    var dig = 0, cap = 0, sp=0;
    for(let i = 0; i<password.value.length; i++)
    {
        if(password.value.charCodeAt(i) >= 48 && password.value.charCodeAt(i) <= 57)
            dig = 1;
        else if(password.value.charCodeAt(i) >= 65 && password.value.charCodeAt(i) <= 90)
            cap = 1;
        else if(!(password.value.charCodeAt(i) >= 90 && password.value.charCodeAt(i) <= 122))
            sp = 1;
        if(sp && cap && dig)
            break;
    }
    if(dig == 0 || cap == 0 || sp == 0)
    {
        alert("Password field must contain at least one special character, one capital letter and one digit");
        password.focus();
        return false;
    }
    return true;
}