#!/bin/bash
cd /var/www
php bin/console doctrine:schema:update -f
PGPASSWORD=$DB_PASSWD psql -U $DB_USER -h $DB_HOST -d $DB_NAME < /install/db.sql
