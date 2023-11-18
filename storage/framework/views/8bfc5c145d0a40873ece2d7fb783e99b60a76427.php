<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?> | <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <h1 class="h5 mb-0"><?php echo e(config('app.name')); ?></h1>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Search bar here. Show it when a user logs in. -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <!-- Home -->
                            <li class="nav-item" title="Home">
                                <a href="<?php echo e(route('index')); ?>" class="nav-link"><i class="fa-solid fa-house text-dark nav-icon"></i></a>
                            </li>

                            <!-- Create Post -->
                            <li class="nav-item" title="Create Post">
                                <a href="<?php echo e(route('post.create')); ?>" class="nav-link"><i class="fa-solid fa-circle-plus text-dark nav-icon"></i></a>
                            </li>

                            <!-- Account -->
                            <li class="nav-item dropdown">
                                <button id="account-dropdown" class="btn shadow-none nav-link" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php if(Auth::user()->avatar): ?>
                                        <img src="<?php echo e(asset('storage/avatars/' . Auth::user()->avatar)); ?>" alt="<?php echo e(Auth::user()->avatar); ?>" class="rounded-circle nav-avatar">
                                    <?php else: ?>
                                        <i class="fa-solid fa-circle-user text-dark nav-icon"></i>
                                    <?php endif; ?>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="account-dropdown">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                    <!-- Admin Controls -->
                                    <a href="<?php echo e(route('admin.users')); ?>" class="dropdown-item">
                                        <i class="fa-solid fa-user-gear"></i> Admin
                                    </a>

                                    <hr class="dropdown-divider">
                                    <?php endif; ?>
                                    
                                    <!-- Profile -->
                                    <a href="<?php echo e(route('profile.show', Auth::user()->id)); ?>" class="dropdown-item">
                                        <i class="fa-solid fa-circle-user"></i> Profile
                                    </a>

                                    <!-- Logout -->
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i> <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Admin controls -->
                    <?php if(request()->is('admin/*')): ?>
                        <div class="col-3">
                            <div class="list-group">
                                <a href="<?php echo e(route('admin.users')); ?>" class="list-group-item <?php echo e(request()->is('admin/users') ? 'active' : ''); ?>">
                                    <i class="fa-solid fa-users"></i> Users
                                </a>
                                <a href="<?php echo e(route('admin.posts')); ?>" class="list-group-item <?php echo e(request()->is('admin/posts') ? 'active' : ''); ?>">
                                    <i class="fa-solid fa-newspaper"></i> Posts
                                </a>
                                <a href="<?php echo e(route('admin.categories')); ?>" class="list-group-item <?php echo e(request()->is('admin/categories') ? 'active' : ''); ?>">
                                    <i class="fa-solid fa-tags"></i> Categories
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-9">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php /**PATH /work/resources/views/layouts/app.blade.php ENDPATH**/ ?>