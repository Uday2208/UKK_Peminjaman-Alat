<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        <?= $data['title']; ?> -
    </title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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

        .soft-shadow {
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <!-- Navigation Bar -->
        <header
            class="sticky top-0 z-40 w-full border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md px-6 lg:px-10 py-3">
            <div class="max-w-[1400px] mx-auto flex items-center justify-between gap-8">
                <div class="flex items-center gap-8">
                    <div class="flex items-center gap-3 text-primary">
                        <div class="size-8 bg-primary rounded-lg flex items-center justify-center text-white">
                            <span class="material-symbols-outlined">inventory_2</span>
                        </div>
                        <h2 class="text-slate-900 dark:text-white text-xl font-bold leading-tight tracking-tight">
                            Peminjam</h2>
                    </div>
                    <nav class="hidden md:flex items-center gap-6">
                        <?php
                        $navItems = [
                            'Dashboard Peminjam' => BASE_URL . '/peminjam',
                            'Riwayat Peminjaman' => BASE_URL . '/peminjam/riwayat'
                        ];

                        foreach ($navItems as $title => $url) {
                            $isActive = ($data['title'] == $title);
                            $class = $isActive
                                ? 'text-primary text-sm font-bold border-b-2 border-primary pb-1'
                                : 'text-slate-600 dark:text-slate-400 text-sm font-semibold hover:text-primary transition-colors';

                            $displayTitle = $title;
                            if ($title == 'Dashboard Peminjam')
                                $displayTitle = 'Dashboard';
                            if ($title == 'Riwayat Peminjaman')
                                $displayTitle = 'Riwayat Saya';

                            echo '<a class="' . $class . '" href="' . $url . '">' . $displayTitle . '</a>';
                        }
                        ?>
                    </nav>
                </div>
                <div class="flex flex-1 justify-end items-center gap-4">
                    <a href="<?= BASE_URL; ?>/auth/logout"
                        class="flex items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30 size-10 text-red-600 dark:text-red-400 hover:bg-red-200 transition-colors"
                        title="Logout">
                        <span class="material-symbols-outlined">logout</span>
                    </a>
                    <div class="h-10 w-[1px] bg-slate-200 dark:bg-slate-800 mx-2"></div>
                    <div class="flex items-center gap-3">
                        <div class="text-right hidden lg:block">
                            <p class="text-sm font-bold leading-none">
                                <?= $_SESSION['nama'] ?? 'User'; ?>
                            </p>
                            <p class="text-xs text-slate-500 mt-1">Peminjam</p>
                        </div>
                        <div
                            class="bg-primary/10 text-primary rounded-full size-10 flex items-center justify-center font-bold text-lg">
                            <?= substr($_SESSION['nama'] ?? 'U', 0, 1); ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="max-w-[1400px] mx-auto w-full px-6 lg:px-10 py-8">
            <div class="mb-6">
                <?php Flasher::flash(); ?>
            </div>