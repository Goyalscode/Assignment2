function clientValidate(){
    var name = document.forms["registerform"]["name"];
    //console.log(name);
    var age = document.forms["registerform"]["age"];
    var email = document.forms["registerform"]["email"];
    var password = document.forms["registerform"]["password"];   
    var dob = document.forms["registerform"]["DOB"];   
    //console.log(name.value+" "+toString(name.value)+"\n");
    //console.log(age.value+" "+toString(age.value)+"\n");
    //console.log(email.value+" "+toString(email.value)+"\n");
    //console.log(password.value+" "+toString(password.value)+"\n");
    //console.log(dob.value+" "+toString(dob.value)+"\n");
    var reg_name = /^[A-Za-z]+([' '][a-zA-Z]+)*$/;
    var reg_age = /^[0-9]{1, 3}$/;
    var reg_email = /^([A-Za-z0-9\._-])+([A-Za-z0-9])?@([A-Za-z0-9])+[\.]([A-Za-z]){2,4}$/;
    
    if(!(reg_name.test(name.value)))
    {
        alert("Name field can't be empty, and it must contain only letters");
        name.focus();
        return false;
    }
    if(!(reg_email.test(email.value)))
    {
        alert("Email field can't be empty, and it must be a valid email");
        email.focus();
        return false;
    }
    if(age.value == "0" || age.value == "")
    {
        alert("age cannot be 0, cannot be empty");
        age.focus();
        return false;
    }
    for(let i=0; i<age.value.length; i++)
    {
        if(!(age.value.charCodeAt(i) >= 48 && age.value.charCodeAt(i) <= 57))
        {
            alert("Age field must contain only digits");
            age.focus();
            return false;
        }
    }
    if(new Date(dob.value).getTime() > (new Date()).getTime())
    {
        alert("Date Of Birth cannot be more than today's date");
        dob.focus();
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