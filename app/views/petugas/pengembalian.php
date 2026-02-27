<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Proses Pengembalian</h1>
</div>

<div
    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-850/50">
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">No</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Peminjam
                    </th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Alat</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Tgl Kembali
                        (Rencana)</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Status</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b text-right">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <?php $no = 1;
                foreach ($data['peminjaman'] as $pinjam): ?>
                    <?php if ($pinjam['status'] == 'approved'): ?>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $no++; ?></td>
                            <td class="px-6 py-4 font-bold text-slate-900 dark:text-white"><?= $pinjam['nama_lengkap']; ?></td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $pinjam['alat_pinjam']; ?></td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                <?= date('d/m/Y', strtotime($pinjam['tanggal_kembali_rencana'])); ?></td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-600">Dipinjam</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    onclick="openKembaliModal(<?= $pinjam['id']; ?>, '<?= addslashes($pinjam['nama_lengkap']); ?>')"
                                    class="px-4 py-2 rounded-lg bg-primary text-white hover:bg-blue-700 font-bold text-xs soft-shadow transition-colors">
                                    Proses Kembali
                                </button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Kembali -->
<div id="kembaliModal"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
    <div
        class="bg-white dark:bg-slate-850 w-full max-w-lg rounded-2xl soft-shadow overflow-hidden transform scale-95 transition-transform duration-300 model-content">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
            <h3 class="text-xl font-bold">Konfirmasi Pengembalian</h3>
            <button onclick="closeModal('kembaliModal')"
                class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="<?= BASE_URL; ?>/petugas/prosesKembali" method="post" class="p-6 space-y-4">
            <input type="hidden" name="id" id="id_peminjaman">

            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-xl text-blue-800 dark:text-blue-200 text-sm">
                Memproses pengembalian atas nama: <strong id="nama_peminjam" class="font-bold"></strong>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Tanggal Kembali Realisasi</label>
                <input type="date" name="tgl_kembali"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    value="<?= date('Y-m-d'); ?>" required>
            </div>

            <p class="text-xs text-slate-500 text-center">
                Denda akan dihitung otomatis oleh sistem jika terlambat.
            </p>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200 dark:border-slate-700">
                <button type="button" onclick="closeModal('kembaliModal')"
                    class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">Batal</button>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-primary text-white font-bold soft-shadow hover:bg-blue-700 transition-all">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openKembaliModal(id, nama) {
        document.getElementById('id_peminjaman').value = id;
        document.getElementById('nama_peminjam').textContent = nama;

        const modal = document.getElementById('kembaliModal');
        modal.classList.remove('opacity-0', 'pointer-events-none');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('opacity-0', 'pointer-events-none');
    }
</script>