function checkMailAssign() {
    if (document.getElementById("businessAdminId").value == "") {
        document.getElementById("js_Error").innerHTML = '<span style="color:red">Please select \"Assign to\"</span>';
        return false;
    } else {
        return true;
    }
}

function checkMailApprove() {
    if (confirm('Confirm to send this mail?')) {
        return true;
    } else {
        return false;
    }
}

function checkMailReply() {
    if (confirm('Confirm to send this mail?')) {
        return true;
    } else {
        return false;
    }
}

function uploadAttachment(replyMailId) {
    var strPage = "uploadAttachment.php?replyMailId=" + replyMailId + "&random=" + Math.random();
    //window.showModalDialog(strPage, mailId, "dialogWidth=600px; dialogHeight=400px; center:yes; resizable:yes; status: yes");
    window.open(strPage, 'pop', 'width=600, height=600')
}

function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
}

function ajaxGetAttachment(replyMailId) {
    createXMLHttpRequest();
    var url = "ajaxGetUploadAttachment.php?t=" + Math.random() + "&replyMailId=" + replyMailId;
    xmlHttp.open("GET", url, true);
    xmlHttp.onreadystatechange = ajaxGetAttachmentComplete;
    xmlHttp.send(null);
}

function ajaxGetAttachmentComplete() {
    if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
            //alert("1");
            var result = xmlHttp.responseText;
            if (document.getElementById("divAttachment").innerHTML == "Loading...") {
                document.getElementById("divAttachment").innerHTML = ""
            }
            if (document.getElementById("hdDivAttachment").value != result.split('|')[0]) {
                document.getElementById("hdDivAttachment").value = result.split('|')[0];
                document.getElementById("divAttachment").innerHTML = result.split('|')[1];
                //alert("OK");
            }
        }
    }
}

function createXMLHttpRequest2() {
    if (window.ActiveXObject) {
        xmlHttp2 = new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        xmlHttp2 = new XMLHttpRequest();
    }
}

function ajaxDeleteAttachment(attachmentId) {
    createXMLHttpRequest2();
    var url = "ajaxDeleteAttachment.php?t=" + Math.random() + "&attachmentId=" + attachmentId;
    xmlHttp2.open("GET", url, true);
    xmlHttp2.onreadystatechange = ajaxDeleteAttachmentComplete;
    xmlHttp2.send(null);
}

function ajaxDeleteAttachmentComplete() {
    if (xmlHttp2.readyState == 4) {
        if (xmlHttp2.status == 200) {
            var result = xmlHttp2.responseText;
            if (result == 1) {
                alert("Delete successfully, about 2sec later attachments list will be refresh");
            }
        }
    }
}

function changeMailFlag(id){
//    createXMLHttpRequest();
//    var url = "ajaxChangeMailFlag.php?t=" + Math.random() + "&mailId=" + id;
//    xmlHttp.open("GET", url, true);
//    xmlHttp.onreadystatechange = ajaxChangeMailFlagComplete;
//    xmlHttp.send(null);
    $.get("ajaxChangeMailFlag.php", { t: Math.random(), mailId: id },
        function(data) {
            var id = data.split('|')[0];
            var mailFlag = data.split('|')[1];
            switch (mailFlag) {
                case "1": $("#flag" + id).attr("src", "../Images/whiteflag.png"); break;
                case "2": $("#flag" + id).attr("src", "../Images/yellowflag.png"); break;
                case "3": $("#flag" + id).attr("src", "../Images/redflag.png"); break;
            }
        }
    );
}

function ajaxChangeMailFlagComplete() {
    if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
            var result = xmlHttp.responseText;
            //alert(result);
            var id = result.split('|')[0];
            var mailFlag = result.split('|')[1];
            switch (mailFlag) {
                case "1": $("#flag"+id).attr("src","../Images/whiteflag.png"); break;
                case "2": $("#flag"+id).attr("src","../Images/yellowflag.png"); break;
                case "3": $("#flag"+id).attr("src","../Images/redflag.png"); break;
            }
        }
    }
}