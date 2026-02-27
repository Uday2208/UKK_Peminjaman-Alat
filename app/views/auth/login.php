<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Aplikasi Peminjaman Alat</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
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
                        "2xl": "2rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark min-h-screen flex items-center justify-center p-4">
    <!-- Main Container -->
    <div class="w-full max-w-[1200px] flex flex-col items-center">
        <!-- Branding Top -->
        <div class="mb-8 flex items-center gap-2">
            <div class="bg-primary p-2 rounded-lg text-white">
                <span class="material-symbols-outlined text-3xl">inventory_2</span>
            </div>
            <span class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Aplikasi Peminjaman
                Alat</span>
        </div>

        <!-- Login Card -->
        <div
            class="bg-white dark:bg-slate-900 w-full max-w-[460px] rounded-2xl shadow-xl border border-slate-200/60 dark:border-slate-800 overflow-hidden">
            <div class="p-8 md:p-10">
                <!-- Header -->
                <div class="text-center mb-10">
                    <h1 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Selamat Datang Kembali</h1>
                    <p class="text-slate-500 dark:text-slate-400 text-sm">Masuk untuk mengelola peminjaman alat</p>
                </div>

                <!-- Flash Message -->
                <div class="mb-6">
                    <?php Flasher::flash(); ?>
                </div>

                <!-- Form -->
                <form class="space-y-6" action="<?= BASE_URL; ?>/auth/login" method="post">
                    <!-- Username -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 ml-1" for="username">
                            Username
                        </label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">person</span>
                            </div>
                            <input
                                class="w-full pl-11 pr-4 py-3.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-slate-900 dark:text-white placeholder:text-slate-400"
                                id="username" name="username" placeholder="Masukkan username" type="text" required />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center ml-1">
                            <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="password">
                                Password
                            </label>
                            <!-- <a class="text-xs font-semibold text-primary hover:underline transition-all" href="#">Lupa password?</a> -->
                        </div>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">lock</span>
                            </div>
                            <input
                                class="w-full pl-11 pr-12 py-3.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-slate-900 dark:text-white placeholder:text-slate-400"
                                id="password" name="password" placeholder="••••••••" type="password" required />
                            <button
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors"
                                type="button" onclick="togglePassword()">
                                <span class="material-symbols-outlined text-xl" id="toggleIcon">visibility</span>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center gap-2 ml-1">
                        <input
                            class="w-4 h-4 rounded border-slate-300 text-primary focus:ring-primary/30 transition-all cursor-pointer"
                            id="remember" type="checkbox" />
                        <label class="text-sm text-slate-600 dark:text-slate-400 cursor-pointer select-none"
                            for="remember">Ingat Saya</label>
                    </div>

                    <!-- Login Button -->
                    <button
                        class="w-full bg-primary hover:bg-primary/90 active:scale-[0.98] text-white font-bold py-4 rounded-lg shadow-lg shadow-primary/25 transition-all flex items-center justify-center gap-2"
                        type="submit">
                        <span>Masuk</span>
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-100 dark:border-slate-800"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-white dark:bg-slate-900 px-3 text-slate-400 font-medium">Akses Terbatas</span>
                    </div>
                </div>

                <!-- Footer CTA -->
                <div class="text-center">
                    <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Belum punya akun?
                        <a class="text-primary font-bold hover:underline ml-1" href="#">Hubungi Admin</a>
                    </p>
                </div>
            </div>

            <!-- Bottom Status Bar -->
            <div
                class="bg-slate-50 dark:bg-slate-800/40 px-8 py-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-center gap-4">
                <div class="flex items-center gap-1.5 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                    <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Sistem Operasional
                </div>
                <div class="h-1 w-1 bg-slate-300 dark:bg-slate-700 rounded-full"></div>
                <!-- <div class="flex items-center gap-1 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                    <span class="material-symbols-outlined text-[12px]">security</span>
                    Terenkripsi SSL
                </div> -->
                <!-- Removed SSL claim as localhost usually not SSL -->
                <div class="flex items-center gap-1 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                    v1.0.0
                </div>
            </div>
        </div>

        <!-- External Footer Links -->
        <footer class="mt-12 flex flex-wrap justify-center gap-x-8 gap-y-2">
            <a class="text-xs font-medium text-slate-400 hover:text-primary transition-colors" href="#">Kebijakan
                Privasi</a>
            <a class="text-xs font-medium text-slate-400 hover:text-primary transition-colors" href="#">Syarat &
                Ketentuan</a>
            <a class="text-xs font-medium text-slate-400 hover:text-primary transition-colors" href="#">Bantuan</a>
        </footer>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = 'visibility_off';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = 'visibility';
            }
        }
    </script>
</body>

</html>