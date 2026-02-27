<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">System Settings</h1>
    <p class="text-slate-500 text-sm">Manage application configurations and preferences.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 space-y-6">
        <!-- General Settings -->
        <div
            class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                <h3 class="font-bold text-lg">General Information</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Application Name</label>
                        <input type="text" value="EquipLend"
                            class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Organization /
                            School</label>
                        <input type="text" value="SMK Telkom"
                            class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Contact Email</label>
                    <input type="email" value="admin@equiplend.com"
                        class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                </div>
            </div>
            <div class="px-6 py-4 bg-slate-50 dark:bg-slate-850/50 flex justify-end">
                <button
                    class="bg-primary text-white px-6 py-2 rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:bg-blue-700 transition-all">Save
                    Changes</button>
            </div>
        </div>

        <!-- Lending Rules -->
        <div
            class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                <h3 class="font-bold text-lg">Lending Configuration</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Default Loan Duration
                            (Days)</label>
                        <input type="number" value="7"
                            class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Max Items per User</label>
                        <input type="number" value="3"
                            class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 bg-slate-50 dark:bg-slate-850/50 flex justify-end">
                <button
                    class="bg-primary text-white px-6 py-2 rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:bg-blue-700 transition-all">Update
                    Rules</button>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <!-- Appearance -->
        <div
            class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                <h3 class="font-bold text-lg">Appearance</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Dark Mode</span>
                    <button
                        class="w-11 h-6 bg-slate-200 dark:bg-slate-700 rounded-full relative transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        <span
                            class="translate-x-0 dark:translate-x-5 inline-block w-5 h-5 transform bg-white rounded-full shadow transition-transform duration-200 mt-0.5 ml-0.5"></span>
                    </button>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Compact Sidebar</span>
                    <button
                        class="w-11 h-6 bg-primary rounded-full relative transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        <span
                            class="translate-x-5 inline-block w-5 h-5 transform bg-white rounded-full shadow transition-transform duration-200 mt-0.5 ml-0.5"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>