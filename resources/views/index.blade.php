<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up form</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="container">
        <section class="intro">
            <h1>Learn to code by watching others</h1>
            <p class="introText">
                See how experienced developers solve problems in real-time.
                Watching scripted tutorials is great, but understanding how
                developers think is invaluable.
            </p>
        </section>

        <section class="form">
            <div class="card">
                <p class="cardText">
                    <strong>Try it free 7 days</strong> then $20/mo. thereafter
                </p>
            </div>

            <form action="backend/register.php" method="post" id="form" novalidate>
                <input type="text" id="firstName" name="firstName" placeholder="First Name" required/>
                <p id="firstNameError"></p>
                <input type="text" id="lastName" name="lastName" placeholder="Last Name" required/>
                <p id="lastNameError"></p>               
                <input type="email" id="email" name="email" placeholder="Email Address" required/>
                <p id="emailError"></p>   
                <input type="password" id="password" name="password" placeholder="Password" required/>
                <p id="passwordError"></p>   
                <button type="submit" id="btnClaim">CLAIM YOUR FREE TRIAL</button>
                <p id="formTerms">
                    By clicking the button, you are agreeing to
                    our <a href="#">Terms and Services</a>
                </p>
            </form>
        </section>
    </main>   
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>