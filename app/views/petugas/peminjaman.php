<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Validasi Peminjaman</h1>
</div>

<!-- Use specific styling for tables as requested -->
<div
    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow overflow-hidden mb-8">
    <div class="p-5 border-b border-slate-200 dark:border-slate-700">
        <h3 class="text-lg font-bold text-amber-600 flex items-center gap-2">
            <span class="material-symbols-outlined">pending</span>
            Menunggu Persetujuan
        </h3>
    </div>
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
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b text-right">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <?php $no = 1;
                foreach ($data['peminjaman'] as $pinjam): ?>
                    <?php if ($pinjam['status'] == 'pending'): ?>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $no++; ?></td>
                            <td class="px-6 py-4 font-bold text-slate-900 dark:text-white"><?= $pinjam['nama_lengkap']; ?></td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $pinjam['alat_pinjam']; ?></td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                <?= date('d/m/Y', strtotime($pinjam['tanggal_pinjam'])); ?></td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                <?= date('d/m/Y', strtotime($pinjam['tanggal_kembali_rencana'])); ?></td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-600">Pending</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?= BASE_URL; ?>/petugas/approve/<?= $pinjam['id']; ?>"
                                        onclick="return confirm('Setujui peminjaman ini?')"
                                        class="px-3 py-1.5 rounded-lg bg-emerald-100 text-emerald-600 hover:bg-emerald-200 font-bold text-xs transition-colors">Approve</a>
                                    <a href="<?= BASE_URL; ?>/petugas/reject/<?= $pinjam['id']; ?>"
                                        onclick="return confirm('Tolak peminjaman ini?')"
                                        class="px-3 py-1.5 rounded-lg bg-rose-100 text-rose-600 hover:bg-rose-200 font-bold text-xs transition-colors">Reject</a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div
    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow overflow-hidden">
    <div class="p-5 border-b border-slate-200 dark:border-slate-700">
        <h3 class="text-lg font-bold text-slate-700 dark:text-slate-300">Riwayat Validasi</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-850/50">
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">No</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Peminjam
                    </th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Status</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Petugas
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <?php $no = 1;
                foreach ($data['peminjaman'] as $pinjam): ?>
                    <?php if ($pinjam['status'] != 'pending'): ?>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $no++; ?></td>
                            <td class="px-6 py-4 font-bold text-slate-900 dark:text-white"><?= $pinjam['nama_lengkap']; ?></td>
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
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                <?= $pinjam['petugas_id'] ? 'Petugas #' . $pinjam['petugas_id'] : '-'; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>