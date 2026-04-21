<x-filament::widget>
    <x-filament::card>
        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-yellow-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-bold text-yellow-900">
                        Demo Environment
                    </h3>
                    <div class="mt-2 space-y-1">
                        <p class="text-sm text-yellow-800 font-mono">
                            <strong>Admin:</strong> {{ $this->getCredentials()['admin']['email'] }} / {{ $this->getCredentials()['admin']['password'] }}
                        </p>
                        <p class="text-sm text-yellow-800 font-mono">
                            <strong>User:</strong> {{ $this->getCredentials()['user']['email'] }} / {{ $this->getCredentials()['user']['password'] }}
                        </p>
                        <p class="text-xs text-yellow-700 mt-3 flex items-center gap-2">
                            <span class="inline-block w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span>
                            Database resets in: <strong id="demo-reset-countdown">Calculating...</strong>
                        </p>

                        <script>
                            (function() {
                                function updateCountdown() {
                                    const interval = {{ $this->getResetInterval() }};
                                    const now = new Date();
                                    const minutes = now.getMinutes();
                                    const seconds = now.getSeconds();
                                    
                                    const remainingMinutes = (interval - 1) - (minutes % interval);
                                    const remainingSeconds = 59 - seconds;
                                    
                                    const display = document.getElementById('demo-reset-countdown');
                                    if (display) {
                                        display.innerText = `${remainingMinutes}m ${remainingSeconds}s`;
                                    }
                                }
                                setInterval(updateCountdown, 1000);
                                updateCountdown();
                            })();
                        </script>
                        
                        <div class="mt-4 p-2 bg-yellow-100/50 rounded border border-yellow-200">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-yellow-800 mb-1">Server Cron Job:</p>
                            <code class="text-[10px] text-yellow-900 break-all">* * * * * cd {{ base_path() }} && php artisan schedule:run >> /dev/null 2>&1</code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
