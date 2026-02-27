<!-- Page Heading & Stats Row -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-8">
    <div>
        <h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Equipment Inventory</h1>
        <p class="text-slate-500 dark:text-slate-400 mt-1">Monitor, track, and manage all organization assets.</p>
    </div>
    <div class="flex flex-wrap gap-3">
        <button
            class="flex items-center gap-2 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-4 py-2.5 text-sm font-bold soft-shadow hover:bg-slate-50 dark:hover:bg-slate-750 transition-all">
            <span class="material-symbols-outlined text-xl">file_download</span>
            Export CSV
        </button>
        <!-- Removed "Add New" button as Petugas might not have permission, or we can link it to a modal if they do. Admin usually manages tools. Petugas usually manages loans. -->
    </div>
</div>

<!-- Stats Overview Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow">
        <div class="flex items-center justify-between mb-4">
            <div
                class="size-10 bg-blue-100 dark:bg-blue-900/30 text-primary rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">inventory</span>
            </div>
        </div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Assets</p>
        <h3 class="text-2xl font-black text-slate-900 dark:text-white mt-1"><?= count($data['alat']); ?></h3>
    </div>
    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow">
        <div class="flex items-center justify-between mb-4">
            <div
                class="size-10 bg-amber-100 dark:bg-amber-900/30 text-amber-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">person_pin_circle</span>
            </div>
            <span
                class="text-xs font-bold text-slate-500 bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded-md">Active</span>
        </div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Currently Lent</p>
        <h3 class="text-2xl font-black text-slate-900 dark:text-white mt-1"><?= $data['peminjaman_aktif']; ?></h3>
    </div>
    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow">
        <div class="flex items-center justify-between mb-4">
            <div
                class="size-10 bg-rose-100 dark:bg-rose-900/30 text-rose-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">build</span>
            </div>
        </div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Maintenance</p>
        <h3 class="text-2xl font-black text-slate-900 dark:text-white mt-1">0</h3>
    </div>
    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow">
        <div class="flex items-center justify-between mb-4">
            <div
                class="size-10 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">check_circle</span>
            </div>
            <span
                class="text-xs font-bold text-emerald-600 bg-emerald-100 dark:bg-emerald-900/30 px-2 py-1 rounded-md">Good</span>
        </div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Health Status</p>
        <h3 class="text-2xl font-black text-slate-900 dark:text-white mt-1">Optimal</h3>
    </div>
</div>

<!-- Table Section -->
<div
    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow overflow-hidden">
    <!-- Table Filters -->
    <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex flex-wrap items-center justify-between gap-4">
        <div class="flex flex-wrap items-center gap-3">
            <div class="relative w-full sm:w-80">
                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
                <input
                    class="w-full h-10 pl-10 pr-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary/20 focus:border-primary placeholder:text-slate-400 text-sm"
                    placeholder="Search by name, category..." type="text" />
            </div>
            <div class="relative">
                <select
                    class="appearance-none h-10 pl-4 pr-10 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-sm font-medium focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option>All Categories</option>
                    <?php if (isset($data['kategori'])):
                        foreach ($data['kategori'] as $k): ?>
                            <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                        <?php endforeach; endif; ?>
                </select>
                <span
                    class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
            </div>
        </div>
        <p class="text-sm text-slate-500 dark:text-slate-400 font-medium">Showing <?= count($data['alat']); ?> items</p>
    </div>

    <!-- Main Data Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-850/50">
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Image</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Equipment Name</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Category</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Stock Status</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Status</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700 text-right">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <?php foreach ($data['alat'] as $alat): ?>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors group">
                        <td class="px-6 py-4">
                            <div
                                class="size-12 rounded-lg bg-slate-100 dark:bg-slate-700 overflow-hidden border border-slate-200 dark:border-slate-600">
                                <?php if ($alat['gambar']): ?>
                                    <div class="w-full h-full bg-cover bg-center"
                                        style='background-image: url("<?= BASE_URL; ?>/uploads/<?= $alat['gambar']; ?>");'>
                                    </div>
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="material-symbols-outlined text-slate-400">image</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span
                                    class="text-sm font-bold text-slate-900 dark:text-white"><?= $alat['nama_alat']; ?></span>
                                <span class="text-xs text-slate-500">ID: <?= $alat['id']; ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 text-xs font-semibold rounded-full bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300"><?= $alat['nama_kategori']; ?></span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1 w-32">
                                <div class="flex justify-between text-[10px] font-bold text-slate-500">
                                    <span><?= $alat['stok']; ?> Available</span>
                                </div>
                                <div class="w-full h-1.5 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                    <div class="h-full <?= $alat['stok'] > 0 ? 'bg-emerald-500' : 'bg-rose-500'; ?> rounded-full"
                                        style="width: <?= $alat['stok'] > 10 ? '100%' : ($alat['stok'] > 0 ? '50%' : '5%'); ?>%">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <?php if ($alat['stok'] > 0): ?>
                                    <span class="size-2 rounded-full bg-emerald-500"></span>
                                    <span class="text-sm font-semibold text-emerald-600">Available</span>
                                <?php else: ?>
                                    <span class="size-2 rounded-full bg-rose-500"></span>
                                    <span class="text-sm font-semibold text-rose-600">Out of Stock</span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div
                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button
                                    class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-400 transition-colors"
                                    title="View Details">
                                    <span class="material-symbols-outlined text-xl">visibility</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination (Static for now, but UI present) -->
    <div class="p-5 border-t border-slate-200 dark:border-slate-700 flex items-center justify-between">
        <button
            class="h-10 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-sm font-medium flex items-center gap-2 disabled:opacity-50 transition-colors"
            disabled="">
            <span class="material-symbols-outlined">chevron_left</span>
            Previous
        </button>
        <div class="hidden sm:flex items-center gap-1">
            <button class="size-10 rounded-xl bg-primary text-white text-sm font-bold">1</button>
        </div>
        <button
            class="h-10 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-sm font-medium flex items-center gap-2 hover:bg-slate-50 transition-colors">
            Next
            <span class="material-symbols-outlined">chevron_right</span>
        </button>
    </div>
</div>