

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

function get_historique() {
	$('#modal').modal('show');
	// $("#id_enfant").val(id_enfant);
	// $("#id_mere").val(id_mere);
	// $("#id_etat").val(id_etat);
	// $("#nb_statu_miseAjour").val(nb_statu_miseAjour);
	// $("#observation").val(observation);
	// $("#date_debut").val(date_debut);
	// $("#date_fin").val(date_fin);
}

function valider_historique(base_url) {
	
	var id_enfant = document.getElementById("id_enfant").value;
	var id_mere = document.getElementById("id_mere").value;
	var nb_statu_miseAjour = document.getElementById("nb_statu_miseAjour").value;
	var observation = document.getElementById("observation").value;
	var date_debut = document.getElementById("date_debut").value;
	var date_fin = document.getElementById("date_fin").value;

	var historique = {
		'id_enfant' : id_enfant,
		'id_mere' : id_mere,
		'nb_statu_miseAjour' : nb_statu_miseAjour,
		'observation' : observation,
		'date_debut' : date_debut,
		'date_fin' : date_fin
	};
	console.log(historique);
	action_modal(base_url);
}

function action_modal(base_url, historique){  
  $.ajax({
    url: base_url,
    type:'post',
    data:{
    	id_enfant : $('#id_enfant').val(),
		id_mere : $('#id_mere').val(),
		nb_statu_miseAjour : $('#nb_statu_miseAjour').val(),
		observation : $('#observation').val(),
		date_debut : $('#date_debut').val(),
		date_fin : $('#date_fin').val()
    },
    success: function(response){
    	location.reload();
      	// var retour = JSON.parse(response);
      	// console.log(retour);
      	// if (retour.status == 200) {
      	// 	$('#modal').modal().hide();
      	// 	alert(retour.action);
      	// 	location.reload();
      	// } else {
      	// 	document.getElementById("action").innerHTML=retour.action;
      	// 	if (retour.ds1_note !== undefined) {
      	// 		document.getElementById("ds1_note_erreur").innerHTML=retour.ds1_note;
      	// 	}
      	// 	if (retour.ds1_note !== undefined) {
      	// 		document.getElementById("ds2_note_erreur").innerHTML=retour.ds2_note;
      	// 	}
      	// 	if (retour.ds1_note !== undefined) {
      	// 		document.getElementById("examen_note_erreur").innerHTML=retour.examen_note;
      	// 	}
      	// }
    }
    
  });
}


