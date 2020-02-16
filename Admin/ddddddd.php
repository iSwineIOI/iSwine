if (data == 'success'){
toastr.success("Data has been save","Successful");
setTimeout(function(){window.location = "index.php"}, delay);

}else if(data == "Name existed"){
toastr.warning("Name already exist","Failed");
var nError = document.getElementById('fullname');
nError.style.border = "1px solid red";

}else if(data == "Email existed"){
toastr.warning("Email already exist","Failed");
var eError = document.getElementById('email');
eError.style.border = "1px solid red";

}else if(data == "Number existed"){
toastr.warning("Number already exist","Failed");
var nuError = document.getElementById('number');
nuError.style.border = "1px solid red";

}else if(data == "Username existed"){
toastr.warning("Username already exist","Failed");
var uError = document.getElementById('username');
uError.style.border = "1px solid red";

}else if (data == "Owner"){
     $('#owner').modal('toggle');
}else if(data == ''){
toastr.error("Error saving data","Failed");
//alert(data);
setTimeout(function(){window.location = "registration.php"}, delay);
}