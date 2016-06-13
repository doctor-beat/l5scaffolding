To enabled this package:

1. add 'DoctorBeat\L5Scaffolding\ServiceProvider::class' to your providers-list in config/app.php
2. add 'const SCAFFOLDING = true;' to your models for which you want scaffolding enabled 

Scaffolding is only enabled on local and dev environments. To enable on other set config('app.scaffolding') to true. USE WITH EXTREM CARE!