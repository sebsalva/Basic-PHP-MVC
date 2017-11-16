<html>
<head><title>Personne - formulaire</title>

<script type="text/javascript">
function clearForm(oForm) {
    
  var elements = oForm.elements; 
    
  oForm.reset();

  for(i=0; i<elements.length; i++) {
      
	field_type = elements[i].type.toLowerCase();
	
	switch(field_type) {
	
		case "text": 
		case "password": 
		case "textarea":
	        case "hidden":	
			
			elements[i].value = ""; 
			break;
        
		case "radio":
		case "checkbox":
  			if (elements[i].checked) {
   				elements[i].checked = false; 
			}
			break;

		case "select-one":
		case "select-multi":
            		elements[i].selectedIndex = -1;
			break;

		default: 
			break;
	}
    }
}

</script>
</head>

<body>
<?php


// on v�rifie les donn�es provenant du mod�le
if (isset($dVue))
{?>
<div align="center">


<?php
if (isset($dVueEreur) && count($dVueEreur)>0) {
echo "<h2>ERREUR !!!!!</h2>";
foreach ($dVueEreur as $value){
    echo $value;
}}
?>

<h2>Personne - formulaire</h2>
<hr>
<!-- affichage de donn�es provenant du mod�le --> 
<?= $dVue['data']  ?>


<form method="post" name="myform" id"myform">
<table> <tr>
<td>Nom</td>
<td><input name="txtNom" value="<?= $dVue['nom']  ?>" type="text" size="20"></td>
 </tr>
<tr><td>Age</td>
<td><input name="txtAge" value="<?= $dVue['age'] ?>" type="text" size="3" required></td>
</tr>
<tr>
</table>
<table> <tr>
<td><input type="submit" value="Envoyer"></td>
<td><input type="reset" value="Rétablir"></td>
<td><input type="button" value="Effacer" onclick="clearForm(this.form);">
</td> </tr> </table>

<!-- action !!!!!!!!!! --> 
<input type="hidden" name="action" value="validationFormulaire">
</form></div>

<?php }
else {
print ("erreur !!<br>");
print ("utilisation anormale de la vuephp");
} ?>
<p>Essayez de mettre du code html dans nom -> Correspond à une attaque de type injection</p>
</body> </html> 