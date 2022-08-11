# Doctrine

## Install

    composer require doctrine/orm -W

## Command

### Valider schéma

    vendor/bin/doctrine orm:validate-schema

### Update dab schema

Test

    vendor/bin/doctrine orm:schema-tool:update --dump-sql
Execute

    vendor/bin/doctrine orm:schema-tool:update  --dump-sql --force

## Credits

https://zestedesavoir.com/tutoriels/1713/doctrine-2-a-lassaut-de-lorm-phare-de-php/les-bases-de-doctrine-2/installation-et-configuration-de-doctrine-2/