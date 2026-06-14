# Gusts Zariņš praktiskā daļa

Gusta atbildība projektā:
- Eloquent modeļu izveide un relāciju definēšana;
- Blade skatu izveide;
- lietotāja saskarne nodarbību, treneru un rezervāciju sadaļām;
- LV/EN lokalizācija;
- AJAX nodarbību filtrēšana bez lapas pārlādes;
- testēšana un dokumentācija.

## Faili, ko Gusts pievieno vai labo

### Modeļi
- app/Models/Role.php
- app/Models/Trainer.php
- app/Models/Category.php
- app/Models/Schedule.php
- app/Models/ClassSession.php
- app/Models/Booking.php
- app/Models/AuditLog.php

### Skati
- resources/views/layouts/sport.blade.php
- resources/views/home.blade.php
- resources/views/classes/index.blade.php
- resources/views/classes/show.blade.php
- resources/views/classes/partials/list.blade.php
- resources/views/bookings/index.blade.php
- resources/views/trainers/index.blade.php
- resources/views/admin/dashboard.blade.php

### Lokalizācija
- lang/lv/messages.php
- lang/en/messages.php

### JavaScript
- public/js/class-filter.js

## Ko var stāstīt aizstāvēšanā

Modeļi apraksta datubāzes tabulu objektus un relācijas starp tiem. Piemēram, ClassSession pieder trenerim, kategorijai un grafikam, bet Booking pieder lietotājam un nodarbībai.

Skati ir atdalīti no biznesa loģikas. Tie tikai attēlo datus, kurus sagatavo kontrolieri.

Lokalizācija ļauj sistēmu lietot latviešu un angļu valodā.

AJAX filtrēšana ļauj lietotājam atlasīt nodarbības pēc nosaukuma, kategorijas, trenera un datuma bez pilnas lapas pārlādes.
