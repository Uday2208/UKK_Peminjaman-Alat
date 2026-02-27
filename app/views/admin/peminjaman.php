<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Laporan Peminjaman</h1>
    <div class="flex items-center gap-2">
        <a href="javascript:void(0)" onclick="cetakLaporan()"
            class="flex items-center gap-2 rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-bold text-white soft-shadow hover:bg-emerald-700 transition-all">
            <span class="material-symbols-outlined text-lg">print</span>
            Cetak PDF
        </a>
    </div>
</div>

<!-- Filters -->
<div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow p-5 mb-6">
    <form action="<?= BASE_URL; ?>/admin/peminjaman" method="get" class="flex flex-col md:flex-row gap-4 items-end">
        <div class="w-full md:w-auto">
            <label class="text-sm font-bold text-slate-700 dark:text-slate-300 mb-1 block">Tanggal Mulai</label>
            <input type="date" name="tgl_mulai"
                class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                value="<?= $data['tgl_mulai'] ?? ''; ?>">
        </div>
        <div class="w-full md:w-auto">
            <label class="text-sm font-bold text-slate-700 dark:text-slate-300 mb-1 block">Tanggal Selesai</label>
            <input type="date" name="tgl_selesai"
                class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                value="<?= $data['tgl_selesai'] ?? ''; ?>">
        </div>
        <div class="flex gap-2 w-full md:w-auto mt-2 md:mt-0">
            <button type="submit"
                class="w-full md:w-auto px-6 py-2.5 rounded-xl bg-primary text-white font-bold soft-shadow hover:bg-blue-700 transition-all">Filter</button>
            <a href="<?= BASE_URL; ?>/admin/peminjaman"
                class="w-full md:w-auto px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all text-center">Reset</a>
        </div>
    </form>
</div>

<!-- Table -->
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
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Tgl Pinjam
                    </th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Tgl Kembali
                    </th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Status</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Denda</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Petugas
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <?php $no = 1;
                foreach ($data['peminjaman'] as $pinjam): ?>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $no++; ?></td>
                        <td class="px-6 py-4 font-bold text-slate-900 dark:text-white"><?= $pinjam['nama_lengkap']; ?></td>
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $pinjam['alat_pinjam']; ?></td>
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                            <?= date('d/m/Y', strtotime($pinjam['tanggal_pinjam'])); ?></td>
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                            <?= date('d/m/Y', strtotime($pinjam['tanggal_kembali_rencana'])); ?></td>
                        <td class="px-6 py-4">
                            <?php
                            $badgeClass = 'bg-slate-100 text-slate-600';
                            if ($pinjam['status'] == 'approved')
                                $badgeClass = 'bg-blue-100 text-blue-600';
                            if ($pinjam['status'] == 'returned')
                                $badgeClass = 'bg-emerald-100 text-emerald-600';
                            if ($pinjam['status'] == 'rejected')
                                $badgeClass = 'bg-rose-100 text-rose-600';
                            ?>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full <?= $badgeClass; ?>">
                                <?= ucfirst($pinjam['status']); ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Rp
                            <?= number_format($pinjam['denda'], 0, ',', '.'); ?></td>
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                            <?= $pinjam['petugas_id'] ? 'Petugas #' . $pinjam['petugas_id'] : '-'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function cetakLaporan() {
        const tglMulai = document.querySelector('input[name="tgl_mulai"]').value;
        const tglSelesai = document.querySelector('input[name="tgl_selesai"]').value;

        let url = '<?= BASE_URL; ?>/admin/cetakLaporan';
        if (tglMulai && tglSelesai) {
            url += '?tgl_mulai=' + tglMulai + '&tgl_selesai=' + tglSelesai;
        }

        window.open(url, '_blank');
    }
</script>