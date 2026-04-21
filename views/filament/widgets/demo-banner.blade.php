<x-filament::widget>
    <x-filament::card>
        <div class="bg-gradient-to-r from-yellow-50 to-amber-50 border-l-4 border-yellow-500 p-4 rounded-lg shadow-sm">
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-yellow-900 flex items-center gap-2">
                        <svg class="h-5 w-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Demo Environment
                    </h3>
                    <div class="flex items-center gap-2 bg-yellow-100 px-3 py-1.5 rounded-full">
                        <span class="inline-block w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span>
                        <span class="text-xs font-semibold text-yellow-800">Resets in: <strong id="demo-reset-countdown">Calculating...</strong></span>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="bg-white/60 p-3 rounded border border-yellow-200">
                        <p class="text-xs font-semibold text-yellow-700 mb-1">Admin Access</p>
                        <p class="text-sm text-yellow-900 font-mono">{{ $this->getCredentials()['admin']['email'] }}</p>
                        <p class="text-sm text-yellow-900 font-mono">{{ $this->getCredentials()['admin']['password'] }}</p>
                    </div>
                    <div class="bg-white/60 p-3 rounded border border-yellow-200">
                        <p class="text-xs font-semibold text-yellow-700 mb-1">User Access</p>
                        <p class="text-sm text-yellow-900 font-mono">{{ $this->getCredentials()['user']['email'] }}</p>
                        <p class="text-sm text-yellow-900 font-mono">{{ $this->getCredentials()['user']['password'] }}</p>
                    </div>
                </div>

                
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
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
