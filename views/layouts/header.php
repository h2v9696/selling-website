<header>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  href="?controller=pages&action=home">
                    <img src="views/assets/images/cart_logo.png" height="50" width="50">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/final">Home</a></li>
                    <li><a href="?controller=products&action=indexType">Category</a></li>
                    <li><a href="?controller=products&action=index">Products</a></li>
                    <li><a href="?controller=carts&action=show">Cart</a></li>
                    <li><a href="?controller=pages&action=about">About</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="navbar-form" role="search" method="get" action="index.php">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="keyword">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                        </form>
                    </li>
                    <?php if(!isset($_SESSION['user_name'])) { ?>
                    <li><a href="?controller=users&action=show_login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="?controller=users&action=create"><span class="glyphicon glyphicon-pencil"></span> Signup</a></li>
                    <?php } else { ?>
                        <li><a href="?controller=users&action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>Just Clothes</h1>
            <p>Just Buy It</p>
        </div>
    </div>
</header>