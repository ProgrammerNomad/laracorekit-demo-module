<x-filament::widget>
    <x-filament::card>
        <div class="bg-blue-50/50 border-l-4 border-blue-400 px-4 py-3">
            <div class="flex items-center justify-between gap-4">
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Demo Environment</h3>
                    <p class="text-xs text-gray-600">This is a live demo. Changes reset automatically every {{ $this->getResetInterval() }} minutes.</p>
                </div>
                <div class="shrink-0">
                    <span class="text-xs text-gray-700">Next reset: <strong class="text-blue-700 font-semibold" id="demo-reset-countdown">--m --s</strong></span>
                </div>
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
                        display.innerText = remainingMinutes + 'm ' + remainingSeconds + 's';
                    }
                }
                setInterval(updateCountdown, 1000);
                updateCountdown();
            })();
        </script>
    </x-filament::card>
</x-filament::widget>
