function ChangeDivFenlei(id)
{
    if(document.getElementById(id.replace(/imgControl/, "divErJiFenLei")).style.display == "none")
    {
        document.getElementById(id.replace(/imgControl/, "divErJiFenLei")).style.display = "block";
        document.getElementById(id).src = "images/jianhao.gif";
    }
    else
    {
        document.getElementById(id.replace(/imgControl/, "divErJiFenLei")).style.display = "none";
        document.getElementById(id).src = "images/jiahao.gif";
    }
}

function checkIsEmpty(txtId,divId,message){
    var txtContent = document.getElementById("ctl00_ContentPlaceHolder1_" + txtId).value;
    if (txtContent.length==0){
        document.getElementById("ctl00_ContentPlaceHolder1_"+divId).innerHTML='<span style="color:red">'+message+'</span>';
        return false;
    }
    document.getElementById("ctl00_ContentPlaceHolder1_"+divId).innerHTML='';
    return true;
}

function addShoppingCar(eeId) {
    var quantity = document.getElementById("quantity").value;
    var minQuantity = document.getElementById("minQuantity").value;
    var maxQuantity = document.getElementById("maxQuantity").value;
    var intPattern = /^[1-9][0-9]*$/;
    if (!intPattern.test(quantity)) {
        alert("Quantity\'s format is not correct");
        return false;
    } else if (quantity < parseInt(minQuantity)) {
        alert("The minimum order qty is " + minQuantity);
        return false;
    } else if (maxQuantity != "" && quantity > parseInt(maxQuantity)) {
        alert("The maximum order qty is " + maxQuantity);
        return false;
    }
    location.href = "shoppingCar.php?ctrl=add&eeId=" + eeId + "&quantity=" + quantity;
}

function addShoppingCar_list(eeId) {
    var quantity = document.getElementById("quantity_"+eeId).value;
    var minQuantity = document.getElementById("minQuantity_" + eeId).value;
    var maxQuantity = document.getElementById("maxQuantity_" + eeId).value;
    var intPattern = /^[1-9][0-9]*$/;
    if (!intPattern.test(quantity)) {
        alert("Quantity\'s format is not correct");
        return false;
    } else if (quantity < parseInt(minQuantity)) {
        alert("The minimum order qty is " + minQuantity);
        return false;
    } else if (maxQuantity != "" && quantity > parseInt(maxQuantity)) {
        alert("The maximum order qty is " + maxQuantity);
        return false;
    }
    location.href = "shoppingCar.php?ctrl=add&eeId=" + eeId + "&quantity=" + quantity;
}

function toOrderInfo() {
    var itemCount = document.getElementById("itemCount").value;
    if (itemCount != 0) {
        //location.href = "selectTakeOrderType.php";
        location.href = "eeOrderInfo.php";
    } else {
        if (confirm('Please make sure you have finished your components shopping and ready to Checkout.')) {
            location.href = "../order/checkout.php";
        }
    }
}

function toList(url) {
    location.href = url;
}   

function checkEmail() {
    var val = document.getElementById("email").value;
    var emailPattern = /^([\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+,)*[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
    if (!emailPattern.test(val)) {
        return false;
    } else {
        return true;
    }
}

function toTakeOrder(itemCount) {
    if (document.getElementById("terms").checked == false) {
        alert("You need read and accept the Terms and Conditions");
        return false;
    }else{
        document.getElementById("form1").submit();
    }
}

function checkSubmitEEPcbOrder() {
    if (document.getElementById("pcbOrderId").value == "") {
        alert("Please select an order");
        return false;
    } else {
        return true;
    }    
}

function changeCountry(countryId) {
    if (countryId == 1) {
        document.getElementById("trHaveVAT").style.display = "none";
    } else {
        document.getElementById("trHaveVAT").style.display = "block";
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

function showVATNumber() {
    var haveVAT = getCheckedValue(document.getElementById("haveVAT"));
    if (haveVAT != 1) {
        document.getElementById("spanVATNumber").style.display = "none";
    } else {
        document.getElementById("spanVATNumber").style.display = "block";
    }
}

function setPcbOrderValue(orderId) {
    document.getElementById("pcbOrderId").value = orderId;
    document.getElementById("pcbKey").value = document.getElementById("pcbKey_" + orderId).value;
    document.getElementById("pcbNumber").value = document.getElementById("pcbNumber_" + orderId).value;
}