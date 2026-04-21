<x-filament::widget>
    <x-filament::card>
        <div class="bg-gradient-to-r from-yellow-50 to-amber-50 border-l-4 border-yellow-500 p-4 rounded-lg shadow-sm">
            <div class="flex items-start justify-between gap-4 mb-3">
                <div>
                    <h3 class="text-base font-bold text-yellow-900 mb-1">🔄 Demo Environment</h3>
                    <p class="text-xs text-yellow-700">This database auto-resets periodically</p>
                </div>
                <div class="flex items-center gap-2 bg-yellow-200 px-3 py-1.5 rounded-full shrink-0">
                    <span class="inline-block w-2 h-2 rounded-full bg-yellow-600 animate-pulse"></span>
                    <span class="text-xs font-bold text-yellow-900">Reset: <strong id="demo-reset-countdown">Calculating...</strong></span>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div class="bg-white/70 p-3 rounded border border-yellow-300">
                    <p class="text-xs font-bold text-yellow-800 mb-1.5">👤 Admin Access</p>
                    <p class="text-xs text-gray-700 font-mono mb-0.5">{{ $this->getCredentials()['admin']['email'] }}</p>
                    <p class="text-xs text-gray-700 font-mono">{{ $this->getCredentials()['admin']['password'] }}</p>
                </div>
                <div class="bg-white/70 p-3 rounded border border-yellow-300">
                    <p class="text-xs font-bold text-yellow-800 mb-1.5">👤 User Access</p>
                    <p class="text-xs text-gray-700 font-mono mb-0.5">{{ $this->getCredentials()['user']['email'] }}</p>
                    <p class="text-xs text-gray-700 font-mono">{{ $this->getCredentials()['user']['password'] }}</p>
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
