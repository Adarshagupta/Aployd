<!-- Header Styles -->
<style>
    .header {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(12px);
        z-index: 50;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .nav-link {
        color: #888;
        font-size: 0.875rem;
        font-weight: 500;
        transition: color 0.2s ease;
    }
    .nav-link:hover {
        color: #fff;
    }
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem;
        font-weight: 500;
        border-radius: 0.375rem;
        text-align: center;
        transition: all 0.2s ease;
        height: 2.5rem;
    }
    .btn-primary {
        background-color: #fff;
        color: #000;
    }
    .btn-primary:hover {
        background-color: #f1f1f1;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .btn-secondary {
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
    }
    .btn-secondary:hover {
        border-color: rgba(255, 255, 255, 0.4);
        background-color: rgba(255, 255, 255, 0.05);
        transform: translateY(-1px);
    }
</style>

<!-- Header Component -->
<header class="header">
    <div class="container mx-auto px-6">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img class="h-8 w-auto" src="{{ asset('svgs/coolify-logo.png') }}" alt="Coolify Logo">
                    <span class="ml-2 text-lg font-semibold">Coolify</span>
                </a>
            </div>
            <div class="flex items-center space-x-8">
                <a href="#features" class="nav-link">Features</a>
                <a href="{{ route('pricing') }}" class="nav-link">Pricing</a>
                <a href="https://coolify.io/docs" class="nav-link">Documentation</a>
                <a href="https://github.com/coollabsio/coolify" class="nav-link">GitHub</a>
                <div class="hidden sm:flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="btn btn-secondary">Sign in</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Sign up</a>
                </div>
            </div>
        </div>
    </div>
</header> 