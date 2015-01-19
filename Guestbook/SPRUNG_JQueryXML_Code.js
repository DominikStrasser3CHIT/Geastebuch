
function insertData(xml) { 
			console.log(xml);
			/*
			* Produkt ID 
			* Um Daten aus einem XML File auszulesen muss man sich zuvor erst einmal Gedanken machen, wo kommen die Elemente hinein
			* Hat man im html File diese Vorkehrungen getroffen und den divs ID's hinzugefügt beginnt man hier die Divs zu füllen
			* Auf eine ID zugegriffen wird mit dem Befehl $("--ID--") 
			* Danach kommt entweder der Befehl append (Fügt ein Element ein) oder prepend (Fügt ein Element am Anfang ein)
			* Danach kann man falls man einen Text aus dem XML-File ausliest noch einen eigenen Text hinzuschreiben
			* Durch $(xml) greift man auf das File zu (xml ist der name der oben im console.log festgelegt wurde
			* 
			* Mit dem Befehl find("--ID aus dem XML--") greift man auf eine ID zu (im XML file)
			* find Befehle können beliebig oft hintereinander ausgeführt werden (Daten können schließlich auch so oft man will verschachtelt werden)
			*
			* Ich hatte oft den Fehler dass ich mir unglücklicher Weise ein object Element geholt habe 
			* -----> Das kann man durch den Befehl .text() am Ende wieder richtigstellen
			*/
			$("#PID").append("Produkt ID: " + $(xml).find("ItemId").text());
			/* Titel wird gesucht */
			$("#titel").append( $(xml).find("Title"));
			$("#preis").append( "WährungsCode: " + $(xml).find("ListPrice").find("CurrencyCode").text());
			$("#preis").append( ", " + $(xml).find("ListPrice").find("FormattedPrice").text());
			/* Die MaßeElemente werden gesucht */
			$("#groesse").append("Maße: " + $(xml).find("PackageDimensions").find("Length").text());
			$("#groesse").append("x" + $(xml).find("PackageDimensions").find("Width").text());
			$("#groesse").append("x" + $(xml).find("PackageDimensions").find("Height").text() + "  hndrd-inches");
			/* Gewicht wird gesucht*/
			$("#gewicht").append("Gewicht: " + $(xml).find("PackageDimensions").find("Weight").text() + " hndrd-pounds");
			/* Beschreibung wird gesucht 
			$("#beschreibung").append( $(xml).find("EditorialReviews").find("EditorialReview").find("Content").text());*/
			/*
			*	Hier hole ich mir ein Bild durch eine URL aus dem XML-File:
			*   Zuerst sucht man das Item, mit einem 2ten find wie oben beschreiben selektiert man dass man das große Bild will
			*   Danach holt man sich noch die URL 
			*   Durch mehrere Variablen ist es übersichtlicher
			*
			*   Ein Bild wird wie in html mit der url ausgegeben --> einfach den img tag in das append/prepend schreiben
			*/
			var item = $(xml).find("Item");
			var lapic = $(item).find("LargeImage");
			var lapicurl = $(lapic).find("URL");
			$('#item').append('<img id="theImg" src="'+lapicurl.text()+'" />');
			var aID = "AID " + document.getElementById("assID").value;
		}

/*
* WIrd ausgeführt wenn nach einem Produkt gesucht wird
*/ 
function search() {
	var itemID = document.getElementById("prID").value;
	$.ajax({
		url: "http://aws.ocrs.at/request.php?Service=AWSECommerceService&Version=2011-08-01&Operation=ItemLookup&ItemId="+itemID+"&AssociateTag=sprungcom-21&IncludeReviewsSummary=no&ResponseGroup=ItemAttributes,Images,EditorialReview",
		dataType:"xml",
		success: insertData
	})
}

/*
* Wird am Anfang ausgeführt --> Sucht das Standartitem 
*/
$(document).ready(function xml(){
	$.ajax({
		url: "http://aws.ocrs.at/request.php?Service=AWSECommerceService&Version=2011-08-01&Operation=ItemLookup&ItemId=B00008OE6I&AssociateTag=sprungcom-21&IncludeReviewsSummary=no&ResponseGroup=ItemAttributes,Images,EditorialReview",
		dataType:"xml",
		success: insertData
	})
})
