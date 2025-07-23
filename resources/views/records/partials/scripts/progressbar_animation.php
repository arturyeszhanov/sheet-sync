<script>
    document.addEventListener('DOMContentLoaded', function () {
        const generateForm = document.getElementById('generateForm');
        const generateWrapper = document.getElementById('generateProgressWrapper');
        const generateBar = document.getElementById('generateProgressBar');

        if (generateForm) {
            generateForm.addEventListener('submit', function () {
                // Показываем прогресс-бар
                generateWrapper.style.display = 'block';
                generateBar.style.width = '0%';

                let progress = 0;
                const interval = 100; // скорость обновления (мс)
                const duration = 8000; // общее время (мс)
                const step = (interval / duration) * 100;

                const timer = setInterval(() => {
                    progress += step;
                    generateBar.style.width = `${Math.min(progress, 100)}%`;

                    if (progress >= 100) {
                        clearInterval(timer);
                        // optionally: скрыть через 0.5 сек
                        setTimeout(() => {
                            generateWrapper.style.display = 'none';
                        }, 500);
                    }
                }, interval);
            });
        }
    });
</script>