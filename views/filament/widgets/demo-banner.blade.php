<x-filament::widget>
    <x-filament::card>
        <div class="bg-blue-50/50 border-l-4 border-blue-400 px-4 py-3" 
             x-data="{ 
                countdown: '--m --s',
                interval: {{ $this->getResetInterval() }},
                updateCountdown() {
                    const now = new Date();
                    const minutes = now.getMinutes();
                    const seconds = now.getSeconds();
                    const remainingMinutes = (this.interval - 1) - (minutes % this.interval);
                    const remainingSeconds = 59 - seconds;
                    this.countdown = remainingMinutes + 'm ' + remainingSeconds + 's';
                }
             }"
             x-init="updateCountdown(); setInterval(() => updateCountdown(), 1000)">
            <div class="flex items-center justify-between gap-4">
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Demo Environment</h3>
                    <p class="text-xs text-gray-600">This is a live demo. Changes reset automatically every {{ $this->getResetInterval() }} minutes.</p>
                </div>
                <div class="shrink-0">
                    <span class="text-xs text-gray-700">Next reset: <strong class="text-blue-700 font-semibold" x-text="countdown"></strong></span>
                </div>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
