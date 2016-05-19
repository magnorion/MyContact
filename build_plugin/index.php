<?php
  /*
    * myMsg Builder
    * Toda a estrutura do plugin (HTML/PHP)
  */
?>
<div id="myMsg_container">
  <div class="myMsg_title">
    <h3> <i class="fa fa-envelope"></i> Deixe a sua mensagem </h3>
  </div>
</div>

<div id="myMsg_form">
  <div class="myMsg_title">
    <h3> <i class="fa fa-envelope"></i> <span>Fale com um consultor.</span><br/><span>Deixe sua mensagem! </span> </h3>
    <span id="myMsg_close"> <i class="fa fa-times"></i> </span>
  </div>
  <div class="form-position">
    <form>
      <p>
        <label>Nome Completo:</label>
        <input type="text" name="nome" />
      </p>
      <p>
        <label>Email:</label>
        <input type="text" name="email" />
      </p>
      <p>
        <label>Celular: <span class="low-label">(com DDD)</span></label>
        <input type="text" name="celular" />
      </p>
      <p>
        <label>Curso de interesse:</label>
        <input type="text" name="curso" />
      </p>
      <p>
        <label>Assunto:</label>
        <select name="assunto">
           <option value="">Selecione</option>
           <option value="Alterações e Agendamento de Prova">Alterações e Agendamento de Prova</option>
           <option value="Boleto de Inscrição">Boleto de Inscrição</option>
           <option value="Boleto de Matrícula">Boleto de Matrícula</option>
           <option value="Bolsas e Descontos">Bolsas e Descontos</option>
           <option value="Convênios e Parcerias">Convênios e Parcerias</option>
           <option value="Dúvidas Calouros">Dúvidas Calouros</option>
           <option value="Informações sobre cursos de Graduação">Informações sobre cursos de Graduação</option>
           <option value="Informações sobre cursos de Pós Graduação">Informações sobre cursos de Pós Graduação</option>
           <option value="Informações Institucionais">Informações Institucionais</option>
           <option value="Elogios">Elogios</option>
           <option value="Ex-Aluno">Ex-Aluno</option>
           <option value="Matrícula">Matrícula</option>
           <option value="Processo Seletivo">Processo Seletivo</option>
           <option value="Reclamação">Reclamação</option>
           <option value="Retorno ao Curso">Retorno ao Curso</option>
           <option value="Segunda Graduação">Segunda Graduação</option>
           <option value="Serviços à Comunidade">Serviços à Comunidade</option>
           <option value="Sugestão">Sugestão</option>
           <option value="Transferência">Transferência</option>
           <option value="Outros Assuntos">Outros Assuntos</option>
        </select>
      </p>
      <p>
        <label>Mensagem:</label>
        <textarea name="mensagem"></textarea>
      </p>
      <p style="padding-top: 5px; padding-bottom: 5px; margin-right: 5px;">
        <button id="sendData"> Deixe a Sua Mensagem </button>
      </p>
    </form>
  </div>
  <div id="box_msg_final">
    <p id="msgAfterSend"> Agradecemos o seu interesse e em breve um de nossos consultores educacionais entrará em contato! </p>
    <button id="btn_close_text"> Fechar </button>
  </div>
</div>
