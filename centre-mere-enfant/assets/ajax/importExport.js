function to_csv_route(){
    var xmlhttp = new XMLHttpRequest();
	document.getElementById("button_csv").innerHTML=('<button type="button" class="btn btn-success" onclick="download_csv_route()">Download</button>');
	var separateur = document.getElementById("separateur").value;
	xmlhttp.open("GET", "get_csv_route/?separateur=" + separateur, true);
    xmlhttp.send();
}

function download_csv_route(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "download_csv_route", true);
    xmlhttp.send();
}


// function to_csv_route(base_url){
//     var separateur = document.getElementById("separateur").value;
// 	$.ajax({
// 	    url: base_url,
// 	    type:'get',
// 	    data:{separateur:separateur},
// 	    success: function(response){
// 	     document.getElementById("button_csv").innerHTML=('<button type="button" class="btn btn-danger" onclick="download_csv_route()">Download</button>');
// 	    }
// 	});
// }

// function download_csv_route(base_url){
//     $.ajax({
// 	    url: base_url,
// 	    type:'get',
// 	    success: function(response){
// 	     document.getElementById("button_csv").innerHTML=('Download success full');
// 	    }
// 	});
// }






