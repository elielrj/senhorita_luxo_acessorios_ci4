<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="<?=url_to('/')?>">Senhorita Luxo Acessórios<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="<?= $home ?? '' ?>">
                    <a class="nav-link" href="<?= url_to('/') ?>">Home</a>
                </li>
                <li class="<?= $shop ?? '' ?>"><a class="nav-link" href="<?= url_to('shop') ?>">Shop</a></li>
                <li class="<?= $about ?? '' ?>"><a class="nav-link" href="<?= url_to('about') ?>">About us</a></li>
                <li class="<?= $services ?? '' ?>"><a class="nav-link" href="<?= url_to('services') ?>">Services</a>
                </li>
                <li class="<?= $blog ?? '' ?>"><a class="nav-link" href="<?= url_to('blog') ?>">Blog</a></li>
                <li class="<?= $contato ?? '' ?>"><a class="nav-link" href="<?= url_to('contato') ?>">Contato us</a>
                </li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li><a class="nav-link" href="#"><img src="<?= base_url('assets/images/user.svg') ?>"></a></li>
                <li><a class="nav-link" href="<?= url_to('carrinho') ?>"><img
                                src="<?= base_url('assets/images/cart.svg') ?>"></a></li>
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->