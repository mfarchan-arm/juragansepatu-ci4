<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Login & Register | <?php echo get_store_name(); ?></title>
    <link rel="icon" href=<?= get_store_logo();  ?>>
    <link rel="stylesheet" href=<?= base_url('assets/login/css/main.css') ?>>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="#" class="sign-in-form" action="<?= route_to('login') ?>" method="post">

                    <h2 class="title">Sign in</h2>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <?php if ($config->validFields === ['email']) : ?>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="email" name="login" placeholder="Email" required/>
                        </div>
                    <?php else : ?>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" name="login" placeholder="Username" required/>
                        </div>
                    <?php endif; ?>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required/>
                    </div>
                    <input type="submit" value="Login" class="btn solid" <?= lang('Auth.loginAction') ?> />
                </form>

                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= csrf_field() ?>
                <form action="<?= route_to('register') ?>" method="post" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" placeholder="Fullname" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="pass_confirm" placeholder="Repeat Password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="text" name="phone_number" placeholder="Phone Number" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="text" name="address" placeholder="Address" />
                    </div>
                    <input type="submit" class="btn" value="Sign up" <?= lang('Auth.register') ?> />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Silahkan registrasi akun untuk berbelanja di toko kami dengan meng-klik tombol Sign Up.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="assets/login/img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Silahkan login jika sudah memiliki akun dengan meng-klik tombol Sign In.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="assets/login/img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src=<?= base_url('assets/login/js/main.js') ?>></script>

    <script async="" src=<?= base_url('assets/login/js') ?>></script>
</body>

</html>