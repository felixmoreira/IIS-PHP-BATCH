# IIS-PHP-BATCH
Sistema web local que tem como objetivo receber informações das máquinas clientes de um servidor de domínio, com o intuito de fornecer subsídios para análises do setor de tecnologia da informação.


# Arquivo (boot.bat)
A primeira linha de código "net use Z: \127.0.0.0\pc$" está mapeando a unidade Z: para uma pasta compartilhada no computador local. Nesse caso, o endereço IP usado é 127.0.0.0 e o nome da pasta compartilhada é "pc$". O sinal de dólar ($) no final do nome da pasta indica que ela é uma pasta oculta compartilhada apenas para fins administrativos.

As duas linhas seguintes criam duas pastas dentro da unidade Z:, uma chamada "historico" e outra chamada com a data atual formatada com barras (/) substituídas por hífens (-), usando o comando "mkdir". Essas pastas serão usadas para armazenar os arquivos de texto gerados posteriormente.

A próxima linha de código usa o comando "systeminfo" para coletar informações do sistema e redireciona a saída para um arquivo de texto com o nome do usuário atual do sistema, salvo dentro da pasta com a data atual formatada, usando o sinal de porcentagem (%) para inserir o nome do usuário atual no nome do arquivo.

A linha seguinte usa o comando "ipconfig" com a opção "/all" para coletar informações sobre as configurações de rede do sistema e também redireciona a saída para um arquivo de texto com o nome do usuário atual do sistema, salvo dentro da pasta com a data atual formatada, usando o sinal de porcentagem (%) para inserir o nome do usuário atual no nome do arquivo e adicionando o sufixo "_rede".

Por fim, a última linha de código usa o comando "net use Z: /delete" para desconectar a unidade Z: do compartilhamento da pasta oculta do computador local.

Em resumo, o código cria duas pastas dentro da unidade Z:, coleta informações sobre o sistema e as configurações de rede do usuário atual e salva os resultados em arquivos de texto com nomes específicos dentro das pastas criadas anteriormente. Depois, ele desconecta a unidade Z: do compartilhamento da pasta oculta do computador local.

# Configuração no servidor do Dominio (GPO)
  1 - Crie o script que você deseja executar. Certifique-se de que ele está localizado em um local acessível pelos usuários, como um compartilhamento de rede.

  2 - Abra o Console de Gerenciamento de Política de Grupo (Group Policy Management Console - GPMC) no servidor de domínio.

  3 - Crie uma nova GPO (Group Policy Object) ou selecione uma existente para editar.

  4 - Na árvore de navegação do GPMC, clique com o botão direito do mouse na GPO que você deseja editar e selecione "Editar".

  5 - No Editor de Gerenciamento de Política de Grupo, navegue até "Configuração do Usuário" -> "Políticas" -> "Configurações do Windows" -> "Scripts (Logon/Logoff)".

  6 - Clique em "Logon" e, em seguida, clique em "Mostrar arquivos".

  7 - Copie o script que você criou para a pasta que aparece.

  8 - Volte para o Editor de Gerenciamento de Política de Grupo e clique em "Adicionar".

  9 - Clique em "Procurar" e selecione o script que você acabou de copiar para a pasta "Logon" na etapa anterior.

  10 - Clique em "OK" para fechar a janela "Adicionar Script de Logon".

  11 - Clique em "Aplicar" e, em seguida, em "OK" para fechar o Editor de Gerenciamento de Política de Grupo.

  12 - Aguarde alguns minutos para que a nova configuração da política de grupo seja replicada em todos os controladores de domínio.

Agora, sempre que um usuário fizer login em uma estação de trabalho que pertence ao domínio, o script será executado automaticamente.
