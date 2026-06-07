<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Disnakertrans Kab. Banjar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0f172a;
            --primary-light: #1e293b;
            --accent: #3b82f6;
            --accent-hover: #2563eb;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #334155;
            --text-muted: #64748b;
            --sidebar-width: 280px;
            --header-height: 70px;
            --radius: 12px;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        * {
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background-color: var(--bg-body);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--primary);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            scrollbar-width: thin;
            scrollbar-color: var(--primary-light) var(--primary);
        }

        .sidebar-header {
            padding: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar-header .logo-container {
            width: 50px;
            height: 50px;
            background: var(--accent);
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 12px;
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }

        .sidebar-header h3 {
            margin: 0;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-align: center;
        }

        .sidebar-header small {
            opacity: 0.5;
            font-size: 0.75rem;
            margin-top: 4px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 16px;
            margin: 0;
        }

        .menu-label {
            padding: 12px 16px 8px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
            letter-spacing: 1px;
        }

        .menu-item {
            margin-bottom: 4px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: var(--radius);
            transition: 0.2s;
            font-size: 0.925rem;
            font-weight: 500;
        }

        .menu-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: white;
        }

        .menu-link.active {
            background-color: var(--accent);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
        }

        .menu-link i:first-child {
            width: 24px;
            margin-right: 12px;
            font-size: 1.1rem;
            text-align: center;
        }

        .submenu {
            list-style: none;
            padding: 4px 0 4px 36px;
            margin: 0;
            display: none;
        }

        .menu-item.open .submenu {
            display: block;
        }

        .menu-item.open .fa-chevron-right {
            transform: rotate(90deg);
        }

        .fa-chevron-right {
            margin-left: auto;
            font-size: 0.75rem;
            transition: 0.3s;
            opacity: 0.5;
        }

        .submenu-link {
            display: block;
            padding: 8px 16px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.875rem;
            border-radius: 8px;
            transition: 0.2s;
        }

        .submenu-link:hover {
            color: white;
            padding-left: 20px;
        }

        /* Main Content */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            transition: all 0.3s;
        }

        header {
            height: var(--header-height);
            background-color: var(--bg-card);
            padding: 0 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 900;
            box-shadow: var(--shadow-sm);
            border-bottom: 1px solid #f1f5f9;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--primary);
            cursor: pointer;
        }

        .page-info h2 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .user-nav {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 6px 6px 12px;
            background: #f1f5f9;
            border-radius: 50px;
            cursor: pointer;
            transition: 0.2s;
        }

        .user-nav:hover {
            background: #e2e8f0;
        }

        .user-nav .avatar {
            width: 32px;
            height: 32px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.8rem;
        }

        .user-nav span {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .content-container {
            padding: 32px;
            flex: 1;
        }

        /* Common Components */
        .card {
            background: var(--bg-card);
            padding: 24px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid #f1f5f9;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: 0.2s;
            text-decoration: none;
            gap: 8px;
            border: none;
        }

        .btn-primary {
            background: var(--accent);
            color: white;
        }

        .btn-primary:hover {
            background: var(--accent-hover);
            transform: translateY(-1px);
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        th {
            background: #f8fafc;
            padding: 12px 16px;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            border-bottom: 1px solid #f1f5f9;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.875rem;
            vertical-align: middle;
        }

        tr:hover td {
            background-color: #fbfcfe;
        }

        .badge {
            display: inline-flex;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success { background: #dcfce7; color: #166534; }
        .badge-danger { background: #fee2e2; color: #991b1b; }
        .badge-warning { background: #fef3c7; color: #92400e; }
        .badge-info { background: #e0f2fe; color: #075985; }

        footer {
            padding: 24px 32px;
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-muted);
            border-top: 1px solid #f1f5f9;
            background: white;
        }

        /* Form Inputs Modern */
        input, select, textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.95rem;
            transition: 0.2s;
            outline: none;
            background: #ffffff;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-main);
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-wrapper {
                margin-left: 0;
            }
            .mobile-toggle {
                display: block;
            }
            .sidebar-overlay.active {
                display: block;
            }
            header { padding: 0 16px; }
            .content-container { padding: 20px; }
            .user-nav span { display: none; }
        }
    </style>
</head>
<body>
    <div class="sidebar-overlay"></div>
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo-container">
                <i class="fas fa-briefcase"></i>
            </div>
            <h3>DISNAKERTRANS</h3>
            <small>KABUPATEN BANJAR</small>
        </div>
        
        <ul class="sidebar-menu">
            <li class="menu-label">Main Navigation</li>
            @php $menus = \App\Http\Controllers\AdminController::getMenus(); @endphp
            @foreach($menus as $menu)
                <li class="menu-item {{ Request::is(ltrim($menu->url, '/').'*') ? 'open' : '' }}">
                    <a href="{{ $menu->children->count() > 0 ? 'javascript:void(0)' : $menu->url }}" 
                       class="menu-link {{ Request::is(ltrim($menu->url, '/').'*') ? 'active' : '' }}">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->title }}</span>
                        @if($menu->children->count() > 0)
                            <i class="fas fa-chevron-right"></i>
                        @endif
                    </a>
                    @if($menu->children->count() > 0)
                        <ul class="submenu">
                            @foreach($menu->children as $child)
                                <li>
                                    <a href="{{ $child->url }}" class="submenu-link {{ Request::is(ltrim($child->url, '/').'*') ? 'active-sub' : '' }}">
                                        {{ $child->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </aside>

    <div class="main-wrapper">
        <header>
            <div class="header-left">
                <button class="mobile-toggle"><i class="fas fa-bars"></i></button>
                <div class="page-info">
                    <h2>@yield('header_title', 'Dashboard')</h2>
                </div>
            </div>
            <div class="header-right">
                <div class="user-nav">
                    <div class="avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn" style="background: #fee2e2; color: #ef4444; width: 40px; height: 40px; padding: 0; border-radius: 50%;" title="Keluar">
                        <i class="fas fa-power-off"></i>
                    </button>
                </form>
            </div>
        </header>

        <main class="content-container">
            @yield('content')
        </main>

        <footer>
            &copy; {{ date('Y') }} <strong>Dinas Tenaga Kerja dan Transmigrasi Kabupaten Banjar</strong>. Modernize for Better Service.
        </footer>
    </div>

    <script>
        // Mobile Sidebar Toggle
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.sidebar-overlay');
        const toggleBtn = document.querySelector('.mobile-toggle');

        function toggleSidebar() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // Enhanced Submenu Logic
        document.querySelectorAll('.menu-link').forEach(link => {
            link.addEventListener('click', function() {
                const parent = this.parentElement;
                const hasSubmenu = parent.querySelector('.submenu');
                
                if (hasSubmenu) {
                    // Toggle current
                    parent.classList.toggle('open');
                    
                    // Close other open menus (optional, comment out if you want multiple open)
                    document.querySelectorAll('.menu-item').forEach(item => {
                        if (item !== parent) item.classList.remove('open');
                    });
                }
            });
        });

        // Auto-open active menu path
        document.querySelectorAll('.submenu-link.active-sub').forEach(link => {
            link.closest('.menu-item').classList.add('open');
        });
    </script>
</body>
</html>
