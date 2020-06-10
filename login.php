<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LOGIN FORM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        /* make the body full height*/
        height: 90vh;
        /* set our custom font */
        font-family: 'Roboto',
            sans-serif;
        /* create a linear gradient*/
        background-image: linear-gradient(to right, var(--body_gradient_left), var(--body_gradient_right));
        display: flex;
    }

    #form_wrapper {
        width: 1300px;
        height: 550px;
        /* this will help us center it*/
        margin: auto;
        background-color: var(--form_bg);
        border-radius: 50px;
        /* make it a grid container*/
        display: grid;
        /* with two columns of same width*/
        grid-template-columns: 1fr 1fr;
        /* with a small gap in between them*/
        grid-gap: 5vw;
        /* add some padding around */
        padding: 5vh 15px;
    }

    #form_left {
        /* center the image */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #form_left img {
        margin-left: 5%;
        width: 500px;
        height: 450px;
    }

    #form_right {
        display: grid;
        /* single column layout */
        grid-template-columns: 1fr;
        /* have some gap in between elements*/
        grid-gap: 20px;
        padding: 10% 5%;
    }

    .input_container {
        background-color: var(--input_bg);
        /* vertically align icon and text inside the div*/
        display: flex;
        align-items: center;
        padding-left: 20px;
    }

    .input_container:hover {
        background-color: var(--input_hover);
    }

    .input_container,
    #input_submit {
        height: 60px;
        /* make the borders more round */
        border-radius: 30px;
        width: 100%;
    }

    .input_field {
        /* customize the input tag with lighter font and some padding*/
        color: var(--icon_color);
        background-color: inherit;
        width: 90%;
        border: none;
        font-size: 1.3rem;
        font-weight: 400;
        padding-left: 30px;
    }

    .input_field:hover,
    .input_field:focus {
        /* remove the outline */
        outline: none;
    }

    #input_submit {
        /* submit button has a different color and different padding */
        background-color: var(--submit_bg);
        padding-left: 0;
        font-weight: bold;
        color: white;
        text-transform: uppercase;
    }

    #input_submit:hover {
        background-color: var(--submit_hover);
        /* simple color transition on hover */
        transition: background-color,
            1s;
        cursor: pointer;
    }

    h1,
    span {
        text-align: center;
    }

    /* shift it a bit lower */
    #create_account {
        display: block;
        position: relative;
        top: 30px;
    }

    a {
        /* remove default underline */
        text-decoration: none;
        color: var(--submit_bg);
        font-weight: bold;
    }

    a:hover {
        color: var(--submit_hover);
    }

    i {
        color: var(--icon_color);
    }

    @media screen and (max-width:768px) {

        /* make the layout  a single column and add some margin to the wrapper */
        #form_wrapper {
            grid-template-columns: 1fr;
            margin-left: 10px;
            margin-right: 10px;
        }

        /* on small screen we don't display the image */
        #form_left {
            display: none;
        }
    }

    :root {
        --body_gradient_left: #7200D0;
        --body_gradient_right: #7200D0;
        --form_bg: #ffffff;
        --input_bg: #E5E5E5;
        --input_hover: #eaeaea;
        --submit_bg: #1FCC44;
        --submit_hover: #40e263;
        --icon_color: #6b6b6b;
    }
    </style>
</head>

<body>
    <div id="form_wrapper">
        <div id="form_left">
            <img src="assets/img/profil_desa/profileDesa.png" alt="computer icon">
        </div>
        <div id="form_right">
            <h1>SELAMAT DATANG</h1>
            <form name="form" action="cek_login.php" id="loginF" method="post">
                <div class="input_container" style="margin-bottom:5%">
                    <i class="fas fa-envelope"></i>
                    <input placeholder="Username" type="text" name="username" id="field_email" class='input_field'>
                </div>
                <div class="input_container" style="margin-bottom:5%">
                    <i class="fas fa-lock"></i>
                    <input placeholder="Password" type="password" name="password" id="field_password"
                        class='input_field'>
                </div>
                <input type="submit" name="submit" value="Masuk" id='input_submit' class='input_field'>
            </form>
            <span id='create_account' style="margin-top:-10%">
                <a href="register/register.php">DAFTAR SEKARANG ➡ </a>
            </span>
        </div>
    </div>
</body>

</html>