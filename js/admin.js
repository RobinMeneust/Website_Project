// Checks if the given variables are defined. It's used to avoid errors when generating the products list
function productsVarsAreDefined(stock, imgSrc, id, desc, price){
	return (typeof stock.childNodes[0] !== 'undefined' && typeof imgSrc.childNodes[0] !== 'undefined' && typeof id.childNodes[0] !== 'undefined' && typeof desc.childNodes[0] !== 'undefined' && typeof price.childNodes[0] !== 'undefined');
}

// Checks if the value in the given element is positive
function checkIfElementValueIsPositive(element){
	if(element.value<0){
		element.value=0;
	}
}

// Update the file products.xml with the new stock quantity
function updateStock(id, cellID){
	let newStock = parseInt(document.getElementById("quantity"+cellID).value);
	if(newStock>=0){	
		const xhttp = new XMLHttpRequest(); // we get the XML data
		xhttp.onload = function () {
			const xmlDoc = this.responseXML;
			const productsList = xmlDoc.getElementsByTagName("PRODUCT");
			let foundProduct;
			for (let i = 0; i < productsList.length; i++) {
				if(productsList[i].getElementsByTagName("ID")[0].childNodes[0].nodeValue==id){
					foundProduct = productsList[i];
					break;
				}
			}
			foundProduct.getElementsByTagName("STOCK")[0].childNodes[0].nodeValue=document.getElementById("quantity"+cellID).value; // we change the stock value
			if(this.readyState == 4 && this.status == 200){
				const xhttp2 = new XMLHttpRequest(); // we send the new content to a php file to save it in products.xml
				let returnedStatus=this.responseText;
				xhttp2.onload = function () {
					if(this.readyState == 4 && this.status == 200){
						if(returnedStatus=="error")
							console.log("Error in updateStock()");
					}
				};
				xhttp2.open("POST", "../php/updateStock.php", true);
				xhttp2.setRequestHeader("Content-type", "text/xml");
				xhttp2.send(xmlDoc);
			}
		};
		xhttp.open("GET", "../data/products.xml", true);
		xhttp.send();
	}
	document.getElementById("stockID"+cellID).innerHTML=newStock;
}

// Display the list of products with there editable stock
function loadStock() {
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			const xmlDoc = this.responseXML;
			const name = xmlDoc.getElementsByTagName("NAME");
			const id = xmlDoc.getElementsByTagName("ID");
			const desc = xmlDoc.getElementsByTagName("DESCRIPTION");
			const imgSrc = xmlDoc.getElementsByTagName("IMG_NAME");
			const stock = xmlDoc.getElementsByTagName("STOCK");
			const price = xmlDoc.getElementsByTagName("PRICE");
			let txt = '<tr><th>Photo</th><th>Référence</th><th>Description</th><th>Prix</th><th class="stockColumn">Stock</th><th>Edition des stocks</th></tr>';
			for (let i = 0; i < name.length; i++) {
				if(productsVarsAreDefined(stock[i], imgSrc[i], id[i], desc[i], price[i]) && stock[i].childNodes[0].nodeValue > 0) {
					txt += '<tr> <td><img class="catalogueImg" style="cursor:default;" src="'+imgSrc[i].childNodes[0].nodeValue+'"></td><td>'+id[i].childNodes[0].nodeValue+'</td><td>'+desc[i].childNodes[0].nodeValue+'</td><td>'+price[i].childNodes[0].nodeValue+'</td><td class="stockColumn" id="stockID'+(i+1)+'">'+stock[i].childNodes[0].nodeValue+'</td><td><form name="addToCart_form" id="addToCart_form"><input onkeyup="checkIfElementValueIsPositive(this)" type="number" id="quantity'+(i+1)+'" name="quantity" min="0" max="" value="0" size="6"><input onclick="updateStock(\''+id[i].childNodes[0].nodeValue+'\', \''+(i+1)+'\')" class="default_button" type="button" value="Sauvegarder"></form></td></tr>';
				}
			}
			document.getElementById("editStockTable").innerHTML = txt;
		}
	};
	xhttp.open("GET", "../data/products.xml", true);
	xhttp.send();
}