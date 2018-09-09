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

};

Util.msgBox = function (obj) {

    // var msgBox = '<div id=""></div>';
    this.getEl('#msgBox')[0].style.display = 'block';
    this.getEl('#msgBox')[0].innerHTML = msgBox;
    this.msgBoxStyle(obj);
    return
}

Util.msgBoxStyle = function (obj) {


}