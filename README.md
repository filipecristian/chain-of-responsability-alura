## Designer Pattern Chain of Responsability

## Regras de Negócio
Crie a corrente de descontos. A partir da interface Desconto, implemente as seguintes regras de desconto:
1) Desconto de 10% para mais de 5 ítens; 
2) Desconto de 7% caso o valor da compra seja maior que 500,00 reais.

## Teste Unitários
Clone o repositório para sua máquina.
E execute os comandos para ver o funcionamento das implementações.

Item:
 `./vendor/bin/phpunit tests/ItemTest.php`
 
Orçamento: 
`./vendor/bin/phpunit tests/OrcamentoTest.php`

Desconto: 
`./vendor/bin/phpunit tests/DescontoTest.php`