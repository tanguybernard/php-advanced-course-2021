<?php
function shutdown()
{
    // Voici notre fonction shutdown
    // dans laquelle nous pouvons faire
    // toutes les dernières opérations
    // avant la fin du script.

    echo 'Script exécuté avec succès', PHP_EOL;
}
echo "one".PHP_EOL;
register_shutdown_function('shutdown');
echo "two".PHP_EOL;
echo "three".PHP_EOL;
