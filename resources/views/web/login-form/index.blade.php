<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <title>Login Form</title>
</head>
<body>
    <div class="container">
        <div class="toggle-button" onclick="toggle()"><p id="button-text">Sign Up<br>Sign In</p></div>
        <form action="{{URL::to('RegistrationProcess')}}" id="formAction" class="checkPassword" method="post">
            <div class="title"><h1 id="title-text">Welcome Back<br>Create an Account</h1></div>
            @if(Session::has('danger'))
                @php $message = Session::get('danger'); @endphp
                    <div class="alert alert-danger">{{$message}}</div>
                @php Session::pull('danger'); @endphp
            @endif
            @if(Session::has('success'))
                @php $message = Session::get('success'); @endphp
                    <div class="alert alert-success">{{$message}}</div>
                @php Session::pull('success'); @endphp
            @endif
            <div class="double-field show-field" id="signUp-only">
                <div class="input-div"><p>First Name:</p><input type="text" name="firstName" maxlength="30"></div>
                <span class="spacing"></span>
                <div class="input-div"><p>Last Name:</p><input type="text" name="lastName" maxlength="30"></div>
            </div>
            <div class="input-div"><p>Email:</p><input type="email" name="email" required></div>
            <div class="input-div"><p>Password:</p><input type="password" name="password" class="password" required></div>
            <div class="input-div show-field" id="signUp-only">
                <p>Confirm Password:</p>
                <input type="password" name="password_confirmation" class="confirmPassword">
            </div>
            <button id="button">Sign In</button>
            <p class="error text-danger"></p>
        </form>
    </div>
</body>
    <style>
        body {
            color:white;
            font-family:Arial, Helvetica, sans-serif;
            background-color: #0095FB;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
        }

        .spacing {
            width: 10%;
        }

        form {
            width:50vw;
            min-width: 500px;
            height:100vh;
            min-height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        input {
            color: white;
            background-color: rgba(0, 0, 0, 0.4);
            border: none;
            border-radius: 8px;
            height: 40px;
            font-size: 1.2em;
            outline: none;
            margin: 4px 10px 10px 10px;
            padding: 2px 12px;
            width: 90%;
        }

        .double-field {
            width: 95%;
            display: flex;
        }

        .double-field > div > p {
            padding-left: 0;
        }

        .input-div {
            width: 97%;
            display: flex;
            margin: 10px;
            margin-top: 0;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .input-div > p {
            width: 96%;
            margin: 0;
            padding-left: 2%;
        }

        .toggle-button {
            position: absolute;
            top: 30px;
            right: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 40px;
            border-radius: 25px;
            background-color:rgba(0, 0, 0, 0.4);
            overflow: hidden;
            cursor: pointer;
        }

        #button-text {
            font-weight: bold;
            line-height: 40px;
            text-align: center;
            transition-duration: 0.4s;
            margin: 0;
            user-select: none;
            transform: translateY(-20px);
        }

        .title {
            width: 100%;
            overflow: hidden;
            height: 50px;
            margin-bottom: 24px
        }

        #title-text{
            font-size: 3rem;
            line-height: 80px;
            text-align: center;
            transition-duration: 0.4s;
            margin: 0;
            user-select: none;
            transform: translateY(-94px);
        }

        #button {
            cursor: pointer;
            color: #0095FB;
            font-weight: bold;
            border-radius: 50px;
            border: none;
            outline: none;
            font-size: 1.5em;
            margin: 10px;
            padding: 10px 80px;
            transition-duration: 0.2s;
            width: 251px;
        }

        #button:hover {
            transform: scale(1.05);
        }

        #signUp-only {
            transition-duration: 0.3s;
        }

        .show-field {
            height: 90px;
            opacity: 1;
        }

        .hide-field {
            height: 0px;
            opacity: 0;
        }


    </style>

<!-- jquery Cdn -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>

<script>
    let clicked = true
    const toggle = () => {
        clicked = !clicked
        document.getElementById('button-text').style.transform = (clicked ? 'translateY(-20px)' : 'translateY(20px)')
        document.getElementById('title-text').style.transform = (clicked ? 'translateY(-94px)' : 'translateY(-12px)')
        document.getElementById('button').innerText = (clicked ? 'Sign Up' : 'Sign In')
        document.getElementById('formAction').action = (clicked ? "{{URL::to('RegistrationProcess')}}" : "{{URL::to('loginProcess')}}")
        $(".error").html("");
        if(clicked == true){
            $('#formAction').attr('class','checkPassword');
        }else{
            $('#formAction').attr('class','');
        }
        const hiddenItems = document.querySelectorAll('#signUp-only')
        for (var i = 0; i < hiddenItems.length; i++) {
            var item = hiddenItems[i]
            item.classList.add(clicked ? 'show-field' : 'hide-field')
            item.classList.remove(!clicked ? 'show-field' : 'hide-field')
        }
    }

    $(".checkPassword").on('submit',function (e) {
        var class123 = $(this).attr('class');
        console.log(class123);
        if(class123 == "checkPassword"){
            var password = $(".password").val();
            var confirmPassword = $(".confirmPassword").val();
            if(password != confirmPassword){
                $(".error").html("Your password and confirm password is not match.")
                e.preventDefault();
            }
        }
    })
</script>
</html>
