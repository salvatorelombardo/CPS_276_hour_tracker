'use strict';

var ac = {}

ac.init = function () {

    if (Util.getEl('#addjobhoursBtn').length != 0) {

        Util.addLis(Util.getEl('#addjobhoursBtn')[0], 'click', ac.addViewHours)
    }

    if (Util.getEl('#addDeleteJobHours').length != 0) {

        ac.jobHoursTable()

        Util.addLis(Util.getEl('#addDeleteJobHours')[0], 'click', ac.editDeleteTable);

    }



}

ac.editDeleteTable = function (e) {

    var row = e.target.parentNode.parentNode.rowIndex;

    // console.log(row);
    e.preventDefault();

    if (e.target.value == "Delete") {

        var data = {};
        data.id = e.target.id.substr(1);
        Util.getEl('#editDeleteTable')[0].deleteRow(row)

        data.flag = 'deleteTableRow';


        console.log(data)

        data = JSON.stringify(data);

        Util.sendRequest('../xhr/routes.php', function (res) {

            var response = JSON.parse(res.responseText);

            console.log(response);

        }, data)

    }

}

ac.jobHoursTable = function () {

    var data = {};
    data.flag = 'getJobHourTable';

    data = JSON.stringify(data);

    Util.sendRequest('../xhr/routes.php', function (res) {

        // var response = JSON.parse(res.responseText);
        // Util.getEl('#addDeleteJobHours')[0].innerHTML = '';
        Util.getEl('#addDeleteJobHours')[0].innerHTML = res.responseText;



        // return;

    }, data)


}


ac.addViewHours = function () {

    var data = {},
        i = 0;

    data.elements = [{
        id: 'jobDate',
        regex: 'dateFormat',
        msg: 'You must select a date',
        status: 'checking',
    }, {
        id: 'hours',
        regex: 'job_hours',
        msg: 'You must enter the hours.  Use a decimal for partial hours (ex 1 and 1/2 hours is 1.5)',
        status: 'checking'
    }, {
        id: 'description',
        regex: 'text',
        msg: 'You must enter a description',
        status: 'checking'
    }]


    data.masterstatus = "checking";
    data.flag = "addViewHours";

    while (i < data.elements.length) {
        data.elements[i].value = Util.getEl('#' + data.elements[i].id)[0].value;
        console.log(data.elements[i].value)
        i++;


    }

    data = JSON.stringify(data);

    // console.log(data);

    Util.sendRequest('../xhr/routes.php', function (res) {

        gen.clearErrors();

        // var response = JSON.parse(res.responseText);

        Util.getEl('#addDeleteJobHours')[0].innerHTML = '';
        Util.getEl('#addDeleteJobHours')[0].innerHTML = res.responseText;


        gen.clearInputFields(Util.getEl('.form-control'));

    }, data)




    // return
}


ac.init()