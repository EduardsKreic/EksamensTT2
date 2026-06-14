document.addEventListener('DOMContentLoaded', function () {
    const search = document.getElementById('search');
    const category = document.getElementById('category');
    const trainer = document.getElementById('trainer');
    const date = document.getElementById('date');
    const classList = document.getElementById('class-list');

    let timeout = null;

    function loadClasses() {
        const params = new URLSearchParams({
            search: search.value,
            category_id: category.value,
            trainer_id: trainer.value,
            date: date.value,
        });

        fetch('/classes/filter?' + params.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }
        })
            .then(response => response.text())
            .then(html => {
                classList.innerHTML = html;
            })
            .catch(() => {
                classList.innerHTML = '<div class="card">Neizdevās ielādēt nodarbības.</div>';
            });
    }

    function delayedLoad() {
        clearTimeout(timeout);
        timeout = setTimeout(loadClasses, 300);
    }

    [search, category, trainer, date].forEach(element => {
        if (element) {
            element.addEventListener('input', delayedLoad);
            element.addEventListener('change', delayedLoad);
        }
    });
});
