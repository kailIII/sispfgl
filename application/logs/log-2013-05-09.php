<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2013-05-09 03:08:51 --> 404 Page Not Found --> componente21/guardar_ccc
ERROR - 2013-05-09 04:38:49 --> 404 Page Not Found --> componente21/guardar_ccc
ERROR - 2013-05-09 04:39:23 --> 404 Page Not Found --> componente21/guardar_ccc
ERROR - 2013-05-09 04:40:17 --> 404 Page Not Found --> componente21/guardar_ccc
ERROR - 2013-05-09 04:51:52 --> Severity: Notice  --> Undefined variable: new_cc /var/www/sispfgl/application/models/componente2/comp21_model.php 57
ERROR - 2013-05-09 04:51:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  currval of sequence "cc_cc_id_seq" is not yet defined in this session /var/www/sispfgl/system/database/drivers/postgre/postgre_driver.php 176
ERROR - 2013-05-09 04:51:52 --> Query error: ERROR:  currval of sequence "cc_cc_id_seq" is not yet defined in this session
ERROR - 2013-05-09 04:51:52 --> Could not find the language line "db_error_heading"
ERROR - 2013-05-09 04:53:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table "ccc" violates foreign key constraint "fk_ccc_reference_municipi"
DETAIL:  Key (mun_id)=(0) is not present in table "municipio". /var/www/sispfgl/system/database/drivers/postgre/postgre_driver.php 176
ERROR - 2013-05-09 04:53:15 --> Query error: ERROR:  insert or update on table "ccc" violates foreign key constraint "fk_ccc_reference_municipi"
DETAIL:  Key (mun_id)=(0) is not present in table "municipio".
ERROR - 2013-05-09 04:53:15 --> Could not find the language line "db_error_heading"
ERROR - 2013-05-09 05:08:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column "ccc_id" of relation "proyectos_cc" does not exist
LINE 1: INSERT INTO "proyectos_cc" ("ccc_id", "nom_subproy", "nom_co...
                                    ^ /var/www/sispfgl/system/database/drivers/postgre/postgre_driver.php 176
ERROR - 2013-05-09 05:08:31 --> Query error: ERROR:  column "ccc_id" of relation "proyectos_cc" does not exist
LINE 1: INSERT INTO "proyectos_cc" ("ccc_id", "nom_subproy", "nom_co...
                                    ^
ERROR - 2013-05-09 05:08:31 --> Could not find the language line "db_error_heading"
ERROR - 2013-05-09 05:09:05 --> Severity: Notice  --> Undefined index: mun_id /var/www/sispfgl/application/models/componente2/comp21_model.php 57
ERROR - 2013-05-09 05:09:05 --> Severity: Notice  --> Undefined index: fecha_conformacion /var/www/sispfgl/application/models/componente2/comp21_model.php 58
ERROR - 2013-05-09 05:09:05 --> Severity: Notice  --> Undefined index: lugar_convocatoria /var/www/sispfgl/application/models/componente2/comp21_model.php 59
ERROR - 2013-05-09 05:09:05 --> Severity: Notice  --> Undefined index: cant_proy /var/www/sispfgl/application/models/componente2/comp21_model.php 68
