

// function get_note(id_etu, num_matricule_etu, nom_etu, prenom_etu, sexe_etu, id_note, id_mat, id_trim, id_inscri, ds1_note, ds2_note, examen_note ,base_url) {
	
// 	$('#modal').modal('show');

// 	document.getElementById("num_matricule_etu").innerHTML=(num_matricule_etu);
// 	document.getElementById("nom").innerHTML=(nom_etu+" "+prenom_etu);
// 	document.getElementById("sexe_etu").innerHTML=(sexe_etu);

// 	$("#id_note").val(id_note);
// 	$("#id_mat").val(id_mat);
// 	$("#id_trim").val(id_trim);
// 	$("#id_inscri").val(id_inscri);

// 	$("#ds1_note").val(ds1_note);
// 	$("#ds2_note").val(ds2_note);
// 	$("#examen_note").val(examen_note);
// }

function show_modal_pointage(id_admin) {
	$('#modal').modal('show');
	$("#id_admin").val(id_admin);
}

function pointage(action, base_url) {
	var id_admin = document.getElementById("id_admin").value;
	$.ajax({
	    url: base_url,
	    type:'post',
	    data:{
	    	id_admin : $('#id_admin').val(),
			action : action
	    },
	    success: function(response){
	    	console.log(response);
	    	var fleche = response.substring(0,1);
	    	if (fleche=='<') {
	    		response = response.substring(1);
	    	}
	    	const retour = JSON.parse(response);
	    	console.log(retour);
	      	$('#modal').modal().hide();
	      	// var alert = '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Warning!</strong> doiufogihdiughdff </div>';
      		alert(retour.act);
      		location.reload();
	    }
	});
}

// VM697:1 Uncaught SyntaxError: Unexpected token < in JSON at position 0
//     at JSON.parse (<anonymous>)
//     at Object.success (modal_pointage_admin.js:36:25)
//     at i (jquery.min.js:2:27449)
//     at Object.fireWith [as resolveWith] (jquery.min.js:2:28213)
//     at y (jquery.min.js:4:22721)
//     at XMLHttpRequest.c (jquery.min.js:4:26925)

function getTime() {
  	var today = new Date();
  	console.log(today);
  	var h = today.getHours();
  	var m = today.getMinutes();
  	var s = today.getSeconds();
  	// add a zero in front of numbers<10
  	m = checkTime(m);
  	s = checkTime(s);
  	document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
  	t = setTimeout(function() {
    	getTime()
  	}, 500);
}

function checkTime(i) {
  	if (i < 10) {
  	  	i = "0" + i;
  	}
  	return i;
}

