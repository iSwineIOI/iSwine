$(function(){
            var personsArray = [];
            var selectedID = 0;

            //event Handlers
            $("#btn_add").on("click", function(){
                var person = new Object();
                person.name = $("#tf_name").val();
                person.description = $("#tf_description").val();
                person.mobile = "+63"+$("#tf_mobile").val();
                person.email = $("#tf_email ").val();
                personsArray.push(person);

                localStorage.personsArray = JSON.stringify(personsArray);
            });

            $("#btn_update").on("click", function(){
                personsArray[selectedID].name = $("#tf_name_edit").val();
                personsArray[selectedID].description = $("#tf_description_edit").val();

                localStorage.personsArray = JSON.stringify(personsArray);
            });

            $("#btn_DelContact").on("click", function(){
                personsArray.splice(selectedID,1);
                localStorage.personsArray = JSON.stringify(personsArray);
            });

            $("#page_home").on("pagebeforeshow", function(){
                $("#list_contacts").html("");

                if(localStorage.personsArray != undefined){
                personsArray = JSON.parse(localStorage.personsArray);
                }

                for (var i =0; i<personsArray.length; i++){
                $("#list_contacts").append("<li id='"+ i +"'>"+
                    "<a href='details.php' rel='external'>"+
                    "<img src='images/images-1.png' style='width: 80px'>"+
                    "<h2>" + personsArray[i].name + "</h2>"+
                    "<p>" + personsArray[i].description + "</p>" +
                    "</a>"+
                    "</li>"
                    );
            }

            $("#list_contacts li").on("click", function(){
                selectedID = this.id;
            });

            $("#list_contacts").listview("refresh");
            });

            $("#page_contactDetails").on("pagebeforeshow", function(){
                $(this).find(".header h1").html(personsArray[selectedID].name);
                $(this).find(".ui-content h2").html(personsArray[selectedID].mobile);
                $(this).find(".ui-content h3").html(personsArray[selectedID].email);
            });

             $("#page_editContact").on("pagebeforeshow", function(){
                $(this).find("#tf_name_edit").val(personsArray[selectedID].name);
                $(this).find("#tf_description_edit").val(personsArray[selectedID].description);
                $(this).find("#tf_mobile_edit").val(personsArray[selectedID].mobile);
                $(this).find("#tf_email_edit").val(personsArray[selectedID].email);
            });
        });