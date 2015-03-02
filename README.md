# HOW TO USE

## RUN

```
<?php

use Vol2223\PBench\PBench;

$seed = 'makichanmakichan';

PBench::run(10, [
    'md5' => function () use($seed) {
        md5($seed);
    },
    'sha256' => function () use($seed) {
        hash_hmac('sha256', $seed, false);
    },
]);
```

## RESULT

```
run number 10 times
md5             :     0.0001 sec   @ 0.0000 sec (100.00%)
sha256          :     0.0001 sec   @ 0.0000 sec (125.29%)
```
