
function CheckBrowser() {
	if ('localStorage' in window && window['localStorage'] !== null) {
		// we can use localStorage object to store data
		return true;
	} else {
			return false;
	}
}

function SaveItem() {
			
	var name = $('#Name').val();
	var data  = $('#Numb').val();
	var mail = $('#mail').val();

	//var name = document.forms.ItemList.name.value;
	//var data = document.forms.ItemList.data.value;
	//localStorage.setItem('name',name);
	//localStorage.setItem('data',data );
	//localStorage.setItem('mail',mail );
	localStorage.setItem(name, data +" </br><b>Email:</b> "+mail);
	//localStorage.setItem('dd', mail);
	//localStorage.setItem(data,mail);
	doShowAll();
	document.getElementById("Name").value="";
	document.getElementById("Numb").value="";
	document.getElementById("mail").value="";
}

function Delete() {
	var name = document.forms.ItemList.name.value;
	document.forms.ItemList.data.value = localStorage.removeItem(name);
	document.getElementById("Name").value="";
	document.getElementById("Numb").value="";
	document.getElementById("mail").value="";
	doShowAll();
}



function ClearAll() {
	localStorage.clear();
	doShowAll();
}

// dynamically draw the table

function doShowAll() {
	if (CheckBrowser()) {
		var key = "";
		var list = "";
		var i = 0;
		for (i = 0; i <= localStorage.length - 1; i++) {
			key = localStorage.key(i);
			list += "<p1><b>Name: "+key+"</p2></b></br><p2><b>Number:</b> "+localStorage.getItem(key)+"</br></br>";
		}
		document.getElementById('list').innerHTML = list;
	} else {
		alert('Cannot store list of equipment as your browser do not support local storage');
	}
}

