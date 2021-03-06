// Checks if the given variables are defined. It's used to avoid errors when generating the products lis
function productsVarsAreDefined(stock, imgSrc, id, desc, price){
	return (typeof stock.childNodes[0] !== 'undefined' && typeof imgSrc.childNodes[0] !== 'undefined' && typeof id.childNodes[0] !== 'undefined' && typeof desc.childNodes[0] !== 'undefined' && typeof price.childNodes[0] !== 'undefined');
}

// Search a categorie in products.xml and display its products in the table with the id "cat"
function loadCategory(category) {
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			const xmlDoc = this.responseXML;
			const cat = xmlDoc.getElementsByTagName("CATEGORY");
			let foundCat;
			for (let i = 0; i < cat.length; i++) {
				if(cat[i].getAttribute("cat").normalize() == category.normalize()){
					foundCat = cat[i];
					break;
				}
			}
			const name = foundCat.getElementsByTagName("NAME");
			const id = foundCat.getElementsByTagName("ID");
			const desc = foundCat.getElementsByTagName("DESCRIPTION");
			const imgSrc = foundCat.getElementsByTagName("IMG_NAME");
			const stock = foundCat.getElementsByTagName("STOCK");
			const price = foundCat.getElementsByTagName("PRICE");
			let txt = '<tr><th>Photo</th><th>Référence</th><th>Description</th><th>Prix</th><th class="stockColumn">Stock</th><th>Commande</th></tr>';
			for (let i = 0; i < name.length; i++) {
				if (productsVarsAreDefined(stock[i], imgSrc[i], id[i], desc[i], price[i]) && stock[i].childNodes[0].nodeValue > 0) {
					txt += '<tr> <td><img class="catalogueImg" onclick="zoomIn(this)" src="'+imgSrc[i].childNodes[0].nodeValue+'"></td><td>'+id[i].childNodes[0].nodeValue+'</td><td>'+desc[i].childNodes[0].nodeValue+'</td><td>'+price[i].childNodes[0].nodeValue+'</td><td class="stockColumn" id="stockID'+(i+1)+'">'+stock[i].childNodes[0].nodeValue+'</td><td><form name="addToCart_form" id="addToCart_form"><input type="button" id="button-'+(i+1)+'" value="-" onclick="decrease('+(i+1)+');" disabled="disabled"><input onkeyup="checkIfCorrectValue(this.value, '+(i+1)+')" type="number" id="quantity'+(i+1)+'" name="quantity" min="0" max="" value="0" size="6"><input type="button" id="button+'+(i+1)+'" value="+" onclick="increase('+(i+1)+');"><input onclick="addToCart(\''+imgSrc[i].childNodes[0].nodeValue+'\', \''+id[i].childNodes[0].nodeValue+'\', \''+desc[i].childNodes[0].nodeValue+'\', \''+price[i].childNodes[0].nodeValue+'\', \''+stock[i].childNodes[0].nodeValue+'\', \''+(i+1)+'\'); updateCartDisplay(\'onlyRefresh\');" class="default_button" type="button" value="Ajouter au panier"></form></td></tr>';
				}
			}
			txt += '<tr><td id="td_hideStockButton" colspan="6"><button id="buttonHideStock" type="submit" class="button"  onclick="hide()">Afficher stock</button></tr></td>'
			document.getElementById("cat").innerHTML = txt;
		}
	};
	xhttp.open("GET", "../data/products.xml", true);
	xhttp.send();
}