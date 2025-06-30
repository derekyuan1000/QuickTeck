function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
}

function getCheckedValue(radioObj) {
    if (!radioObj) {
        return "";
    }
    var radioLength = radioObj.length;
    if (radioLength == undefined) {
        if (radioObj.checked) {
            return radioObj.value;
        } else {
            return "";
        }
    }
    for (var i = 0; i < radioLength; i++) {
        if (radioObj[i].checked) {
            return radioObj[i].value;
        }
    }
    return "";
}

function changeMaterial(){
	if($("#material").val()=="3"){
		$("#color").val("1");
		$("#color").find("option[value='3']").attr("disabled",true);
	}else{
		$("#color").find("option[value='3']").attr("disabled",false);
	}
}

function changeCountry() {
    if (document.getElementById("country").value == 1) {
        document.getElementById("trHaveVAT").style.display = "none";
    } else {
        document.getElementById("trHaveVAT").style.display = "";
    }
}

function showVATNumber() {
    var haveVAT = getCheckedValue(document.calc.haveVAT);
    if (haveVAT != 1) {
        document.getElementById("spanVATNumber").style.display = "none";
    } else {
        document.getElementById("spanVATNumber").style.display = "";
    }
}

function checkFormbin()
{
	/*var quantity=document.getElementById('quantity').value;
	var length=document.getElementById('length').value;
	var width=document.getElementById('width').value;
	var layer = getCheckedValue(document.calc.layer);
	if(layer==""||isNaN(layer))
	{
		alert("Please select board layer!");
		return false;
	}
	else if(quantity==""||isNaN(quantity))
	{
		alert("Please input connrect quantity!");
		return false;
	}
	else if(quantity<1||quantity>100)
	{
		alert("quantity is 1 to 100");
		return false;
	}
	if(length==""||isNaN(length))
	{
		alert("Please input connrect length!");
		return false;
	}
	else if(length<=1||length>=500)
	{
		alert("length is 10 to 500!");
		return false;
	}
	if(width==""||isNaN(width))
	{
		alert("Please input connrect width!");
		return false;
	}
	else if(width<=1||width>=500)
	{
		alert("width is 10 to 500!");
		return false;
	}
	if($("[name=sameDesign]:checked").val()==1 && $("#historyOrderNumber").val()=="")
	{
		alert("Pleas input your previous order number, otherwise tooling and setup cost cannot be deducted.");
		return false;
	}
	if($("[name=sameDesign]:checked").val()==1 && document.getElementById("checkHistoryOrderNumberResult").value == 1){
		alert("The provided order was not made in the last 12 months by Quick-teck, please input it again.");
		return false;
	}
	if($("[name=haveVAT]:checked").val()==1 && $("#VATNumber").val()=="")
	{
		alert("You need input your EU VAT number otherwise UK VAT will be charged.");
		return false;
	}
	if(document.getElementById("terms").checked==false)
	{
		alert("You need read and accept the Terms and Conditions");
		return false;

	}*/
	return true;
}

function calculate_total(type)
{
    //var len = document.calc.length.value;
    //var wid = document.calc.width.value;
    var quan = document.calc.quantity.value;
    var volume = document.calc.volume.value;
    var color = document.calc.color.value;
    var area = document.calc.area.value;
    var material = document.calc.material.value;
    var size = document.calc.size.value;
    var fileName = document.calc.fileName.value;
    var clientFileName = document.calc.clientFileName.value;
    var countryId = document.calc.country.value;
    //var isSameDesign = getCheckedValue(document.calc.sameDesign);
    //var isNeedStencil = getCheckedValue(document.calc.needStencil);
    //var stencilType = getCheckedValue(document.calc.stencilType);
    //var tech = getCheckedValue(document.calc.tech);
    //var isPrototype = getCheckedValue(document.calc.prototype);
    //var isULMark = getCheckedValue(document.calc.ULmarking);
    //var soldermask = getCheckedValue(document.calc.soldermask);
    //var silkscreen = getCheckedValue(document.calc.silkscreen);

    if (type == "onlineQuote" && quan == "") {
        document.getElementById("spanTotal").innerHTML = "&nbsp";
        document.getElementById("spanCurrencyType").innerHTML = "&nbsp";
        return;
    } else if (type == "takeOrder" && quan == "") {
        document.getElementById("spanTotal").innerHTML = "&nbsp";
        document.getElementById("spanPriceExcVAT").innerHTML = "&nbsp";
        document.getElementById("spanCurrencyType1").innerHTML = "&nbsp";
        document.getElementById("spanCurrencyType2").innerHTML = "&nbsp";
        return;
    }
   
//    if (type == "onlineQuote" && !document.calc.cbRule.checked) {
//        alert("You cannot use this online quote form as your PCB job does not comply with our stand manufacture specification.");
//        return;
//    }

    if ((document.calc.quantity.value < 1) && (document.calc.quantity != document.activeElement)) {
        alert("The minimum order quantity is 1.");
        return;
    } else if (document.calc.quantity.value < 1) {
        return;
    }

    if ((document.calc.quantity.value > 100) && (document.calc.quantity != document.activeElement)) {
        alert("The maximum order quantity for online quote is 100.");
        return;
    } else if (document.calc.quantity.value > 100) {
        return;
    }

    if ((parseInt(document.calc.quantity.value) != document.calc.quantity.value) && (document.calc.quantity != document.activeElement)) {
        alert("You should put a integer as the board quantity!");
        return;
    } else if (parseInt(document.calc.quantity.value) != document.calc.quantity.value) {
        return;
    }

    if (type == "onlineQuote") {
        document.getElementById('spanTotal').innerHTML = "Calculating";
        document.getElementById('spanCurrencyType').innerHTML = "";
    } else if (type == "takeOrder") {
        document.getElementById('spanTotal').innerHTML = "Calculating";
        document.getElementById('spanPriceExcVAT').innerHTML = "Calculating";
        document.getElementById('spanCurrencyType1').innerHTML = "";
        document.getElementById('spanCurrencyType2').innerHTML = "";
    }

    createXMLHttpRequest();
    if (type == "onlineQuote") {
        var url = "doQuote.php?t=" + Math.random() + "&type=" + type + "&val=" + quan + "," + volume + "," + material + "," + countryId + "," + fileName + "," + color + "," + area + "," + size + "," + clientFileName;
        xmlHttp.open("GET", url, true);
        xmlHttp.onreadystatechange = ajaxOnLineQuoteComplete;
    }else if (type == "takeOrder") {
        var haveVAT = getCheckedValue(document.calc.haveVAT);
        var VATNumber = document.calc.VATNumber.value;
        var isVAT = 1;
        if (countryId != 1 && haveVAT == 1 && VATNumber.length != 0) {
            isVAT = 0;
        }
        var url = "doQuote.php?t=" + Math.random() + "&type=" + type + "&val=" + quan + "," + volume + "," + material + "," + countryId + "," + fileName + "," + color + "," + area + "," + size + "," + clientFileName + "," + isVAT;
        xmlHttp.open("GET", url, true);
        xmlHttp.onreadystatechange = ajaxTakeOrderComplete;
    }
    xmlHttp.send(null);
}

function ajaxOnLineQuoteComplete() {
    if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
            var result = xmlHttp.responseText;
            if (!isNaN(result.split('|')[3])) {
                document.getElementById('spanTotal').innerHTML = Math.round(result.split('|')[3] * 1.0 * 100) / 100;
                //document.getElementById('spanPriceExcVAT').innerHTML = Math.round(result.split('|')[15] * 1.0 * 100) / 100;
                //if (document.getElementById('spanTotal').innerHTML == document.getElementById('spanPriceExcVAT').innerHTML) {
                    //document.getElementById('spanTotal').innerHTML = "N/A";
                //}
                document.getElementById("total").value = Math.round(result.split('|')[3] * 1.0 * 100) / 100;
                //document.paynow.amount.value = Math.round(result.split('|')[17] * 1.0 * 100) / 100;
                //document.paynow.amount.value = Math.round(result * 1.0 * 100) / 100;

                document.getElementById("price0").value = result.split('|')[0];
                document.getElementById("price1").value = result.split('|')[1];
                document.getElementById("price2").value = result.split('|')[2];
                document.getElementById("price3").value = result.split('|')[3];
                document.getElementById("price4").value = result.split('|')[4];
                document.getElementById("price5").value = result.split('|')[5];
                document.getElementById("price6").value = result.split('|')[6];
                document.getElementById("price7").value = result.split('|')[7];
                document.getElementById("price8").value = result.split('|')[8];
                document.getElementById("price9").value = result.split('|')[9];
                document.getElementById("price10").value = result.split('|')[10];
                document.getElementById("price11").value = result.split('|')[11];
                document.getElementById("price12").value = result.split('|')[12];
                document.getElementById("price13").value = result.split('|')[13];
                document.getElementById("price14").value = result.split('|')[14];
                document.getElementById("price15").value = result.split('|')[15];
                document.getElementById("price16").value = result.split('|')[16];
                document.getElementById("price17").value = result.split('|')[17];
                document.getElementById("price18").value = result.split('|')[18];
                //document.getElementById("targetDay").innerHTML = result.split('|')[19];
                //document.getElementById("show_t").style.display = "block";

                var currencyType = result.split('|')[4];
                document.getElementById("currencyType").value = currencyType;
                var currencyString = "";
                switch (currencyType) {
                    case "1": currencyString = "&pound;"; break;
                    case "2": currencyString = "&euro;"; break;
                    case "3": currencyString = "&#36;"; break;
                }
                document.getElementById("spanCurrencyType").innerHTML = currencyString;
            } else {
                document.getElementById('spanTotal').innerHTML = result.split('|')[3];
                //document.getElementById('spanPriceExcVAT').innerHTML = result.split('|')[3];
                document.getElementById("total").value = 0;
                document.getElementById("spanCurrencyType").innerHTML = "";
                //document.paynow.amount.value = 0;
            }
        }
    }
}

function ajaxTakeOrderComplete() {
    if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
            var result = xmlHttp.responseText;
            if (!isNaN(result.split('|')[3])) {
                document.getElementById('spanTotal').innerHTML = Math.round(result.split('|')[5] * 1.0 * 100) / 100;
                document.getElementById('spanPriceExcVAT').innerHTML = Math.round(result.split('|')[3] * 1.0 * 100) / 100;
                
                var currencyType = result.split('|')[4];
                document.getElementById("currencyType").value = currencyType;
                var currencyString = "";
                switch (currencyType) {
                    case "1": currencyString = "&pound;"; break;
                    case "2": currencyString = "&euro;"; break;
                    case "3": currencyString = "&#36;"; break;
                }
                document.getElementById("spanCurrencyType1").innerHTML = currencyString;
                document.getElementById("spanCurrencyType2").innerHTML = currencyString;
                
                if (document.getElementById('spanTotal').innerHTML == document.getElementById('spanPriceExcVAT').innerHTML) {
                    document.getElementById('spanTotal').innerHTML = "N/A";
                    document.getElementById("spanCurrencyType1").innerHTML = "";
                }
                document.getElementById("total").value = Math.round(result.split('|')[5] * 1.0 * 100) / 100;

                document.getElementById("price0").value = result.split('|')[0];
                document.getElementById("price1").value = result.split('|')[1];
                document.getElementById("price2").value = result.split('|')[2];
                document.getElementById("price3").value = result.split('|')[3];
                document.getElementById("price4").value = result.split('|')[4];
                document.getElementById("price5").value = result.split('|')[5];
                document.getElementById("price6").value = result.split('|')[6];
                document.getElementById("price7").value = result.split('|')[7];
                document.getElementById("price8").value = result.split('|')[8];
                document.getElementById("price9").value = result.split('|')[9];
                document.getElementById("price10").value = result.split('|')[10];
                document.getElementById("price11").value = result.split('|')[11];
                document.getElementById("price12").value = result.split('|')[12];
                document.getElementById("price13").value = result.split('|')[13];
                document.getElementById("price14").value = result.split('|')[14];
                document.getElementById("price15").value = result.split('|')[15];
                document.getElementById("price16").value = result.split('|')[16];
                document.getElementById("price17").value = result.split('|')[17];
                document.getElementById("price18").value = result.split('|')[18];
                //document.getElementById("targetDay").innerHTML = result.split('|')[19];
                //document.getElementById("show_t").style.display = "block";
            } else {
                document.getElementById('spanTotal').innerHTML = result.split('|')[3];
                document.getElementById('spanPriceExcVAT').innerHTML = result.split('|')[3];
                document.getElementById("spanCurrencyType1").innerHTML = "";
                document.getElementById("spanCurrencyType2").innerHTML = "";
                document.getElementById("total").value = 0;
                //document.paynow.amount.value = 0;
            }
        }
    }
}