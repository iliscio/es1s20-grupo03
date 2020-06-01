<div class="col-md-8 order-md-1">

            
        <!--  <h4 class="mb-3">Billing address</h4>-->
          <form class="needs-validation" action="index.php" method="POST">
            
            <input type="text" name="account_id" style="display: none;" value="<?php echo $_SESSION['account_id']; ?>">

            <div class="row">
              <div class="col-md-6 mt-3">
                <label for="nome">Nome</label>
                <input type="text" name="name" class="campos form-control" id="nome" value="<?php echo $_SESSION['NOME']; ?>" placeholder="Digite seu nome" required>
              </div>

              <div class="col-md-6 mt-3">
                <label for="tp_account">Tipo da conta</label>
                <select name="tp_account" class="custom-select d-block w-100" disabled required>
                  <option value="">Selecione...</option>
                  <option value="1" <?php if($_SESSION['TP_ACCOUNT'] == 1){echo 'selected="selected"';} ?>>Transportadora</option>
                  <option value="2" <?php if($_SESSION['TP_ACCOUNT'] == 2){echo 'selected="selected"';} ?>>Caminhoneiro</option>
                </select>
              </div>

            </div>

            <div class="row" >

              <div class="col-md-6 mt-3">
                <label for="document_type">Tipo de registro</label>
                <select name="document_type" id="TP_DOC" class="campos custom-select d-block w-100" required>
                  <option value="">Selecione...</option>
                  <option id="PF" value="1" <?php if($_SESSION['DOCUMENT_TYPE'] == 1){echo 'selected="selected"';} ?>>Pessoa Física</option>
                  <option id="PJ" value="2" <?php if($_SESSION['DOCUMENT_TYPE'] == 2){echo 'selected="selected"';} ?>>Pessoa Jurídica</option>
                </select>
              </div>

              <div class="col-md-6 mt-3" >
                <label id="lblDoc" for="document">Documento</label>
                <div class="input-group">
                  <input type="text" value="<?php echo $_SESSION['DOCUMENT']; ?>" name="document" class="campos form-control" id="doc" placeholder="<?php if($_SESSION['TP_ACCOUNT'] == 2){echo '99.999.999/0000-00';}else{echo '999.999.999-99';} ?>" required>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-3 mt-3">
                <label for="country_code">Código do País</label>
                <input type="text" name="country_code" value="<?php echo $_SESSION['COUNTRY_CODE']; ?>" class="campos form-control" id="COUNTRY_CODE" placeholder="Exemplo: 55">
              </div>

              <div class="col-md-3 mt-3">
                <label for="area_code">DDD</label>
                <input type="text" name="area_code" value="<?php echo $_SESSION['AREA_CODE']; ?>"  class="campos form-control" id="area_code" placeholder="Digite seu DDD">
              </div>

              <div class="col-md-6 mt-3">
                <label for="PHONE">Número</label>
                <input type="text" name="phone" value="<?php echo $_SESSION['PHONE']; ?>" class="campos form-control" id="PHONE" placeholder="Digite seu número">
              </div>

            </div>

            <div class="row">
              <div class="col-md-12 mt-3">
                <label for="email">Email</label>
                <input type="email" value="<?php echo $_SESSION['EMAIL_ADDRESS']; ?>" name="email_address" class="campos form-control" id="email" placeholder="seu@email.com">
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 mt-3">
                <label for="zip">CEP</label>
                <input type="text" name="postal_code" value="<?php echo $_SESSION['POSTAL_CODE']; ?>"  maxlength="8"  class="campos form-control" id="zip" placeholder="12345678" required>
              </div>

              <div class="col-md-6 mt-3">
                <label for="street">Rua</label>
                <input type="text" name="street" class="campos form-control" value="<?php echo $_SESSION['STREET']; ?>" id="street" placeholder="Ex.: Honduras" required>
              </div>

              <div class="col-md-3 mt-3">
                <label for="num">Número</label>
                <input type="text" name="num" class="campos form-control" value="<?php echo $_SESSION['NUM']; ?>" id="num" placeholder="Ex.: 123" required>
              </div>
            </div>

            <div class="row">

              <div class="col-md-6 mt-3">
                <label for="city">Cidade</label>
                <input type="text" name="city" class="campos form-control" value="<?php echo $_SESSION['CITY']; ?>" id="city" placeholder="Ex.: 123"  required>
              </div>

              <div class="col-md-6 mt-3">
                <label for="address">Bairro</label>
                <input type="text" name="address" value="<?php echo $_SESSION['ADDRESS']; ?>" class="campos form-control" id="address" placeholder="Ex.: Vila flora" required>
              </div>

            </div>

            <div class="row">
              <div class="col-md-6 mt-3">
                <label for="address2">Complemento</label>
                <input name="address2" type="text" class="campos form-control" value="<?php echo $_SESSION['ADDRESS2']; ?>"  id="address2" placeholder="Ex.: Casa, Fundos, etc." >
              </div>

              <div class="col-md-3 mt-3">
                <label for="country">País</label>
                <select name="country" class="campos custom-select d-block w-100" id="country" required>
                  <option value="">Selecione...</option>
                  <option value="US" <?php if($_SESSION['COUNTRY'] == 'US'){echo 'selected="selected"';} ?>>United States</option>
                  <option value="BR" <?php if($_SESSION['COUNTRY'] == 'BR'){echo 'selected="selected"';} ?>>Brasil</option>
                  <option value="JP" <?php if($_SESSION['COUNTRY'] == 'JP'){echo 'selected="selected"';} ?>>Japão</option>
                  <option value="GT" <?php if($_SESSION['COUNTRY'] == 'GT'){echo 'selected="selected"';} ?>>Guatemala</option>
                </select>
              </div>

              <div class="col-md-3 mt-3">
                <label for="state">Estado</label>
                <select name="state" class="campos custom-select d-block w-100" id="state" required>
                  <option value="">Selecione...</option>
                  <option value="RJ" <?php if($_SESSION['STATE'] == 'RJ'){echo 'selected="selected"';} ?>>RJ</option>
                  <option value="SP" <?php if($_SESSION['STATE'] == 'SP'){echo 'selected="selected"';} ?>>SP</option>
                  <option value="RS" <?php if($_SESSION['STATE'] == 'RS'){echo 'selected="selected"';} ?>>RS</option>
                  <option value="MG" <?php if($_SESSION['STATE'] == 'MG'){echo 'selected="selected"';} ?>>MG</option>
                  <option value="RN" <?php if($_SESSION['STATE'] == 'RN'){echo 'selected="selected"';} ?>>RN</option>
                  <option value="PR" <?php if($_SESSION['STATE'] == 'PR'){echo 'selected="selected"';} ?>>PR</option>
                </select>
              </div>
              
            </div>

            <div class="row">
              
              <div class="col-md-10 mt-3">
                <label for="complemento">Caminhões</label>
                <input type="text" id="caminhao" class="form-control campos" title="Clique para adicionar os transportes"  placeholder="Clique para preencher." value="">
              </div>

              <div class="col-md-1 mt-4">
                <button id="btn_caminhao"  style="position: relative;top: 15px;"  type="button" class="btn campos btn-primary btn-lg" disabled>Add</button>
              </div>
            </div>

            <hr class="mb-4">
            <div class="row">
              <button id="btn_atualiza" type="button" class="btn btn-primary btn-lg btn-block" >Alterar</button>
              <input id="btn_save" type="submit" value="Salvar" class="btn campos btn-primary btn-lg btn-block" disabled/>
              <input type="hidden" name="gravar" value="save" />

            </div>
          </form>
        </div>