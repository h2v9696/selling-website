<?php
if(!isset($_SESSION['user_name']))
{
    ?>
    <section class="main-container">
        <div class="main-wrapper">
            <h2 align="center">Login</h2>
            <form class="login-form" action="/final/index.php" method="post">
                <input type="text" name="user_name" placeholder="Username"> <br>
                <input type="password" name="pwd" placeholder="Password"> <br> <br>
                <?php
                if(isset($_SESSION['Login_Error']))
                {
                    if($_SESSION['Login_Error'] == 1) {
                        echo '<h4 align="center"><font color="red">Wrong username or password</font></h4>';
                    $_SESSION['Login_Error'] = 0;}
                }
                ?>
                <button type="submit" name="login" >Login</button>
            </form>
        </div>
    </section>
    <?php
}
else
{
    ?>
    <li><a  href="/final"><p align="center">You had logged in, back to home</p></a></li>
    <?php
}
?>

