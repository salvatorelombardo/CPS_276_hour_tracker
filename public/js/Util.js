"usestrict";

var Util = {}

Util.getEl = function (input) {

    return document.querySelectorAll(input)

}

if (window.addEventListener) {

    Util.addList = function (ele, event, func) {
        if (ele) {
            ele.addEventListener(event, func, false);
        }
    }

    Util.stProp = function (event) {

        event.stopPropagation();
    }

    Util.prDef = function (event) {
        event.preventDefault();
    }

    Util.remLis = function (ele, event, func) {

        if (ele) {
            ele.removeEventListener(event, func, false);
        }

    }

}

if (window.attachEvent) {
    Util.addLis = function (ele, event, func) {
        if (ele) {
            ele.attachEvent("on" + type, listener2);
        }
    };

    Util.stProp = function (event) {
        event.cancelBubble = true;
    };

    Util.prDef = function (event) {
        event.returnValue = false;
    };

    Util.remLis = function (ele, event, func) {
        if (ele) {
            ele.detachEvent(event, func);
        }
    };

}

Util.sendRequest = function (url, callback, postData, file) {

    if (file === undefined) {
        file = false;
    }

    var req = new XMLHttpRequest();

    if (!req) {

        return;
    }

    var method = (postData) ? "POST" : "GET";

    req.open(method, url, true);

    if (postData && !file) {
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }

    req.onreadystatechange = function () {

        if (req.readyState != 4) return;
        if (req.status !== 200 && req.status !== 304) {
            return
        }
        callback(req);
    }

    if (req.readyState === 4) {
        return;
    }


    if (postData && !file) {
        req.send("data=" + postData);
    } else {
        req.send(null);
    }




}

Util.XMLHttpFactories = [
    function () {
        return new XMLHttpRequest();
    },
    function () {
        return new ActiveXObject("Msxml2.XMLHTTP");
    },
    function () {
        return new ActiveXObject("Msxml3.XMLHTTP");
    },
    function () {
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
];




Util.msgBox = function (obj) {

    var msgBox = '<div class="box">';
    msgBox += '<div class="heading"></div>';
    msgBox += '<div class="body"></div>';
    msgBox += '<div>';
    msgBox += '<input type="button" id="lftBtn" value="left"><input type="button"';
    msgBox += ' id="rghBtn" value="right">';
    msgBox += '</div></div>';
    this.getEl('#msgBox')[0].style.display = 'block';
    this.getEl('#msgBox')[0].innerHTML = msgBox;
    this.msgBoxStyle(obj);
    // return
}

Util.msgBoxStyle = function (obj) {

    this.getEl('.heading')[0].innerHTML = obj.heading.text;
    this.getEl('.body')[0].innerHTML = obj.body.text

    if (obj.heading.color) {
        this.getEl('heading')[0].style.color = obj.heading.color
    }


}