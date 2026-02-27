<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= $data['title']; ?> - EquipLend</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#135bec",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                    },
                    fontFamily: {
                        "display": ["Inter"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "1rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display transition-colors duration-200">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar Navigation -->
    <aside class="w-64 flex-shrink-0 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 flex flex-col transition-all duration-300">
        <div class="p-6 flex items-center gap-3">
            <div class="bg-primary size-10 rounded-lg flex items-center justify-center text-white shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined">inventory_2</span>
            </div>
            <div class="flex flex-col">
                <h1 class="text-slate-900 dark:text-white font-bold text-lg leading-tight">EquipLend</h1>
                <span class="text-slate-500 dark:text-slate-400 text-xs font-medium uppercase tracking-wider">Management</span>
            </div>
        </div>
        
        <nav class="flex-1 px-4 py-2 space-y-1 overflow-y-auto no-scrollbar">
            <div class="pb-2 px-2 text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">Main Menu</div>
            
            <?php
            $menus = [
                [
                    'title' => 'Overview',
                    'icon' => 'dashboard',
                    'url' => BASE_URL . '/admin',
                    'active_checks' => ['Dashboard Admin']
                ],
                [
                    'title' => 'Users',
                    'icon' => 'group',
                    'url' => BASE_URL . '/admin/users',
                    'active_checks' => ['Manajemen User']
                ],
                [
                    'title' => 'Equipment',
                    'icon' => 'construction',
                    'url' => BASE_URL . '/admin/alat',
                    'active_checks' => ['Manajemen Alat']
                ],
                [
                    'title' => 'Categories',
                    'icon' => 'category',
                    'url' => BASE_URL . '/admin/kategori',
                    'active_checks' => ['Manajemen Kategori']
                ],
                [
                    'title' => 'Transactions',
                    'icon' => 'swap_horiz',
                    'url' => BASE_URL . '/admin/peminjaman',
                    'active_checks' => ['Laporan Peminjaman']
                ]
            ];

            foreach ($menus as $menu) {
                $isActive = in_array($data['title'], $menu['active_checks']);
                $activeClass = $isActive 
                    ? 'bg-primary/10 text-primary border border-primary/10' 
                    : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border border-transparent';
                
                $fontClass = $isActive ? 'font-semibold' : 'font-medium';

                echo '
                <a class="flex items-center gap-3 px-3 py-2.5 text-sm '.$fontClass.' rounded-lg transition-colors '.$activeClass.'" href="'.$menu['url'].'">
                    <span class="material-symbols-outlined">'.$menu['icon'].'</span>
                    <span>'.$menu['title'].'</span>
                </a>';
            }
            ?>

            <div class="pt-6 pb-2 px-2 text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">System</div>
            <?php
            $sysMenus = [
                [
                    'title' => 'Logs',
                    'icon' => 'history',
                    'url' => BASE_URL . '/admin/logs',
                    'active_checks' => ['System Logs']
                ],
                [
                    'title' => 'Settings',
                    'icon' => 'settings',
                    'url' => BASE_URL . '/admin/settings',
                    'active_checks' => ['System Settings']
                ]
            ];
            
            foreach ($sysMenus as $menu) {
                $isActive = in_array($data['title'], $menu['active_checks']);
                $activeClass = $isActive 
                    ? 'bg-primary/10 text-primary border border-primary/10' 
                    : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 border border-transparent';
                
                $fontClass = $isActive ? 'font-semibold' : 'font-medium';

                echo '
                <a class="flex items-center gap-3 px-3 py-2.5 text-sm '.$fontClass.' rounded-lg transition-colors '.$activeClass.'" href="'.$menu['url'].'">
                    <span class="material-symbols-outlined">'.$menu['icon'].'</span>
                    <span>'.$menu['title'].'</span>
                </a>';
            }
            ?>
        </nav>

        <div class="p-4 border-t border-slate-200 dark:border-slate-800">
             <a href="<?= BASE_URL; ?>/auth/logout" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 rounded-lg hover:bg-rose-100 hover:text-rose-600 dark:hover:bg-rose-900/30 dark:hover:text-rose-400 transition-colors">
                <span class="material-symbols-outlined text-base">logout</span>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col overflow-y-auto">
        <!-- Top Navigation -->
        <header class="h-16 flex-shrink-0 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 px-8 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center gap-4 w-1/2">
                <div class="relative w-full max-w-md">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    <input class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-xl pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary transition-all placeholder:text-slate-500 dark:text-white" placeholder="Search equipment, users or transactions..." type="text"/>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-2 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors relative">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
                </button>
                <div class="h-8 w-[1px] bg-slate-200 dark:bg-slate-800"></div>
                <div class="flex items-center gap-3 pl-2">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-slate-900 dark:text-white"><?= $_SESSION['nama'] ?? 'Admin'; ?></p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Administrator</p>
                    </div>
                    <div class="size-10 rounded-full bg-slate-200 dark:bg-slate-800 border-2 border-primary/20 p-0.5 flex justify-center items-center font-bold text-primary">
                         <?= substr($_SESSION['nama'] ?? 'A', 0, 1); ?>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-8">
             <div class="mb-6">
                <?php Flasher::flash(); ?>
            </div>