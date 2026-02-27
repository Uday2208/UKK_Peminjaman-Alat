<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">System Logs</h1>
        <p class="text-slate-500 text-sm">Monitor system activities and events.</p>
    </div>
    <button
        class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
        <span class="material-symbols-outlined text-base">download</span>
        Export Logs
    </button>
</div>

<div
    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
    <div class="p-5 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
        <h3 class="font-bold text-lg">Activity Log</h3>
        <div class="flex gap-2">
            <button class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                <span class="material-symbols-outlined">filter_list</span>
            </button>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-850/50">
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Timestamp</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        User</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Action</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Details</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700 text-right">
                        IP Address</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <!-- Mock Data for Demonstration -->
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                    <td class="px-6 py-4 text-sm text-slate-500 font-mono">
                        <?= date('Y-m-d H:i:s'); ?>
                    </td>
                    <td class="px-6 py-4 text-sm font-bold text-slate-900 dark:text-white">System Admin</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold">Login</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">User logged in successfully</td>
                    <td class="px-6 py-4 text-right text-sm font-mono text-slate-500">192.168.1.1</td>
                </tr>
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                    <td class="px-6 py-4 text-sm text-slate-500 font-mono">
                        <?= date('Y-m-d H:i:s', strtotime('-10 minutes')); ?>
                    </td>
                    <td class="px-6 py-4 text-sm font-bold text-slate-900 dark:text-white">System</td>
                    <td class="px-6 py-4">
                        <span
                            class="px-2 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold">Cron</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Daily backup completed</td>
                    <td class="px-6 py-4 text-right text-sm font-mono text-slate-500">localhost</td>
                </tr>
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                    <td class="px-6 py-4 text-sm text-slate-500 font-mono">
                        <?= date('Y-m-d H:i:s', strtotime('-1 hour')); ?>
                    </td>
                    <td class="px-6 py-4 text-sm font-bold text-slate-900 dark:text-white">Petugas 1</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold">Update</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Updated loan status #1234</td>
                    <td class="px-6 py-4 text-right text-sm font-mono text-slate-500">192.168.1.5</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>