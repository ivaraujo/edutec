SELECT * FROM anfitrioes;
SELECT * FROM categorias;
SELECT * FROM checkout;
SELECT * FROM convidados;
SELECT * FROM eventos;
SELECT * FROM lista;
SELECT * FROM pagamentos;
SELECT * FROM presentes;
-- ---> Modelo JOIN <---
SELECT nome_eventos,data_eventos,localizacao_eventos,nome_anfitrioes,senha_eventos FROM eventos E INNER JOIN anfitrioes ON anfitrioes_idanfitrioes = idanfitrioes;

-- ---> CONSULTAS <---

-- Consulta para validar cpf e senha do anfitrião
SELECT * FROM anfitrioes WHERE cpf_anfitrioes = "999.999.999-99" AND senha_anfitrioes = "1234";

-- Consulta para validar cpf do convidado e código do evento
SELECT * FROM convidados WHERE cpf_convidados = "";

-- Consulta para validar senha do convidado
SELECT * FROM convidados WHERE senha_convidados = "";

-- Consulta o código do evento
SELECT * FROM eventos WHERE senha_eventos = "Cerva1";

-- Consulta meios de pagamentos
SELECT nome_pagamentos FROM pagamentos;

 -- Consulta categorias
SELECT nome_categorias FROM categorias;

 -- Consulta da lista de presentes
SELECT nome_convidados, nome_presentes, nome_pagamentos FROM lista 
INNER JOIN checkout INNER JOIN convidados INNER JOIN presentes INNER JOIN pagamentos 
ON idcheckout = checkout_idcheckout AND idconvidados = convidados_idconvidados AND presentes_idpresentes = idpresentes 
AND idpagamentos = pagamentos_idpagamentos ORDER BY nome_convidados ASC;




-- ---> INSERTS <---

-- Inserir novo Presente
INSERT INTO presentes (nome_presentes,preco_presentes,limite_presentes,categorias_idcategorias,pagamentos_idpagamentos) 
VALUES ($nome_presentes,$preco_presentes,$limite_presentes,(SELECT nome_categorias FROM categorias WHERE nome_categorias LIKE $nome_categorias),
(SELECT nome_pagamentos FROM pagamentos WHERE nome_pagamentos LIKE $nome_pagamentos));

-- Inserir novo convidado
INSERT INTO convidados (cpf_convidados,nome_convidados,telefone_convidados,email_convidados,senha_convidados) 
VALUES ($cpf_convidados,$nome_convidados,$telefone_convidados,$email_convidados,$senha_convidados);

-- Inserir novo pagamento
INSERT INTO pagamentos (nome_pagamentos) VALUES ($nome_pagamentos);

-- Inserir nova categoria
INSERT INTO categorias (nome_categorias) VALUES ($nome_categorias);

-- Inserir novo checkout
INSERT INTO checkout (convidados_idconvidados,presentes_idpresentes,eventos_ideventos) 
VALUES ((SELECT idconvidados FROM convidados WHERE cpf_convidados LIKE "111.111.111-11"),
(SELECT idpresentes FROM presentes WHERE nome_presentes LIKE "Pizza"),
(SELECT ideventos FROM eventos WHERE nome_eventos LIKE "PizzaFest"));

-- Inserir lista
INSERT INTO lista (checkout_idcheckout) VALUES (LAST_INSERT_ID());

SELECT idcheckout FROM checkout;
SELECT * FROM lista;

-- MODELO
-- VALUES ((SELECT idprodutos FROM produtos WHERE nome_produtos LIKE 'Açúcar'),(SELECT idmarcas FROM marcas WHERE nome_marcas LIKE 'Crystal'),4.60,"1Kg",
-- (SELECT idmercados FROM mercados WHERE nome_mercados LIKE 'Cesta'));