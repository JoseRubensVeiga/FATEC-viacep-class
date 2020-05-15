<?php

require_once('./consulta.php');

$address = searchAddress();
$finder = isset($_POST['finder']) ? $_POST['finder'] : 'viacep';

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
        <div class="form-group">
          <select name="finder" class="form-control">
            <option value="viacep" <?php echo $finder === 'viacep' ? 'selected' : '' ?>>ViaCep</option>
            <option value="postmon" <?php echo $finder === 'postmon' ? 'selected' : '' ?>>Postmon</option>
            <option value="cepaberto" <?php echo $finder === 'cepaberto' ? 'selected' : '' ?>>CepAberto</option>
          </select>
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
          value="<?php echo $address->localidade ?? '' ?>"
          disabled
        />
      </div>
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          placeholder="Estado"
          value="<?php echo $address->uf ?? '' ?>"
          disabled
        />
      </div>
    </form>
  </body>
</html>
