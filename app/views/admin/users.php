<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Manajemen User</h1>
    <button onclick="openModal('tambahUserModal')"
        class="flex items-center gap-2 rounded-xl bg-primary px-5 py-2.5 text-sm font-bold text-white soft-shadow hover:bg-blue-700 transition-all">
        <span class="material-symbols-outlined text-lg">add</span>
        Tambah User
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
                        Username</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Nama Lengkap</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Role</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700 text-right">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <?php $no = 1;
                foreach ($data['users'] as $user): ?>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $no++; ?></td>
                        <td class="px-6 py-4 font-bold text-slate-900 dark:text-white"><?= $user['username']; ?></td>
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $user['nama_lengkap']; ?></td>
                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 text-xs font-semibold rounded-full bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                                <?= $user['role_name']; ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button onclick="openEditModal(<?= $user['id']; ?>)"
                                    class="p-2 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 text-blue-600 transition-colors"
                                    title="Edit">
                                    <span class="material-symbols-outlined text-xl">edit</span>
                                </button>
                                <a href="<?= BASE_URL; ?>/admin/userDelete/<?= $user['id']; ?>"
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
<div id="tambahUserModal"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
    <div
        class="bg-white dark:bg-slate-850 w-full max-w-lg rounded-2xl soft-shadow overflow-hidden transform scale-95 transition-transform duration-300 model-content">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
            <h3 class="text-xl font-bold">Tambah User</h3>
            <button onclick="closeModal('tambahUserModal')"
                class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="<?= BASE_URL; ?>/admin/userStore" method="post" class="p-6 space-y-4">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Username</label>
                <input type="text" name="username"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Nama Lengkap</label>
                <input type="text" name="nama"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Role</label>
                <select name="role_id"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    <option value="1">Admin</option>
                    <option value="2">Petugas</option>
                    <option value="3">Peminjam</option>
                </select>
            </div>
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200 dark:border-slate-700">
                <button type="button" onclick="closeModal('tambahUserModal')"
                    class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">Batal</button>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-primary text-white font-bold soft-shadow hover:bg-blue-700 transition-all">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editUserModal"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
    <div
        class="bg-white dark:bg-slate-850 w-full max-w-lg rounded-2xl soft-shadow overflow-hidden transform scale-95 transition-transform duration-300 model-content">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
            <h3 class="text-xl font-bold">Edit User</h3>
            <button onclick="closeModal('editUserModal')"
                class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="<?= BASE_URL; ?>/admin/userUpdate" method="post" class="p-6 space-y-4">
            <input type="hidden" name="id" id="id_edit">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Username</label>
                <input type="text" name="username" id="username_edit"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Password (Opsional)</label>
                <input type="password" name="password" id="password_edit"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    placeholder="Kosongkan jika tidak diubah">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Nama Lengkap</label>
                <input type="text" name="nama" id="nama_edit"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Role</label>
                <select name="role_id" id="role_id_edit"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    <option value="1">Admin</option>
                    <option value="2">Petugas</option>
                    <option value="3">Peminjam</option>
                </select>
            </div>
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200 dark:border-slate-700">
                <button type="button" onclick="closeModal('editUserModal')"
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
        const content = modal.querySelector('.model-content'); // Fix selector if needed
        modal.classList.remove('opacity-0', 'pointer-events-none');
        // content.classList.remove('scale-95'); // Needs to select child
        // content.classList.add('scale-100');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('opacity-0', 'pointer-events-none');
    }

    function openEditModal(id) {
        // Fetch data
        fetch('<?= BASE_URL; ?>/admin/getUserById/' + id)
            .then(res => res.json())
            .then(data => {
                document.getElementById('id_edit').value = data.id;
                document.getElementById('username_edit').value = data.username;
                document.getElementById('nama_edit').value = data.nama_lengkap;
                document.getElementById('role_id_edit').value = data.role_id;
                document.getElementById('password_edit').value = '';
                openModal('editUserModal');
            });
    }
</script>