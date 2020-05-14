<?php

include_once('./postmon.php');

$address = searchAddress();

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consumo de API com PHP</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <form method="post">
      <h2 class="text-center font-weight-light mb-5">Digite o CEP para encontrar o endereço</h2>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            name="zipcode"
            value="<?php echo $address->cep ?>"
            placeholder="CEP"
            autocomplete="off"
          />
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-3">
          Enviar
        </button>
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          placeholder="Rua"
          value="<?php echo $address->logradouro ?? ''?>"
          disabled
        />
      </div>
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          placeholder="Bairro"
          value="<?php echo $address->bairro ?? ''?>"
          disabled
        />
      </div>
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          placeholder="Cidade"
          value="<?php echo $address->localidade ?? $address->cidade ?>"
          disabled
        />
      </div>
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          placeholder="Estado"
          value="<?php echo $address->uf ?? $address->estado ?>"
          disabled
        />
      </div>
    </form>
  </body>
</html>
