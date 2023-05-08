# IIS-PHP-BATCH
Sistema web local que tem como objetivo receber informações das máquinas clientes de um servidor de domínio, com o intuito de fornecer subsídios para análises do setor de tecnologia da informação.


# Arquivo (boot.bat)
A primeira linha de código "net use Z: \127.0.0.0\cliente$" está mapeando a unidade Z: para uma pasta compartilhada no computador local. Nesse caso, o endereço IP usado é 127.0.0.0 e o nome da pasta compartilhada é "cliente$". O sinal de dólar ($) no final do nome da pasta indica que ela é uma pasta oculta compartilhada apenas para fins administrativos.

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


# Arquivo (script.php) function entradaDadosTXT

Esta é uma função recebe como entrada o link de um arquivo de texto (.txt) contendo informações sobre um sistema operacional e extrai algumas informações específicas desse arquivo.

Primeiro, a função lê o conteúdo do arquivo de texto usando a função file_get_contents() e, em seguida, usa a função explode() para separar o nome do arquivo de texto e, em seguida, removendo a extensão ".txt". Isso é usado para criar um identificador único para cada sistema, que é calculado usando a função md5().

O próximo passo é separar as linhas do arquivo de texto usando a função explode() e, em seguida, percorrer cada linha em um loop foreach. Para cada linha, a função verifica se contém uma das informações relevantes e, se sim, armazena essa informação em uma variável específica.

As informações relevantes que a função procura no arquivo de texto são: nome do host, nome do sistema operacional, usuário registrado, identificação do produto, fabricante do sistema, modelo do sistema, tipo de sistema, versão do BIOS, quantidade de RAM, domínio, servidor de logon, número total de placas de rede e endereço IP.
Finalmente, a função retorna uma string formatada em HTML contendo as informações extraídas. Esta string é usada para preencher uma tabela em uma página da web.


# Arquivo (script.php) function dia_da_semana
Essa função recebe uma data como argumento e retorna o dia da semana correspondente a essa data.
Primeiro, a função converte a string de data em um carimbo de tempo (timestamp) usando a função strtotime(). Em seguida, usa a função date() para obter o dia da semana correspondente ao carimbo de tempo e armazená-lo na variável $dia_da_semana.

Depois disso, a função usa uma declaração switch para comparar o valor de $dia_da_semana com cada um dos sete dias da semana, e retorna uma string contendo o nome do dia da semana correspondente.

Por exemplo, se a data fornecida como argumento for um sábado, a função retornará a string '(sábado)'. Note que a função também inclui as tags HTML "h2" para exibir o nome do dia em um cabeçalho de segundo nível.


# Arquivo (script.php) function json

Essa função chamada "json" tem o objetivo de ler e processar um arquivo de texto e retornar um objeto JSON. A função recebe um parâmetro "link", que é o caminho para o arquivo de texto a ser lido.

Primeiro, o conteúdo do arquivo é lido usando a função "file_get_contents" e armazenado em uma variável chamada "$texto". Em seguida, o nome do usuário é extraído do link e usado para gerar um ID exclusivo usando a função "md5".

Depois disso, cada linha do arquivo de texto é processada em um loop "foreach" e verificada em busca de determinados padrões de texto usando a função "strpos". Se o padrão de texto for encontrado, o valor correspondente é extraído da linha usando a função "explode" e armazenado em uma variável apropriada.

Finalmente, um objeto JSON é criado usando as variáveis armazenadas e retornado pela função. As chaves do objeto JSON incluem "data", "hora", "usuario", "nome_host", "sistema_op", "user_registro", "fabricante", "modelo", "ram", "dominio", "servidor" e "totalrede". O valor de cada chave é obtido das variáveis correspondentes que foram preenchidas durante o processamento do arquivo de texto.


