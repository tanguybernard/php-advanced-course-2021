

## Defintion

### Processus et threads

Une application se compose d'un ou plusieurs processus. Un processus, en termes les plus simples, est un programme en cours d'exécution. Un ou plusieurs threads s'exécutent dans le contexte du processus. Un thread est l'unité de base à laquelle le système d'exploitation alloue le temps processeur.

### Concurrent


Avec l'exécution simultanée, nous avons deux tâches qui peuvent démarrer, s'exécuter et se terminer dans des périodes de temps qui se chevauchent.

    rrr    gggg        bbb          aaa

       rrr      gggg       bbbb        aa

               r    gg          bba

### Parallèle

On parle de parallélisme lorsque deux tâches s'exécutent littéralement en même temps.

    rrrggggbbbaaa

    rrrggggbbbbaa

    rggbba


Le parallélisme est un type spécifique de concurrence où les tâches sont réellement exécutées simultanément.

### Asynchrone

La programmation asynchrone est une technique qui permet à un programme de démarrer une tâche à l'exécution potentiellement longue et, au lieu d'avoir à attendre la fin de la tâche, de pouvoir continuer à réagir aux autres évènements pendant l'exécution de cette tâche. Une fois la tâche terminée, le programme en reçoit le résultat.


### Coroutine

Une coroutine est une unité de traitement permettant d'exécuter du code non-bloquant et asynchrone. Sur le principe, il s'agit d'un Thread “allégé”. Son avantage étant qu'elle peut être suspendue et reprise plus tard. Une coroutine peut être suspendue dans un Thread et être reprise dans un autre.

Les coroutines ont vocation à être utilisées notamment pour des traitements d’arrière-plan, tels que des appels à des web services pour charger des données, des traitements lourds qui ne nécessitent pas de bloquer le Thread principal, ou encore des traitements n’ayant pas le besoin de manipuler l’interface utilisateur (ou seulement lorsque le traitement est terminé).

### Fiber

Il s'agit d'une fonctionnalité qui permet d'exécuter du code PHP dans un thread concurrent, avec la possibilité de mettre en pause et de reprendre ce code à volonté.

L'utilisation des Fibers ne signifie pas que le code s'exécute en parallèle, mais plutôt que le code est exécuté loin du thread principal dans un virtual thread (green thread). Ces threads sont créés et exécutés par la VM PHP, plutôt que d'être exécutés par le CPU et gérés par le système d'exploitation sous-jacent. Ces fils d'exécution légers sont aussi appelés coroutines et sont exécutés en séquence, plutôt qu'en parallèle.

Les fibers sont destinées à éliminer la distinction entre les fonctions synchrones et asynchrones en PHP et à fournir un mécanisme pour gérer le code bloquant.

Traduit avec www.DeepL.com/Translator (version gratuite)



### Le multithreading

Le multithreading est une forme d’exécution de programme, où un seul processus crée plusieurs threads, et ils s’exécutent simultanément.


## Solutions PHP

- Thread
- Fiber
- exec
- curl_multi_exec
- AmpPHP, ReactPHP, Guzzle

## Source

https://sergeyzhuk.me/2021/03/03/myths-about-asynchronous-php/

https://stitcher.io/blog/parallel-php

Coroutine

https://blog.ippon.fr/2018/06/14/introduction-aux-coroutines-dans-kotlin/#:~:text=Une%20coroutine%20est%20une%20unit%C3%A9,%C3%AAtre%20reprise%20dans%20un%20autre.


Fiber

https://www.hashbangcode.com/article/fibers-php-81