INSERT INTO roles (rolescod, rolesdsc, rolesest) VALUES ('ADMIN', 'Administrador', 'ACT');
INSERT INTO roles (rolescod, rolesdsc, rolesest) VALUES ('AUDIT', 'Auditor', 'ACT');
INSERT INTO roles (rolescod, rolesdsc, rolesest) VALUES ('OPADQ', 'Operador de Adquisiciones', 'ACT');

INSERT INTO funciones (fncod, fndsc, fnest, fntyp) VALUES ('product_DSP', 'Detalle de Productos', 'ACT', 'FNC');
INSERT INTO funciones (fncod, fndsc, fnest, fntyp) VALUES ('product_UPD', 'Editar Productos', 'ACT', 'FNC');
INSERT INTO funciones (fncod, fndsc, fnest, fntyp) VALUES ('product_DEL', 'Eliminar Productos', 'ACT', 'FNC');
INSERT INTO funciones (fncod, fndsc, fnest, fntyp) VALUES ('product_INS', 'Agregar Productos', 'ACT', 'FNC');

INSERT INTO funciones_roles(rolescod, fncod, fnrolest, fnexp) VALUES ('ADMIN', 'product_DSP', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO funciones_roles(rolescod, fncod, fnrolest, fnexp) VALUES ('ADMIN', 'product_UPD', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO funciones_roles(rolescod, fncod, fnrolest, fnexp) VALUES ('ADMIN', 'product_DEL', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO funciones_roles(rolescod, fncod, fnrolest, fnexp) VALUES ('ADMIN', 'product_INS', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));

INSERT INTO funciones_roles(rolescod, fncod, fnrolest, fnexp) VALUES ('AUDIT', 'product_DSP', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));

INSERT INTO funciones_roles(rolescod, fncod, fnrolest, fnexp) VALUES ('OPADQ', 'product_DSP', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO funciones_roles(rolescod, fncod, fnrolest, fnexp) VALUES ('OPADQ', 'product_UPD', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));


INSERT INTO roles_usuarios(usercod, rolescod, roleuserest, roleuserfch, roleuserexp) VALUES (1, 'ADMIN', 'ACT', NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO roles_usuarios(usercod, rolescod, roleuserest, roleuserfch, roleuserexp) VALUES (2, 'AUDIT', 'ACT', NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO roles_usuarios(usercod, rolescod, roleuserest, roleuserfch, roleuserexp) VALUES (3, 'OPADQ', 'ACT', NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR));

INSERT INTO funciones (fncod, fndsc, fnest, fntyp) VALUES ('Controllers\\Products\\Product', 'Formulario de Productos', 'ACT', 'CTR');
INSERT INTO funciones (fncod, fndsc, fnest, fntyp) VALUES ('Controllers\\Products\\Products', 'Lista de Productos', 'ACT', 'CTR');

INSERT INTO funciones (fncod, fndsc, fnest, fntyp) VALUES ('Menu_Products', 'Menu_Products', 'ACT', 'MNU');


INSERT INTO funciones_roles (rolescod, fncod, fnrolest, fnexp) VALUES ('ADMIN', 'Controllers\\Products\\Product', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO funciones_roles (rolescod, fncod, fnrolest, fnexp) VALUES ('AUDIT', 'Controllers\\Products\\Product', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO funciones_roles (rolescod, fncod, fnrolest, fnexp) VALUES ('OPADQ', 'Controllers\\Products\\Product', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));

INSERT INTO funciones_roles (rolescod, fncod, fnrolest, fnexp) VALUES ('ADMIN', 'Controllers\\Products\\Products', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO funciones_roles (rolescod, fncod, fnrolest, fnexp) VALUES ('AUDIT', 'Controllers\\Products\\Products', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO funciones_roles (rolescod, fncod, fnrolest, fnexp) VALUES ('OPADQ', 'Controllers\\Products\\Products', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));

INSERT INTO funciones_roles (rolescod, fncod, fnrolest, fnexp) VALUES ('ADMIN', 'Menu_Products', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO funciones_roles (rolescod, fncod, fnrolest, fnexp) VALUES ('AUDIT', 'Menu_Products', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));
INSERT INTO funciones_roles (rolescod, fncod, fnrolest, fnexp) VALUES ('OPADQ', 'Menu_Products', 'ACT', DATE_ADD(NOW(), INTERVAL 1 YEAR));