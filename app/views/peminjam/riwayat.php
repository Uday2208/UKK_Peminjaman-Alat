<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Riwayat Peminjaman Saya</h1>
</div>

<div
    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-850/50">
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">No</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Alat</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Tgl Pinjam
                    </th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Tgl Kembali
                        (Rencana)</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Status</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Tgl Kembali
                        (Real)</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b">Denda</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <?php $no = 1;
                foreach ($data['peminjaman'] as $pinjam): ?>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $no++; ?></td>
                        <td class="px-6 py-4 font-bold text-slate-900 dark:text-white"><?= $pinjam['alat_pinjam']; ?></td>
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
                            if ($pinjam['status'] == 'pending')
                                $badgeClass = 'bg-amber-100 text-amber-600';
                            ?>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full <?= $badgeClass; ?>">
                                <?= ucfirst($pinjam['status']); ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                            <?= $pinjam['tanggal_kembali_real'] ? date('d/m/Y', strtotime($pinjam['tanggal_kembali_real'])) : '-'; ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                            <?php if ($pinjam['denda'] > 0): ?>
                                <span class="text-rose-600 font-bold">Rp
                                    <?= number_format($pinjam['denda'], 0, ',', '.'); ?></span>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if (empty($data['peminjaman'])): ?>
        <div class="p-8 text-center text-slate-500 dark:text-slate-400">
            <span class="material-symbols-outlined text-4xl mb-2 text-slate-300">history</span>
            <p>Belum ada riwayat peminjaman.</p>
        </div>
    <?php endif; ?>
</div>