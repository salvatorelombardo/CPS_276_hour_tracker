var login = {

}

login.init = function () {

    if (Util.getEl('#login')[0].length != 0) {

        Util.addList(Util.getEl('#login')[0], 'click', login.submit)
    }
}


login.submit = function () {

    var data = {}

    data.email = Util.getEl('#email')[0].value;
    data.password = Util.getEl('#password')[0].value;

    // console.log(data.email, data.password)

    if (data.email.length === 0 || data.password.length === 0) {

        Util.msgBox({
            heading: {
                text: 'Error',
                background: 'red'
            },
            body: {
                text: 'Email and password cannot be blank'
            },
            rightbtn: {
                text: 'Okay',
                background: 'green',
                display: 'block'
            }
        });


    }



}

login.init()