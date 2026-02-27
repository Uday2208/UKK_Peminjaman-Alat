<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Manajemen Alat</h1>
    <button onclick="openModal('tambahAlatModal')"
        class="flex items-center gap-2 rounded-xl bg-primary px-5 py-2.5 text-sm font-bold text-white soft-shadow hover:bg-blue-700 transition-all">
        <span class="material-symbols-outlined text-lg">add</span>
        Tambah Alat
    </button>
</div>

<!-- Table -->
<div
    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-850/50">
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        No</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Gambar</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Nama Alat</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Kategori</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Stok</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700 text-right">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <?php $no = 1;
                foreach ($data['alat'] as $alat): ?>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $no++; ?></td>
                        <td class="px-6 py-4">
                            <?php if ($alat['gambar']): ?>
                                <img src="<?= BASE_URL; ?>/uploads/<?= $alat['gambar']; ?>" alt="<?= $alat['nama_alat']; ?>"
                                    class="w-12 h-12 object-cover rounded-lg border border-slate-200 dark:border-slate-600">
                            <?php else: ?>
                                <div
                                    class="w-12 h-12 bg-slate-100 dark:bg-slate-700 rounded-lg flex items-center justify-center text-xs text-slate-400">
                                    No img</div>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900 dark:text-white"><?= $alat['nama_alat']; ?></td>
                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 text-xs font-semibold rounded-full bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                                <?= $alat['nama_kategori']; ?>
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-bold <?= $alat['stok'] > 0 ? 'text-emerald-600' : 'text-rose-600'; ?>">
                            <?= $alat['stok']; ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button onclick="openEditModal(<?= $alat['id']; ?>)"
                                    class="p-2 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 text-blue-600 transition-colors"
                                    title="Edit">
                                    <span class="material-symbols-outlined text-xl">edit</span>
                                </button>
                                <a href="<?= BASE_URL; ?>/admin/alatDelete/<?= $alat['id']; ?>"
                                    onclick="return confirm('Yakin ingin menghapus?')"
                                    class="p-2 rounded-lg hover:bg-rose-50 dark:hover:bg-rose-900/30 text-rose-600 transition-colors"
                                    title="Delete">
                                    <span class="material-symbols-outlined text-xl">delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="tambahAlatModal"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
    <div
        class="bg-white dark:bg-slate-850 w-full max-w-lg rounded-2xl soft-shadow overflow-hidden transform scale-95 transition-transform duration-300 model-content max-h-[90vh] overflow-y-auto">
        <div
            class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between sticky top-0 bg-white dark:bg-slate-850 z-10">
            <h3 class="text-xl font-bold">Tambah Alat</h3>
            <button onclick="closeModal('tambahAlatModal')"
                class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="<?= BASE_URL; ?>/admin/alatStore" method="post" enctype="multipart/form-data"
            class="p-6 space-y-4">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Nama Alat</label>
                <input type="text" name="nama_alat"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Kategori</label>
                <select name="kategori_id"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    <?php foreach ($data['kategori'] as $k): ?>
                        <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Stok</label>
                <input type="number" name="stok"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Deskripsi</label>
                <textarea name="deskripsi"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    rows="3"></textarea>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Gambar</label>
                <input type="file" name="gambar"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                <p class="text-xs text-slate-500 mt-1">Format: JPG/PNG, Maks. 2MB.</p>
            </div>
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200 dark:border-slate-700">
                <button type="button" onclick="closeModal('tambahAlatModal')"
                    class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">Batal</button>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-primary text-white font-bold soft-shadow hover:bg-blue-700 transition-all">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editAlatModal"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
    <div
        class="bg-white dark:bg-slate-850 w-full max-w-lg rounded-2xl soft-shadow overflow-hidden transform scale-95 transition-transform duration-300 model-content max-h-[90vh] overflow-y-auto">
        <div
            class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between sticky top-0 bg-white dark:bg-slate-850 z-10">
            <h3 class="text-xl font-bold">Ubah Data Alat</h3>
            <button onclick="closeModal('editAlatModal')"
                class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="<?= BASE_URL; ?>/admin/alatUpdate" method="post" enctype="multipart/form-data"
            class="p-6 space-y-4">
            <input type="hidden" name="id" id="id_alat_edit">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Nama Alat</label>
                <input type="text" name="nama_alat" id="nama_alat_edit"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Kategori</label>
                <select name="kategori_id" id="kategori_id_edit"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    <?php foreach ($data['kategori'] as $k): ?>
                        <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Stok</label>
                <input type="number" name="stok" id="stok_edit"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi_edit"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    rows="3"></textarea>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Gambar (Biarkan kosong jika
                    tetap)</label>
                <input type="file" name="gambar"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                <p class="text-xs text-slate-500 mt-1">Format: JPG/PNG, Maks. 2MB.</p>
            </div>
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200 dark:border-slate-700">
                <button type="button" onclick="closeModal('editAlatModal')"
                    class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">Batal</button>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-primary text-white font-bold soft-shadow hover:bg-blue-700 transition-all">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.remove('opacity-0', 'pointer-events-none');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('opacity-0', 'pointer-events-none');
    }

    function openEditModal(id) {
        fetch('<?= BASE_URL; ?>/admin/getAlatById/' + id)
            .then(res => res.json())
            .then(data => {
                document.getElementById('id_alat_edit').value = data.id;
                document.getElementById('nama_alat_edit').value = data.nama_alat;
                document.getElementById('kategori_id_edit').value = data.kategori_id;
                document.getElementById('stok_edit').value = data.stok;
                document.getElementById('deskripsi_edit').value = data.deskripsi;
                openModal('editAlatModal');
            });
    }
</script>