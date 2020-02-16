(function ($) {
 "use strict";
 
	/*----------------------
		Dialogs
	 -----------------------*/

	//Basic
	$('#sa-basic').on('click', function(){
		swal("Here's a message!");
	});

	//A title with a text under
	$('#sa-title').on('click', function(){
		swal("Here's a message!", "Lorem ipsum dolor cry sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, Spensaduran pellentesque maximus eniman. Mauriseleifend ex semper, lobortis purus.")
	});

	//Success Message
	$('#sa-success').on('click', function GetInfo(button){
		var ID = document.getElementById("ID").value;
		var Fname = $('#Fname').value;
		var Mname = $('#Mname').value;
		var Lname = $('#Lname').value;
		var Email = $('#Email').value;
		var Numb = $('#Numb').value;
		var Address = $('#Address').value;

		alert(ID);
		swal("Good job!", "Lorem ipsum dolor cry sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, Spensaduran pellentesque maximus eniman. Mauriseleifend ex semper, lobortis purus.", "success")
	});

	//Warning Message
	$('#sa-warning').on('click', function(){
		swal({   
			title: "Are you sure?",   
			text: "You will not be able to recover this data!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonText: "Yes, delete it!",
		}).then(function(){
			swal("Deleted!", "Your data has been deleted.", "success"); 
		});
	});
	
	//Parameter
	$('#sa-params').on('click', function(){
		swal({   
			title: "Are you sure?",   
			text: "You will not be able to recover this data!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel plx!",   
		}).then(function(isConfirm){
			if (isConfirm) {     
				swal("Deleted!", "Your imaginary file has been deleted.", "success");   
			} else {     
				swal("Cancelled", "Your imaginary file is safe :)", "error");   
			} 
		});
	});

	//Custom Image
	$('#sa-image').on('click', function(){
		swal({   
			title: "Sweet!",   
			text: "Here's a custom image.",   
			imageUrl: "img/dialog/like.png" 
		});
	});

	//Auto Close Timer
	$('#sa-close').on('click', function(){
		 swal({   
			title: "Auto close alert!",   
			text: "I will close in 2 seconds.",   
			timer: 2000
		});
	});

})(jQuery); 

$('#warningForVet').on('click', function getVetId(button){
     
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonText: "Yes, delete it!",
    }).then(function (isConfirm){
        var vetId= document.getElementById("warning").value;
        var delay = 3000;
        $.ajax({
                type: 'POST',
                url:'deleteVet.php',
                data:{'vetId':vetId},
                success: function(data){
                    if(isConfirm){
                        swal("Deleted!", "Your data has been deleted.", "success");
                        setTimeout(function(){window.location = "veterinarian.php"}, delay);
                    }else{
                        swal("ERROR!", "Failed to dalete data.", "FAILED"); 
                    }

                } 
            }); 
          
                                 
        });
    });

$('#warningForSow').on('click', function getVetId(button){
     
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonText: "Yes, delete it!",
    }).then(function (isConfirm){
        var vetId= document.getElementById("warning").value;
        var delay = 3000;
        $.ajax({
                type: 'POST',
                url:'deleteVet.php',
                data:{'vetId':vetId},
                success: function(data){
                    if(isConfirm){
                        swal("Deleted!", "Your data has been deleted.", "success");
                        setTimeout(function(){window.location = "veterinarian.php"}, delay);
                    }else{
                        swal("ERROR!", "Failed to dalete data.", "FAILED"); 
                    }

                } 
            }); 
          
                                 
        });
    });
$('#success').on('click', function GetInfo(button){
    
    var first_Name = $('#first_Name').val();
    var middle_Name = $('#middle_Name').val();
    var last_Name = $('#last_Name').val();
    var email_address = $('#email_address').val();
    var contact_Number = $('#contact_Number').val();
    var Address = $('#Address').val();

    if (first_Name == '' || middle_Name == '' || last_Name == '' || email_address=='' ||contact_Number==''|| Address==''){
        swal({   
			title: "Missing Field",   
			text: "Please fill all up the missing field!",   
			type: "warning",     
			confirmButtonText: "Okay",
		})
        return false;
    }else{
            var delay = 1000;
            $.ajax({
            type: 'POST',
            url:'insertVet.php',
            data:{'first_Name':first_Name,'middle_Name':middle_Name,'last_Name':last_Name,'email_address':email_address,'contact_Number':contact_Number,'Address':Address},
            success: function(data){
                
                    swal("Successfully Recorded!","The data you inputed has been successfully recorded!", "success")
                    setTimeout(function(){window.location = "veterinarian.php"}, delay);

            } 
        }); 
        }
    })

 $('#proceed').on('click', function GetInfo(button){

            var first_Name = $('#first_Name').val();
            var middle_Name = $('#middle_Name').val();
            var last_Name = $('#last_Name').val();
            var email_address = $('#email_address').val();
            var contact_Number = $('#contact_Number').val();
            var Address = $('#Address').val();
            var employee_Type = $('#employee_Type').val();

            

            if ( first_Name == '' || middle_Name == '' || last_Name == '' || email_address=='' ||contact_Number==''|| Address=='' || employee_Type =="Employee Type"){
                swal({   
                    title: "Missing Field",   
                    text: "Please fill all up the missing field!",   
                    type: "warning",     
                    confirmButtonText: "Okay",
                })
                return false;
                }else{
                        var delay = 1000;
                        $.ajax({
                        type: 'POST',
                        url:'insertEmp.php',
                        data:{'first_Name':first_Name,'middle_Name':middle_Name,'last_Name':last_Name,'email_address':email_address,'contact_Number':contact_Number,'Address':Address,'employee_Type':employee_Type},
                        success: function(data){
                            
                                swal("Successfully Recorded!","The data you inputed has been successfully recorded!", "success")
                                setTimeout(function(){window.location = "Employee.php"}, delay);

                        } 
                    }); 
                    }
                })

