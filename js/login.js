var config = {
    apiKey: "AIzaSyDJghWeCxA0rNRRaHE_sG7qI5clFY3pSbo",
    authDomain: "fyps-84588.firebaseapp.com",
    databaseURL: "https://fyps-84588.firebaseio.com",
    projectId: "fyps-84588",
    storageBucket: "fyps-84588.appspot.com",
    messagingSenderId: "130526592260"
};
firebase.initializeApp(config);


$('#submitBtn').click(function () {
    var usernameInput = document.getElementById('username1').value;
    var passwordInput = document.getElementById('password1').value;
    console.log('button clicked');
    loginFire(usernameInput,passwordInput);
});
$('#gotoRegister').click(function () {
    window.location.href = 'register.html';
});


function loginFire(email,password) {
    firebase.auth().signInWithEmailAndPassword(email, password).then(function (success) {

        document.getElementById('alertI').hidden = false;
        document.getElementById('alertI').classList.add('alert-success');
        document.getElementById('alertI').innerHTML = 'Success!';
    }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;


        document.getElementById('alertI').hidden = false;
        document.getElementById('alertI').classList.add('alert-danger');
        document.getElementById('alertI').innerHTML = errorMessage;
        console.log(error);
        // ...
    });
}

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        // User is signed in.
        console.log(user);
        var userID = user.uid;
        var userRead2 = firebase.database().ref('users/' + userID);
        userRead2.on('value', function(snapshot) {
            console.log(snapshot.val().role);
            var userRole = snapshot.val().role;
            var userName1 = snapshot.val().fname + ' ' + snapshot.val().lname;
            console.log(userName1);
            if (userRole == 'Student'){
                console.log('this is a student');
                setTimeout(function () {
                    document.location.href = 'index-1.html';
                },10000);
            }else if (userRole == 'Supervisor') {
                console.log('switch to supervisor');
                setTimeout(function () {
                    document.location.href = 'index-2.html';
                },1000);
            }else if (userRole == 'Lead Lecturer') {
                console.log('This is a lead lecturer');
                setTimeout(function () {
                    document.location.href = 'index-0.html';
                },1000);
            }


        });

    } else {
        // No user is signed in.
        console.log('signed out current user');
    }
});
