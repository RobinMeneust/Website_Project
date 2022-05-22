function loadCategorie(categorie) {
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			const xmlDoc = this.responseXML;
			const cat = xmlDoc.getElementsByTagName("CATEGORY");
			let foundCat;
			for (let i = 0; i < cat.length; i++) {
				if(cat[i].getAttribute("cat")==categorie){
					foundCat = cat[i];
					break;
				}
			}
			//console.log(foundCat);
			const name = foundCat.getElementsByTagName("NAME");
			const id = foundCat.getElementsByTagName("ID");
			const desc = foundCat.getElementsByTagName("DESCRIPTION");
			const imgSrc = foundCat.getElementsByTagName("IMG_NAME");
			const stock = foundCat.getElementsByTagName("STOCK");
			const price = foundCat.getElementsByTagName("PRICE");
			let txt = '<tr><th>Photo</th><th>Référence</th><th>Description</th><th>Prix</th><th class="colonne">Stock</th><th>Commande</th></tr>';
			for (let i = 0; i < name.length; i++) {
				txt += '<tr> <td><img style="width:150px" src="'+imgSrc[i].childNodes[0].nodeValue+'" alt="photo"></td><td>'+id[i].childNodes[0].nodeValue+'</td><td>'+desc[i].childNodes[0].nodeValue+'</td><td>'+price[i].childNodes[0].nodeValue+'</td><td class="colonne">'+stock[i].childNodes[0].nodeValue+'</td><td><form action="/action_page.php"><input type="button" id="button'+(i+1)+'" value="-" onclick="diminuer(`quantity'+(i+1)+'`,`button'+(i+1)+'`)" disabled="disabled"><input type="number" id="quantity'+(i+1)+'" name="quantity" min="0" max="" value="0" size="6"><input type="button" value="+" onclick="augmenter(`quantity'+(i+1)+'`,`button'+(i+1)+'`)"><br><input type="button" class="button" value="Ajouter au panier"></form></td> </tr>';
			}
			document.getElementById("cat").innerHTML = txt;
		}
	};
	xhttp.open("GET", "../data/products.xml", true);
	xhttp.send();
}