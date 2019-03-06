# Comentários Francisco

Como a proposta era gerar um código onde ao receber um pedido deveria ocorrer um tipo de ação com base no produto adicionado ao pedido, levei em consideração que essa Order em algum momento deveria ser salva no banco de dados e por isso parte do código leva em consideração essa ação.   

Assim sendo considero os passos:

1. Adiciono o produto ao Order;
1. "Salvo esse produto no Banco";
1. "Recupero o Order completo e finalizar o pagamento";
1. Valido o método pagamento, especificamente nesse caso estou usando um cartão de crédito;
1. Finalizo o pagamento;
1. Envio o produto.

Assim um sequência de Controllers para ficar mais claro o processo seria.

OrdersController -> PaymentsController -> ShipmentsController.

## Observações

Importante acrescentar que deixe subentendido diversos pontos arquitetando apenas um fluxo:

- Adiciona produto no Order;
- Paga;
- Envia.

Em um fluxo normal seria necessário validar diversos pontos, como os produtos adicionados ao Order, então seria necessário adicionar regras para a emissão da etiqueta com base em uma regra que não foi definida no escopo do challenge, assim a aplicação da regra é apenas para 1 produto independete da quantidade de itens no Order, ou seja, apenas o primeiro produto do Order é considerado para a regra.
