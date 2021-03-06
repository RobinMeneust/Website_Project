// Some functions using AJAX had to be synchronous so that they return their value before that the calling function need it

// Checks if the given variables are defined. It's used to avoid errors when generating the products list
function productsVarsAreDefined(stock, imgSrc, id, desc, price){
	return (typeof stock.childNodes[0] !== 'undefined' && typeof imgSrc.childNodes[0] !== 'undefined' && typeof id.childNodes[0] !== 'undefined' && typeof desc.childNodes[0] !== 'undefined' && typeof price.childNodes[0] !== 'undefined');
}

// Checks if the value in the given element is positive
function checkIfElementValueIsPositive(element){
	if(element.value==="" || element.value<0){
		element.value=0;
	}
}

// Checks if the value in the given element is an integer
function checkIfElementValueIsInt(element){
	if(!Number.isInteger(element.value)){
		element.value=Math.round(element.value);
	}
}

// Update the file products.xml with the new stock quantity
function updateStock(id, cellID, order=0){
	if (cellID != 0) {
		var newStock = parseInt(document.getElementById("quantity"+cellID).value);
	}else{
		var newStock = order;
	}

	console.log('newStock='+newStock);

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

			if (cellID != 0) {
				foundProduct.getElementsByTagName("STOCK")[0].childNodes[0].nodeValue = document.getElementById("quantity"+cellID).value; // we change the stock value
			}else{
				foundProduct.getElementsByTagName("STOCK")[0].childNodes[0].nodeValue = foundProduct.getElementsByTagName("STOCK")[0].childNodes[0].nodeValue - order;
			}

			if(this.readyState == 4 && this.status == 200){
				const xhttp2 = new XMLHttpRequest(); // we send the new content to a php file to save it in products.xml
				let returnedStatus=this.responseText;
				xhttp2.onload = function () {
					if(this.readyState == 4 && this.status == 200){
						if(returnedStatus=="error")
							console.log("Error in updateStock()");
					}
				};
				xhttp2.open("POST", "../php/updateProducts.php", false);
				xhttp2.setRequestHeader("Content-type", "text/xml");
				xhttp2.send(xmlDoc);
			}
		};
		xhttp.open("GET", "../data/products.xml", false);
		xhttp.send();
	}
	if(cellID != 0)
		document.getElementById("stockID"+cellID).innerHTML=newStock;
}

// Display the list of products with their editable options
function loadEditableProducts() {
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
			let txt = '<tr><th>Photo</th><th>ID de cat??gorie</th><th>R??f??rence</th><th>Description</th><th>Prix</th><th class="stockColumn">Stock</th><th>Nouveau stock</th><th colspan="2">Action</th></tr>';
			for (let i=0; i < name.length; i++) {
				if(productsVarsAreDefined(stock[i], imgSrc[i], id[i], desc[i], price[i])) {
					txt += '<tr><td><img class="catalogueImg" style="cursor:default;" src="'+imgSrc[i].childNodes[0].nodeValue+'"></td>';
					txt += '<td>'+name[i].parentNode.parentNode.getAttribute("cat")+'</td>';
					txt += '<td>'+id[i].childNodes[0].nodeValue+'</td>';
					txt += '<td>'+desc[i].childNodes[0].nodeValue+'</td>';
					txt += '<td>'+price[i].childNodes[0].nodeValue+'</td>';
					txt += '<td class="stockColumn" id="stockID'+(i+1)+'">'+stock[i].childNodes[0].nodeValue+'</td>';
					txt += '<td><input onfocusout="checkIfElementValueIsPositive(this); checkIfElementValueIsInt(this)" type="number" id="quantity'+(i+1)+'" name="quantity" min="0" max="" value="0" size="6"></td>';
					txt += '<td><input onclick="updateStock(\''+id[i].childNodes[0].nodeValue+'\', \''+(i+1)+'\');" class="default_button" type="button" value="Sauvegarder"></td>';
					txt += '<td><button class="submitButton" onclick="deleteProduct(\''+id[i].childNodes[0].nodeValue+'\');">Supprimer</button></td></tr>';
				}
			}
			document.getElementById("editProductsTable").innerHTML = txt;
		}
	};
	xhttp.open("GET", "../data/products.xml", true);
	xhttp.send();
}

// Generated a new ID for a new product

function generateNewProductID(){
	const xhttp = new XMLHttpRequest();
	let idArray = [];
	let i=0;
	xhttp.onload = function (){
		if(this.readyState == 4 && this.status == 200){
			const xmlDoc = this.responseXML;
			const idsList = xmlDoc.getElementsByTagName("ID");
			for(let j=0; j<idsList.length; j++){
				idArray.push(parseInt(idsList[j].innerHTML.substring(1)));
			}
			idArray.sort(function(a, b){return a - b});
			for(; i<idArray.length-1; i++){
				if(idArray[i+1]!=idArray[i]+1){
					break;
				}
			}
			console.log("p"+(idArray[i]+1))
		}
	};
	xhttp.open("GET", "../data/products.xml", false);
	xhttp.send();
	return "p"+(idArray[i]+1);
}

// Generated a new ID for a new category
function generateNewCatID(){
	const xhttp = new XMLHttpRequest();
	let idArray = [];
	let i=0;
	xhttp.onload = function (){
		if(this.readyState == 4 && this.status == 200){
			const xmlDoc = this.responseXML;
			const categoriesList = xmlDoc.getElementsByTagName("CATEGORY");
	
			for(let j=0; j<categoriesList.length; j++){
				idArray.push(parseInt(categoriesList[j].getAttribute("cat").substring(1)));
			}
			idArray.sort(function(a, b){return a - b});
			for(; i<idArray.length-1; i++){
				if(idArray[i+1]!=idArray[i]+1){
					break;
				}
			}
		}
	};
	xhttp.open("GET", "../data/products.xml", false);
	xhttp.send();
	return "c"+(idArray[i]+1);
}

//Add a new category in product.xml
function addNewCategory(cat){
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function (){
		const xmlDoc = this.responseXML;
		
		if(this.readyState == 4 && this.status == 200){
			const catalog = xmlDoc.getElementsByTagName("CATALOG")[0];
			newID=generateNewCatID();
			addCategoryToCSV(newID, cat);

			let textNode = xmlDoc.createTextNode("\t");
			catalog.appendChild(textNode);

			let newCatNode = xmlDoc.createElement("CATEGORY");
			newCatNode.setAttribute("cat", newID);
			newCatNode.innerHTML = "\n\t";
			catalog.appendChild(newCatNode);
			textNode = xmlDoc.createTextNode("\n");
			catalog.appendChild(textNode);

			const xhttp2 = new XMLHttpRequest(); // we send the new content to a php file to save it in products.xml
			let returnedStatus=this.responseText;
			xhttp2.onload = function () {
				if(this.readyState == 4 && this.status == 200){
					if(returnedStatus=="error")
						console.log("Error in addNewCategory()");
				}
			};
			xhttp2.open("POST", "../php/updateProducts.php", false);
			xhttp2.setRequestHeader("Content-type", "text/xml");
			xhttp2.send(xmlDoc);
		}
	};
	xhttp.open("GET", "../data/products.xml", false);
	xhttp.send();
	return newID;
}

// Add a new product in products.xml
function addNewProduct(){
	let img = document.getElementById("imgSrcOfNewItem").value;
	let name = document.getElementById("nameOfNewItem").value;
	let desc = document.getElementById("descriptionOfNewItem").value;
	let newCategory = document.getElementById("categoryNameOfNewItem").value;
	let categoryID = document.getElementById("select_categoryNameOfNewItem").value;
	let stock = parseInt(document.getElementById("stockOfNewItem").value);
	let price = parseFloat(document.getElementById("priceOfNewItem").value);

	console.log(newCategory+"Ncat | CatID "+categoryID);
	if(newCategory!="" && categoryID==""){
		categoryID=addNewCategory(newCategory);; // now that we created the new category we can add the product to it
		console.log('new category ID : '+categoryID);
	}

	if(categoryID!=""){
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function (){
			if(this.readyState == 4 && this.status == 200){
				const xmlDoc = this.responseXML;
				const categoriesList = xmlDoc.getElementsByTagName("CATEGORY");
				let foundCategory;
				for (let i = 0; i < categoriesList.length; i++) {
					if(categoriesList[i].getAttribute("cat")==categoryID){
						foundCategory = categoriesList[i];
						break;
					}
				}
				//We create the new XML nodes to the new product.xml that will replace the previous one
				let textNode = xmlDoc.createTextNode("\t");
				foundCategory.appendChild(textNode);
				let newProductNode = xmlDoc.createElement("PRODUCT");

				textNode = xmlDoc.createTextNode("\n\t\t\t");
				newProductNode.appendChild(textNode);
				let idNode = xmlDoc.createElement("ID");
				idNode.innerHTML = generateNewProductID();
				newProductNode.appendChild(idNode);

				textNode = xmlDoc.createTextNode("\n\t\t\t");
				newProductNode.appendChild(textNode);
				let nameNode = xmlDoc.createElement("NAME");
				nameNode.innerHTML = name;
				newProductNode.appendChild(nameNode);

				textNode = xmlDoc.createTextNode("\n\t\t\t");
				newProductNode.appendChild(textNode);
				let descriptionNode = xmlDoc.createElement("DESCRIPTION");
				descriptionNode.innerHTML = desc;
				newProductNode.appendChild(descriptionNode);

				textNode = xmlDoc.createTextNode("\n\t\t\t");
				newProductNode.appendChild(textNode);
				let imgSrcNode = xmlDoc.createElement("IMG_NAME");
				imgSrcNode.innerHTML = img;
				newProductNode.appendChild(imgSrcNode);

				textNode = xmlDoc.createTextNode("\n\t\t\t");
				newProductNode.appendChild(textNode);
				let stockNode = xmlDoc.createElement("STOCK");
				stockNode.innerHTML = stock;
				newProductNode.appendChild(stockNode);

				textNode = xmlDoc.createTextNode("\n\t\t\t");
				newProductNode.appendChild(textNode);
				let priceNode = xmlDoc.createElement("PRICE");
				priceNode.innerHTML = price;
				newProductNode.appendChild(priceNode);
				textNode = xmlDoc.createTextNode("\n\t\t");
				newProductNode.appendChild(textNode);
				
				foundCategory.appendChild(newProductNode);
				textNode = xmlDoc.createTextNode("\n\t");
				foundCategory.appendChild(textNode);

				const xhttp2 = new XMLHttpRequest(); // we send the new content to a php file to save it in products.xml
				let returnedStatus=this.responseText;
				xhttp2.onload = function () {
					if(this.readyState == 4 && this.status == 200){
						if(returnedStatus=="error")
							console.log("Error in addNewProduct()");
					}
					//REFRESH
					loadEditableProducts();
					loadCategoriesSelectList();
				};

				xhttp2.open("POST", "../php/updateProducts.php", true);
				xhttp2.setRequestHeader("Content-type", "text/xml");
				xhttp2.send(xmlDoc);
			}
		};
		xhttp.open("GET", "../data/products.xml", true);
		xhttp.send();
	}
}


// Delete a product in products.xml
function deleteProduct(id){
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function (){
		const xmlDoc = this.responseXML;
		const idList = xmlDoc.getElementsByTagName("ID");
		let foundID;
		let catalog=xmlDoc.getElementsByTagName("CATALOG")[0];

		if(this.readyState == 4 && this.status == 200){
			for (let i = 0; i < idList.length; i++) {
				if(idList[i].innerHTML==id){
					foundID = idList[i];
					break;
				}
			}
			let productToDelete=foundID.parentNode;
			let categoryOfTheProduct=productToDelete.parentNode;
			if(productToDelete.parentNode.getElementsByTagName("PRODUCT").length<=1){ // only one element so we delete the category along with its only product
				productToDelete.parentNode.parentNode.removeChild(productToDelete.parentNode);
				catalog.innerHTML = catalog.innerHTML.substring(0, catalog.innerHTML.length - 2); // we remove the \n and \t characters at the end of the CATALOG in xml
				removeCategoryFromCSV(productToDelete.parentNode.getAttribute("cat"));
			}
			else{ // several elements
				productToDelete.parentNode.removeChild(productToDelete);
				categoryOfTheProduct.innerHTML = categoryOfTheProduct.innerHTML.substring(0, categoryOfTheProduct.innerHTML.length - 3); // we remove the \n and \t\t characters at the end of the CATEGORY in xml
			}
	
			const xhttp2 = new XMLHttpRequest(); // we send the new content to a php file to save it in products.xml
			let returnedStatus=this.responseText;
			xhttp2.onload = function () {
				if(this.readyState == 4 && this.status == 200){
					if(returnedStatus=="error")
						console.log("Error in deleteProduct()");
				}
			};
			xhttp2.open("POST", "../php/updateProducts.php", true);
			xhttp2.setRequestHeader("Content-type", "text/xml");
			xhttp2.send(xmlDoc);
			//REFRESH
			loadEditableProducts();
			loadCategoriesSelectList();
		}
	};
	xhttp.open("GET", "../data/products.xml", true);
	xhttp.send();
}

// Put the list of categories in the dropdown list in admin.php
function loadCategoriesSelectList(){
	let list = document.getElementById("select_categoryNameOfNewItem");
	list.innerHTML ='<option value="" selected></option>'
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			let lines = this.responseText.split("\n");
			for (let i=1; i < lines.length; i++) {
				let cat = (lines[i].split(","));
				list.innerHTML += '<option value="'+cat[0]+'">'+cat[1]+'</option>'
			}
		}
	};
	xhttp.open("GET", "../data/categories.csv", true);
	xhttp.send();
}

// Add a category to the csv file
function addCategoryToCSV(catID, catName){
	const xhttp = new XMLHttpRequest();

	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			const xhttp2 = new XMLHttpRequest();
			let = newCSVContent = this.responseText+"\n"+catID+","+catName;
			console.log(newCSVContent);
			xhttp2.onload = function () {
				let returnedStatus=this.responseText;
				if(this.readyState == 4 && this.status == 200){
					if(returnedStatus=="error")
							console.log("Error in addCategoryToCSV()");
				}
			};

			xhttp2.open("POST", "../php/updateCategories.php", true);
			xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp2.send(newCSVContent);
		}
	};
	xhttp.open("GET", "../data/categories.csv", true);
	xhttp.send();
}

// Remove a category to the csv file
function removeCategoryFromCSV(catID){
	const xhttp = new XMLHttpRequest();

	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			const xhttp2 = new XMLHttpRequest();
			let lines = this.responseText.split('\n');
			let newCSVContent = "";
			for(let i=0; i<lines.length; i++){
				console.log(lines[i].split(',')[0] + ' | '+catID);
				if(lines[i].split(',')[0] != catID){
					newCSVContent += lines[i]+'\n';
				}
			}
			newCSVContent=newCSVContent.substring(0, newCSVContent.length - 1); // To remove the '\n'
			xhttp2.onload = function () {
				let returnedStatus=this.responseText;
				if(this.readyState == 4 && this.status == 200){
					if(returnedStatus=="error")
							console.log("Error in addCategoryToCSV()");
				}
			};

			xhttp2.open("POST", "../php/updateCategories.php", true);
			xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp2.send(newCSVContent);
		}
	};
	xhttp.open("GET", "../data/categories.csv", true);
	xhttp.send();
}